<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    public function testLoginRedirectsToHome()
    {
        $email = "test@yungbuck.herokuapp.com";
        $password = "asdfjkl;";
        
        $this
            ->visit('/login')
            ->type($email, 'email')
            ->type($password, 'password')
            ->press('Log In')
            ->seePageIs('/home');
    }
    
    public function testAdminLoginRedirectsToAdminHome()
    {
        $username = "admin";
        $password = "laravel";
        
        $this
            ->visit('/admin')
            ->type($username, 'username')
            ->type($password, 'password')
            ->press('Log In')
            ->seePageIs('/admin/home');
    }
    
    public function testSignupRedirectsToHome()
    {
        $email = "testsignup@yungbuck.herokuapp.com";
        $password = "asdfjkl;";
        
        $this
            ->visit('/signup')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'password_confirmation')
            ->press('Sign Up')
            ->seePageIs('/home');
        
        \App\User::where('email', '=', $email)->delete();
    }
}
