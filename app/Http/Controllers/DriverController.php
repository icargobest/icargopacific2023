<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

use App\Drivers;

class DriverController extends Controller
{
    
    public function index(Driver $drivers)
    {
        $drivers = Driver::orderBy('id','asc')->paginate(100);
        return view('drivers.index', compact('drivers'));
    }

    function viewArchive(Driver $drivers){

        $drivers = Driver::orderBy('id','asc')->paginate(100);
        return view('drivers.viewArchive', compact('drivers'));
    }


    public function create()
    {
        return view('drivers.create');
    }

    function __construct()
    {
        $this->driver = new Driver;
    }

    public function store(Request $request)
    {
        $data = [
            'driver_name' => $request->driver_name,
            'vehicle_type' => $request->vehicle_type,
            'plate_no' => $request->plate_no,
        ];
        
        $this->driver->store($data);
        return redirect()->route('drivers.index')->with('success','Driver has been created successfully.');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit',compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'driver_name' => 'required',
            'vehicle_type' => 'required',
            'plate_no' => 'required',
        ]);
        
        $driver->fill($request->post())->save();
        return redirect()->route('drivers.index')->with('success','Driver Has Been updated successfully');
    }

    public function destroy($id){
        Driver::destroy($id);
        return redirect()->route('drivers.index')->with('success','Driver has been deleted successfully');
    }

    public function archive($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = 1;
        $id->save();

        return redirect()->route('drivers.index')->with('success', 'Driver data archived successfully.');
    }

    public function unarchive($id)
    {
        $id = Driver::findOrFail($id);
        $id->archived = 0;
        $id->save();

        return redirect()->route('drivers.viewArchive')->with('success', 'Driver data restore successfully.');
    }

}
