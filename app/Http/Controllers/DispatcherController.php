<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DispatcherController extends Controller
{
    private $type;
    private $validate;
    private $update_user;

    public function index(User $users)
    {
        $type = '4';
        $users = User::where('type','=', $type)->paginate(100);
        return view('company/dispatcher.index', compact('users'));
    }

    function viewArchive(User $users){

        $type = '4';
        $users = User::where('type','=', $type)->paginate(100);
        return view('company/dispatcher.viewArchive', compact('users'));
    }


    public function create()
    {
        return view('company/dispatcher.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Password does not match.',
            'password.min' => 'Password must be a minimum of 8 characters',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email address must be unique within the organization',
            'email.email' => 'Email field must be email address.'
        ]);
        
        $validated['type'] = '4'; // set the type to '3' driver
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $user->dispatcherDetail()->create([
            'vehicle_type' => false,
        ]);
        return redirect()->route('dispatcher.index')->with('success','Dispatcher has been created successfully.');
    }

    public function show(User $users)
    {
        return view('dispatcher.show', compact('users'));
    }

    public function edit(User $users)
    {
        return view('dispatcher.edit',compact('users'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->update();
        return back()->with('success', 'Dispatcher #'.$id.' data updated successfully!');
    }

    public function destroy($id){
        Dispatcher::destroy($id);
        return redirect()->route('dispatcher.index')->with('success','Dispatcher has been deleted successfully');
    }

    public function archive($id)
    {
        $id = User::findOrFail($id);
        $id->dispatcherDetail()->update([
            'archived' => true,
        ]);
        return back()->with('success', 'Dispatcher #'.$id->id.' Archived successfully!');
    }

    public function unarchive($id)
    {
        $id = User::findOrFail($id);
        $id->dispatcherDetail()->update([
            'archived' => false,
        ]);
        return back()->with('success', 'Dispatcher #'.$id->id.' Restore successfully!');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Dispatcher #'.$user_id->id.' Update status successfully!');
    }

}
