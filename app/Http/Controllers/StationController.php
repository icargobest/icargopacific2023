<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{

    private $station;

    function __construct()
    {
        $this->station = new Station;
    }
    
    public function index(){
        $stations = $this->station->getStation();
        return view('company.stations.index', compact('stations'));
    }

    public function store(Request $request){
        $data = [
            'station_number' => $request->station_number,
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
    
        try {
            $this->station->addStation($data);
            return back()->with('success', 'Station data created successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating station: '.$e->getMessage());
        }
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
        return back()->with('success', 'Station #'.$request->id.' data updated successfully!');
    }

    public function viewArchive(){
        $stations = $this->station->getStation();
        return view('company.stations.view_archive', compact('stations'));
    }

    public function archive($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => true,
        ]);

        return back()->with('success', 'Station '.$id.' data archived successfully.');
    }

    public function unarchive($id)
    {
        $station = Station::findOrFail($id);
        $station->update([
            'archived' => false,
        ]);

        return back()->with('success', 'Station #'.$id.' data restored successfully.');
    }
    
}
