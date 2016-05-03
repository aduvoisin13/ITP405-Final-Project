<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Validator;
use App\Models\Character;

class CharacterController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $characters = $user->characters;
        return view('saved', [
            'characters' => $characters
        ]);
    }
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'realm' => 'required'
        ]);
        
        if ($validation->fails())
        {
            return redirect('saved');
        }
        
        $character = new Character();
        $character->name = $request->input('name');
        $character->realm = $request->input('realm');
        $character->user_id = Auth::user()->id;
        $character->save();
        
        return redirect('saved');
    }
}
