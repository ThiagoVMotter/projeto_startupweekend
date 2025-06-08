<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CuidaBem</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <a href="index.html" class="logo">CuidaBem</a>
            <h2>Acesse sua conta</h2>
            <p>Que bom ver você de volta!</p>
        </div>

        <form action="login.php" method="POST">
            
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="form-options">
                <div class="lembrar-group">
                    <input type="checkbox" id="lembrar" name="lembrar">
                    <label for="lembrar">Lembrar de mim</label>
                </div>
                <a href="/esqueci-senha.html" class="forgot-password">Esqueci minha senha</a>
            </div>

            <button type="submit" class="btn-submit">Entrar</button>
        </form>

        <div class="form-footer">
            <p>Ainda não tem uma conta? <a href="cadastro_user.php">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>