<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }

    public function create(){
        return view('employee.create');
    }
}
