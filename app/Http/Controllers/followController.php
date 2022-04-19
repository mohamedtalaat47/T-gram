<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class followController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(App\Models\User $user){

        return auth()->user()->following()->toggle($user->profile);

    }
}
