<?php
class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipo; // admin, psicologo, assistente_social
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nome=:nome, email=:email, senha=:senha, tipo=:tipo";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":tipo", $this->tipo);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $senha) {
        $query = "SELECT id, nome, email, senha, tipo FROM " . $this->table_name . " 
                  WHERE email = :email LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row && password_verify($senha, $row['senha'])) {
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->tipo = $row['tipo'];
            return true;
        }
        return false;
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
