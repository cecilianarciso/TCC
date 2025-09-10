# Sistema Um Lar Para Todos

Sistema de adoção desenvolvido em PHP puro com programação orientada a objetos, baseado no modelo de negócio apresentado no TCC.

## 📋 Funcionalidades

### Principais Recursos
- **Cadastro de Crianças**: Gerenciamento completo de crianças disponíveis para adoção
- **Gestão de Pretendentes**: Cadastro, avaliação e aprovação de pretendentes
- **Processos de Adoção**: Acompanhamento completo do processo de adoção
- **Sistema de Usuários**: Diferentes níveis de acesso (Admin, Psicólogo, Pretendente)
- **Dashboard Administrativo**: Visão geral e estatísticas do sistema
- **Relatórios**: Geração de relatórios e acompanhamentos

### Tipos de Usuário
1. **Administrador**: Acesso completo ao sistema
2. **Psicólogo**: Avaliação de pretendentes e acompanhamento de processos
3. **Pretendente**: Cadastro e acompanhamento do próprio processo
4. **Abrigo**: Cadastro e gerenciamento de crianças

## 🚀 Instalação

### Pré-requisitos
- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx)

### Passos para Instalação

1. **Clone ou baixe o projeto**
   \`\`\`bash
   git clone [url-do-repositorio]
   cd sistema-adocao-php
   \`\`\`

2. **Configure o banco de dados**
   - Crie um banco de dados MySQL
   - Execute o script `database/schema.sql` para criar as tabelas
   - Execute o script `database/seed.sql` para inserir dados iniciais

3. **Configure a conexão com o banco**
   - Edite o arquivo `config/Database.php`
   - Ajuste as credenciais de conexão:
     \`\`\`php
     private $host = 'localhost';
     private $db_name = 'sistema_adocao';
     private $username = 'seu_usuario';
     private $password = 'sua_senha';
     \`\`\`

4. **Configure o servidor web**
   - Aponte o DocumentRoot para a pasta do projeto
   - Certifique-se de que o PHP está habilitado

5. **Acesse o sistema**
   - Abra o navegador e acesse: `http://localhost/sistema-adocao-php`

## 👥 Usuários Padrão

### Administrador
- **Email**: admin@umlarparatodos.com
- **Senha**: 123456

### Psicólogos
- **Email**: maria.silva@psi.com / **Senha**: 123456
- **Email**: joao.santos@psi.com / **Senha**: 123456

### Pretendentes
- **Email**: carlos.marina@email.com / **Senha**: 123456
- **Email**: roberto.silva@email.com / **Senha**: 123456
- **Email**: fernanda.paulo@email.com / **Senha**: 123456

## 🏗️ Estrutura do Projeto

\`\`\`
sistema-adocao-php/
├── config/
│   └── Database.php              # Configuração do banco de dados
├── models/
│   ├── Usuario.php               # Modelo de usuário
│   ├── Crianca.php              # Modelo de criança
│   ├── Pretendente.php          # Modelo de pretendente
│   └── Adocao.php               # Modelo de adoção
├── controllers/
│   ├── AuthController.php       # Controlador de autenticação
│   ├── CriancaController.php    # Controlador de crianças
│   ├── PretendenteController.php # Controlador de pretendentes
│   └── AdocaoController.php     # Controlador de adoções
├── views/
│   ├── auth/                    # Páginas de autenticação
│   ├── admin/                   # Páginas administrativas
│   ├── psicologo/              # Páginas do psicólogo
│   ├── pretendente/            # Páginas do pretendente
│   └── includes/               # Componentes reutilizáveis
├── assets/
│   ├── css/                    # Arquivos CSS
│   ├── js/                     # Arquivos JavaScript
│   └── images/                 # Imagens do sistema
├── database/
│   ├── schema.sql              # Estrutura do banco de dados
│   └── seed.sql                # Dados iniciais
├── uploads/                    # Arquivos enviados pelos usuários
├── index.php                   # Página inicial
└── README.md                   # Este arquivo
\`\`\`

## 🎨 Design

O sistema utiliza as cores da logo TCC:
- **Primária**: #e91e63 (Rosa)
- **Secundária**: #9c27b0 (Roxo)
- **Accent**: #ff4081 (Rosa claro)
- **Background**: Tons de rosa claro (#fce4ec, #f3e5f5)

## 🔧 Tecnologias Utilizadas

- **Backend**: PHP 7.4+ (Programação Orientada a Objetos)
- **Banco de Dados**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Autenticação**: Sessions PHP com hash de senhas
- **Arquitetura**: MVC (Model-View-Controller)

## 📊 Funcionalidades por Módulo

### Módulo de Crianças
- Cadastro completo com foto
- Listagem com filtros
- Acompanhamento de status
- Histórico de adoções

### Módulo de Pretendentes
- Cadastro detalhado
- Sistema de aprovação
- Compatibilidade com crianças
- Documentação necessária

### Módulo de Adoções
- Início de processo
- Acompanhamento psicológico
- Relatórios de progresso
- Finalização de adoção

### Módulo Administrativo
- Dashboard com estatísticas
- Gestão de usuários
- Relatórios gerenciais
- Configurações do sistema

## 🔒 Segurança

- Senhas criptografadas com password_hash()
- Proteção contra SQL Injection (PDO)
- Sistema de sessões seguro
- Controle de acesso por níveis
- Validação de dados de entrada

## 📈 Próximas Funcionalidades

- [ ] Sistema de notificações por email
- [ ] Chat entre pretendentes e psicólogos
- [ ] App mobile
- [ ] Integração com WhatsApp
- [ ] Sistema de doações
- [ ] Relatórios avançados com gráficos

## 🤝 Contribuição

Para contribuir com o projeto:

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

## 📞 Contato

Sistema desenvolvido para o TCC "Um Lar Para Todos"

- **Projeto**: Sistema de Adoção Digital
- **Data**: 30/07/2025
- **Objetivo**: Conectar crianças órfãs com famílias dispostas a adotar

---

**Um Lar Para Todos** - Transformando vidas através da tecnologia e do amor! ❤️
