<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <meta name="author" content="manas">
   <meta name="description" content="user profile">
   <meta name="viewport" content="width:device-width,initial-scale=1.0">
   <title>welcome</title>
   <link rel="stylesheet" type="text/css" href="profile.css">
 </head>
 <body>
   <div class="fle">
     <div class="fle-item"><a href="">home</a></div>
     <div class="fle-item"><a href="">explore</a></div>
     <div class="fle-item"><a href="">stats</a></div>
     <div ><input type="search" placeholder="search any user :>"></div>
     <div class="search"><img src="../img/searchicon.jpg" style="width:40px;"></div>
     <div class="fle-item"  style="margin:0 0 0 auto;"><a href="logout.php"> logout </a></div>
  </div><hr>
  <div id="main">
    <div class="grid-1">
      <div class="grid-item1">search</div>
      <div class="grid-item1">chat</div>
      <div class="grid-item1">upload</div>
      <div style="height:700px;"></div>
    </div>
    <div class="first-grid">
      <img src="imgpro.jpg" class="propic">
      <div class="grid-item"><?php session_start();
      echo $_SESSION['username'];?></div>
      <div class="img-grid">
        <div><img src="../challenge/img-1.jpg" class="img-item"></div>
        <div><img src="../challenge/img-2.jpg" class="img-item"></div>
        <div><img src="../challenge/img-3.jpg" class="img-item"></div>
        <div><img src="../challenge/img-4.jpg" class="img-item"></div>
        <div><img src="../challenge/img-5.jpg" class="img-item"></div>
        <div><img src="../challenge/img-6.jpg" class="img-item"></div>
        <div><img src="../challenge/img-7.jpg" class="img-item"></div>
        <div><img src="../challenge/img-8.jpg" class="img-item"></div>
        <div><img src="../challenge/img-9.jpg" class="img-item"></div>
      </div>
    </div>

  </div>
   <?php
   if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!==true){
     header("location: login.php");
   }
   ?>
 </body>
</html>
<!-- <form action="welcome.php" type="post">
  <input type="file" value="upload profile pic" name="file">
  <br><input type="submit" value="upload">
</form> -->
