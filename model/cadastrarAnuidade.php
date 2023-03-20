<?php

include('conectarDb.php');

function cadastrarAnuidade(){

    try{
        $pdo = conectarDb();
    } catch(PDOException $e){
        echo 'falha ao se conectar com o bd' . $e;
        
    }

    $anuidade = $_POST['anuidade'];
    $ano = $_POST['ano'];

    try{
        $stmt = ("insert into  anuidade(valor, ano) values($anuidade, $ano)");
        $pdo->exec($stmt);
        header("location: ../views/index/index.php");
        exit();
    } catch(PDOException $e){
        echo "Problemas com a sua solicitação " . $e;
        
    }

}



cadastrarAnuidade();