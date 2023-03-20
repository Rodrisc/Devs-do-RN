<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Associado</title>
    <link rel="stylesheet" href="../index/index.css">
</head>
<body>
    <h1>Cadastrar Associado</h1>
    <form action="/model/cadastrar.php" method="post">
        <input type="text" placeholder="Nome completo" name="nome">
        <input type="email" placeholder="Email" name="email">
        <input type="text" placeholder="CPF" name="cpf" minlength="11" maxlength="11">
        <button type="submit">Cadastrar</button>
    </form>
    <?php
    ?>
    <a href="../index/index.php">voltar</a>
</body>
</html>