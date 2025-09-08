<?php include('includes/header.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/db.php';
    $usuario_id = null;
    if (!empty($_POST['usuario_id'])) $usuario_id = intval($_POST['usuario_id']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);
    $stmt = $conn->prepare('INSERT INTO mensagens (usuario_id, mensagem) VALUES (?,?)');
    $stmt->bind_param('is', $usuario_id, $mensagem);
    $stmt->execute();
    $stmt->close();
    $ok = true;
}
?>
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2>Contato / Suporte</h2>
    <?php if (!empty($ok)): ?><div class="alert alert-success">Mensagem enviada. A equipe entrará em contato.</div><?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Seu nome</label>
        <input class="form-control" name="nome">
      </div>
      <div class="mb-3">
        <label class="form-label">Mensagem</label>
        <textarea class="form-control" name="mensagem" rows="4" required></textarea>
      </div>
      <button class="btn btn-pink">Enviar</button>
    </form>
  </div>
</div>
<?php include('includes/footer.php'); ?>
