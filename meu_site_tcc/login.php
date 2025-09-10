<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Página</title>
    <link rel="stylesheet" href="css/style.css">
</head>

</html><?php include('includes/header.php'); ?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/db.php';
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT id,nome,senha,tipo FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($id,$nome,$hash,$tipo);
    if ($stmt->fetch()) {
        if (password_verify($senha, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $nome;
            $_SESSION['user_type'] = $tipo;
            header('Location: painel.php');
            exit;
        } else {
            $error = 'Senha incorreta.';
        }
    } else {
        $error = 'Usuário não encontrado.';
    }
    $stmt->close();
}
?>
<div class="row justify-content-center">
  <div class="col-md-5">
    <h2>Login</h2>
    <?php if (!empty($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <button class="btn btn-primary">Entrar</button>
    </form>
  </div>
</div>
<?php include('includes/footer.php'); ?>
