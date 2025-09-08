<?php
$host = 'localhost';
$user = 'root';   // se for XAMPP/WAMP, geralmente é root
$pass = 'root';       // sem senha no XAMPP padrão
$db   = 'tcc_lar';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
