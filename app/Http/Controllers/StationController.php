<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{

    function __construct()
    {
        $this->station = new Station;
    }
    
    public function index(){
        $stations = $this->station->getStation();
        $data = Station::all();

        return view('company.stations.index', compact('stations'));
    }

    public function addStation(Request $request){
        $data = [
            'station_id' => $request->station_id,
            'station_name' => $request->station_name,
            'station_address' => $request->station_address,
            'station_contact_no' => $request->station_contact_no,
            'station_email' => $request->station_email,
        ];
    
        $validatedData = $request->validate([
            'station_email' => 'required|email|unique:stations,station_email',
        ], [
            'station_email.unique' => 'The email address is already in use.',
        ]);
    
        $this->station->addStation($data);
        return back()->with('success', 'Station data created successfully!');
    }

    function viewStation($station_id){
        $station=$this->station->getEmployeeId($station_id);
        return view('company.stations.view',compact('station'));
    }

    public function archive($station_id)
    {
        $station = Station::findOrFail($station_id);
        $station->update([
            'is_archive' => true,
        ]);

        return back()->with('success', 'Station '.$station_id.' data archived successfully.');
    }

    public function unarchive($station_id)
    {
        $station = Station::findOrFail($station_id);
        $station->archived = 0;
        $station->save();

        return back()->with('success', 'Station #'.$station_id.' data restored successfully.');
    }
    
}
