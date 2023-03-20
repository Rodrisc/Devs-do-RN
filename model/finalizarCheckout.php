<?php

include('./conectarDb.php');

try{
    $pdo = conectarDb();

}catch(PDOException $e){
    echo 'falha ao se conectar com o bd' . $e;
}

$nome = $_POST['nome'];

try {
    $stmt = ("update associado set datacheckout = current_date  where  nome = '$nome'");
    $pdo->exec($stmt);
    header("location: ../views/index/index.php");
    exit();
} catch (PDOException $e) {
    echo "Problemas com a sua solicitação " . $e;
}

?>