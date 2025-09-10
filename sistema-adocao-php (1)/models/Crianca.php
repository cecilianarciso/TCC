<?php
class Crianca {
    private $conn;
    private $table_name = "criancas";

    public $id;
    public $nome;
    public $idade;
    public $genero;
    public $descricao;
    public $necessidades_especiais;
    public $status; // disponivel, em_processo, adotada
    public $foto;
    public $abrigo_id;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nome=:nome, idade=:idade, genero=:genero, descricao=:descricao, 
                      necessidades_especiais=:necessidades_especiais, status=:status, 
                      foto=:foto, abrigo_id=:abrigo_id";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->necessidades_especiais = htmlspecialchars(strip_tags($this->necessidades_especiais));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->foto = htmlspecialchars(strip_tags($this->foto));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":necessidades_especiais", $this->necessidades_especiais);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":abrigo_id", $this->abrigo_id);

        return $stmt->execute();
    }

    public function listarTodas() {
        $query = "SELECT c.*, a.nome as abrigo_nome 
                  FROM " . $this->table_name . " c 
                  LEFT JOIN abrigos a ON c.abrigo_id = a.id 
                  ORDER BY c.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarDisponiveis() {
        $query = "SELECT c.*, a.nome as abrigo_nome 
                  FROM " . $this->table_name . " c 
                  LEFT JOIN abrigos a ON c.abrigo_id = a.id 
                  WHERE c.status = 'disponivel' 
                  ORDER BY c.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT c.*, a.nome as abrigo_nome 
                  FROM " . $this->table_name . " c 
                  LEFT JOIN abrigos a ON c.abrigo_id = a.id 
                  WHERE c.id = :id LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarStatus($id, $status) {
        $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}
?>
