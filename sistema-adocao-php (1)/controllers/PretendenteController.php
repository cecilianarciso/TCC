<?php
class PretendenteController {
    private $db;
    private $pretendente;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pretendente = new Pretendente($this->db);
    }

    public function listar() {
        return $this->pretendente->listarTodos();
    }

    public function criar() {
        if ($_POST) {
            $this->pretendente->nome = $_POST['nome'];
            $this->pretendente->cpf = $_POST['cpf'];
            $this->pretendente->email = $_POST['email'];
            $this->pretendente->telefone = $_POST['telefone'];
            $this->pretendente->endereco = $_POST['endereco'];
            $this->pretendente->estado_civil = $_POST['estado_civil'];
            $this->pretendente->profissao = $_POST['profissao'];
            $this->pretendente->renda_familiar = $_POST['renda_familiar'];
            $this->pretendente->idade_preferida_min = $_POST['idade_preferida_min'];
            $this->pretendente->idade_preferida_max = $_POST['idade_preferida_max'];
            $this->pretendente->genero_preferido = $_POST['genero_preferido'];
            $this->pretendente->aceita_necessidades_especiais = $_POST['aceita_necessidades_especiais'];
            $this->pretendente->status = 'pendente';

            if ($this->pretendente->criar()) {
                $_SESSION['sucesso'] = 'Pretendente cadastrado com sucesso!';
            } else {
                $_SESSION['erro'] = 'Erro ao cadastrar pretendente';
            }
        }
    }

    public function buscarPorId($id) {
        return $this->pretendente->buscarPorId($id);
    }

    public function atualizarStatus($id, $status) {
        return $this->pretendente->atualizarStatus($id, $status);
    }

    public function buscarCompativeis($crianca_id) {
        return $this->pretendente->buscarCompativeis($crianca_id);
    }
}
?>
