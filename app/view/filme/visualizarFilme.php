<?php

require_once __DIR__ . "/../../model/Filme.php";
   
$id = $_GET["id"];
if ($id == "") {
    return header("Location: listar.php");
}

$filmeModel = new Filme();
$filme = $filmeModel->buscarPorId($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="/catalogo-filmes/public/css/style.css">

</head>
<body>
    <section class="container-view">
        <div class="view">
            <h2>Detalhes do Filme</h2>
            <h3>Nome: <?php echo $filme->nome; ?> </h3>
            <p>Ano: <?php echo $filme->ano;?> </p>
            <p>Descrição: <?php echo $filme->descricao;?> </p>
            <a href="listar.php">
                <button>
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>
                </button>
            </a>
        </div>
        <div class="view">
            <img class="imgView" src="<?php echo $filme->urlIMG?>" alt="Imagem do filme: <?php echo $filme->nome ?>" >
        </div>
        <!--voltar para a pagina listar.php -->
        
    </section>
</body>
</html>