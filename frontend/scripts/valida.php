<?php
include_once ("conexao.php");


$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$senha = md5($senha);

$query = "select * from dm_usuarios where  ds_email = '{$email}' and ds_senha = '{$senha}' ";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$nr_rows = mysqli_num_rows($result);

if ($nr_rows == 1){
  $_SESSION["email"] = $row['ds_email'];
  $_SESSION["senha"] = $row['ds_senha'];
	header("Location: ../index.php");



}else{
  header("Location:../login.php");
}
?>