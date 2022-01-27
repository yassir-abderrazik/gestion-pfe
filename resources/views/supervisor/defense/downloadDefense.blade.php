
<!DOCTYPE html>
<html>

<head>
    <title>{{ $defenses->dateDefense}}</title>
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
        h1{
            text-align: center;
            border: 2px red;

        }
        .sign {
            padding-left: 32rem;
        }

        footer{
            padding-top: 13rem;
        }
        .left-date{
            text-align: right;
        }
    </style>
</head>

<body>

    <div>
        <img src="{{ asset('img/fs_logo.png') }}" alt="faculté">
        <img src="{{ asset('img/arssi.jpg') }}" alt="arssi" style="margin-left: 18rem;" height="90rem" weight="90rem">
    </div>
<h1>Defense {{  $defenses->id }}</h1><br><br>
    <table>
        <tr>
            <td><strong>Firstname : </strong>{{ $defenses->firstnameEtudiant}}</td>
            <td><strong>Lastname : </strong>{{ $defenses->lastnameEtudiant}}</td>
        </tr>

        <tr>
            <td><strong>E-mail : </strong>{{ $defenses->emailEtudiant }}</td>
            <td><strong>Phone : </strong>{{ $defenses->phoneEtudiant }}</td>
        </tr>
        <tr>
            <td><strong>Address : </strong>{{ $defenses->addressEtudiant }}</td>
            <td><strong>Faculty : </strong>{{ $defenses->facultyEtudiant }}</td>
        </tr>
        <tr>
            <td><strong>Projct : </strong>{{ $defenses->projectEtudiant }}</td>
            <td><strong>Summary : </strong>{{ $defenses->summaryEtudiant }}</td>
        </tr>
        <tr>
            <td><strong>President tName : </strong>{{ $defenses->presidentName }}</td>
            <td><strong>President University : </strong>{{ $defenses->presidentUniversity }}</td>
        </tr>
        <tr>
            <td><strong>Examiner Name : </strong>{{ $defenses->examinerName }}</td>
            <td><strong>Examiner University : </strong>{{ $defenses->examinerUniversity }}</td>
        </tr>
        <tr>
            <td><strong>Guest tName : </strong>{{ $defenses->guestName }}</td>
            <td><strong>Guest University : </strong>{{ $defenses->guestUniversity }}</td>
        </tr>
    </table>
        <h1 class="h1"><strong>Defense Date :</strong>{{ $defenses->dateDefense }}</h1>
    <br><br>
    <div class="sign">
        <h3>Signature :</h3>
    </div>
  
    <footer>
        <hr>
        <div class="footer">
            <p class="left-date">{{ date('Y-m-d H:i:s') }}</p>
        </div>
    </footer>
</body>
</html>
