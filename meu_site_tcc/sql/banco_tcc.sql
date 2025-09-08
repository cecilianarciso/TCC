-- Banco de dados para o projeto "Um Lar Para Todos"
CREATE DATABASE IF NOT EXISTS tcc_lar DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tcc_lar;

CREATE TABLE IF NOT EXISTS instituicoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('pretendente','profissional','admin') DEFAULT 'pretendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS criancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    descricao TEXT,
    instituicao_id INT,
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS adocoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    crianca_id INT,
    status ENUM('em análise','aprovada','recusada') DEFAULT 'em análise',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (crianca_id) REFERENCES criancas(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    mensagem TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);
