<?php include('includes/header.php'); ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require_once 'includes/db.php';
?>
<h2>Olá, <?= htmlspecialchars($_SESSION['user_name']) ?></h2>
<p>Área restrita — aqui você verá suas adoções e notificações.</p>

<div class="row">
  <div class="col-md-8">
    <h4>Crianças cadastradas</h4>
    <div class="list-group">
      <?php
        $res = $conn->query('SELECT c.id, c.nome, c.idade, i.nome AS instituicao FROM criancas c LEFT JOIN instituicoes i ON c.instituicao_id = i.id ORDER BY c.nome');
        while ($row = $res->fetch_assoc()) {
            echo '<a class="list-group-item list-group-item-action">' . htmlspecialchars($row['nome']) . ' — ' . intval($row['idade']) . ' anos <br><small>' . htmlspecialchars($row['instituicao']) . '</small></a>';
        }
      ?>
    </div>
  </div>
  <div class="col-md-4">
    <h4>Menu</h4>
    <ul class="list-group">
      <li class="list-group-item"><a href="cadastro.php">Editar perfil</a></li>
      <li class="list-group-item"><a href="contato.php">Contato / Suporte</a></li>
      <li class="list-group-item"><a href="logout.php">Sair</a></li>
    </ul>
  </div>
</div>

<?php include('includes/footer.php'); ?>
