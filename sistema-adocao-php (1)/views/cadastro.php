<?php
if ($_POST && isset($_POST['cadastrar'])) {
    $authController->cadastrar();
}
?>

<div class="auth-container">
    <div class="auth-card">
        <h2>Cadastro</h2>
        
        <?php if (isset($_SESSION['erro'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="auth-form">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
            <div class="form-group">
                <label for="tipo">Tipo de Usuário:</label>
                <select id="tipo" name="tipo" required>
                    <option value="">Selecione...</option>
                    <option value="admin">Administrador</option>
                    <option value="psicologo">Psicólogo</option>
                    <option value="assistente_social">Assistente Social</option>
                </select>
            </div>
            
            <button type="submit" name="cadastrar" class="btn btn-primary btn-full">Cadastrar</button>
        </form>
        
        <p class="auth-link">
            Já tem conta? <a href="index.php?page=login">Faça login aqui</a>
        </p>
    </div>
</div>
