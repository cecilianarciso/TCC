<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Usuario.php';
require_once 'models/Crianca.php';
require_once 'models/Pretendente.php';
require_once 'models/Adocao.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/CriancaController.php';
require_once 'controllers/PretendenteController.php';
require_once 'controllers/AdocaoController.php';

$authController = new AuthController();
$criancaController = new CriancaController();
$pretendenteController = new PretendenteController();
$adocaoController = new AdocaoController();

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Verificar se usuário está logado para páginas protegidas
$paginasProtegidas = ['dashboard', 'criancas', 'pretendentes', 'adocoes'];
if (in_array($page, $paginasProtegidas) && !isset($_SESSION['usuario_id'])) {
    header('Location: index.php?page=login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Um Lar Para Todos - Sistema de Adoção</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <h1>Um Lar Para Todos</h1>
                <p>Conectando famílias com amor</p>
            </div>
            <nav class="nav">
                <a href="index.php">Início</a>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <a href="index.php?page=dashboard">Dashboard</a>
                    <a href="index.php?page=criancas">Crianças</a>
                    <a href="index.php?page=pretendentes">Pretendentes</a>
                    <a href="index.php?page=adocoes">Adoções</a>
                    <a href="index.php?page=logout">Sair</a>
                <?php else: ?>
                    <a href="index.php?page=login">Login</a>
                    <a href="index.php?page=cadastro">Cadastro</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="main">
        <?php
        switch ($page) {
            case 'home':
                include 'views/home.php';
                break;
            case 'login':
                include 'views/login.php';
                break;
            case 'cadastro':
                include 'views/cadastro.php';
                break;
            case 'dashboard':
                include 'views/dashboard.php';
                break;
            case 'criancas':
                include 'views/criancas.php';
                break;
            case 'pretendentes':
                include 'views/pretendentes.php';
                break;
            case 'adocoes':
                include 'views/adocoes.php';
                break;
            case 'logout':
                $authController->logout();
                break;
            default:
                include 'views/404.php';
        }
        ?>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Um Lar Para Todos - Governo do Estado de São Paulo</p>
            <p>Projeto desenvolvido com responsabilidade e amor</p>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
