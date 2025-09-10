<?php
class Pretendente {
    private $conn;
    private $table_name = "pretendentes";

    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $telefone;
    public $endereco;
    public $estado_civil;
    public $profissao;
    public $renda_familiar;
    public $idade_preferida_min;
    public $idade_preferida_max;
    public $genero_preferido;
    public $aceita_necessidades_especiais;
    public $status; // pendente, aprovado, reprovado
    public $documentos;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nome=:nome, cpf=:cpf, email=:email, telefone=:telefone, 
                      endereco=:endereco, estado_civil=:estado_civil, profissao=:profissao,
                      renda_familiar=:renda_familiar, idade_preferida_min=:idade_preferida_min,
                      idade_preferida_max=:idade_preferida_max, genero_preferido=:genero_preferido,
                      aceita_necessidades_especiais=:aceita_necessidades_especiais, status=:status";

        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->estado_civil = htmlspecialchars(strip_tags($this->estado_civil));
        $this->profissao = htmlspecialchars(strip_tags($this->profissao));
        $this->genero_preferido = htmlspecialchars(strip_tags($this->genero_preferido));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":estado_civil", $this->estado_civil);
        $stmt->bindParam(":profissao", $this->profissao);
        $stmt->bindParam(":renda_familiar", $this->renda_familiar);
        $stmt->bindParam(":idade_preferida_min", $this->idade_preferida_min);
        $stmt->bindParam(":idade_preferida_max", $this->idade_preferida_max);
        $stmt->bindParam(":genero_preferido", $this->genero_preferido);
        $stmt->bindParam(":aceita_necessidades_especiais", $this->aceita_necessidades_especiais);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
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

    public function buscarCompativeis($crianca_id) {
        $crianca = new Crianca($this->conn);
        $dadosCrianca = $crianca->buscarPorId($crianca_id);
        
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE status = 'aprovado' 
                  AND idade_preferida_min <= :idade_crianca 
                  AND idade_preferida_max >= :idade_crianca 
                  AND (genero_preferido = :genero_crianca OR genero_preferido = 'indiferente')";
        
        if ($dadosCrianca['necessidades_especiais'] == 'sim') {
            $query .= " AND aceita_necessidades_especiais = 'sim'";
        }
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idade_crianca', $dadosCrianca['idade']);
        $stmt->bindParam(':genero_crianca', $dadosCrianca['genero']);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
