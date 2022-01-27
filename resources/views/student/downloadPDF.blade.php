<!DOCTYPE html>
<html>
@forelse($form as $data)

<head>
    <title>{{ $data->firstname}}-{{ $data->lastname}}</title>
    <style>
        table {

            border-collapse: collapse;
            width: 100%;
        }

        td {
            padding-left: 3rem;
            height: 3rem;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;

        }

        .sign {
            padding-left: 32rem;
        }

        .img {
            padding-left: 30rem;
        }
        footer{
            padding-top: 8rem;
        }
        .footer{
            padding-left: 30rem;
        }
    </style>
</head>

<body>

    <div>
        <img src="{{ asset('img/fs_logo.png') }}" alt="faculté">
        <img src="{{ asset('img/arssi.jpg') }}" alt="arssi" style="margin-left: 18rem;" height="90rem" weight="90rem">
    </div>
    <h1 style="margin-left: 18rem;">Form</h1><br><br>
    <table>
        <tr>
            <td><strong>Firstname : </strong>{{ $data->firstname}}</td>
            <td><strong>Lastname : </strong>{{ $data->lastname}}</td>
        </tr>
        <tr>
            <td><strong>CIN : </strong>{{ $data->CIN}}</td>
            <td><strong>CNE : </strong>{{ $data->CNE}}</td>
        </tr>
        <tr>
            <td><strong>Birthday : </strong>{{ $data->birthday}}</td>
            <td><strong>City : </strong>{{ $data->city}}</td>
        </tr>
        <tr>
            <td><strong>E-mail : </strong>{{ $data->email}}</td>
            <td><strong>Phone : </strong>{{ $data->phone}}</td>
        </tr>
        <tr>
            <td><strong>Address : </strong>{{ $data->address}}</td>
            <td><strong>Faculty : </strong>{{ $data->faculty}}</td>
        </tr>
        <tr>
            <td><strong>Supervisor : </strong>{{ $data->supervisor}}</td>
            <td><strong>lastname : </strong>{{ $data->lastname}}</td>
        </tr>
        <tr>
            <td><strong>Projct : </strong>{{ $data->project}}</td>
            <td></td>
        </tr>


    </table>
    <br><br>
    <div class="sign">
        <h3>Signature :</h3>
        <h2><strong>MR.YassirOx</strong></h2>
    </div>
    <div class="img">
        <img src="{{ asset('img/signature.png') }}" alt="sign" height="90rem" weight="90rem">
    </div>
    <footer>
        <hr>
        <div class="footer">
            <p>{{ date('Y-m-d H:i:s') }}</p>
        </div>
    </footer>
</body>
@empty
no form
@endforelse

</html>
