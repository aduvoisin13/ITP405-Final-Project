<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Models\Character;
use App\Models\Comparison;
use Hash;
use Validator;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all()->sortBy('id');
        return view('admin/users', [
            'users' => $users
        ]);
    }
    
    public function addUser(Request $request)
    {
        $validation = User::validate($request->all());
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $user = new User();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');
        $user->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function deleteUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'delete_user_id' => 'required|integer'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $user = User::find($request->input('delete_user_id'));
        $user->delete();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function editUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'edit_user_id' => 'required|integer',
            'edit_email' => 'email|unique:users,email',
            'password' => 'min:8|confirmed'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $user = User::find($request->input('edit_user_id'));
        if (!empty($request->input('edit_email')))
        {
            $user->email = $request->input('edit_email');
        }
        if (!empty($request->input('password')))
        {
            $user->password = Hash::make($request->input('password'));
        }
        if (!empty($request->input('edit_type')))
        {
            $user->type = $request->input('edit_type');
        }
        $user->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    
    public function characters()
    {
        $users = User::all()->sortBy('id');
        $characters = Character::all()->sortBy('id');
        return view('admin/characters', [
            'users' => $users,
            'characters' => $characters
        ]);
    }
    
    public function addCharacter(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'name' => 'required',
            'realm' => 'required',
            'class' => 'required',
            'specialization' => 'required'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $character = new Character();
        $character->name = $request->input('name');
        $character->realm = $request->input('realm');
        $character->class = $request->input('class');
        $character->specialization = $request->input('specialization');
        $character->user_id = $request->input('user_id');
        $character->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function deleteCharacter(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'delete_character_id' => 'required|integer'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $character = Character::find($request->input('delete_character_id'));
        $character->delete();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function editCharacter(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'edit_character_id' => 'required|integer',
            'edit_user_id' => 'integer'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $character = Character::find($request->input('edit_character_id'));
        if (!empty($request->input('edit_name')))
        {
            $character->name = $request->input('edit_name');
        }
        if (!empty($request->input('edit_realm')))
        {
            $character->realm = $request->input('edit_realm');
        }
        if (!empty($request->input('edit_class')))
        {
            $character->class = $request->input('edit_class');
        }
        if (!empty($request->input('edit_specialization')))
        {
            $character->specialization = $request->input('edit_specialization');
        }
        if (!empty($request->input('edit_user_id')))
        {
            $character->user_id = $request->input('edit_user_id');
        }
        $character->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    
    public function comparisons()
    {
        $users = User::all()->sortBy('id');
        $comparisons = Comparison::all()->sortBy('id');
        return view('admin/comparisons', [
            'users' => $users,
            'comparisons' => $comparisons
        ]);
    }
    
    public function addComparison(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'character_ids' => 'required',
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $comparison = new Comparison();
        
        $character_ids = [];
        $tok = strtok($request->input('character_ids'), ' ');
        while ($tok !== false)
        {
            $tokint = intval($tok);
            if ($tokint != 0)
            {
                $character_ids[] = $tokint;
            }
            $tok = strtok(' ');
        }
        $comparison->character_ids = json_encode($character_ids);
        
        $comparison->user_id = $request->input('user_id');
        $comparison->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function deleteComparison(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'delete_comparison_id' => 'required|integer'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $comparison = Comparison::find($request->input('delete_comparison_id'));
        $comparison->delete();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function editComparison(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'edit_comparison_id' => 'required|integer',
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER'])
                ->withInput()
                ->withErrors($validation->errors());
        }
        
        $comparison = Comparison::find($request->input('edit_comparison_id'));
        if (!empty($request->input('edit_character_ids')))
        {
            $character_ids = [];
            $tok = strtok($request->input('edit_character_ids'), ' ');
            while ($tok !== false)
            {
                $tokint = intval($tok);
                if ($tokint != 0)
                {
                    $character_ids[] = $tokint;
                }
                $tok = strtok(' ');
            }
            $comparison->character_ids = json_encode($character_ids);
        }
        if (!empty($request->input('edit_user_id')))
        {
            $comparison->user_id = $request->input('edit_user_id');
        }
        $comparison->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
