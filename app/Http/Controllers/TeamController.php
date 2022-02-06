<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index',[
                    // od najnovsieho podla casu vytvorenia
                    'teams' => Team::orderBy('points','desc')->get()
                ]);
    }










}
