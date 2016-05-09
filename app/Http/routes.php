<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('signup', function() {
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->type == 'member')
            {
                return redirect('home');
            }
            if ($user->type == 'admin')
            {
                Auth::logout();
            }
        }
        
        Auth::logout();
        return view('signup');
    });
    
    Route::post('signup', 'AccountController@signup');
    
    Route::get('login', function() {
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->type == 'member')
            {
                return redirect('home');
            }
            if ($user->type == 'admin')
            {
                Auth::logout();
            }
        }
        
        return view('login');
    });

    Route::post('login', 'AccountController@login');

    Route::get('logout', function() {
        Auth::logout();
        return redirect('login');
    });
    
    Route::get('admin', function() {
        if (Auth::check())
        {
            $user = Auth::user();
            if ($user->type == 'member')
            {
                Auth::logout();
            }
            if ($user->type == 'admin')
            {
                return redirect('admin/home');
            }
        }
        
        return view('admin');
    });
    
    Route::post('admin', 'AccountController@admin');
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['member']], function() {
        Route::get('/home', function() {
            return view('home');
        });
        
        Route::get('/saved', 'CharacterController@saved');
        Route::post('/saved', 'CharacterController@store');
        Route::post('/remove', 'CharacterController@remove');
        
        Route::get('/compare', 'CharacterController@compare');
        Route::post('/compare', 'CharacterController@runComparison');
        Route::post('/compare/delete', 'CharacterController@deleteComparison');
        
        Route::get('/saved-compare', 'CharacterController@viewSavedComparisons');
        Route::post('/saved-compare', 'CharacterController@saveComparison');
        
        Route::get('/battlenet/{bracket}', function ($bracket) {
            $battlenet = new \App\Services\API\BattleNet();
            $characterController = new \App\Http\Controllers\CharacterController();
            
            $leaderboard = $battlenet->getLeaderboard($bracket);
            $classes = $battlenet->getClasses();
            $specIds = $battlenet->getSpecIds();
            $saved = $characterController->getSavedCharacters();
            
            return view('battlenet', [
                'bracket' => $bracket,
                'leaderboard' => $leaderboard,
                'classes' => $classes,
                'specIds' => $specIds,
                'saved' => $saved
            ]);
        });

        Route::get('/wow/character/{realm}/{characterName}', function($realm, $characterName) {
            $battlenet = new \App\Services\API\BattleNet();
            $characterController = new \App\Http\Controllers\CharacterController();
            
            $character = $battlenet->getCharacter($realm, $characterName);
            $classes = $battlenet->getClasses();
            $saved = $characterController->getSavedCharacters();
            
            return view('character', [
                'character' => $character,
                'classes' => $classes,
                'saved' => $saved
            ]);
        });
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['admin']], function() {
        Route::get('/admin/home', function() {
            return view('admin/home');
        });
        
        Route::get('/admin/users', 'AdminController@users');
        Route::post('/admin/users/add', 'AdminController@addUser');
        Route::post('/admin/users/delete', 'AdminController@deleteUser');
        Route::post('/admin/users/edit', 'AdminController@editUser');
        
        Route::get('/admin/characters', 'AdminController@characters');
        Route::post('/admin/characters/add', 'AdminController@addCharacter');
        Route::post('/admin/characters/delete', 'AdminController@deleteCharacter');
        Route::post('/admin/characters/edit', 'AdminController@editCharacter');
        
        Route::get('/admin/comparisons', 'AdminController@comparisons');
        Route::post('/admin/comparisons/add', 'AdminController@addComparison');
        Route::post('/admin/comparisons/delete', 'AdminController@deleteComparison');
        Route::post('/admin/comparisons/edit', 'AdminController@editComparison');
    });
});
