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
            <a href="index.html" class="logo">Anjo</a>
            <h2>Crie sua conta</h2>
            <p>Rápido, fácil e seguro. Comece a usar a Anjo hoje mesmo.</p>
        </div>

        <form action="processa_cadastro.php" method="POST" enctype="multipart/form-data">
            
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
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>