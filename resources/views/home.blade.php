@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" class="page">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">   

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
</head>

<!--  -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> 
  <div class="w3-center">
  <h4>TOGETHER</h4>
  <h1 class="w3-xxxlarge w3-animate-bottom">WE CAN BEAT IT!</h1>
    <div class="w3-padding-32">
    <!-- <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">LEARN W3.CSS</button> -->
    <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="window.location.href='https://covidnow.moh.gov.my/'" style="font-weight:900;">GET LATEST COVID-19 INFO</button> 
    </div>
  </div>
</header>


<body>
    <!--  -->
    <div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Manage Patient Profile</h3><br>
  <a href="/patients"><img src="{{ URL::to('/img/profiles.jpg') }}" height="300px" width="300px"/></a> 
  <br>
  <p>Based on the list of quarantined patients</p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Monitor Patient Location</h3><br>
 <img src="{{ URL::to('/img/lokasi.jpg') }}" height="300px" width="300px"/>
  <p>Based on patient's device latest location</p>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Check Warning Alerts</h3><br>
  <img src="{{ URL::to('/img/alerts.jpg') }}" height="300px" width="250px"/> 
  <p>Based on patient's radius limit</p>
  </div>
</div>
</div>
    <!--  
<div class='header-container'> 
            <div class='header'>
            <img src="{{ URL::to('/img/cegah.jpg') }}" height="300px" width="450px" id="divOne"/>
            <img src="{{ URL::to('/img/kobid1.jpg') }}" height="300px" width="450px" id="divThree" />
            </div>
            </div>
     
<div class='integrate-container'>
    <div class='dash'>
        <button class="button"><span>Manage Patient Profile </span></button></a>
    </div>
    <div class='dash'>
        <button class="button"><span>Monitor Patient Location </span></button>
    </div>
    <div class='dash'>
        <button class="button"><span>Warning Notification </span></button>
    </div>
  </div>

 


  <div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Responsive</h3><br>
  <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <p>Built-in responsiveness</p>
  <p>Mobile first fluid grid</p>
  <p>Fits any screen sizes</p>
  <p>PC Tablet and Mobile</p>
  </div>
</div>

 -->

</body>
</html>
@endsection

