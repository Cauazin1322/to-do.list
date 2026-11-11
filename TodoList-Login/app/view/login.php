<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Entrar</h1>

    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($erro); ?></p>
    <?php endif; ?>

    <form action="index.php?action=autenticar" method="POST">
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </p>
        <button type="submit">Entrar</button>
    </form>

    <p><a href="index.php?action=registro">Criar conta</a></p>
</body>
</html>
