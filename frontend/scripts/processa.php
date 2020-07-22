<?php
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  $senhaValida = filter_input(INPUT_POST, 'senhaValida', FILTER_SANITIZE_STRING);


if($senha == $senhaValida){
  $date = array("name" => "$nome", "email" => "$email", "password" => "$senha");
  $urlCall = "http://localhost:3333/users";
  $ch = curl_init($urlCall);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $json = json_encode($date);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "authorization: null"));
  $resultado = json_decode(curl_exec($ch));
  var_dump($resultado);
  if($resultado -> success == true){
    session_start();
    $_SESSION =  $resultado -> token;

    header('Location:../index.php');  
  }else {
    header('Location:../login.php'); 
  }

}else{
  header('Location:../login.php'); 
}

  
  

