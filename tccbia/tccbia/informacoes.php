<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Informações Detalhadas sobre Adoção</title>
    <link rel="stylesheet" href="style3.css" />
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <div class="top-row">
                <a href="index.php" class="logo">Um Lar Para Todos</a>
                <button class="nav-toggle" aria-label="Abrir menu">
                    <span class="hamburger"></span>
                </button>
            </div>
            <ul class="nav-links">
                <li><a href="index.php#requisitos">Requisitos</a></li>
                <li><a href="index.php#documentos">Documentos</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
            </ul>
        </div>
    </nav>

    <main class="container" style="margin-top: 120px;">
        <h1>Informações Detalhadas sobre Adoção no Brasil</h1>

        <section class="section">
            <h2>Artigos Científicos</h2>
            <ul>
                <li><a href="https://www.scielo.br/scielo.php?script=sci_arttext&pid=S0104-40362020000100001" target="_blank" rel="noopener">Adoção e o desenvolvimento psicológico da criança</a></li>
                <li><a href="https://www.revistas.usp.br/rpdm/article/view/157539" target="_blank" rel="noopener">Aspectos jurídicos da adoção no Brasil</a></li>
                <li><a href="https://www.scielo.br/scielo.php?script=sci_arttext&pid=S0102-44502019000200123" target="_blank" rel="noopener">Impactos sociais da adoção tardia</a></li>
            </ul>
        </section>

        <section class="section">
            <h2>Leis e Normativas</h2>
            <ul>
                <li><a href="http://www.planalto.gov.br/ccivil_03/leis/l8069.htm" target="_blank" rel="noopener">Estatuto da Criança e do Adolescente (ECA) - Lei nº 8.069/1990</a></li>
                <li><a href="https://www.cnj.jus.br/programas-e-acoes/sistema-nacional-de-adocao-e-acolhimento-sna/" target="_blank" rel="noopener">Sistema Nacional de Adoção e Acolhimento (SNA) - CNJ</a></li>
                <li><a href="https://www.jusbrasil.com.br/topicos/10611012/lei-da-adocao" target="_blank" rel="noopener">Legislação complementar sobre adoção</a></li>
            </ul>
        </section>

        <section class="section">
            <h2>Outros Recursos Úteis</h2>
            <ul>
                <li><a href="https://www.conselho.saude.gov.br/" target="_blank" rel="noopener">Conselho Nacional dos Direitos da Criança e do Adolescente</a></li>
                <li><a href="https://www.mds.gov.br/" target="_blank" rel="noopener">Ministério da Cidadania - Adoção</a></li>
                <li><a href="https://www.unicef.org/brazil/" target="_blank" rel="noopener">UNICEF Brasil</a></li>
            </ul>
        </section>

        <p><a href="index.php" class="btn-primary">Voltar para a página inicial</a></p>
    </main>

    <footer class="footer">
        <p>© 2025 Um Lar ParaTodos - Todos os direitos reservados</p>
    </footer>

    <script>
        // Script do menu hamburguer (igual ao index.php)
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('nav-links-visible');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('nav-links-visible');
            });
        });
    </script>

</body>
</html>
