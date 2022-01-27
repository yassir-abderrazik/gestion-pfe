@extends('student.layout')
@section("content")
<div class="container">
    <h1 class="text-center">Change Password</h1><br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent">
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><strong>Current
                                    Password</strong></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password"
                                    autocomplete="current-password">
                                @foreach($errors->get('current_password') as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><strong>New
                                    Password</strong></label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password"
                                    autocomplete="current-password">
                                @foreach($errors->get('new_password') as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><strong>New Confirm
                                    Password</strong></label>
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control"
                                    name="new_confirm_password" autocomplete="current-password">
                                @foreach($errors->get('new_confirm_password') as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection