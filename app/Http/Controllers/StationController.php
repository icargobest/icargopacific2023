<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationController extends Controller
{

    private $station;

    function __construct()
    {
        $this->station = new Station;
    }

    public function index()
    {
        $user = Auth::user();
    
        if ($user->type == 'staff') {
            $company_id = $user->staff->company_id;
            $stations = $this->station->where('company_id', $company_id)->get();

            return view('staff_panel.stations.index', compact('stations'));
        } else {
            $company_id = $user->company->id;
            $stations = $this->station->where('company_id', $company_id)->get();

            return view('company.stations.index', compact('stations'));
        }
    }
    
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'station_contact_no' => ['required', 'min:11', 'max:11'],
            'station_contact_no.min' => 'Contact nuber must be a min and max of 11 numbers',
            'station_contact_no.max' => 'Contact nuber must be a min and max of 11 numbers',
        ]);
        
        if(Auth::user()->type == 'staff'){
            $user = Auth::user();
            $company_id = $user->staff->company_id;    
        }
        else{
            $user = Auth::user();
            $company_id = $user->company->id;    
        }

        $station = Station::create([
            'user_id' => Auth::id(),
            'company_id' => $company_id,
            'station_number' => $request->station_number,
            'station_name' => $request->station_name,
            'station_address' => $request->station_address,
            'station_contact_no' => $validated['station_contact_no'],
            'station_email' => $request->station_email,
        ]);
            return back()->with('success', 'Station data created successfully!');
    }

    public function show($id){
        $station=$this->station->getStation($id);
        return view('company.stations.view',compact('station'));
    }

    public function edit($id){
        $station=$this->station->getStation($id);
        return view('company.stations.edit',compact('station'));
    }

    function update(Request $request , $id){
        $data = [
            'station_number' => $request->update_station_number,
            'station_name' => $request->update_station_name,
            'station_address' => $request->update_station_address,
            'station_contact_no' => $request->update_station_contact_no,
            'station_email' => $request->update_station_email,
        ];
       
        $this->station->updateStation($data, $id);
        return back()->with('success', 'Station '.$data['station_number'].' data updated successfully!');
    }

    public function viewArchive()
    {
        $user = Auth::user();
    
        if ($user->type == 'staff') {
            $company_id = $user->staff->company_id;
            $stations = $this->station->where('company_id', $company_id)->get();

            return view('staff_panel.stations.view_archive', compact('stations'));
        } else {
            $company_id = $user->company->id;
            $stations = $this->station->where('company_id', $company_id)->get();

            return view('company.stations.view_archive', compact('stations'));
        }
    }

    public function archive($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => true,
        ]);

        return back()->with('success', 'Station #'.$id.' data archived successfully.');
    }

    public function archiveStaff($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => true,
        ]);

        return back()->with('success', 'Station #'.$id.' data archived successfully.');
    }

    public function unarchive($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => false,
        ]);

        return back()->with('success', 'Station #'.$id.' data restored successfully.');
    }
    
    public function unarchiveStaff($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => false,
        ]);

        return back()->with('success', 'Station #'.$id.' data restored successfully.');
    }
}
