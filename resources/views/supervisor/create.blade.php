@extends('supervisor.layout')
@section("content")

@auth
<form action="{{ route('supervisor.store')}}" method="POST">
    @CSRF
    <div class="container">
        <legend>
            <center>
                <h2><b>Complete information</b></h2>
            </center>
        </legend><br>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name" class="col-md-8 control-label">Name :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                placeholder="Name" class="form-control border border-primary" required>
                        </div>
                        @foreach($errors->get('name') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="university" class="col-md-8 control-label">University :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="university" id="university" value="{{ old('university') }}"
                                placeholder="University" class="form-control" required>
                        </div>
                        @foreach($errors->get('university') as $error)
                        <em>{{ $error }}</em>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-md-8 control-label">department :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="department" id="department" value="{{ old('department') }}"
                                placeholder="Department" class="form-control" required>
                        </div>
                        @foreach($errors->get('department') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-8 control-label">E-mail :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="mail" name="email" id="email" value="{{ old('email') }}"
                                placeholder="E-mail" class="form-control" required>
                        </div>
                        @foreach($errors->get('email') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">add form</button>
                <button type="reset" class="btn btn-info">reset</button>
            </div>
        </div>
    </div><br>
</form>
@endauth
@endsection