<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);
        if (Auth::guard('pegawai')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        } elseif (Auth::guard('peserta')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/peserta/petunjuk');
        }
        return redirect('/');
    }
}
