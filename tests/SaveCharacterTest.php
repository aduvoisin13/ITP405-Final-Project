<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CharacterTest extends TestCase
{
    public function testSaveCharacterWasInsertedIntoDatabase()
    {
        $this->login();
        
        $name = "TestCharacter";
        $realm = "TestRealm";
        $class = "TestClass";
        $specialization = "TestSpecialization";
        
        $this->call('POST', '/saved', [
            'name' => $name,
            'realm' => $realm,
            'class' => $class,
            'specialization' => $specialization
        ]);
        
        $this->seeInDatabase('characters', [
            'name' => $name,
            'realm' => $realm,
            'class' => $class,
            'specialization' => $specialization
        ]);
        
        \App\Models\Character::where('name', '=', $name)
            ->where('realm', '=', $realm)
            ->where('class', '=', $class)
            ->where('specialization', '=', $specialization)
            ->delete();
    }
}
