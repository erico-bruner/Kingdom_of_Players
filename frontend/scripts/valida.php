<?php
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
include_once"apiConnection.php";

if(!empty($email)){
  $date = array("email" => "$email", "password" => "$senha"); 
  $resultado = apiConnection($date, 'POST', 'login', 'null');

  if ($resultado->success == "true") {
    session_start();
    $token  = $resultado->token;
    $_SESSION['token'] = $token; 
    header('Location:../index.php');
  } else {
    header('Location:../login.php');
  }
}