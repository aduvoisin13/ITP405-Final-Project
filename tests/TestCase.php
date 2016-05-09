<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }
    
    public function login()
    {
        $email = "test@yungbuck.herokuapp.com";
        $password = "asdfjkl;";
        
        $this
            ->visit('/login')
            ->type($email, 'email')
            ->type($password, 'password')
            ->press('Log In');
    }
    
    public function adminLogin()
    {
        $username = "admin";
        $password = "laravel";
        
        $this
            ->visit('/admin')
            ->type($username, 'username')
            ->type($password, 'password')
            ->press('Log In');
    }
}
