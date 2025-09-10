<?php
class Adocao {
    private $conn;
    private $table_name = "adocoes";

    public $id;
    public $crianca_id;
    public $pretendente_id;
    public $data_inicio;
    public $data_conclusao;
    public $status; // iniciada, em_andamento, concluida, cancelada
    public $observacoes;
    public $responsavel_id;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET crianca_id=:crianca_id, pretendente_id=:pretendente_id, 
                      data_inicio=:data_inicio, status=:status, observacoes=:observacoes,
                      responsavel_id=:responsavel_id";

        $stmt = $this->conn->prepare($query);

        $this->observacoes = htmlspecialchars(strip_tags($this->observacoes));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":crianca_id", $this->crianca_id);
        $stmt->bindParam(":pretendente_id", $this->pretendente_id);
        $stmt->bindParam(":data_inicio", $this->data_inicio);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":observacoes", $this->observacoes);
        $stmt->bindParam(":responsavel_id", $this->responsavel_id);

        return $stmt->execute();
    }

    public function listarTodas() {
        $query = "SELECT a.*, c.nome as crianca_nome, p.nome as pretendente_nome, 
                         u.nome as responsavel_nome
                  FROM " . $this->table_name . " a
                  LEFT JOIN criancas c ON a.crianca_id = c.id
                  LEFT JOIN pretendentes p ON a.pretendente_id = p.id
                  LEFT JOIN usuarios u ON a.responsavel_id = u.id
                  ORDER BY a.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT a.*, c.nome as crianca_nome, p.nome as pretendente_nome, 
                         u.nome as responsavel_nome
                  FROM " . $this->table_name . " a
                  LEFT JOIN criancas c ON a.crianca_id = c.id
                  LEFT JOIN pretendentes p ON a.pretendente_id = p.id
                  LEFT JOIN usuarios u ON a.responsavel_id = u.id
                  WHERE a.id = :id LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarStatus($id, $status, $data_conclusao = null) {
        $query = "UPDATE " . $this->table_name . " SET status = :status";
        
        if ($data_conclusao) {
            $query .= ", data_conclusao = :data_conclusao";
        }
        
        $query .= " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        
        if ($data_conclusao) {
            $stmt->bindParam(':data_conclusao', $data_conclusao);
        }
        
        return $stmt->execute();
    }
}
?>
