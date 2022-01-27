<?php

namespace App\Http\Controllers;

use App\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('supervisor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $supervisor = DB::table('supervisors')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $supervisor = Supervisor::find($supervisor);
        return view('supervisor.index', [ 'supervisor' => $supervisor ]);
    }
    // public function layout()
    // { 
    //     $supervisor = DB::table('supervisors')
    //     ->select('*')
    //     ->where('user_id', '=', Auth::user()->id)
    //     ->value('id');
    //     $supervisor = Supervisor::find($supervisor);
    //     return view('supervisor.layout', [ 'supervisor' => $supervisor ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $supervisor = new Supervisor();
       $supervisor->user_id =  Auth::user()->id;
       $supervisor->name = $request->input('name');
       $supervisor->university = $request->input('university');
       $supervisor->department = $request->input('department');
       $supervisor->email = $request->input('email');
       $supervisor->save();
        return redirect()->route('supervisor.index')->with('success', 'successefly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor = Supervisor::find($id);
        return view('supervisor.show', [
        'supervisor' => $supervisor  ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        return view('supervisor.edit', [
            'supervisor' => $supervisor
        ]); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $supervisor = Supervisor::findOrFail($id);
       $supervisor->user_id =  Auth::user()->id;
       $supervisor->name = $request->input('name');
       $supervisor->university = $request->input('university');
       $supervisor->department = $request->input('department');
       $supervisor->email = $request->input('email');
       $supervisor->save();
        return redirect()->route('supervisor.index')->with('success', 'successefly');
    }

 
}
