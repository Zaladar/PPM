<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!--<link rel="icon" type="image/icon" href="Pictures/favico.ico" />-->
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
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
      </div>
      </div>
    </div>
  </body>
