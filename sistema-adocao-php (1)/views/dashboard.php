<?php
$criancas = $criancaController->listar();
$pretendentes = $pretendenteController->listar();
$adocoes = $adocaoController->listar();

$totalCriancas = count($criancas);
$criancasDisponiveis = count(array_filter($criancas, function($c) { return $c['status'] == 'disponivel'; }));
$totalPretendentes = count($pretendentes);
$pretendentesAprovados = count(array_filter($pretendentes, function($p) { return $p['status'] == 'aprovado'; }));
$totalAdocoes = count($adocoes);
$adocoesConcluidas = count(array_filter($adocoes, function($a) { return $a['status'] == 'concluida'; }));
?>

<div class="dashboard">
    <div class="container">
        <h1>Dashboard</h1>
        <p>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</p>
        
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">👶</div>
                <div class="stat-info">
                    <h3><?php echo $totalCriancas; ?></h3>
                    <p>Total de Crianças</p>
                    <small><?php echo $criancasDisponiveis; ?> disponíveis</small>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">👨‍👩‍👧‍👦</div>
                <div class="stat-info">
                    <h3><?php echo $totalPretendentes; ?></h3>
                    <p>Total de Pretendentes</p>
                    <small><?php echo $pretendentesAprovados; ?> aprovados</small>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">💝</div>
                <div class="stat-info">
                    <h3><?php echo $totalAdocoes; ?></h3>
                    <p>Total de Adoções</p>
                    <small><?php echo $adocoesConcluidas; ?> concluídas</small>
                </div>
            </div>
        </div>
        
        <div class="dashboard-actions">
            <a href="index.php?page=criancas" class="action-card">
                <div class="action-icon">👶</div>
                <h3>Gerenciar Crianças</h3>
                <p>Cadastrar e acompanhar crianças</p>
            </a>
            
            <a href="index.php?page=pretendentes" class="action-card">
                <div class="action-icon">👨‍👩‍👧‍👦</div>
                <h3>Gerenciar Pretendentes</h3>
                <p>Avaliar e aprovar pretendentes</p>
            </a>
            
            <a href="index.php?page=adocoes" class="action-card">
                <div class="action-icon">💝</div>
                <h3>Processos de Adoção</h3>
                <p>Acompanhar adoções em andamento</p>
            </a>
        </div>
    </div>
</div>
