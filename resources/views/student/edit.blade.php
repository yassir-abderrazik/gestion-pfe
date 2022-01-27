@extends('student.layout')
@section("content")
@guest
<h1>you are not authorized</h1>
@endguest
@auth
<form action="{{ route('form.update', ['form' => $form->id]) }}" method="Post">
    @CSRF
    @method('PUT')

    <div class="container">
        <legend>
            <center>
                <h1 class="text-primary"><strong>Update Form</strong></h1>
            </center>
        </legend><br>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstname" class="col-md-8 control-label">First Name :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="firstname" id="firstname"
                                value="{{ old('firstname', $form->firstname) }}" placeholder=" First Name"
                                class="form-control border border-primary" required>
                        </div>
                        @foreach($errors->get('firstname') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-8 control-label">Last Name :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="lastname" id="lastname"
                                value="{{ old('lastname', $form->lastname) }}" placeholder="Last Name"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('firstname') as $error)
                        <em>{{ $error }}</em>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="CIN" class="col-md-8 control-label">CIN :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="CIN" id="CIN" value="{{ old('CIN', $form->CIN) }}"
                                placeholder="Carte d'identité nationale" class="form-control" required>
                        </div>
                        @foreach($errors->get('CIN') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="CNE" class="col-md-8 control-label">CNE :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="CNE" id="CNE" value="{{ old('CNE', $form->CNE) }}"
                                placeholder="Code nationale étudiant" class="form-control" required>
                        </div>
                        @foreach($errors->get('CNE') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-md-8 control-label">Birthday :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="date" name="birthday" id="birthday"
                                value="{{ old('birthday', $form->birthday) }}" placeholder="birthday"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('birthday') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-8 control-label">City :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="city" id="city" value="{{ old('city', $form->city) }}"
                                placeholder="city" class="form-control" required>
                        </div>
                        @foreach($errors->get('city') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-8 control-label">Email :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="mail" name="email" id="email" value="{{ old('email', $form->email) }}"
                                placeholder="email" class="form-control" required>
                        </div>
                        @foreach($errors->get('email') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    <label for="phone" class="col-md-8 control-label">Phone :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $form->phone) }}"
                                placeholder="phone" class="form-control" required>
                        </div>
                        @foreach($errors->get('phone') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-md-8 control-label">Address :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="address" id="address" value="{{ old('address', $form->address) }}"
                                placeholder="address" class="form-control" required>
                        </div>
                        @foreach($errors->get('address') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="faculty" class="col-md-8 control-label">faculty :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="faculty" id="faculty" value="{{ old('faculty', $form->faculty) }}"
                                placeholder="faculty" class="form-control" required>
                        </div>
                        @foreach($errors->get('faculty') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="specialty" class="col-md-8 control-label">Specialty :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="specialty" id="specialty"
                                value="{{ old('specialty', $form->specialty) }}" placeholder="specialty"
                                class="form-control" required>
                        </div>
                        @foreach($errors->get('specialty') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="supervisor" class="col-md-8 control-label">Supervisor :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <select name="supervisor" id="supervisor" class="form-control" required>
                                @foreach($supervisor as $information)
                              <option value="{{ $information->name }}">{{ $information->name }}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project" class="col-md-8 control-label">Project :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="project" id="project" value="{{ old('project', $form->project) }}"
                                placeholder="project" class="form-control" required>
                        </div>
                        @foreach($errors->get('project') as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="summary" class="col-md-8 control-label">Summary :</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <input type="text" name="summary" id="summary" value="{{ old('summary', $form->summary) }}"
                                placeholder="summary" class="form-control" required>
                        </div>
                        @foreach($errors->get('summary') as $error)
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
                <button type="submit" class="btn btn-danger btn-lg">Update form</button>

            </div>
        </div>
    </div>
</form>
<form action="{{ route('form.destroy', ['form' => $form->id])}}" method="Post">
    @CSRF
    @method('DELETE')
    <button type="submit" class="btn btn-warning btn-lg">Delete form</button>
</form>

@endauth
@endsection
