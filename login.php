<?php
include('conexao.php');

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM Usuarios
        WHERE email = '{$email}'
        AND senha = '{$senha}'";

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();

$qtd = $res->num_rows;

if($qtd > 0) {
    $_SESSION["email"] = $row->email;
    $_SESSION["tipo"] = $row->tipo;
    print "<script>location.href='telaTeste.php';</script>";
} else {
    print "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
    print "<script>location.href='tela_login.php';</script>";
}

?>