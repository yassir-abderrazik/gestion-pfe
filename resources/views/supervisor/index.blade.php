@extends('supervisor.layout')
@section("content")

@if(DB::table('supervisors')->select('id')->where('user_id', '=', Auth::user()->id)->exists() == null)

<h2 class=" font-weight-bold">welcome {{ Auth::user()->name }}</h2><br>
<p class="h3">cette platform vous permez de cette platform vous permez de cette platform vous permez de cette platform
    vous permez de
    cette platform vous permez decette platform vous permez decette platform vous permez de
    cette platform vous permez de cette platform vous permez decette platform vous permez de</p>
<a class="btn btn-lg btn-primary " href="{{ route('supervisor.create')}} ">complete your information</a>
@else
<h2 class="text-justify text-center font-weight-bold">Welcome {{ Auth::user()->name }}</h2><br>
<div class="container">
    <div class="row  text-justify text-center">
        <div class="col-md-4">
            <div class="jumbotron ">
                <h2 class="text-primary"><strong>All Request Defenses</strong></h2><br>
                <p class="h4">In this section you can see all defenses </p>
            <a href="{{ route('defense.index')}}" alt="All" class="btn btn-lg btn-warning">Click Here</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2 class="text-primary"><strong>Accepted Defenses</strong></h2><br>
                <p class="h4">In this section you can see New Defenses </p>
                <a href="{{ route('allAccepted') }}" alt="New" class="btn btn-lg btn-warning">Click Here</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2 class="text-primary"><strong>ٌRefused Request</strong></h2><br>
                <p class="h4">In this section you can see New Defenses </p>
                <a href="{{ route('showRefusedDefences') }}" alt="New" class="btn btn-lg btn-warning">Click Here</a>
            </div>
        </div>
    </div>
</div>
@endif

@endsection