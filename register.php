<!DOCTYPE html>
<html>
 <head>
  <meta charset="UFT-8">
  <title>first site</title>
 </head>
 <body bgcolor="black" style="color:white;font-size:16px;">

   <?php
   include "account.html";
   require_once "config.php";
   $username=$password=$confim_password="";
   $username_err=$password_err=$confirm_password_err="";

   if ($_SERVER['REQUEST_METHOD']=="POST"){
     if (empty(trim($_POST["username"]))){
       $username_err="username can't be empty";
     }
     else{
       $sql="SELECT id FROM userbase WHERE username= ?";
       $stmt=mysqli_prepare($conn,$sql);
       if($stmt){
         mysqli_stmt_bind_param($stmt,"s",$param_username);
         $param_usrname=trim($_POST['username']);

         if (mysqli_stmt_execute($stmt)){
           mysqli_stmt_store_result($stmt);
           if(mysqli_stmt_num_rows($stmt)==1){
             $username_err="Already taken!!";

           }
           else{
               $username=trim($_POST['username']);
          }

         }
         else{
           echo "Some error shown up!";
         }
       }
     }
     mysqli_stmt_close($stmt);
   }
   if (empty(trim($_POST['password']))){
     $password_err="empty password :!";
   }elseif(strlen(trim($_POST['password']))<8){
     $password_err="enter more than 8 char!!";
   }else{
     $password=trim($_POST['password']);
   }

   if (trim($_POST['confirm_password'])!=trim($_POST['confirm_password'])){
     $password_err="passwords are not matching!";
   }

   if (empty($username_err) && empty($password_err) && empty($confirm_password_err)){
     $sql="INSERT INTO userbase(username,password) VALUES(?,?)";
     $stmt=mysqli_prepare($conn,$sql);
     if($stmt){
       mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

       $param_username=$username;
       $param_password=password_hash($password,PASSWORD_DEFAULT);

       if(mysqli_stmt_execute($stmt)){
         header("location: created.php");
       }
       else{
         echo "Something went wrong... cannot redirect!";
       }
     }
     mysqli_stmt_close($stmt);
   }
   mysqli_close($conn);
   ?>


 </body>
</html>
