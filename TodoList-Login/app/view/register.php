<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar conta</title>
</head>
<body>
    <h1>Criar conta</h1>

    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form action="index.php?action=registrar" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </p>
        <button type="submit">Criar conta</button>
    </form>

    <p><a href="index.php?action=login">Já tenho conta</a></p>
</body>
</html>
