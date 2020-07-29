<?php 
  include_once "valida.php";
  session_start();
  if($_SESSION['token'] == ""){
    header("Location:login.php");
  }
  $nick = filter_input(INPUT_POST, 'nick-lol', FILTER_SANITIZE_STRING);

  if($nick!=""){
    $date = array("nick" => "$nick"); 
    $resultado = apiConnection($date, 'POST', 'kingdom/league_of_legends', $_SESSION['token']);
    $resultado = apiConnection($date, 'POST', 'kingdom/league_of_legends', $_SESSION['token']);

    print_r($resultado);
    $_SESSION['dataUser'] = $resultado;
    header("Location:../perfil.php");
  }
?>