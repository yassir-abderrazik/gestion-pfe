@extends('supervisor.layout')
@section("content")
<h1 class=" text-center Lobster">Accepted Defense</h1>
<div class="container-fluid ">
    <div class="row  text-justify text-center">
        @forelse($defenses as $defense)
        <div class="col-md-4">
            <div class="container ">
                <table class="table table-light table-striped ">
                    <tr>
                        <td><strong>Name :</strong></td>
                        <td>{{ $defense->firstnameEtudiant}} {{ $defense->lastnameEtudiant}}</td>
                    </tr>
                    <tr>
                        <td><strong>specialty :</strong></td>
                        <td> {{ $defense->specialtyEtudiant}}</td>
                    </tr>
                    <tr>
                        <td><strong>Project :</strong></td>
                        <td> {{ $defense->projectEtudiant}}</td>
                    </tr>
                    <tr>
                        <td><strong>E-mail :</strong></td>
                        <td> {{ $defense->emailEtudiant}}</td>
                    </tr>


                </table>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#shwoModal{{$defense->id_Etudiant}}">
                        show More
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#UpdateModal{{$defense->id_Etudiant}}">
                        Update Defense
                    </button>
                <a href="{{ route('supervisorDownloadPDF', $defense->id)}}" class="btn btn-success">
                        downoload Defense
                    </a>
                </div>
                {{-- modal show --}}
                <div class="modal fade" id="shwoModal{{$defense->id}}" tabindex="-1" role="dialog"
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
                                <table class="table table-striped table-dark">
                                    <tbody>
                                        <tr>
                                            <td><strong>First Name :</strong> </td>
                                            <td>{{ $defense->firstnameEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Name:</strong> </td>
                                            <td> {{ $defense->lastnameEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong> </td>
                                            <td> {{ $defense->phoneEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong> </td>
                                            <td> {{ $defense->emailEtudiant}}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Faculty :</strong> </td>
                                            <td> {{ $defense->facultyEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Specialty :</strong> </td>
                                            <td> {{ $defense->specialtyEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Project :</strong> </td>
                                            <td> {{ $defense->projectEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Summary:</strong> </td>
                                            <td> {{ $defense->summaryEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Presient Nanme :</strong> </td>
                                            <td> {{ $defense->presidentName}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Examiner Name:</strong> </td>
                                            <td> {{ $defense->examinerName}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Guest Name :</strong> </td>
                                            <td> {{ $defense->guestName}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>President University :</strong> </td>
                                            <td> {{ $defense->presidentUniversity}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Examiner University :</strong> </td>
                                            <td> {{ $defense->examinerUniversity}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Guest University :</strong> </td>
                                            <td> {{ $defense->guestUniversity}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date Defense :</strong> </td>
                                            <td> {{ $defense->dateDefense}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End modal show --}}
                {{-- modal create  --}}
                <div class="modal fade" id="UpdateModal{{$defense->id_Etudiant}}" role="dialog"
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
                            {{-- modal update --}}
                            <div class="modal-body text-justify">
                                <form action="{{ route('defense.update',  [ 'defense' => $defense->id ] ) }}"
                                    method="Post">
                                    @CSRF
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="presidentName">Defense President :</label>
                                        <input type="text" class="form-control" id="presidentName" name="presidentName"
                                            placeholder="Defense President"
                                            value="{{ old('presidentName', $defense->presidentName) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="presidentUniversity">President University :</label>
                                        <input type="text" class="form-control" id="presidentUniversity"
                                            name="presidentUniversity" placeholder="President University"
                                            value="{{ old('presidentUniversity', $defense->presidentUniversity) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="examinerName">Defense Examiner :</label>
                                        <input type="text" class="form-control" id="examinerName" name="examinerName"
                                            placeholder="Defense Examiner "
                                            value="{{ old('examinerName', $defense->examinerName) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="examinerUniversity">Examiner University :</label>
                                        <input type="text" class="form-control" id="examinerUniversity"
                                            name="examinerUniversity" placeholder="Examiner University"
                                            value="{{ old('examinerUniversity', $defense->examinerUniversity) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="guestName">Defense Guest :</label>
                                        <input type="text" class="form-control" id="guestName" name="guestName"
                                            placeholder="Defense Guest"
                                            value="{{ old('guestName', $defense->guestName) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="guestUniversity">Guest University :</label>
                                        <input type="text" class="form-control" id="guestUniversity"
                                            name="guestUniversity" placeholder="Guest University"
                                            value="{{ old('guestUniversity', $defense->guestUniversity) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dateDefense">Date defense :</label>
                                        <input type="date" class="form-control" id="dateDefense" name="dateDefense"
                                            placeholder="Date defense"
                                            value="{{ old('dateDefense', $defense->dateDefense) }}">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block">Save
                                        changes</button>
                                </form>
                            </div>
                            {{-- End  modal update --}}
                        </div>
                    </div>
                </div>

            </div><br>
        </div>
        @empty
        aucun demande
        @endforelse
    </div>
</div>
<div class="h4 d-flex justify-content-center">{{ $defenses->links() }}</div>
@endsection
