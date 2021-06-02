<?php

namespace App\Http\Controllers;
use App\models\Character;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all()->toArray();
        // dd($characters);
        return array_reverse($characters);      
    }
}
