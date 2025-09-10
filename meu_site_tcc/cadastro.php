<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Página</title>
    <link rel="stylesheet" href="css/style.css">
</head>

</html>
<?php include('includes/header.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/db.php';
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $conn->real_escape_string($_POST['tipo']);

    $stmt = $conn->prepare("INSERT INTO usuarios (nome,email,senha,tipo) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $nome, $email, $senha, $tipo);
    if ($stmt->execute()) {
        $msg = 'Cadastro realizado com sucesso! Faça login.';
    } else {
        $msg = 'Erro: ' . $conn->error;
    }
    $stmt->close();
}
?>
<div class="row justify-content-center">
  <div class="col-md-6">
    <h2>Cadastro</h2>
    <?php if (!empty($msg)): ?>
      <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input class="form-control" name="nome" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-select">
          <option value="pretendente">Pretendente</option>
          <option value="profissional">Profissional</option>
        </select>
      </div>
      <button class="btn btn-pink">Cadastrar</button>
    </form>
  </div>
</div>
<?php include('includes/footer.php'); ?>
