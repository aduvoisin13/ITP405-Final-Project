<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function attemptAuth($email, $password, $type)
    {
        $attemptIsSuccessful = Auth::attempt([
            'email' => $email,
            'password' => $password,
            'type' => $type
        ]);
        
        return $attemptIsSuccessful;
    }
    
    public function login(Request $request)
    {
        $attemptIsSuccessful = AccountController::attemptAuth(
            $request->input('email'),
            $request->input('password'),
            'member'
        );

        if ($attemptIsSuccessful)
        {
            return redirect('home');
        }

        return redirect('login')
            ->withInput()
            ->with('failedAttempt', true);
    }
    
    public function signup(Request $request)
    {
        $validation = User::validate($request->all());

        if ($validation->passes())
        {
            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->type = 'member';
            $user->save();
            
            AccountController::attemptAuth(
                $request->input('email'),
                $request->input('password'),
                'member'
            );
            
            return redirect('home');
        }

        return redirect('signup')
            ->withInput()
            ->withErrors($validation->errors());
    }
    
    public function admin(Request $request)
    {
        $attemptIsSuccessful = AccountController::attemptAuth(
            $request->input('username'),
            $request->input('password'),
            'admin'
        );

        if ($attemptIsSuccessful)
        {
            return redirect('admin/home');
        }

        return redirect('admin')
            ->withInput()
            ->with('failedAttempt', true);
    }
}
