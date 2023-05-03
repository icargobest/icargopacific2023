<?php

namespace App\Http\Controllers;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }

    public function create(){
        return view('employee.create');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            return redirect()->route('login');
    }

}
