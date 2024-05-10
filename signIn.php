<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Don Vision | Sign In</title>
  <link rel="icon" href="resources/pic10.jpg" />
  <link rel="stylesheet" href="style.css" />
</head>

<body style="margin:0px; overflow:hidden">
  <?php include "header.php"; ?>
  <div class="signInmainDiv">
    <div class="signInd1">
      <label class="signInl1">Welcome</label>
    </div>
    <div class="signInd2">
      <div class="signInsd3">
        <img src="resources/pic12.png" class="signInImage" />
      </div>
      <div class="signInd4">
        <div class="signInAlert">
          <div class="signInAlert1" id="signInAlert"></div>
        </div>

        <div class="signInsd5">
          <input type="text" class="signIninput1" placeholder="Email" id="email" />
        </div>

        <div class="signInd6">
          <input type="password" class="signIninput1" placeholder="Password" id="password" />
        </div>
        <div class="signInd7">
          <div class="signInd8"><button class="signInbtn1" onclick="signIn();">SIGN IN</button></div>
          <div class="signInd9"><a href="signUp.php" class="signIna1">New to Don Vision? Sign Up</a></div>
        </div>
        <div class="signInsdivf">
          <label class="signInl3">Don Vision Opticians | 2023 | &copy;All copyrights reserved<br>Developed By HENDECAGON</label>
        </div>

      </div>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>