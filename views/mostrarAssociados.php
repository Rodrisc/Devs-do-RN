<?php

include('../model/conectarDb.php');

try {
    $pdo = conectarDb();
} catch (PDOException $e) {
    echo 'falha ao se conectar com o bd';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Associados</title>
    <link rel="stylesheet" href="/views/index/index.css">
</head>

<body>
    <h1>Mostrar Associados</h1>
    <a href="/views/index/index.php">Voltar</a>
    <form action="../model/checkout.php" method="POST">
        <input type="number" name="id" placeholder="Digite o ID do usuário"></input>
        <button type="submit">Checkout</button>
    </form>
    <ul>

        <?php
        $stmt = $pdo->query("SELECT * FROM associado where datacheckout is null order by nome");

        // Loop através de cada registro e exiba-o na página
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            echo "<li>Nome: " . $row['nome'] . " ";
            echo '<br/>';
            echo "ID do associado: ". $row['idassociado'];
            echo '<br/>';
            echo "Email: " . $row['email'] . " ";
            echo '<br/>';
            echo "CPF: " . $row['cpf'] . "</li>";
            echo "Data da Associação: " . $row['dataassociacao'];
            echo '<hr/>';
        }

        ?>

    </ul>

</body>

</html>