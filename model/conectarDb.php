<?php
function conectarDb()
{
    // exemplo de como deve ser preenchido
    $endereco = 'localhost';
    $banco = 'meu_database';
    $usuario = 'postgres';
    $senha = 1234;

    try {
        $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        return $pdo;
    } catch (PDOException $e) {
        // echo 'falha ao se conectar';
        die($e->getMessage());
        return 'falha ao se conectar com o bd' . $e;
    }
}
