<?php
session_start();
require_once '../../controllers/AuthController.php';
require_once '../../models/Crianca.php';
require_once '../../models/Pretendente.php';
require_once '../../models/Adocao.php';

$authController = new AuthController();
$authController->requireRole(['admin']);

$database = new Database();
$db = $database->getConnection();

$crianca = new Crianca($db);
$pretendente = new Pretendente($db);
$adocao = new Adocao($db);

// Estatísticas
$criancas_disponiveis = $crianca->listarDisponiveis();
$total_criancas = $criancas_disponiveis->rowCount();

$pretendentes_aprovados = $pretendente->listarAprovados();
$total_pretendentes = $pretendentes_aprovados->rowCount();

$processos = $adocao->listarProcessos();
$total_processos = $processos->rowCount();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Um Lar Para Todos</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard Administrativo</h1>
            <p>Bem-vindo, <?php echo $_SESSION['user_name']; ?>!</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👶</div>
                <div class="stat-info">
                    <h3><?php echo $total_criancas; ?></h3>
                    <p>Crianças Disponíveis</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">👨‍👩‍👧‍👦</div>
                <div class="stat-info">
                    <h3><?php echo $total_pretendentes; ?></h3>
                    <p>Pretendentes Aprovados</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-info">
                    <h3><?php echo $total_processos; ?></h3>
                    <p>Processos de Adoção</p>
                </div>
            </div>
        </div>
        
        <div class="dashboard-actions">
            <div class="action-grid">
                <a href="criancas/listar.php" class="action-card">
                    <h3>Gerenciar Crianças</h3>
                    <p>Cadastrar e gerenciar crianças disponíveis para adoção</p>
                </a>
                
                <a href="pretendentes/listar.php" class="action-card">
                    <h3>Gerenciar Pretendentes</h3>
                    <p>Avaliar e aprovar pretendentes à adoção</p>
                </a>
                
                <a href="adocoes/listar.php" class="action-card">
                    <h3>Processos de Adoção</h3>
                    <p>Acompanhar processos de adoção em andamento</p>
                </a>
                
                <a href="relatorios/index.php" class="action-card">
                    <h3>Relatórios</h3>
                    <p>Gerar relatórios e estatísticas do sistema</p>
                </a>
            </div>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
</body>
</html>
