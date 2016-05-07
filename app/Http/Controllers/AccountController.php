<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use Hash;

class AccountController extends Controller
{    
    public function login(Request $request)
    {
        $attemptIsSuccessful = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($attemptIsSuccessful)
        {
            return redirect('/home');
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
            
            return redirect('/home');
        }

        return redirect('signup')
            ->withInput()
            ->withErrors($validation->errors());
    }
}
