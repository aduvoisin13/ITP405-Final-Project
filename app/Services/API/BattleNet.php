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
        $cacheKey = $realm . $characterName;
        $jsonString = Cache::get($cacheKey);
        
        if (!$jsonString)
        {
            $key = $this->key;
            $locale = $this->locale;
            $fields = "items";
            $url = "https://us.api.battle.net/wow/character/$realm/$characterName?fields=$fields&locale=$locale&apikey=$key";
            $jsonString = file_get_contents_curl($url);
            Cache::put($cacheKey, $jsonString, 30);
        }
        
        $character = json_decode($jsonString);
        return $character;
    }
}
