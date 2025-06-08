<?php
// O arquivo começa DIRETAMENTE com a tag PHP. Não pode haver NENHUM espaço ou linha em branco antes.

include 'conexao.php';

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Coleta todos os dados do formulário
    $tipo_usuario = $_POST['tipo_usuario'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Validação 1: Senhas coincidem?
    if ($senha !== $confirma_senha) {
        die("Erro: As senhas não coincidem. Por favor, volte e tente novamente.");
    }
    
    // Validação 2: E-mail já existe?
    $sql_check_email = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        die("Erro: Este e-mail já está cadastrado. Por favor, use outro e-mail ou faça login.");
    }
    $stmt_check->close();

    // Validação 3: CPF já existe?
    $sql_check_cpf = "SELECT id FROM usuarios WHERE cpf = ?";
    $stmt_check_cpf = $conn->prepare($sql_check_cpf);
    $stmt_check_cpf->bind_param("s", $cpf);
    $stmt_check_cpf->execute();
    $stmt_check_cpf->store_result();

    if ($stmt_check_cpf->num_rows > 0) {
        die("Erro: Este CPF já está cadastrado em nosso sistema.");
    }
    $stmt_check_cpf->close();

    // Processamento dos dados
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $foto_perfil_url = null;
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $diretorio_uploads = 'uploads/'; // Lembre-se de criar esta pasta no seu projeto!
        if (!is_dir($diretorio_uploads)) {
            mkdir($diretorio_uploads, 0755, true);
        }
        $nome_arquivo = uniqid() . '_' . basename($_FILES['foto_perfil']['name']);
        $caminho_completo = $diretorio_uploads . $nome_arquivo;

        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminho_completo)) {
            $foto_perfil_url = $caminho_completo;
        }
    }

    // Inserção no banco de dados
    $sql = "INSERT INTO usuarios (nome_completo, email, senha_hash, cpf, telefone, data_nascimento, cidade, estado, foto_perfil_url, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a query: " . $conn->error);
    }
    
    $stmt->bind_param("ssssssssss", $nome_completo, $email, $senha_hash, $cpf, $telefone, $data_nascimento, $cidade, $estado, $foto_perfil_url, $tipo_usuario);

    // Execução e redirecionamento
    if ($stmt->execute()) {
        // Redireciona para a página de login com uma mensagem de sucesso
        header("Location: login.php?status=sucesso");
        exit(); // Encerra o script para garantir que o redirecionamento aconteça
    } else {
        // Se falhar, mostra o erro do MySQL para depuração
        die("Erro ao realizar o cadastro: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    // Se alguém tentar acessar este arquivo diretamente sem enviar o formulário, redireciona para a página de cadastro.
    header("Location: cadastro_user.php");
    exit();
}
?>