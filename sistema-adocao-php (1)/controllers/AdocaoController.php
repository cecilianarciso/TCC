<?php
class AdocaoController {
    private $db;
    private $adocao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adocao = new Adocao($this->db);
    }

    public function listar() {
        return $this->adocao->listarTodas();
    }

    public function criar() {
        if ($_POST) {
            $this->adocao->crianca_id = $_POST['crianca_id'];
            $this->adocao->pretendente_id = $_POST['pretendente_id'];
            $this->adocao->data_inicio = date('Y-m-d');
            $this->adocao->status = 'iniciada';
            $this->adocao->observacoes = $_POST['observacoes'];
            $this->adocao->responsavel_id = $_SESSION['usuario_id'];

            if ($this->adocao->criar()) {
                // Atualizar status da criança
                $criancaController = new CriancaController();
                $criancaController->atualizarStatus($_POST['crianca_id'], 'em_processo');
                
                $_SESSION['sucesso'] = 'Processo de adoção iniciado com sucesso!';
            } else {
                $_SESSION['erro'] = 'Erro ao iniciar processo de adoção';
            }
        }
    }

    public function buscarPorId($id) {
        return $this->adocao->buscarPorId($id);
    }

    public function atualizarStatus($id, $status) {
        $data_conclusao = null;
        if ($status == 'concluida') {
            $data_conclusao = date('Y-m-d');
        }
        
        return $this->adocao->atualizarStatus($id, $status, $data_conclusao);
    }
}
?>
