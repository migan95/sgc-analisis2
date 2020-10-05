<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('users.index')
            ->with('users',$users);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request-> validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);

        return redirect()
            ->route('users.index')
            ->with('mensaje','Usuario creado correctamente');
    }

    public function show(User $user){
        return view('users.show')
            ->with('user',$user);
    }

    public function edit(User $user){
        return view('users.edit')
            ->with('user',$user);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->update($request->all());

        return redirect()
            ->route('users.index')
            ->with('mensaje', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('mensaje', 'Usuario eliminado correctamente');
    }

}
