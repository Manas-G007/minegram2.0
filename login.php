<?php
include "homepage.html";

session_start();

if(isset($_SESSION['username'])){
  header("location: welcome.php");
  exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
    $err="please enter username or/and password!!";
    echo "<h1>$err</h1>";
  }
  else{
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
  }
  if(empty($err)){
    $sql="SELECT id,username,password FROM userbase WHERE username=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$param_username);
    $param_username=$username;
    if (mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt)==1){
        mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
        if(mysqli_stmt_fetch($stmt)){
          if(password_verify($password,$hashed_password)){
            session_start();
            $_SESSION["username"]=$username;
            $_SESSION["id"]=$id;
            $_SESSION["loggedin"]=true;

            header("location: welcome.php");
          }
        }
      }
    }
  }
}
?>
