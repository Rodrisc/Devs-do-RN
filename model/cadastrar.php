<?php

include('conectarDb.php');

function cadastrar()
{
    try {
        $pdo = conectarDb();
    } catch (PDOException $e) {
        echo 'falha ao se conectar com o bd' . $e;
    }
    
    $nome =  $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data = 'current_date';

    try {
        $stmt = ("insert into associado(nome, email, cpf, dataAssociacao) values('$nome','$email', '$cpf', $data)");
        $pdo->exec($stmt);
        header("location: ../views/index/index.php");
        exit();
    } catch (PDOException $e) {
        echo "Problemas com a sua solicitação " . $e;
    }
}

cadastrar();
