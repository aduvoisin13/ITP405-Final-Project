<?php

namespace App\Services\API;

use Cache;

class BattleNet
{
    protected $key;

    public function __construct(array $config = [])
    {
        $this->key = $config['key'];
    }

    public function getLeaderboard($bracket)
    {
        $jsonString = Cache::get($bracket);

        if (!$jsonString)
        {
            $key = $this->key;
            $url = "https://us.api.battle.net/wow/leaderboard/$bracket?locale=en_US&apikey=$key";
            $jsonString = file_get_contents($url);
            Cache::put($bracket, $jsonString, 30);
        }

        $leaderboard = json_decode($jsonString);
        return $leaderboard;
    }
}
