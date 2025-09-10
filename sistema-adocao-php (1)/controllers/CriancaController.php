<?php
class CriancaController {
    private $db;
    private $crianca;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->crianca = new Crianca($this->db);
    }

    public function listar() {
        return $this->crianca->listarTodas();
    }

    public function listarDisponiveis() {
        return $this->crianca->listarDisponiveis();
    }

    public function criar() {
        if ($_POST) {
            $this->crianca->nome = $_POST['nome'];
            $this->crianca->idade = $_POST['idade'];
            $this->crianca->genero = $_POST['genero'];
            $this->crianca->descricao = $_POST['descricao'];
            $this->crianca->necessidades_especiais = $_POST['necessidades_especiais'];
            $this->crianca->status = 'disponivel';
            $this->crianca->foto = $_POST['foto'] ?? '';
            $this->crianca->abrigo_id = $_POST['abrigo_id'];

            if ($this->crianca->criar()) {
                $_SESSION['sucesso'] = 'Criança cadastrada com sucesso!';
            } else {
                $_SESSION['erro'] = 'Erro ao cadastrar criança';
            }
        }
    }

    public function buscarPorId($id) {
        return $this->crianca->buscarPorId($id);
    }

    public function atualizarStatus($id, $status) {
        return $this->crianca->atualizarStatus($id, $status);
    }
}
?>
