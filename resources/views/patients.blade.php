@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" class="page">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Manage Patient</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">   

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
</head>

<body>
    <div class="container" style="margin-top: 50px;">

        <h3 class="text-center">Manage Patient </h3><br>
    
        <h4> Patient List</h4>
        <h6>Total patient: {{ $patient->size() }}</h6>
        <table class="table table-bordered">
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th width="180" class="text-center">Action</th>
            </tr>
            @foreach($patient as $list)
            @if ($list)
                
            @endif
            <tr>
                <td>{{$list->id() }}</td>
                <td>{{$list->data()['name']}}</td>
                <td>{{$list->data()['email']}}</td>
                <td>{{$list->data()['phoneno']}}</td>
                <td> <button id="ViewPatient" type="button"  class="btn btn-primary mb-2">View</button>
                    <button id="UpdatePatient" type="button"  class="btn btn-primary mb-2">Update</button></td>
            </tr>
            @endforeach
            <tbody id="tbody">
    
            </tbody>
        </table>
    </div>

</body>
</html>
@endsection

