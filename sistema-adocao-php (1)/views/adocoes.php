<?php
if ($_POST && isset($_POST['iniciar_adocao'])) {
    $adocaoController->criar();
}

if ($_POST && isset($_POST['atualizar_status_adocao'])) {
    $adocaoController->atualizarStatus($_POST['adocao_id'], $_POST['novo_status']);
    $_SESSION['sucesso'] = 'Status da adoção atualizado com sucesso!';
}

$adocoes = $adocaoController->listar();
$criancasDisponiveis = $criancaController->listarDisponiveis();
$pretendentes = $pretendenteController->listar();
$pretendentesAprovados = array_filter($pretendentes, function($p) { return $p['status'] == 'aprovado'; });
?>

<div class="page-container">
    <div class="container">
        <div class="page-header">
            <h1>Processos de Adoção</h1>
            <button class="btn btn-primary" onclick="toggleModal('modalAdocao')">Iniciar Adoção</button>
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
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Criança</th>
                        <th>Pretendente</th>
                        <th>Data Início</th>
                        <th>Data Conclusão</th>
                        <th>Status</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adocoes as $adocao): ?>
                        <tr>
                            <td><?php echo $adocao['crianca_nome']; ?></td>
                            <td><?php echo $adocao['pretendente_nome']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($adocao['data_inicio'])); ?></td>
                            <td><?php echo $adocao['data_conclusao'] ? date('d/m/Y', strtotime($adocao['data_conclusao'])) : '-'; ?></td>
                            <td>
                                <span class="status status-<?php echo $adocao['status']; ?>">
                                    <?php echo ucfirst(str_replace('_', ' ', $adocao['status'])); ?>
                                </span>
                            </td>
                            <td><?php echo $adocao['responsavel_nome']; ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="adocao_id" value="<?php echo $adocao['id']; ?>">
                                    <select name="novo_status" onchange="this.form.submit()">
                                        <option value="">Alterar Status</option>
                                        <option value="iniciada" <?php echo $adocao['status'] == 'iniciada' ? 'selected' : ''; ?>>Iniciada</option>
                                        <option value="em_andamento" <?php echo $adocao['status'] == 'em_andamento' ? 'selected' : ''; ?>>Em Andamento</option>
                                        <option value="concluida" <?php echo $adocao['status'] == 'concluida' ? 'selected' : ''; ?>>Concluída</option>
                                        <option value="cancelada" <?php echo $adocao['status'] == 'cancelada' ? 'selected' : ''; ?>>Cancelada</option>
                                    </select>
                                    <input type="hidden" name="atualizar_status_adocao" value="1">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Iniciar Adoção -->
<div id="modalAdocao" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Iniciar Processo de Adoção</h2>
            <span class="close" onclick="toggleModal('modalAdocao')">&times;</span>
        </div>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="crianca_id">Criança:</label>
                <select id="crianca_id" name="crianca_id" required>
                    <option value="">Selecione uma criança...</option>
                    <?php foreach ($criancasDisponiveis as $crianca): ?>
                        <option value="<?php echo $crianca['id']; ?>">
                            <?php echo $crianca['nome']; ?> (<?php echo $crianca['idade']; ?> anos)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="pretendente_id">Pretendente:</label>
                <select id="pretendente_id" name="pretendente_id" required>
                    <option value="">Selecione um pretendente...</option>
                    <?php foreach ($pretendentesAprovados as $pretendente): ?>
                        <option value="<?php echo $pretendente['id']; ?>">
                            <?php echo $pretendente['nome']; ?> - <?php echo $pretendente['email']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea id="observacoes" name="observacoes" rows="4"></textarea>
            </div>
            
            <button type="submit" name="iniciar_adocao" class="btn btn-primary">Iniciar Processo</button>
        </form>
    </div>
</div>
