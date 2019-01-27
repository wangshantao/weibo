<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }


    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', 'welcome comeback!');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', 'sorry, password incorrect');
            return redirect()->back()->withInput();
        }
        return;
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'you has successful logout');
        return redirect('login');
    }
}
