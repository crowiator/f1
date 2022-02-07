<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin') ) {
            return view('races.index');
        }else{
            return view('races.indexUser');
        }


    }
    public function indexForUser()
    {
        return view('races.indexUser');
    }

    public function fetchrace()
    {
        $races = Race::orderBy('date','asc')->get();
        return response()->json([
            'races'=>$races,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacia
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:300',
            'place' => 'required|min:2|max:300',
            'circle' => 'required|min:2|max:300',
            'date' => 'required|after:today',
            'time' => 'required',
            'winner' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                //posielam chyby
                'errors' => $validator->messages(),
            ]);
        } else {
            //model
            $race = new Race;
            $race->name = $request->input('name');
            $race->place = $request->input('place');
            $race->circle = $request->input('circle');
            $race->date = $request->input('date');
            $race->time = $request->input('time');
            $race->winner = $request->input('winner');
            $race->save();
            return response()->json([
                'status' => 200,
                'message' => 'Race added succesfully',
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $race = Race::find($id);
        if($race){


            return response()->json([
                'status' => 200,
                'race' => $race,
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => 'Race not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validacia
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:300',
            'place' => 'required|min:2|max:300',
            'circle' => 'required|min:2|max:300',
            'date' => 'required|after:today',
            'time' => 'required',
            'winner' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            $race = Race::find($id);
            if($race){
                $race->name = $request->input('name');
                $race->place = $request->input('place');
                $race->circle = $request->input('circle');
                $race->date = $request->input('date');
                $race->time = $request->input('time');
                $race->winner = $request->input('winner');
                $race->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Race updated succesfully',
                ]);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Race not found',
                ]);
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $race = Race::find($id);
        $race->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Race was deleted',
        ]);
    }
}
