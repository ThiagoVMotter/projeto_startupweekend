<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie sua Conta - Anjo</title>
    <link rel="stylesheet" href="css/cadastroUser.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <a href="#" class="logo">Anjo</a>
            <h2>Crie sua conta</h2>
            <p>Rápido, fácil e seguro. Comece a usar a Anjo hoje mesmo.</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            
            <div class="input-group">
                <label>Qual é o seu objetivo?</label>
                <div class="role-selector">
                    <input type="radio" id="tipo_cliente" name="tipo_usuario" value="CLIENTE" required checked>
                    <label for="tipo_cliente">Quero Contratar</label>
                    
                    <input type="radio" id="tipo_cuidador" name="tipo_usuario" value="CUIDADOR" required>
                    <label for="tipo_cuidador">Quero Cuidar</label>
                </div>
            </div>

            <div class="input-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" id="nome_completo" name="nome_completo" placeholder="Digite seu nome completo" required>
            </div>

            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
            </div>

            <div class="form-grid">
                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Mínimo de 8 caracteres" required>
                </div>
                <div class="input-group">
                    <label for="confirma_senha">Confirme a Senha</label>
                    <input type="password" id="confirma_senha" name="confirma_senha" placeholder="Repita sua senha" required>
                </div>
            </div>

            <div class="form-grid">
                 <div class="input-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone / Celular</label>
                    <input type="tel" id="telefone" name="telefone" placeholder="(00) 90000-0000" required>
                </div>
            </div>
            
            <div class="input-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
            </div>
            
            <div class="form-grid">
                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Ex: Joaçaba" required>
                </div>
                <div class="input-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
            </div>

            <div class="input-group">
                <label for="foto_perfil">Foto de Perfil (Opcional)</label>
                <input type="file" id="foto_perfil" name="foto_perfil" accept="image/png, image/jpeg">
            </div>

            <button type="submit" class="btn-submit">Criar Minha Conta</button>
        </form>

        <div class="form-footer">
            <p>Já tem uma conta? <a href="/login.html">Faça login</a></p>
        </div>
    </div>

<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

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

    if ($senha !== $confirma_senha) {
        die("Erro: As senhas não coincidem. Por favor, volte e tente novamente.");
    }
    

    $sql_check_email = "SELECT id FROM usuarios WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check_email);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        die("Erro: Este e-mail já está cadastrado. Por favor, use outro e-mail ou faça login.");
    }
    $stmt_check->close();


    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $foto_perfil_url = null;
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $diretorio_uploads = 'uploads/';
        $nome_arquivo = uniqid() . '_' . basename($_FILES['foto_perfil']['name']);
        $caminho_completo = $diretorio_uploads . $nome_arquivo;

        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminho_completo)) {
            $foto_perfil_url = $caminho_completo;
        }
    }


    $sql = "INSERT INTO usuarios (
                nome_completo, 
                email, 
                senha_hash, 
                cpf, 
                telefone, 
                data_nascimento, 
                cidade, 
                estado, 
                foto_perfil_url, 
                tipo_usuario
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a query: " . $conn->error);
    }
    $stmt->bind_param(
        "ssssssssss",
        $nome_completo,
        $email,
        $senha_hash,
        $cpf,
        $telefone,
        $data_nascimento,
        $cidade,
        $estado,
        $foto_perfil_url,
        $tipo_usuario
    );

    if ($stmt->execute()) {
        header("Location: login.html?status=sucesso");
        exit();
    } else {
        echo "Erro ao realizar o cadastro. Por favor, tente novamente.";
        error_log("Erro no cadastro: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>