<?php
if ($_POST && isset($_POST['cadastrar_crianca'])) {
    $criancaController->criar();
}

$criancas = $criancaController->listar();
?>

<div class="page-container">
    <div class="container">
        <div class="page-header">
            <h1>Gerenciar Crianças</h1>
            <button class="btn btn-primary" onclick="toggleModal('modalCrianca')">Cadastrar Criança</button>
        </div>
        
        <?php if (isset($_SESSION['sucesso'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['sucesso']; unset($_SESSION['sucesso']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['erro'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>
        
        <div class="cards-grid">
            <?php foreach ($criancas as $crianca): ?>
                <div class="crianca-card">
                    <div class="crianca-photo">
                        <img src="<?php echo $crianca['foto'] ?: '/placeholder.svg?height=150&width=150'; ?>" alt="Foto de <?php echo $crianca['nome']; ?>">
                    </div>
                    <div class="crianca-info">
                        <h3><?php echo $crianca['nome']; ?></h3>
                        <p><strong>Idade:</strong> <?php echo $crianca['idade']; ?> anos</p>
                        <p><strong>Gênero:</strong> <?php echo ucfirst($crianca['genero']); ?></p>
                        <p><strong>Status:</strong> 
                            <span class="status status-<?php echo $crianca['status']; ?>">
                                <?php echo ucfirst(str_replace('_', ' ', $crianca['status'])); ?>
                            </span>
                        </p>
                        <p><strong>Abrigo:</strong> <?php echo $crianca['abrigo_nome'] ?? 'Não informado'; ?></p>
                        <p class="crianca-descricao"><?php echo $crianca['descricao']; ?></p>
                        
                        <?php if ($crianca['necessidades_especiais'] == 'sim'): ?>
                            <p class="necessidades-especiais">⚠️ Necessidades especiais</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal Cadastrar Criança -->
<div id="modalCrianca" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Cadastrar Criança</h2>
            <span class="close" onclick="toggleModal('modalCrianca')">&times;</span>
        </div>
        <form method="POST" class="form">
            <div class="form-row">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" min="0" max="18" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="genero">Gênero:</label>
                    <select id="genero" name="genero" required>
                        <option value="">Selecione...</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="necessidades_especiais">Necessidades Especiais:</label>
                    <select id="necessidades_especiais" name="necessidades_especiais" required>
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="foto">URL da Foto:</label>
                <input type="url" id="foto" name="foto">
            </div>
            
            <div class="form-group">
                <label for="abrigo_id">Abrigo:</label>
                <select id="abrigo_id" name="abrigo_id" required>
                    <option value="1">Casa Lar São José</option>
                    <option value="2">Abrigo Santa Maria</option>
                    <option value="3">Lar dos Anjos</option>
                </select>
            </div>
            
            <button type="submit" name="cadastrar_crianca" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
