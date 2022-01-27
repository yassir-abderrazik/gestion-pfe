<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use App\Form;
use App\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $form = DB::table('forms')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $form = Form::find($form);
        return view('student.changePassword',  [ 'form' => $form ]);

    } 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function supervisor()
    {
        $supervisor = DB::table('supervisors')
        ->select('*')
        ->where('user_id', '=', Auth::user()->id)
        ->value('id');
        $supervisor = Supervisor::find($supervisor);
        return view('supervisor.changePassword',  [ 'supervisor' => $supervisor ]);

    } 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->route('home');
    }
   

}

