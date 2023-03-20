<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verificar devedor e pagador</title>
    <link rel="stylesheet" href="../index/index.css">
</head>

<body>
    <h1>Verificar pagador e devedor</h1>
    <p>Selecione a opção abaixo desejada</p>
    <a href="../index/index.php">voltar</a>
    <form action="/model/verificarDevedor.php" method="POST">
        
        <label for="opcao_sim">Pagador</label>
        <input type="radio"  name="opcao" value="sim">

        <label for="opcao_nao">Devedor</label>
        <input type="radio"  name="opcao" value="não">

        <button type="submit">Requistar</button>

    </form>
</body>

</html>