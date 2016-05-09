<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComparisonTest extends TestCase
{
    public function testSaveComparisonWasInsertedIntoDatabase()
    {
        $this->login();
        
        $characters = [1, 2, 3];
        $json = json_encode($characters);
        
        $this->call('POST', '/saved-compare', [
            'character_ids' => $characters
        ]);
        
        $this->seeInDatabase('comparisons', [
            'character_ids' => $json
        ]);
        
        \App\Models\Comparison::where('character_ids', '=', $json)->delete();
    }
}
