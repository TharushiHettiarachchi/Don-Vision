<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body style="margin:0px">
  <?php include "header.php"; ?>
  <div class="signUpmainDiv">
    <div class="signUpd1">
      <label class="signUpl1">Create New Account</label>
    </div>
    <div class="signUpd2">
      <div class="signUpd3">
        <img src="resources/pic11.png" style="height:82vh;width:120%" />
      </div>

      <div class="signUpd4">
        <div class="signUpAlert">
          <div class="signUpAlert1" id="signUpAlert"></div>
        </div>
        <div class="signUpd5">
          <input type="text" class="signUpinput1" placeholder="First Name" id="fname" />
        </div>
        <div class="signUpd6">
          <input type="text" class="signUpinput1" placeholder="Last Name" id="lname" />
        </div>
        <div class="signUpd6">
          <input type="text" class="signUpinput1" placeholder="Email" id="email" />
        </div>
        <div class="signUpd6">
          <input type="text" class="signUpinput1" placeholder="Mobile" maxlength="10" id="mobile" />
        </div>
        <div class="signUpd7">
          <div class="signUpd8"><button class="signUpbtn1" onclick="signUp();">SIGN UP</button></div>
          <div class="signUpd9"><a href="signIn.php" class="signUpa1">Already have an account? Sign In</a></div>
        </div>
        <div class="signUpdivf">
          <label class="signUpl3">Don Vision Opticians | 2023 | &copy;All copyrights reserved<br>Developed By HENDECAGON</label>
        </div>

      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>