<?php
  include_once "apiConnection.php";
  include_once "valida.php";
  session_start();
  if($_SESSION['token'] == ""){
    header("Location:login.php");
  }
  $latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
  $longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
  $distancia = filter_input(INPUT_POST, 'distancia', FILTER_SANITIZE_STRING);
  
  if($latitude!=""){
    $data = array("latitude" => $latitude, "longitude" => $longitude, "distance" => $distancia);
  
    $resultado = apiConnection($data, 'GET', 'kingdom/league_of_legends', $_SESSION['token']);

    $_SESSION['listUser'] = $resultado;

    header('Location:../maps.php');
  }
  
?>