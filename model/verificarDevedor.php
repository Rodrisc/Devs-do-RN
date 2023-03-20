<link rel="stylesheet" href="../views/index/index.css">
<h1>Nomes</h1>
<ol>
<?php

include('./conectarDb.php');


function verificarDevedor(){

    try{
        $pdo = conectarDb();
    } catch(PDOException $e){
        echo 'falha ao se conectar com o bd' . $e;
    }

    $opcao = $_POST['opcao'];
    query($pdo, $opcao);

}

function query($pdo, $opcao){

   try{
    $stmt = $pdo->query("SELECT nome FROM associado a
    INNER JOIN pagamento b ON b.idassociado = a.idassociado
    WHERE  b.pago = '$opcao' and b.idanuidade = (select idanuidade from anuidade where ano = extract(year from current_date))");
   } catch(PDOException $e){
    echo "Problemas com a sua solicitação " . $e;
   }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo '<li>Nome: '. $row['nome'];
        echo '</li>';
        echo '<br/>';
    }
}

verificarDevedor();

?>

</ol>