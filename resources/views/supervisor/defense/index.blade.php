@extends('supervisor.layout')
@section("content")
<h1 class="text-center Lobster">Request for Defense</h1>
<div class="container-fluid ">
    <div class="row  text-justify text-center">
        @forelse($form as $student)
        @if(DB::table('defenses')->select('id_Etudiant')->where('id_Etudiant', '=',
        $student->id)->exists() == null and  !DB::table('rdefenses')->select('id_Etudiant')->where('id_Etudiant', '=',
        $student->id)->exists() )
        <div class="col-md-4">
            <div class="jumbotron ">
                <p class="h4"><strong>Name :</strong> {{ $student->firstname}} {{ $student->lastname}}</p>
                <p class="h4"><strong>specialty :</strong> {{ $student->specialty}}</p>
                <p class="h4"><strong>Project :</strong> {{ $student->project}}</p>
                <p class="h4"><strong>Project :</strong> {{ $student->id }}</p><br>
                <div class="d-flex justify-content-center">
                    <div class="p-2">
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#shwoModal{{$student->id}}">
                            Show more
                        </button>
                        {{-- modal show --}}
                        <div class="modal fade" id="shwoModal{{$student->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="shwoModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title  text-primary" id="exampleModalLabel">Informations</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-dark">
                                            <tbody>
                                                <tr>
                                                    <td><strong>First Name :</strong> </td>
                                                    <td>{{ $student->firstname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Last Name:</strong> </td>
                                                    <td> {{ $student->lastname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CNE :</strong> </td>
                                                    <td> {{ $student->CNE}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City :</strong> </td>
                                                    <td> {{ $student->city}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone :</strong> </td>
                                                    <td> {{ $student->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email :</strong> </td>
                                                    <td> {{ $student->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone :</strong> </td>
                                                    <td> {{ $student->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Faculty :</strong> </td>
                                                    <td> {{ $student->faculty}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Specialty :</strong> </td>
                                                    <td> {{ $student->specialty}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Project :</strong> </td>
                                                    <td> {{ $student->project}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Summary:</strong> </td>
                                                    <td> {{ $student->summary}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End modal show --}}
                    </div>
                    <div class="p-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#createModal{{$student->id}}">
                            Create Defense
                        </button>
                        {{-- modal create  --}}
                        <div class="modal fade" id="createModal{{$student->id}}" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Informations</strong>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <form action="{{ route('defense.store') }}" method="Post">
                                            @CSRF
                                            <div class="form-group">
                                                <label for="id_Etudiant">Id Etudiant :</label>
                                                <input type="text" class="form-control" id="id_Etudiant"
                                                    name="id_Etudiant" placeholder="{{ $student->id }}"
                                                    value="{{ $student->id }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="presidentName">Defense President :</label>
                                                <input type="text" class="form-control" id="presidentName"
                                                    name="presidentName" placeholder="Defense President"
                                                    value="{{ old('presidentName') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="presidentUniversity">President University :</label>
                                                <input type="text" class="form-control" id="presidentUniversity"
                                                    name="presidentUniversity" placeholder="President University"
                                                    value="{{ old('presidentUniversity') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="examinerName">Defense Examiner :</label>
                                                <input type="text" class="form-control" id="examinerName"
                                                    name="examinerName" placeholder="Defense Examiner "
                                                    value="{{ old('examinerName') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="examinerUniversity">Examiner University :</label>
                                                <input type="text" class="form-control" id="examinerUniversity"
                                                    name="examinerUniversity" placeholder="Examiner University"
                                                    value="{{ old('examinerUniversity') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="guestName">Defense Guest :</label>
                                                <input type="text" class="form-control" id="guestName" name="guestName"
                                                    placeholder="Defense Guest" value="{{ old('guestName') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="guestUniversity">Guest University :</label>
                                                <input type="text" class="form-control" id="guestUniversity"
                                                    name="guestUniversity" placeholder="Guest University"
                                                    value="{{ old('guestUniversity') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="dateDefense">Date defense :</label>
                                                <input type="date" class="form-control" id="dateDefense"
                                                    name="dateDefense" placeholder="Date defense"
                                                    value="{{ old('dateDefense') }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end Modal creat  --}}
                    </div>
                    <div class="p-2">
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#refuseModal{{$student->id}}">
                            Refuse Defense
                        </button>
                        {{-- modal refused  --}}
                        <div class="modal fade" id="refuseModal{{$student->id}}" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Informations</strong>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <form action="{{ route('storeRefusedDefense') }}" method="Post">
                                            @CSRF
                                            <div class="form-group">
                                                <label for="id_Etudiant">Id Etudiant :</label>
                                                <input type="text" class="form-control" id="id_Etudiant"
                                                    name="id_Etudiant" placeholder="{{ $student->id }}"
                                                    value="{{ $student->id }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message" class="col-form-label">Message:</label>
                                                <textarea class="form-control" id="message"
                                                    rows="3" name="message"
                                                    placeholder="Message" value="{{ old('message') }}"></textarea>

                                               
                                                <small>why resuest is refused</small>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end Modal refused  --}}
                    </div>
                </div>
                <div class="text-right text-dark font-weight-bold">
                    <em class="">{{ $student->email}}</em>
                </div>
            </div>
        </div>
        @endif
        @empty
        aucun demande
        @endforelse
    </div>
</div>
{{-- <div class="h4 d-flex justify-content-center">{{ $form->links() }}</div> --}}
@endsection

{{-- @if(DB::table('defenses')->select('id_Etudiant')->where('id_Etudiant', '=',
$student->id)->exists() == null ) --}}