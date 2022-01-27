<?php

namespace App\Http\Controllers;

use App\Defense;
use App\Form;
use App\Rdefense;
use App\Supervisor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //supervisor id 
        $supervisor = DB::table('supervisors')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $supervisor = Supervisor::find($supervisor);
        //all forms
        $form = Form::where('supervisor', '=', Supervisor::select('name')->where('user_id', '=',  Auth::user()->id)
        ->value('name') )->get();
         
        return view('supervisor.defense.index',  [ 'form' => $form, 'supervisor' => $supervisor ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
    //     'firstnameEtudiant', 'lastnameEtudiant', 
    // 'emailEtudiant', 'phoneEtudiant', 'facultyEtudiant', 'specialtyEtudiant', 'projectEtudiant', 
    // 'summaryEtudiant', 'supervisor_email', 'presidentName', 'examinerName', 
    // 'guestName', 'presidentUniversity', 'examinerUniversity', 'guestUniversity', 'dateDefense'
       
        $id_Etudiant = $request->input('id_Etudiant');
        $Etudiant = Form::find($id_Etudiant);
        $Defense= New Defense();
        $Defense->id_Etudiant = $Etudiant->id;
        $Defense->id_Supervisor =  Auth::user()->id;
        $Defense->firstnameEtudiant = $Etudiant->firstname;
        $Defense->lastnameEtudiant = $Etudiant->lastname;
        $Defense->emailEtudiant = $Etudiant->email;
        $Defense->phoneEtudiant = $Etudiant->phone;
        $Defense->facultyEtudiant = $Etudiant->id;
        $Defense->specialtyEtudiant = $Etudiant->id;
        $Defense->projectEtudiant = $Etudiant->id;
        $Defense->summaryEtudiant = $Etudiant->id;
        $supervisor = Supervisor::select('email')->where('user_id', '=', Auth::user()->id)->value('email');
        $Defense->supervisor_email = $supervisor;
        $Defense->presidentName = $request->input('presidentName');
        $Defense->examinerName = $request->input('examinerName');
        $Defense->guestName = $request->input('guestName');
        $Defense->presidentUniversity = $request->input('presidentUniversity');
        $Defense->examinerUniversity = $request->input('examinerUniversity');
        $Defense->guestUniversity = $request->input('guestUniversity');
        $Defense->dateDefense = $request->input('dateDefense');
        $Defense->save();
        return redirect()->route('defense.index')->with('success', 'defense was created');
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function showAcceptedDefences()
    {  
        $supervisor = DB::table('supervisors')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $supervisor = Supervisor::find($supervisor);
        $defenses = Defense::where('id_supervisor', '=', Auth::user()->id)->paginate(10);
        return view('supervisor.defense.showAllAccepted', [
            'defenses' => $defenses, 
            'supervisor' => $supervisor,    
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
        $Defense = Defense::findOrFail($id);
        $Defense->presidentName = $request->input('presidentName');
        $Defense->examinerName = $request->input('examinerName');
        $Defense->guestName = $request->input('guestName');
        $Defense->presidentUniversity = $request->input('presidentUniversity');
        $Defense->examinerUniversity = $request->input('examinerUniversity');
        $Defense->guestUniversity = $request->input('guestUniversity');
        $Defense->dateDefense = $request->input('dateDefense');
        $Defense->save();
        return redirect()->route('allAccepted')->with('success', 'defense was updated');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRefusedDefense(Request $request)
    {   
    //     'firstnameEtudiant', 'lastnameEtudiant', 
    // 'emailEtudiant', 'phoneEtudiant', 'facultyEtudiant', 'specialtyEtudiant', 'projectEtudiant', 
    // 'summaryEtudiant', 'supervisor_email', 'presidentName', 'examinerName', 
    // 'guestName', 'presidentUniversity', 'examinerUniversity', 'guestUniversity', 'dateDefense'
       
        $id_Etudiant = $request->input('id_Etudiant');
        $Etudiant = Form::find($id_Etudiant);
        $Refused_Defense= New Rdefense();
        $Refused_Defense->id_Etudiant = $Etudiant->id;
        $Refused_Defense->id_Supervisor =  Auth::user()->id;
        $Refused_Defense->firstnameEtudiant = $Etudiant->firstname;
        $Refused_Defense->lastnameEtudiant = $Etudiant->lastname;
        $Refused_Defense->emailEtudiant = $Etudiant->email;
        $Refused_Defense->projectEtudiant = $Etudiant->id;
      
        $supervisor = Supervisor::select('email')->where('user_id', '=', Auth::user()->id)->value('email');
        $Refused_Defense->supervisor_email = $supervisor;
       
        $Refused_Defense->message = $request->input('message');
        $Refused_Defense->save();
        return redirect()->route('defense.index')->with('success', 'successful operqtion');
    }
 /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function showRefusedDefences()
    {  
        $supervisor = DB::table('supervisors')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $supervisor = Supervisor::find($supervisor);

        $defenses = Rdefense::where('id_supervisor', '=', Auth::user()->id)->paginate(10);
        return view('supervisor.defense.showAllRefused', [
            'defenses' => $defenses, 
            'supervisor' => $supervisor,    
        ]);
    }

    /**
     * Display a listing of the resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {   
        $defenses = Defense::findOrFail($id);
        
        $pdfDefense = PDF::loadView('supervisor.defense.downloadDefense', ['defenses' => $defenses ]);
        return $pdfDefense->download('defense.pdf');
    }
}
