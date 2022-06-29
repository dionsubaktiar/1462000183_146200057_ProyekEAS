<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register',[
            'title' => 'Daftar',
            'active' => 'Daftar'
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        user::create($validatedData);
        return redirect ('/login');
    }
}
