<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{
    public function testAdminAddUser()
    {
        $this->adminLogin();
        
        $email = 'testadmin@yungbuck.herokuapp.com';
        $password = 'asdfjkl;';
        $type = 'admin';
        
        $this->call('POST', '/admin/users/add', [
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'type' => $type
        ]);
        
        $this->seeInDatabase('users', [
            'email' => $email,
            'type' => $type
        ]);
        
        \App\User::where('email', '=', $email)
            ->where('type', '=', $type)
            ->delete();
    }
}
