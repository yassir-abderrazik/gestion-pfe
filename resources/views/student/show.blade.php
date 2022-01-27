@extends('student.layout')
@section("content")
@guest
<h1>not authorized</h1>
@endguest
@auth
    <div class="text-center antron"><br>
      <h1 class="text-primary  text-center">Informations</h1><br><br>
      <img src="{{ asset('img/user-information-logo.png') }}" alt="" class="img-fluid" width="200" height="200">
    </div>

    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>First name :</strong> {{ $form->firstname }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Last name :</strong> {{ $form->lastname }}</p><br>
      </div>
    </div>

    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>CIN :</strong> {{ $form->CIN }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>CNE :</strong> {{ $form->CNE }}</p><br>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Birthday :</strong> {{ $form->birthday }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>City :</strong> {{ $form->city }}</p><br>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>E-mail :</strong> {{ $form->email }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Phone :</strong> {{ $form->phone }}</p><br>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Address :</strong> {{ $form->address }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Faculty :</strong> {{ $form->faculty }}</p><br>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Specialty :</strong> {{ $form->faculty }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Supervisor :</strong> {{ $form->supervisor }}</p><br>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Project :</strong> {{ $form->project }}</p><br>
      </div>
      <div class="col-12 col-md-4">
        <p class="h4"><strong>Summary :</strong> {{ $form->summary }}</p><br>
      </div>
    </div>



@endauth
@endsection