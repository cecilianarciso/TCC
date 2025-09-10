<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <title>Cadastro para Adoção</title>
</head>
<body>
    <h1>Cadastro para Adoção</h1>

    <form action="processa_cadastro.php" method="post">
        <label for="nome">Nome completo:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="idade">Idade:</label><br>
        <input type="number" id="idade" name="idade" min="18" required><br><br>

        <label for="estado_civil">Estado Civil:</label><br>
        <select id="estado_civil" name="estado_civil" required>
            <option value="">Selecione</option>
            <option value="solteiro">Solteiro(a)</option>
            <option value="casado">Casado(a)</option>
            <option value="uniao_estavel">União Estável</option>
            <option value="divorciado">Divorciado(a)</option>
            <option value="viuvo">Viúvo(a)</option>
        </select><br><br>

        <label for="renda_mensal">Renda Mensal (R$):</label><br>
        <input type="number" id="renda_mensal" name="renda_mensal" step="0.01" min="0" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required pattern="\d{11}" title="Digite 11 números sem pontos ou traços"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="tel" id="telefone" name="telefone" required><br><br>

        <label for="endereco">Endereço completo:</label><br>
        <textarea id="endereco" name="endereco" rows="3" required></textarea><br><br>

        <label for="motivacao">Motivação para adoção:</label><br>
        <textarea id="motivacao" name="motivacao" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar Cadastro">
    </form>

    <p><a href="index.php">Voltar para página inicial</a></p>
</body>
</html>
