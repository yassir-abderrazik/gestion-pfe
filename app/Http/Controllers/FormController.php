<?php

namespace App\Http\Controllers;

use App\Defense;
use App\Form;
use App\Supervisor;
use App\Http\Requests\StoreForm;
use App\Rdefense;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $form = DB::table('forms')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $form = Form::find($form);
         if( Defense::where('id_Etudiant', '=', Auth::user()->id)->exists() == null){
            if( Rdefense::where('id_Etudiant', '=', Auth::user()->id)->exists() == null ){
                return view('student.index',  [   'form' => $form ]);
            }else{
                $rdefenses = Rdefense::select('id')
                ->where('id_etudiant', '=', Auth::user()->id)
                ->value('id');
                 $rdefenses = Rdefense::findOrFail($rdefenses);
                return view('student.index',  [   'form' => $form, 'rdefenses' => $rdefenses ]);
            }
        } else {
            $defenses = Defense::select('id')
            ->where('id_etudiant', '=', Auth::user()->id)
            ->value('id');
             $defenses = defense::findOrFail($defenses);
            return view('student.index',  [ 'form' => $form, 'defenses' => $defenses ]);
                  }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $supervisor = Supervisor::get('name');
        return view('student.create',  [ 'supervisor' => $supervisor ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm $request)
    {

       $form = new Form();
       $form->user_id =  Auth::user()->id;
       $form->firstname = $request->input('firstname');
       $form->lastname = $request->input('lastname');
       $form->CIN = $request->input('CIN');
       $form->CNE = $request->input('CNE');
       $form->birthday = $request->input('birthday');
       $form->city = $request->input('city');
       $form->email = $request->input('email');
       $form->phone = $request->input('phone');
       $form->address = $request->input('address');
       $form->faculty = $request->input('faculty');
       $form->specialty = $request->input('specialty');
       $form->supervisor = $request->input('supervisor');
       $form->project = $request->input('project');
       $form->summary = $request->input('summary');
       $form->save();
        return redirect()->route('form.index');
    }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::find($id);
        $this->authorize('update', $form);

        return view('student.show', [
        'form' => $form  ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = Supervisor::select('name')->get();
        $form = Form::findOrFail($id);
        $this->authorize('update', $form);
        return view('student.edit', [
            'form' => $form,
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
    public function update(StoreForm $request, $id)
    {
        $form = Form::findOrFail($id);
        $form->firstname = $request->input('firstname');
        $form->lastname = $request->input('lastname');
        $form->CIN = $request->input('CIN');
        $form->CNE = $request->input('CNE');
        $form->birthday = $request->input('birthday');
        $form->city = $request->input('city');
        $form->email = $request->input('email');
        $form->phone = $request->input('phone');
        $form->address = $request->input('address');
        $form->faculty = $request->input('faculty');
        $form->specialty = $request->input('specialty');
        $form->supervisor = $request->input('supervisor');
        $form->project = $request->input('project');
        $form->summary = $request->input('summary');
        $form->save();

        return redirect()->route('form.index')->with('success', 'Form was updated');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::findOrFail($id);
        $this->authorize('delete', $form);
        $form->delete();
        return redirect()->route('form.index')->with('success', 'Form was deleted');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $form = DB::table('forms')
            ->select('*')
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        $pdf = PDF::loadView('student.downloadPDF', ['form' => $form ]);
        return $pdf->download('form.pdf');
    }
}
