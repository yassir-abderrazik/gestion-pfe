@extends('student.layout')
@section("content")

@if(DB::table('forms')->select('id')->where('user_id', '=', Auth::user()->id)->exists() == null)

<div class="jumbotron" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center"><strong>University Abdelmalek Essaadi : The End-of-Studey Project</strong></h1>
            </div>
        </div>
        <hr><br><br><br>
        <div class="row text-center">
            <div class="col">
                <h2 class=" font-weight-bold">welcome {{ Auth::user()->name }}</h2><br>
            </div>
        </div>
        <div class="row ">
            <div class="col" style="margin: 0px 100px;">
                <p class="h4 text-justify">
                    Purpose of Final Year Project
                    The purpose of the project is, in the context of the degree you are studying, to integrate various
                    aspects
                    of the taught material and to demonstrate your (academic) research skills and your (professional)
                    analysis,
                    design and implementation skills.</p>
            </div>
        </div>
    </div>
</div>

@else
{{-- Answer --}}
@if(DB::table('defenses')->select('id')->where('id_Etudiant', '=', Auth::user()->id)->exists() == null)
@if( DB::table('rdefenses')->where('id_Etudiant', '=', Auth::user()->id)->exists() == null )
<h1>pas encore traiter</h1>
@else
<h1>{{ $rdefenses->message  }}</h1>

@endif
@else
<h1 class="h1 text-center">informations</h1><br><br>
<div style="overflow-x:auto;">

    <table class="table font-weight-bold">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Project</th>
                <th scope="col">E-mail Supervisor</th>
                <th scope="col">Date Defense</th>
                <th scope="col">Request</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $form->email }}</td>
                <td>{{ $defenses->supervisor_email }}</td>
                <td>{{ $defenses->dateDefense }}</td>
                <td>Accepted</td>
            </tr>
        </tbody>
    </table>
</div>
<br>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
    </tbody>
</table>

@endif


@endif

@endsection