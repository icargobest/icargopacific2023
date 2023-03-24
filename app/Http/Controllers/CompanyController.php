<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        return view('');
    }

    public function create(){
        return view('company.create');
    }

    public function show(){
        $data = ["data" => "data from database"];
        return view('company')
            ->with('data', $data);
    }

}
