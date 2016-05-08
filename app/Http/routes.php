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
    Route::group(['middleware' => ['member']], function() {
        Route::get('/home', function() {
            return view('home');
        });
        
        Route::get('/saved', 'CharacterController@saved');
        Route::post('/saved', 'CharacterController@store');
        
        Route::get('/compare', 'CharacterController@compare');
        Route::post('/compare', 'CharacterController@runComparison');
        
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
            $character = $battlenet->getCharacter($realm, $characterName);
            return view('character', [
                'character' => $character
            ]);
        });
    });
    
    Route::get('signup', function() {
        if (Auth::check())
        {
            return view('home');
        }
        
        return view('signup');
    });
    
    Route::post('signup', 'AccountController@signup');
    
    Route::get('login', function() {
        if (Auth::check())
        {
            return view('home');
        }
        
        return view('login');
    });

    Route::post('login', 'AccountController@login');

    Route::get('logout', function() {
        Auth::logout();
        return redirect('login');
    });
});
