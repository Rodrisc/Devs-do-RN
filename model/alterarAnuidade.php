<?php
include('conectarDb.php');

function alterarAnuidade()
{
    try {
        $pdo = conectarDb();
    } catch (PDOException $e) {
        echo 'falha ao se conectar com o bd' . $e;
        print($e);
    }

    $ano = $_POST['ano'];
    $valor = $_POST['valor'];

    try {
        $stmt = ("update anuidade set valor = $valor where ano = $ano");
        $pdo->exec($stmt);
        header("location: ../views/index/index.php");
        
        exit();
    } catch (PDOException $e) {
        echo "Problemas com a sua solicitação " . $e;
    }
}

alterarAnuidade();
?>