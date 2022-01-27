@extends('supervisor.layout')
@section("content")
<div class="jumbotron">
    <table class="table bg-white table-bordered ">
        <tbody>
            <tr>
                <th>Name :</th>
                <td>{{ $supervisor->name }}</td>
                <td class="text-center" rowspan="4">
                    <div style="margin-top: 50px"><a class="btn btn-lg btn-warning "
                            href="{{ route('supervisor.edit', ['supervisor' => $supervisor->id] ) }} ">Update</a>
                    </div>
                </td>

            </tr>
            <tr>
                <th>Department :</th>
                <td>{{ $supervisor->department }}</td>
            </tr>
            <tr>
                <th>University :</th>
                <td>{{ $supervisor->university }}</td>
            </tr>
            <tr>
                <th>E-mail :</th>
                <td>{{ $supervisor->email }}</td>
            </tr>


        </tbody>
    </table>


</div>
@endsection