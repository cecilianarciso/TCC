<?php
class AuthController {
    private $db;
    private $usuario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    public function login() {
        if ($_POST) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($this->usuario->login($email, $senha)) {
                $_SESSION['usuario_id'] = $this->usuario->id;
                $_SESSION['usuario_nome'] = $this->usuario->nome;
                $_SESSION['usuario_tipo'] = $this->usuario->tipo;
                
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $_SESSION['erro'] = 'Email ou senha incorretos';
            }
        }
    }

    public function cadastrar() {
        if ($_POST) {
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->senha = $_POST['senha'];
            $this->usuario->tipo = $_POST['tipo'];

            if ($this->usuario->criar()) {
                $_SESSION['sucesso'] = 'Usuário cadastrado com sucesso!';
                header('Location: index.php?page=login');
                exit;
            } else {
                $_SESSION['erro'] = 'Erro ao cadastrar usuário';
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
?>
