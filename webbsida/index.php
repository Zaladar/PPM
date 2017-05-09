<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://apis.google.com/js/platform.js" async defer></script>

  <script>

    window.onLoad = initialize;

    function initialize(){
      //document.getElementById('onClickShowHide').addEventListener("click", showhide);
      //showhide();

      var auth2 = gapi.auth2.getAuthInstance();
      console.log(auth2);
      if(typeof auth2 != "undefined"){
        var loginField = document.getElementById('loginField');
        loginField.style.display = 'none';

        var updateDisplay = document.getElementById('textFieldUpdate');
        updateDisplay.style.display = 'block';
      }
      else{
        var updateDisplay = document.getElementById('textFieldUpdate');
        updateDisplay.style.display = 'none';

        var loginField = document.getElementById('loginField');
        loginField.style.display = 'block';
      }
    }

    function onSignIn(googleUser) {
      var profile = googleUser.getBasicProfile();
      //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Welcome: ' + profile.getName());

      var loginField = document.getElementById('loginField');
      loginField.style.display = 'none';

      var updateDisplay = document.getElementById('textFieldUpdate');
      updateDisplay.style.display = 'block';
      //console.log(updateDisplay);

      var profile = googleUser.getBasicProfile();
      //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      //console.log('Image URL: ' + profile.getImageUrl());
      //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    }

    /*function showhide(){
        if(typeof googleUser != "undefined") {

          var loginField = document.getElementById('loginField');
          loginField.style.display = 'none';

          var updateDisplay = document.getElementById('textFieldUpdate');
          updateDisplay.style.display = 'block';
          //console.log(updateDisplay);

          var profile = googleUser.getBasicProfile();
          //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
          console.log('Name: ' + profile.getName());
          console.log('Image URL: ' + profile.getImageUrl());
          console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      }
      else{
        var updateDisplay = document.getElementById('textFieldUpdate');
        updateDisplay.style.display = 'none';

        var loginField = document.getElementById('loginField');
        loginField.style.display = 'block';

        console.log('user not logged in');
      }
    }*/
  </script>

  <script>
    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        var updateDisplay = document.getElementById('textFieldUpdate');
        updateDisplay.style.display = 'none';

        var loginField = document.getElementById('loginField');
        loginField.style.display = 'block';

        console.log('user not logged in');
        console.log('User signed out.');
      });
    }
  </script>

  <meta charset="UTF-8" name="google-signin-client_id" content="148439629032-jvg0al3iou9vsoeumnlkj6ufujtfv5kl.apps.googleusercontent.com">
  <!--<link rel="icon" type="image/icon" href="Pictures/favico.ico" />-->
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <title>Superdisplay</title>
  <style>
  </style>
</head>
  <body>
    <div id="mainHeader">
      <h1 id="headerText">Superdisplay beta 1.0.1</h1>
      <!--<div id="headerImage">
        <a href="index.html"><img src="Pictures/headertest2.png" alt="Header picture"></a>
      </div>-->
    </div>
    <div id="mainMenuContainer">
    <div class="mainMenu">
      <ul class="menu">
        <li class="menuLi">
          <a href="index.php" class="menuBtn active">Home</a>
        </li>
        <li class="menuLi">
          <a href="msghistory.php" class="menuBtn">Message History</a>
        </li>
        <!--<li class="login">
          <a href="login.php" id="login" class="menuBtn">Login</a>
        </li>-->
      </ul>
    </div>
    </div>
    <div id="mainBody">
      <!--The field for all texts and forms-->
      <div id="textFieldBody">
        <!--The field for the active message on the display-->
        <div id="textFieldActive">
          <h2>Message displayed right now:</h2><br>
          <?php include 'displaymsg.php';?>
        </div>
      <!--The field for the message to be sent to the display-->
      <div id="textFieldUpdate">
        <form action="storemessage.php" method="post">
          <h2>Enter a new message to display:</h2><br>
          <input name="updateMsg" type="text" maxlength="500">
          <input type="submit" name="submit" value="Update display">
        </form>
        <a id="onClickShowHide" href="#" onclick="signOut();">Sign out</a>
      </div>
      <!--Login button-->
        <div id="loginField">
          <h2 id="extraMarginBot">You need to log in to update the display</h2>
          <div id="onClickShowHide" class="g-signin2" data-onsuccess="onSignIn"></div>
        </div>

      </div>
    </div>
  </body>
