<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    function show(){
        return view('register');
    }

    function create(Request $req){

        $validate = $this->validate($req, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'level' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $validate['password'] = bcrypt($req->password);

        User::create($validate);

        return redirect('/');
    }

    function userupdate(Request $req, $id){
        User::Where('id', $id)->update([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'level' => $req->level,
            'email' => $req->email,
            'password' => $req->password
        ]);

        return redirect('myuser');
    }

    function auth(Request $req){
        $credentials = $req->only('email','password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->level === "admin") {
                return redirect('dashboard');
                
            }else if (Auth::user()->level === "member") {
                return redirect('page');
            }

        }
        return redirect()->back();
    }

    function showuser(){
        $data['user'] = User::all();

        return view('pageadmin.pengguna', $data);
    }

    function showauth(){
        $data['user'] = User::where('id', Auth::user()->id)->first();

        return view('pageadmin.formuser', $data);
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    
}
