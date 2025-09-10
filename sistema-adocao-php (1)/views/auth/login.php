<?php
session_start();
require_once '../../controllers/AuthController.php';

$authController = new AuthController();
$error = '';

if($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if($authController->login($email, $senha)) {
        header('Location: ../../index.php');
        exit;
    } else {
        $error = 'Email ou senha inválidos';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Um Lar Para Todos</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <h1>Um Lar Para Todos</h1>
                <p>Sistema de Adoção</p>
            </div>
            
            <?php if($error): ?>
                <div class="alert alert-error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="login-form">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
            
            <div class="login-links">
                <a href="register.php">Não tem conta? Cadastre-se</a>
                <a href="forgot-password.php">Esqueceu a senha?</a>
            </div>
        </div>
    </div>
</body>
</html>
