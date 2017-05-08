<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta charset="UTF-8" name="google-signin-client_id" content="148439629032-jvg0al3iou9vsoeumnlkj6ufujtfv5kl.apps.googleusercontent.com">
  <!--<link rel="icon" type="image/icon" href="Pictures/favico.ico" />-->
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <title>Superdisplay</title>
  <style>
  </style>
</head>

  <body>
    <div id="mainHeader">
      <h1 id="headerText">Superdisplay beta 0.7.12</h1>
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
        <li class="login">
          <a href="login.php" id="login" class="menuBtn">Login</a>
        </li>
      </ul>
    </div>
    </div>
    <div id="mainBody">
      <!--The field for all texts and forms-->
      <div class="g-signin2" data-onsuccess="onSignIn"></div>
      <a href="#" onclick="signOut();">Sign out</a>
        <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
            });
          }
        </script>

    </div>
  </body>
