<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('drivers.index',[
            // od najnovsieho podla casu vytvorenia
            'drivers' => Driver::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:2|',
            'team' => 'required|min:2',
            'state' => 'required|min:2',
            'points' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'public/image/drivers/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Driver::create($input);

        return redirect()->route('drivers.index')
            ->with('success','Driver created successfully.');
    }



    public function standings(){
        return view('drivers.standings',[
            // od najnovsieho podla casu vytvorenia
            'drivers' => Driver::orderBy('points','desc')->get()
        ]);
    }

}
