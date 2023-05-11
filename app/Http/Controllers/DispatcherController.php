<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dispatcher;
use App\Models\Staff;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DispatcherController extends Controller
{
    private $dispatcher;

    function __construct()
    {
        $this->dispatcher = new Dispatcher;
    }

    public function index()
    {
        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $dispatchers = $this->dispatcher->with('user')->where('company_id', $user_id)->get();
        return view('company/dispatcher.index', compact('dispatchers'));
    }

    public function staffIndex()
    {
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $dispatchers = $this->dispatcher->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/dispatcher.index', compact('dispatchers'));
    }

    function viewArchive(){

        $id = Auth::id();
        $company = Company::where('user_id', $id)->first();
        $user_id = $company->id;
        $dispatchers = $this->dispatcher->with('user')->where('company_id', $user_id)->get();
        return view('company/dispatcher.viewArchive', compact('dispatchers'));
    }

    function staffviewArchive(){

        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        if ($staff) {
            $company_id = $staff->company_id;
            $dispatchers = $this->dispatcher->with('user')->where('company_id', $company_id)->get();
        }
        return view('staff_panel/dispatcher.viewArchive', compact('dispatchers'));
    }


    public function create()
    {
        return view('company/dispatcher.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => '4',
            ]);
    
            $otherValidation = $request->validate([
                'contact_no' => ['required', 'min:11', 'max:11'],
            ], [
                'contact_no.required' => 'Contact field is required.',
                'contact_no.max' => 'Contact number must be a min and max of 11 numbers'
            ]);
            
            if(Auth::user()->type == 'staff'){
                $id = Auth::id();
                $staff = Staff::where('user_id', $id)->first();
                $company_id = $staff->company_id;
                $company = Company::where('id', $company_id)->first();
                $user_id = $company->id;

            }else{
                $id = Auth::id();
                $company = Company::where('user_id', $id)->first();
                $user_id = $company->id;
            }
            $drivers = Dispatcher::create([
                'user_id' => $user->id,
                'company_id' => $user_id,
                'contact_no' =>  $otherValidation['contact_no'],
            ]);
          
            DB::commit();
          } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
                
          }

        return back()->with('success','Dispatcher has been created successfully.');
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
        $dispatcherData = [
            'contact_no' => $request->contact_no,
        ];

        $userData = [
            'name' => $request->input('name'),
        ];
        
        $dispatcher = Dispatcher::find($id);
        $dispatcher->update($dispatcherData);

        $user = $dispatcher->user;
        $user->update($userData);
        return back()->with('success', 'Dispatcher #'.$id.' data updated successfully!');
    }

    public function destroy($id){
        Dispatcher::destroy($id);
        return redirect()->route('dispatcher.index')->with('success','Dispatcher has been deleted successfully');
    }

    public function archive($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = True;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Archived successfully!');
    }

    public function unarchive($id)
    {
        $id = Dispatcher::findOrFail($id);
        $id->archived = False;
        $id->save();
        return back()->with('success', 'Dispatcher #'.$id->id.' Restore successfully!');
    }

    public function updateStatus($user_id, $status_code)
    {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            $user_id = User::findOrFail($user_id);
            return back()->with('success', 'Dispatcher status updated successfully!');
    }

}
