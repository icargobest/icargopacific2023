<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();
        $customer = Customer::where('user_id', $user->id)->first();
        return view('profile.user', compact('user', 'customer'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $customer = Customer::where('user_id', $id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $customer->mobile = $request->input('mobile');
        $customer->tel = $request->input('tel');
        $customer->save();

        return back();
    }

    public function edit_address(Request $request, $id)
    {
        $customer = Customer::where('user_id', $id)->first();

        $customer->street = $request->input('street');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->postal_code = $request->input('postal_code');
        $customer->save();

        return back();
    }

    public function upload_photo(Request $request, $id)
    {
        $customer = Customer::where('user_id', $id)->first();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $filename);
            $customer->photo = $filename;
            $customer->save();
        }
        return redirect()->back();
    }

    public function edit_social(Request $request, $id)
    {
        $customer = Customer::where('user_id', $id)->first();

        $customer->facebook = $request->input('facebook');
        $customer->twitter = $request->input('twitter');
        $customer->instagram = $request->input('instagram');
        $customer->linkedin = $request->input('linkedin');
        $customer->save();

        return back();
    }
}
