@extends('tampilan/index')

@section('judul')
     <center><h2 class="h5 no-margin-bottom">Welcome</h2></center>
@endsection

@section('konten')
<br>
<div class="col-lg-12" class="form-inline">
<div class="card" >
<br>
<center>
<h5>Download User Manual</h5>
<a href="downloadUserManual"><button type="button" class="btn btn-primary">Download User Manual</button></a></center>
<br>
<center>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<br>
<a href="/" onclick="signOut();">Sign out</a>
     <div class="alert alert-secondary" style="width:400px" role="alert" id="hasil" name="hasil"></div> <br>
     <div class="alert alert-secondary" style="width:400px" role="alert" id="id" name="id"></div><br>
     <div class="alert alert-secondary" style="width:400px" role="alert" id="nama" name="nama"></div><br>
     <div id="img" name="img"></div><br>
     <div class="alert alert-secondary" style="width:400px" role="alert" id="email" name="email"></div><br>
</center>
<br>
</div>
</div>

<script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();

        var hasil = document.getElementById('hasil');
        hasil.innerHTML = "<h3> My Google Info </h3>";

        var id = document.getElementById('id');
        id.innerHTML = profile.getId();

        var nama = document.getElementById('nama');
        nama.innerHTML = profile.getName();
        
        var myImage = new Image(300, 300);
        myImage.src = profile.getImageUrl();
        x = document.getElementById("img");
        x.appendChild(myImage);

        var email = document.getElementById('email');
        email.innerHTML = profile.getEmail();

        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }

     function signOut() {
          var auth2 = gapi.auth2.getAuthInstance();
          auth2.signOut().then(function () {
               console.log('User signed out.');
          });

     }
    </script>

@endsection