<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $validated = $this->validate($request, [
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => !empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);

        $customer->update([
            'contact_no' =>  $request->contact_no,
            'contact_name' => $request->contact_name,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Customer account has been updated successfully.');
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
  
}
