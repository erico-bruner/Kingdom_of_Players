<?php
  session_start();


  $servidor = "localhost";
  $usuario = "mestre";
  $senha = "masterkey";
  $dbname = "db_usuarios";

  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ("Erro na conexão");
?>
