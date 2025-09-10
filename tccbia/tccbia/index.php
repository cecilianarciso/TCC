<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Um Lar Para Todos</title>
    <link rel="stylesheet" href="style2.css" />
</head>
<body>

<nav class="navbar">
    <div class="container">
        <div class="top-row">
            <a href="#" class="logo">Um Lar Para Todos</a>
            <button class="nav-toggle" aria-label="Abrir menu">
                <span class="hamburger"></span>
            </button>
        </div>
        <ul class="nav-links">
            <li><a href="#requisitos">Requisitos</a></li>
            <li><a href="#documentos">Documentos</a></li>
            <li><a href="cadastro.php">Cadastro</a></li>
        </ul>
    </div>
</nav>


    <div id="background-carousel" class="background-carousel">
    <div class="content">
        <h1>Como Adotar uma Criança no Brasil</h1>
        <p>Informações, requisitos e cadastro para você realizar o sonho da adoção.</p>
        <a href="informacoes.php" class="btn-primary">Saiba Mais</a>
    </div>
</div>


    </header>

    <main class="container">
        <section id="requisitos" class="section">
            <h2>Requisitos para adoção</h2>
            <ul>
                <li>Ser maior de 18 anos.</li>
                <li>Ter no mínimo 16 anos de diferença em relação à criança/adolescente.</li>
                <li>Estabilidade familiar e financeira para oferecer uma vida digna.</li>
                <li>Não possuir antecedentes criminais.</li>
                <li>Ser avaliado positivamente em estudo social e psicológico.</li>
            </ul>
        </section>

        <section id="documentos" class="section">
            <h2>Documentos necessários</h2>
            <ul>
                <li>Cópia autenticada da certidão de nascimento ou casamento (ou declaração de união estável).</li>
                <li>Cópia da cédula de identidade e CPF.</li>
                <li>Comprovante de renda e residência.</li>
                <li>Atestados de sanidade física e mental.</li>
                <li>Certidão negativa de distribuição cível.</li>
                <li>Certidão de antecedentes criminais.</li>
            </ul>
        </section>
    </main>

    <footer class="footer">
        <p>© 2025 AdoteJá - Todos os direitos reservados</p>
    </footer>

    <script src="carousel.js"></script>
    <script>
        // Navbar toggle para mobile
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('nav-links-visible');
        });

        // Scroll suave para links da navbar
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', e => {
                if(link.hash) {
                    e.preventDefault();
                    document.querySelector(link.hash).scrollIntoView({ behavior: 'smooth' });
                    navLinks.classList.remove('nav-links-visible');
                }
            });
        });
    </script>
    <script>
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('nav-links-visible');
    });

    // Fecha menu ao clicar em algum link (mobile)
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('nav-links-visible');
        });
    });
</script>

    <script src="background-carousel.js"></script>

</body>
</html>
