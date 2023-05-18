<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerQueries;

class QueryController extends Controller
{
    public function save(Request $request){
        $data = CustomerQueries::create([
            'email' => $request->email,
            'name' => $request->name,
            'cust_query' => $request->cust_query,
        ]);

        return redirect()->back()->with('success', 'Your Query has been sent!');
    }

    public function show(){
        $cust_queries = CustomerQueries::all();

        return view('icargo_superadmin_panel.list_queries', compact('cust_queries'));
    }

    public function show_Query($id){
        $cust_queries = CustomerQueries::findOrFail($id);

        return view('icargo_superadmin_panel.messages', compact('cust_queries'));
    }
}
