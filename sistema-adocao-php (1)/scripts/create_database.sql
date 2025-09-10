-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS sistema_adocao;
USE sistema_adocao;

-- Tabela de usuários (administradores, psicólogos, assistentes sociais)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'psicologo', 'assistente_social') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de abrigos
CREATE TABLE abrigos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    endereco TEXT NOT NULL,
    telefone VARCHAR(20),
    responsavel VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de crianças
CREATE TABLE criancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INT NOT NULL,
    genero ENUM('masculino', 'feminino') NOT NULL,
    descricao TEXT,
    necessidades_especiais ENUM('sim', 'nao') DEFAULT 'nao',
    status ENUM('disponivel', 'em_processo', 'adotada') DEFAULT 'disponivel',
    foto VARCHAR(500),
    abrigo_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (abrigo_id) REFERENCES abrigos(id)
);

-- Tabela de pretendentes
CREATE TABLE pretendentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco TEXT NOT NULL,
    estado_civil ENUM('solteiro', 'casado', 'divorciado', 'viuvo', 'uniao_estavel') NOT NULL,
    profissao VARCHAR(255) NOT NULL,
    renda_familiar DECIMAL(10,2) NOT NULL,
    idade_preferida_min INT NOT NULL,
    idade_preferida_max INT NOT NULL,
    genero_preferido ENUM('masculino', 'feminino', 'indiferente') NOT NULL,
    aceita_necessidades_especiais ENUM('sim', 'nao') DEFAULT 'nao',
    status ENUM('pendente', 'aprovado', 'reprovado') DEFAULT 'pendente',
    documentos TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de adoções
CREATE TABLE adocoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crianca_id INT NOT NULL,
    pretendente_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_conclusao DATE,
    status ENUM('iniciada', 'em_andamento', 'concluida', 'cancelada') DEFAULT 'iniciada',
    observacoes TEXT,
    responsavel_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (crianca_id) REFERENCES criancas(id),
    FOREIGN KEY (pretendente_id) REFERENCES pretendentes(id),
    FOREIGN KEY (responsavel_id) REFERENCES usuarios(id)
);

-- Tabela de acompanhamentos (para registrar o progresso das adoções)
CREATE TABLE acompanhamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adocao_id INT NOT NULL,
    data_acompanhamento DATE NOT NULL,
    tipo ENUM('psicologico', 'social', 'juridico') NOT NULL,
    observacoes TEXT NOT NULL,
    responsavel_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (adocao_id) REFERENCES adocoes(id),
    FOREIGN KEY (responsavel_id) REFERENCES usuarios(id)
);

-- Tabela de documentos (para armazenar documentos dos pretendentes)
CREATE TABLE documentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pretendente_id INT NOT NULL,
    tipo VARCHAR(100) NOT NULL,
    nome_arquivo VARCHAR(255) NOT NULL,
    caminho_arquivo VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pretendente_id) REFERENCES pretendentes(id)
);
