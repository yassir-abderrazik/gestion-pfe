@extends('supervisor.layout')
@section("content")
<h1 class=" text-center Lobster">Refused Request</h1>
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
                </div>
                {{-- modal show --}}
                <div class="modal fade" id="shwoModal{{$defense->id_Etudiant}}" tabindex="-1" role="dialog"
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
                                            <td><strong>Email :</strong> </td>
                                            <td> {{ $defense->emailEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Project :</strong> </td>
                                            <td> {{ $defense->projectEtudiant}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>reason why :</strong> </td>
                                            <td> {{ $defense->message}}</td>
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

            </div>
        </div><br>
    
    @empty
    aucun demande
    @endforelse
</div>
</div>
<div class="h4 d-flex justify-content-center">{{ $defenses->links() }}</div>
@endsection