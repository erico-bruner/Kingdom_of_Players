<?php
include_once("conexao.php");





$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

echo "Nome: $nome <br>";
echo "Email: $email <br>";
echo "Senha: $senha <br>";

$result_usuario =  "INSERT INTO dm_usuarios (ds_nome, ds_email, ds_senha) VALUE ('$nome', '$email',md5('$senha'))";

$resultado_usuario =  mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
  header("Location:../index.php");
} else {
  header("Location:../cadastro.php");
}
