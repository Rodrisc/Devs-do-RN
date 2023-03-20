<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <link rel="stylesheet" href="../views/index/index.css">
</head>

<body>
    <?php

    include('./conectarDb.php');

    try {
        $pdo = conectarDb();
    } catch (PDOException $e) {
        echo'falha ao se conectar com o bd' . $e;
    }

    $id = $_POST['id'];

    try {
        $stmt = $pdo->query("SELECT distinct nome, ano, valor, 
    SUM(valor) OVER (PARTITION BY nome ORDER BY ano) AS total_por_nome
--        SUM(valor) OVER () AS total_geral
    FROM (
    SELECT a.nome, extract(year FROM CAST('01-01-' || c.ano AS DATE)) AS ano, c.valor
    FROM associado a
    INNER JOIN pagamento b ON a.idassociado = b.idassociado
    INNER JOIN anuidade c ON b.idanuidade = c.idanuidade
    WHERE b.pago = 'não' and a.idassociado = '$id'
    ) sub
   ORDER BY nome, ano;");
    } catch (PDOException $e) {
        echo "Problemas com a sua solicitação " . $e;
    }

    echo "<table>";
    echo "<tr><th>Nome</th><th>Ano</th><th>Valor</th><th>Valor total</th></tr>";

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nome = $usuarios[0]['nome'];

    foreach($usuarios as $linha) {
        
        echo "<tr><td>" . $linha["nome"] . "</td><td>" . $linha["ano"] . "</td><td>" . $linha["valor"] . "</td><td>" . $linha["total_por_nome"] . "</td></tr>";
    }

    echo "</table>";
    
    ?>

    <form action="../model/finalizarCheckout.php" method="POST">
        <input type="hidden" name="nome"  value="<?php echo $nome ?>" >
        <button type="submit">Finalizar</button>
    </form>

</body>

<div id="resultado"></div>

</html>