<?php

session_start();


include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: tela_login.php');
    exit();
}
$email = $_POST["email"];
$senha_digitada = $_POST["senha"]; 
$sql = "SELECT id, nome_completo, tipo_usuario, senha_hash FROM usuarios WHERE email = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conn->error);
}
$stmt->bind_param("s", $email);

$stmt->execute();

$stmt->store_result();

if ($stmt->num_rows > 0) {

    $stmt->bind_result($id_usuario, $nome_usuario, $tipo_usuario, $senha_hash_do_banco);
    $stmt->fetch(); 

    if (password_verify($senha_digitada, $senha_hash_do_banco)) {

        session_regenerate_id(true);

        $_SESSION["id_usuario"] = $id_usuario;
        $_SESSION["nome_usuario"] = $nome_usuario;
        $_SESSION["email"] = $email;
        $_SESSION["tipo_usuario"] = $tipo_usuario;
        $_SESSION["loggedin"] = true;

        header("Location: telaTeste.html");
        exit(); 

    } else {

        header("Location: tela_login.php?erro=1");
        exit();
    }
} else {

    header("Location: tela_login.php?erro=1");
    exit();
}
$stmt->close();
$conn->close();

?>