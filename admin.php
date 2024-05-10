<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <link rel="icon" href="resources/pic10.jpg" />
     <title>Don Vision | Admin Sign In</title>
</head>

<body class="adminBody">
     <div class="adminDiv1">
          <div class="adminDiv2">
               <span class="adminh1">ADMIN SIGNIN | DONVISION</span>

          </div>
          <div class="">
               <hr>
               <div class="adminDiv3" id="emailBox">
                  
                    <label class="admininputlabel">Enter your Email</label>     
                    <input type="text" class="admininput1" id="email">
                    <button class="adminsubmit" type="submit" onclick="sendVerification();">Submit</button>

               </div>
               <div class="adminDiv4" id="codeBox">
                  
                  <label class="admininputlabel">Enter the Verification Code</label>     
                  <input type="text" class="admininput1" id="code">
                  <button class="adminsubmit" type="submit" onclick="sendVerification1();">Verify</button>

             </div>
       
          </div>

     </div>

     <div class="footer1">
          &copy;2023 | Don Vision | All rights reserved<br/>
          Powered by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a>
     </div>

     <script src="script.js"></script>
</body>

</html>