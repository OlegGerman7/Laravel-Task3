<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users',
            'age'      => 'required|integer',
            'password' => 'required|min:8',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'age'      => 'required|integer',
            'password' => 'nullable|min:8',
        ]);

        if($request->filled('password')){
            $validateData['password'] = bcrypt($validateData['password']);
        }else{
            unset($validateData['password']);
        }

        $user->update($validateData);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
