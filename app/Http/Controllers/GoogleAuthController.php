<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tableData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function register()
    {
        return view('/register');
    }

    public function registration(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:12'
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $res = $user->save();

        if($res){
            return back()->with('success','Successfuly registered!');
        }else{
            return back()->with('fail','Something went wrong!');
        }
    }

    public function loginUser(Request $req)
    {   
        $req->validate([
           'email'=>'required|email',
           'password'=>'required|min:6|max:12' 
        ]);
        $user = User::where('email',$req->email)->first();
            if($user){
                if($req->password == $user->password){
                    $req->session()->put('loginId',$user->id);
                    $data = array();
                    $data = User::where('id','=',Session::get('loginId'))->first();
                    
                    return redirect()->intended('dashboard');
                }else{
                    return back()->with('fail','password did not match!');
                }
            }else{
                return back()->with('fail','user is not registered!');
            }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::flush();
            return redirect('/');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return $data;
    }
    
    public function tableData()
    {
        $tableData = tableData::all();
        return $tableData;
    }

    public function redirect()
    {
        
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(Request $req)
    {
        try {
            
            $google_user = Socialite::driver('google')->user();
            
            $user = User::where('google_id', $google_user->getId())->first();
            if(!$user){
                
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');

            }else{
                $req->session()->put('loginId',$user->id);
                Auth::login($user);

                return redirect()->intended('dashboard');
            }

        } catch (\Throwable $th) {
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
