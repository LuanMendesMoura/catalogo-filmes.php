<?php

require_once __DIR__ . "/../../config/env.php";
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../model/Filme.php";
   
$id = $_GET["id"];


$filmeModel = new Filme();
$filme = $filmeModel->findById($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Detalhes</h1>
        <h4>Nome</h4>
        <span><?php echo $filme['nome']; ?></span>
        <h4>Ano</h4>
        <span><?php echo $filme['ano'];?></span>
        <h4>Descrição</h4>
        <span><?php echo $filme['descricao'];?></span>
</body>
</html>