-- Inserir dados iniciais

-- Inserir usuários administradores
INSERT INTO usuarios (nome, email, senha, tipo) VALUES
('Administrador Sistema', 'admin@sistema.gov.br', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('Dr. Maria Silva', 'maria.silva@psi.gov.br', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'psicologo'),
('Ana Santos', 'ana.santos@social.gov.br', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assistente_social');

-- Inserir abrigos
INSERT INTO abrigos (nome, endereco, telefone, responsavel) VALUES
('Casa Lar São José', 'Rua das Flores, 123 - Centro, São Paulo - SP', '(11) 3456-7890', 'Irmã Conceição'),
('Abrigo Santa Maria', 'Av. Paulista, 456 - Bela Vista, São Paulo - SP', '(11) 2345-6789', 'Padre João'),
('Lar dos Anjos', 'Rua da Esperança, 789 - Vila Madalena, São Paulo - SP', '(11) 4567-8901', 'Dra. Fernanda');

-- Inserir crianças de exemplo
INSERT INTO criancas (nome, idade, genero, descricao, necessidades_especiais, status, abrigo_id) VALUES
('João Pedro', 8, 'masculino', 'Menino alegre e carinhoso, gosta de futebol e desenhar. Muito sociável e inteligente.', 'nao', 'disponivel', 1),
('Maria Eduarda', 6, 'feminino', 'Menina doce e criativa, adora bonecas e histórias infantis. Muito carinhosa com todos.', 'nao', 'disponivel', 1),
('Carlos Eduardo', 10, 'masculino', 'Garoto esperto e determinado, gosta de videogames e matemática. Precisa de atenção especial para deficiência auditiva.', 'sim', 'disponivel', 2),
('Ana Clara', 4, 'feminino', 'Criança muito afetuosa e brincalhona, adora música e dançar. Sempre sorrindo.', 'nao', 'disponivel', 2),
('Pedro Henrique', 12, 'masculino', 'Adolescente responsável e estudioso, gosta de ler e ajudar os menores. Líder natural.', 'nao', 'disponivel', 3),
('Sophia', 7, 'feminino', 'Menina artística e sensível, gosta de pintar e cantar. Muito observadora e inteligente.', 'nao', 'em_processo', 3);

-- Inserir pretendentes de exemplo
INSERT INTO pretendentes (nome, cpf, email, telefone, endereco, estado_civil, profissao, renda_familiar, idade_preferida_min, idade_preferida_max, genero_preferido, aceita_necessidades_especiais, status) VALUES
('Roberto e Carla Silva', '123.456.789-01', 'roberto.carla@email.com', '(11) 9876-5432', 'Rua das Acácias, 100 - Jardins, São Paulo - SP', 'casado', 'Engenheiro e Professora', 8500.00, 5, 10, 'indiferente', 'sim', 'aprovado'),
('Fernanda Costa', '987.654.321-02', 'fernanda.costa@email.com', '(11) 8765-4321', 'Av. Brigadeiro, 200 - Ibirapuera, São Paulo - SP', 'solteiro', 'Médica', 12000.00, 3, 8, 'feminino', 'nao', 'aprovado'),
('José e Mariana Oliveira', '456.789.123-03', 'jose.mariana@email.com', '(11) 7654-3210', 'Rua dos Pinheiros, 300 - Pinheiros, São Paulo - SP', 'casado', 'Advogado e Psicóloga', 15000.00, 8, 15, 'masculino', 'sim', 'pendente'),
('Luciana Santos', '321.654.987-04', 'luciana.santos@email.com', '(11) 6543-2109', 'Rua Augusta, 400 - Consolação, São Paulo - SP', 'divorciado', 'Arquiteta', 7000.00, 4, 12, 'indiferente', 'nao', 'aprovado');

-- Inserir algumas adoções de exemplo
INSERT INTO adocoes (crianca_id, pretendente_id, data_inicio, status, observacoes, responsavel_id) VALUES
(6, 1, '2025-07-15', 'em_andamento', 'Processo iniciado com sucesso. Família muito receptiva e preparada.', 2),
(3, 2, '2025-06-20', 'concluida', 'Adoção finalizada com sucesso. Criança se adaptou muito bem à nova família.', 3);

-- Inserir acompanhamentos
INSERT INTO acompanhamentos (adocao_id, data_acompanhamento, tipo, observacoes, responsavel_id) VALUES
(1, '2025-07-20', 'psicologico', 'Primeira sessão de acompanhamento. Criança demonstra boa adaptação.', 2),
(1, '2025-07-25', 'social', 'Visita domiciliar realizada. Ambiente familiar adequado e acolhedor.', 3),
(2, '2025-06-25', 'psicologico', 'Acompanhamento final. Criança totalmente adaptada e feliz.', 2);
