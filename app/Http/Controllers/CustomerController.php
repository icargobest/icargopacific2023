<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;
use App\Models\VerifyToken;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

use function PHPSTORM_META\type;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('user')
            ->where('archived', 0)
            ->get();

        return view('icargo_superadmin_panel.registered_customers.index', compact('customers'));
    }


    public function create()
    {
        return view('icargo_superadmin_panel.registered_customers.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '0',
            ]);

            $customer = Customer::create([
                'user_id' => $user->id,
                'contact_no' =>  $request->contact_no,
                'address' => $request->address,
            ]);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return back()->with('success', 'Customer account has been created successfully.');
    }

    public function show($id)
    {
        $customer = Customer::with('user')->findOrFail($id);
        return view('icargo_superadmin_panel.registered_customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::with('user')->findOrFail($id);
        return view('icargo_superadmin_panel.registered_customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::with('user')->findOrFail($id);
        $user = $customer->user;
        $get_token = $request->otp;
        $get_token = VerifyToken::where('token', $get_token)->first();


        $validated = $this->validate($request, [
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
        ]);

        if($get_token){
            $get_token->is_activated = 1;
            $get_token->save();

            $user->update([
                'name' => $request->name ?? $user->name,
                'email' => $request->email ?? $user->email,
                'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            ]);

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = 'public/photos/customer/' . Auth::id();

                // Create the folder if it doesn't exist
                if (!Storage::exists($path)) {
                    Storage::makeDirectory($path);
                }

                // Store the photo in the user's folder
                $file->storeAs($path, $filename);

                // Save the photo path in the customer record
                $customer->photo = 'photos/customer/' . Auth::id() . '/' . $filename;
                $customer->save();
            }

            $customer->contact_no = $request->input('contact_no');
            $customer->tel = $request->input('tel');
            $customer->street = $request->input('street');
            $customer->city = $request->input('city');
            $customer->state = $request->input('state');
            $customer->postal_code = $request->input('postal_code');
            $customer->facebook = $request->input('facebook');
            $customer->linkedin = $request->input('linkedin');
            $customer->save();

            $delete_token = VerifyToken::where('token', $get_token->token)->first();
            $delete_token->delete();
        }

        return back()->with('success', 'Customer account has been updated successfully.');
    }

    public function sendOTP($id){

        $data = Customer::findOrFail($id);
        $customerID = $data->user_id;
        $get_userId = User::where('id', $customerID)->first();

        $validToken = rand(10,100..'2022');
        $get_token = new VerifyToken();
        $get_token->token = $validToken;
        $get_token->email = $get_userId['email'];
        $get_token->save();
        $get_user_email = $get_userId['email'];
        $get_user_name = $get_userId['name'];
        Mail::to($get_userId['email'])->send(new VerificationMail($get_user_email, $validToken, $get_user_name));

        return back()->with('message', 'OTP sent. Please ask the otp from the email owner.');
    }


    public function archive(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'archived' => 1,
        ]);

        return back()->with('success', 'Customer account has been archived successfully.');
    }

    public function unarchive(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'archived' => 0,
        ]);

        return back()->with('success', 'Customer account has been restored successfully.');
    }

    public function viewArchive()
    {
        $customers = Customer::with('user')
            ->where('archived', 1)
            ->get();

        return view('icargo_superadmin_panel.registered_customers.viewArchive', compact('customers'));
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return back()->with('success', 'Customer account has been deleted successfully.');
    }

    public function index_edit($id)
    {
        $user = User::where('id', $id)->first();
        $customer = Customer::where('user_id', $user->id)->first();
        return view('profile.myProfile', compact('user', 'customer'));
    }

    public function edit_profile(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $customer = Customer::where('user_id', $id)->first();

        $validated = $this->validate($request, [
            'facebook' => ['required', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'facebook.required' => 'Facebook Link is required',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $customer->contact_no = $request->input('contact_no');
        $customer->tel = $request->input('tel');
        $customer->street = $request->input('street');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->postal_code = $request->input('postal_code');
        $customer->facebook = $request->input('facebook');
        $customer->linkedin = $request->input('linkedin');
        $customer->save();

        return back()->with('success', 'Profile account has been updated successfully.');
    }

    public function upload_photo(Request $request, $id)
    {
        $customer = Customer::where('user_id', $id)->first();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/photos/' . Auth::user()->name;

            // Create the folder if it doesn't exist
            if (!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }

            // Store the photo in the user's folder
            $file->storeAs($path, $filename);

            // Save the photo path in the customer record
            $customer->photo = 'photos/' . Auth::user()->name . '/' . $filename;
            $customer->save();
        }

        return redirect()->back()->with('success', 'Profile image has been updated successfully.');
    }

    public function getCustomerInfo()
    {
        // Retrieve the customer information from the database
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        if ($customer) {
            return response()->json([
                'street' => $customer->street,
                'contact_no' => $customer->contact_no,
                'tel' => $customer->tel,
                'city' => $customer->city,
                'postal_code' => $customer->postal_code,
                'state' => $customer->state
            ]);
        }

        return response()->json([]);
    }
}
