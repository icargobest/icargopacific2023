<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }

    public function create(){
        return view('employee.create');
    }

}
