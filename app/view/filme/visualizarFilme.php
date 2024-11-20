<?php

require_once __DIR__ . "/../../model/Filme.php";
   
$id = $_GET["id"];
if ($id == "") {
    return header("Location: listar.php");
}

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
    <h2>Detalhes do Filme</h2>

    <h3>Nome: <?php echo $filme->nome; ?> </h3>
    <p>Ano: <?php echo $filme->ano;?> </p>
    <p>Descrição: <?php echo $filme->descricao;?> </p>

    <!--voltar para a pagina listar.php -->
    
    <form action="listar.php" method="GET">
        <button>Voltar</button>
    </form>
</body>
</html>