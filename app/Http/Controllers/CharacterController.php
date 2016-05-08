<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Validator;
use App\Models\Character;
use App\Models\Comparison;
use App\Services\API\BattleNet;

class CharacterController extends Controller
{
    public function getSavedCharacters()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $characters = $user->characters;
        return $characters;
    }
    
    public function saved()
    {
        $characters = CharacterController::getSavedCharacters();
        return view('saved', [
            'characters' => $characters
        ]);
    }
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'realm' => 'required',
            'class' => 'required',
            'specialization' => 'required'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        
        $character = new Character();
        $character->name = $request->input('name');
        $character->realm = $request->input('realm');
        $character->class = $request->input('class');
        $character->specialization = $request->input('specialization');
        $character->user_id = Auth::user()->id;
        $character->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function compare()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $characters = $user->characters;
        return view('compare', [
            'characters' => $characters
        ]);
    }
    
    public function runComparison(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'character_ids' => 'required|array|min:2'
        ]);
        
        if ($validation->fails())
        {
            return redirect('compare');
        }
        
        $characters = Character::find($request->input('character_ids'));
        $battlenet = new BattleNet();
        $profiles = [];
        
        foreach ($characters as $character)
        {
            $profiles[] = $battlenet->getCharacter($character->realm, $character->name);
        }
        
        
        $comparison = new \stdClass();
        $names = array();
        
        foreach ($profiles as $profile)
        {
            $comparison->head[] = $profile->items->head->id;
            $names[$profile->items->head->id] = $profile->items->head->name;
            
            $comparison->neck[] = $profile->items->neck->id;
            $names[$profile->items->neck->id] = $profile->items->neck->name;
            
            $comparison->shoulder[] = $profile->items->shoulder->id;
            $names[$profile->items->shoulder->id] = $profile->items->shoulder->name;
            
            $comparison->back[] = $profile->items->back->id;
            $names[$profile->items->back->id] = $profile->items->back->name;
            
            $comparison->chest[] = $profile->items->chest->id;
            $names[$profile->items->chest->id] = $profile->items->chest->name;
            
            if (!empty($profile->shirt))
            {
                $comparison->shirt[] = $profile->items->shirt->id;
                $names[$profile->items->shirt->id] = $profile->items->shirt->name;
            }
            
            if (!empty($profile->tabard))
            {
                $comparison->tabard[] = $profile->items->tabard->id;
                $names[$profile->items->tabard->id] = $profile->items->tabard->name;
            }
            
            $comparison->wrist[] = $profile->items->wrist->id;
            $names[$profile->items->wrist->id] = $profile->items->wrist->name;
            
            $comparison->hands[] = $profile->items->hands->id;
            $names[$profile->items->hands->id] = $profile->items->hands->name;
            
            $comparison->waist[] = $profile->items->waist->id;
            $names[$profile->items->waist->id] = $profile->items->waist->name;
            
            $comparison->legs[] = $profile->items->legs->id;
            $names[$profile->items->legs->id] = $profile->items->legs->name;
            
            $comparison->feet[] = $profile->items->feet->id;
            $names[$profile->items->feet->id] = $profile->items->feet->name;
            
            $comparison->finger[] = $profile->items->finger1->id;
            $names[$profile->items->finger1->id] = $profile->items->finger1->name;
            $comparison->finger[] = $profile->items->finger2->id;
            $names[$profile->items->finger2->id] = $profile->items->finger2->name;
            
            $comparison->trinket[] = $profile->items->trinket1->id;
            $names[$profile->items->trinket1->id] = $profile->items->trinket1->name;
            $comparison->trinket[] = $profile->items->trinket2->id;
            $names[$profile->items->trinket2->id] = $profile->items->trinket2->name;
            
            $comparison->mainHand[] = $profile->items->mainHand->id;
            $names[$profile->items->mainHand->id] = $profile->items->mainHand->name;
            
            if (!empty($profile->offHand))
            {
                $comparison->offHand[] = $profile->items->offHand->id;
                $names[$profile->items->offHand->id] = $profile->items->offHand->name;
            }
        }
        
        
        return view('result', [
            'comparison' => $comparison,
            'names' => $names,
            'characters' => $characters
        ]);
    }
    
    public function getSavedComparisons()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $comparisons = $user->comparisons;
        return $comparisons;
    }
    
    public function viewSavedComparisons()
    {
        $comparisons = CharacterController::getSavedComparisons();
        
        foreach ($comparisons as $comparison)
        {
            $character_ids = json_decode($comparison->character_ids);
            $characters = Character::find($character_ids);
            $comparison->characters = $characters;
        }
        return view('saved-compare', [
            'comparisons' => $comparisons
        ]);
    }
    
    public function saveComparison(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'character_ids' => 'required|array|min:2'
        ]);
        
        if ($validation->fails())
        {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        
        $comparison = new Comparison();
        $comparison->character_ids = json_encode($request->input('character_ids'));
        $comparison->user_id = Auth::user()->id;
        $comparison->save();
        
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
