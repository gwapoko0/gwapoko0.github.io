<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modalController extends Controller
{
    public function confModal(){
        return view('modal.scan');
    }
}
