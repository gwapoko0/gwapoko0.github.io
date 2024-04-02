<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class MenuController extends Controller
{
    // public function testing()
    // {
    //     $data = array();
    //     if(Session::has('loginId')){
    //         $data = User::where('id','=',Session::get('loginId'))->first();
    //     }
    //     return view('testing',compact('data'));
    // }
}
