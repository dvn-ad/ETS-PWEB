<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginemail' => 'required|string|email',
            'loginpassword' => 'required|string',
        ]);
        if( auth()->attempt( ['email' => $incomingFields['loginemail'], 'password'=> $incomingFields['loginpassword']] ) ){
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }


    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request){
        $incomingFields = $request->all();
        // $incomingFields = request()->validate([
        //     'name' => 'required|string|max:255|unique:users|min:3',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        // ]);
        // $incomingFields['password'] = bcrypt( $incomingFields['password'] );
        $user = User::create( $incomingFields );
        auth()->login($user);
        return redirect('/');
    }

}
