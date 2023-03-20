<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de valor e anuidade</title>
    <link rel="stylesheet" href="/views/index/index.css">

</head>
<body>

    <h1>Cadastro de valor e anuidade</h1>

    

    <form action="/model/cadastrarAnuidade.php" method="POST">
        <input type="number" placeholder="Valor da anuidade" name="anuidade">
        <input type="number" placeholder="Ano da anuidade" name="ano">
        <button type="submit">Cadastrar</button>
    </form>

    <a href="../index/index.php">voltar</a>
    
</body>
</html>