<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar valor da anuidade</title>
    <link rel="stylesheet" href="/views/index/index.css">
</head>
<body>
    <h1>Alterar Valor da anuidade</h1>
    <form action="/model/alterarAnuidade.php" method="POST">
        <input placeholder="Digite o ano" type="number" name="ano">
        <input placeholder="Digite o novo valor" type="number" name="valor">
        <button type="submit">Atualizar</button>
    </form>

    <a href="../index/index.php">voltar</a>
</body>
</html>