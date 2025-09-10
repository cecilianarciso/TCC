<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Página</title>
    <link rel="stylesheet" href="css/style.css">
</head>

</html>
<?php
session_start();
session_unset();
session_destroy();
header('Location: login.php');
exit;
?>