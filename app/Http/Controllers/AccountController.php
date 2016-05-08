<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function attemptAuth($email, $password)
    {
        $attemptIsSuccessful = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);
        
        return $attemptIsSuccessful;
    }
    
    public function login(Request $request)
    {
        $attemptIsSuccessful = AccountController::attemptAuth(
            $request->input('email'),
            $request->input('password')
        );

        if ($attemptIsSuccessful)
        {
            return redirect('home');
        }

        return redirect('login')
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
                $request->input('password')
            );
            
            return redirect('home');
        }

        return redirect('signup')
            ->withInput()
            ->withErrors($validation->errors());
    }
}
