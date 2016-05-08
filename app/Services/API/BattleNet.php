<?php

namespace App\Services\API;

use Cache;
use Exception;


function file_get_contents_curl($url)
{
    try {
        
        $ch = curl_init();
        
        if ($ch === false)
            throw new Exception('failed to initialize');
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $data = curl_exec($ch);
        
        if ($data === false)
            throw new Exception(curl_error($ch), curl_errno($ch));
            
        curl_close($ch);
    
        return $data;
        
    } catch(Exception $e) {
        
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
            
    }
    
    return false;
}


class BattleNet
{
    protected $key, $locale;

    public function __construct(array $config = [])
    {
        $this->key = env('BATTLENET_KEY');
        $this->locale = "en_US";
    }

    public function getLeaderboard($bracket)
    {
        $bracket = rawurlencode($bracket);
        
        $jsonString = Cache::get($bracket);

        if (!$jsonString)
        {
            $key = $this->key;
            $locale = $this->locale;
            $url = "https://us.api.battle.net/wow/leaderboard/$bracket?locale=$locale&apikey=$key";
            $jsonString = file_get_contents_curl($url);
            Cache::put($bracket, $jsonString, 30);
        }
        
        $leaderboard = json_decode($jsonString);
        return $leaderboard;
    }
    
    public function getCharacter($realm, $characterName)
    {
        $realm = rawurlencode($realm);
        $characterName = rawurlencode($characterName);
        
        $cacheKey = "$characterName-$realm";
        $jsonString = Cache::get($cacheKey);
        
        if (!$jsonString)
        {
            $key = $this->key;
            $locale = $this->locale;
            $fields = "items,talents";
            $url = "https://us.api.battle.net/wow/character/$realm/$characterName?fields=$fields&locale=$locale&apikey=$key";
            $jsonString = file_get_contents_curl($url);
            Cache::put($cacheKey, $jsonString, 30);
        }
        
        $character = json_decode($jsonString);
        return $character;
    }
    
    public function getClasses()
    {
        $cacheKey = "classes";
        $jsonString = Cache::get($cacheKey);
        
        if (!$jsonString)
        {
            $key = $this->key;
            $locale = $this->locale;
            $url = "https://us.api.battle.net/wow/data/character/classes?locale=$locale&apikey=$key";
            $jsonString = file_get_contents_curl($url);
            Cache::put($cacheKey, $jsonString, 30);
        }
        
        $classes = json_decode($jsonString);
        return $classes;
    }
    
    public function getSpecIds()
    {
        // http://wowprogramming.com/docs/api_types#specID
        $specIds = array(
            // Mage
            62 => "Arcane",
            63 => "Fire",
            64 => "Frost",
            
            // Paladin
            65 => "Holy",
            66 => "Protection",
            70 => "Retribution",
            
            // Warrior
            71 => "Arms",
            72 => "Fury",
            73 => "Protection",
            
            // Druid
            102 => "Balance",
            103 => "Feral",
            104 => "Guardian",
            105 => "Restoration",
            
            // Death Knight
            250 => "Blood",
            251 => "Frost",
            252 => "Unholy",
            
            // Hunter
            253 => "Beast Mastery",
            254 => "Marksmanship",
            255 => "Survival",
            
            // Priest
            256 => "Discipline",
            257 => "Holy",
            258 => "Shadow",
            
            // Rogue
            259 => "Assassination",
            260 => "Combat",
            261 => "Subtlety",
            
            // Shaman
            262 => "Elemental",
            263 => "Enhancement",
            264 => "Restoration",
            
            // Warlock
            265 => "Affliction",
            266 => "Demonology",
            267 => "Destruction",
            
            // Monk
            268 => "Brewmaster",
            269 => "Windwalker",
            270 => "Mistweaver"
        );
        
        return $specIds;
    }
}
