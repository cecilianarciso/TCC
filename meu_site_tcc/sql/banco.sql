-- Apaga o banco inteiro se existir (cuidado: remove dados!)
DROP DATABASE IF EXISTS tcc_lar;
CREATE DATABASE tcc_lar CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tcc_lar;

-- Instituições
CREATE TABLE instituicoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(200),
    telefone VARCHAR(20)
);

-- Crianças (depende de instituicoes)
CREATE TABLE criancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    descricao TEXT,
    instituicao_id INT,
    FOREIGN KEY (instituicao_id) REFERENCES instituicoes(id)
);

-- Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('pretendente','profissional','admin') DEFAULT 'pretendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Adoções (depende de usuarios e criancas)
CREATE TABLE adocoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    crianca_id INT,
    status ENUM('em_andamento','aprovada','rejeitada') DEFAULT 'em_andamento',
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (crianca_id) REFERENCES criancas(id)
);

-- Mensagens (depende de usuarios)
CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    mensagem TEXT NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
USE tcc_lar;
SELECT * FROM usuarios;
