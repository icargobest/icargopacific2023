<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }

    public function create(){
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        $validated['type'] = '2'; // set the type to '2' company
        $validated['password'] = Hash::make($validated['password']);
    
        $user = User::create($validated);

        return redirect()->route('login')
                        ->with('success', 'Registered successfully. Please login to continue.');
    }
}
