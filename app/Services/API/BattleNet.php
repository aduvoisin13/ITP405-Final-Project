<?php

namespace App\Services\API;

use Cache;

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
            $jsonString = file_get_contents($url);
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
            $jsonString = file_get_contents($url);
            Cache::put($cacheKey, $jsonString, 30);
        }
        
        $character = json_decode($jsonString);
        return $character;
    }
}
