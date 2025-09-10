-- Inserir dados iniciais

-- Usuários administradores
INSERT INTO usuarios (nome, email, senha, tipo, telefone, cpf) VALUES
('Administrador Sistema', 'admin@umlarparatodos.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '(11) 99999-9999', '000.000.000-00'),
('Dr. Maria Silva', 'maria.silva@psi.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'psicologo', '(11) 98888-8888', '111.111.111-11'),
('Dr. João Santos', 'joao.santos@psi.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'psicologo', '(11) 97777-7777', '222.222.222-22');

-- Abrigos
INSERT INTO abrigos (nome, endereco, cidade, estado, telefone, responsavel, capacidade) VALUES
('Casa Esperança', 'Rua das Flores, 123', 'São Paulo', 'SP', '(11) 3333-3333', 'Ana Costa', 20),
('Lar Feliz', 'Av. Brasil, 456', 'São Paulo', 'SP', '(11) 4444-4444', 'Carlos Oliveira', 15),
('Casa do Amor', 'Rua da Paz, 789', 'Campinas', 'SP', '(19) 5555-5555', 'Lucia Santos', 25);

-- Crianças disponíveis para adoção
INSERT INTO criancas (nome, data_nascimento, genero, descricao, necessidades_especiais, foto, abrigo_id) VALUES
('Ana Clara', '2018-03-15', 'feminino', 'Menina alegre e carinhosa, adora desenhar e brincar com bonecas.', 'Nenhuma', 'ana_clara.jpg', 1),
('Pedro Henrique', '2016-07-22', 'masculino', 'Garoto esperto e brincalhão, gosta de futebol e videogames.', 'Nenhuma', 'pedro_henrique.jpg', 1),
('Sofia Maria', '2019-11-08', 'feminino', 'Bebê tranquila e sorridente, muito carinhosa.', 'Nenhuma', 'sofia_maria.jpg', 2),
('Lucas Gabriel', '2017-01-30', 'masculino', 'Menino criativo, adora livros e histórias.', 'Deficiência auditiva leve', 'lucas_gabriel.jpg', 2),
('Isabella Santos', '2015-09-12', 'feminino', 'Menina responsável e estudiosa, sonha em ser professora.', 'Nenhuma', 'isabella_santos.jpg', 3);

-- Usuários pretendentes (senha padrão: 123456)
INSERT INTO usuarios (nome, email, senha, tipo, telefone, cpf) VALUES
('Carlos e Marina Ferreira', 'carlos.marina@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pretendente', '(11) 96666-6666', '333.333.333-33'),
('Roberto Silva', 'roberto.silva@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pretendente', '(11) 95555-5555', '444.444.444-44'),
('Fernanda e Paulo Costa', 'fernanda.paulo@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pretendente', '(11) 94444-4444', '555.555.555-55');

-- Dados dos pretendentes
INSERT INTO pretendentes (usuario_id, estado_civil, profissao, renda_mensal, endereco, cidade, estado, cep, tem_filhos, idade_preferida_min, idade_preferida_max, genero_preferido, aceita_necessidades_especiais, status_aprovacao) VALUES
(4, 'casado', 'Engenheiro/Professora', 8500.00, 'Rua das Palmeiras, 100', 'São Paulo', 'SP', '01234-567', FALSE, 3, 8, 'indiferente', TRUE, 'aprovado'),
(5, 'solteiro', 'Médico', 12000.00, 'Av. Paulista, 200', 'São Paulo', 'SP', '01310-100', FALSE, 0, 5, 'masculino', FALSE, 'pendente'),
(6, 'casado', 'Advogado/Psicóloga', 9500.00, 'Rua Augusta, 300', 'São Paulo', 'SP', '01305-000', TRUE, 6, 12, 'feminino', TRUE, 'aprovado');

-- Processo de adoção em andamento
INSERT INTO adocoes (crianca_id, pretendente_id, data_inicio, status, psicologo_id) VALUES
(1, 1, '2025-07-15', 'em_andamento', 2);

-- Acompanhamento do processo
INSERT INTO acompanhamentos (adocao_id, data_acompanhamento, observacoes, psicologo_id) VALUES
(1, '2025-07-20', 'Primeira visita realizada. Criança demonstrou interesse e carinho pelos pretendentes.', 2),
(1, '2025-07-27', 'Segunda visita. Adaptação está ocorrendo de forma positiva.', 2);
