-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS sistema_adocao;
USE sistema_adocao;

-- Tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'psicologo', 'pretendente', 'abrigo') NOT NULL,
    telefone VARCHAR(20),
    cpf VARCHAR(14) UNIQUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOLEAN DEFAULT TRUE
);

-- Tabela de abrigos
CREATE TABLE abrigos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco TEXT,
    cidade VARCHAR(50),
    estado VARCHAR(2),
    telefone VARCHAR(20),
    responsavel VARCHAR(100),
    capacidade INT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de crianças
CREATE TABLE criancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    genero ENUM('masculino', 'feminino') NOT NULL,
    descricao TEXT,
    necessidades_especiais TEXT,
    foto VARCHAR(255),
    status ENUM('disponivel', 'em_processo', 'adotada') DEFAULT 'disponivel',
    abrigo_id INT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (abrigo_id) REFERENCES abrigos(id)
);

-- Tabela de pretendentes
CREATE TABLE pretendentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    estado_civil ENUM('solteiro', 'casado', 'divorciado', 'viuvo', 'uniao_estavel') NOT NULL,
    profissao VARCHAR(100),
    renda_mensal DECIMAL(10,2),
    endereco TEXT,
    cidade VARCHAR(50),
    estado VARCHAR(2),
    cep VARCHAR(10),
    tem_filhos BOOLEAN DEFAULT FALSE,
    idade_preferida_min INT,
    idade_preferida_max INT,
    genero_preferido ENUM('masculino', 'feminino', 'indiferente') DEFAULT 'indiferente',
    aceita_necessidades_especiais BOOLEAN DEFAULT FALSE,
    status_aprovacao ENUM('pendente', 'aprovado', 'reprovado') DEFAULT 'pendente',
    observacoes TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabela de adoções
CREATE TABLE adocoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crianca_id INT NOT NULL,
    pretendente_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_conclusao DATE,
    status ENUM('em_andamento', 'concluida', 'cancelada') DEFAULT 'em_andamento',
    observacoes TEXT,
    psicologo_id INT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (crianca_id) REFERENCES criancas(id),
    FOREIGN KEY (pretendente_id) REFERENCES pretendentes(id),
    FOREIGN KEY (psicologo_id) REFERENCES usuarios(id)
);

-- Tabela de acompanhamentos
CREATE TABLE acompanhamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adocao_id INT NOT NULL,
    data_acompanhamento DATE NOT NULL,
    observacoes TEXT,
    psicologo_id INT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (adocao_id) REFERENCES adocoes(id),
    FOREIGN KEY (psicologo_id) REFERENCES usuarios(id)
);

-- Tabela de documentos
CREATE TABLE documentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pretendente_id INT NOT NULL,
    tipo_documento VARCHAR(50) NOT NULL,
    nome_arquivo VARCHAR(255) NOT NULL,
    caminho_arquivo VARCHAR(500) NOT NULL,
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pretendente_id) REFERENCES pretendentes(id)
);

-- Índices para melhor performance
CREATE INDEX idx_criancas_status ON criancas(status);
CREATE INDEX idx_pretendentes_status ON pretendentes(status_aprovacao);
CREATE INDEX idx_adocoes_status ON adocoes(status);
CREATE INDEX idx_usuarios_tipo ON usuarios(tipo);
