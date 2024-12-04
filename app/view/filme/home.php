<?php

require_once __DIR__ . "\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME - CATALOGO</title>

    <link rel="stylesheet" href="/catalogo-filmes/public/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="#">FILMES DB</a>
            <ul>
                <li>
                    <a href="home.php">HOME</a>
                </li>
                <li>
                    <a href="listar.php">ADM</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <div class="filmes-lista">
                <?php foreach ($filmes as $filme) { ?>
                    <div class="filme"> 
                    <?php echo"<span class='span-filme'> $filme->nome </span>" ?>
                    <img class="img" src="<?php echo $filme->urlIMG?>" alt="Imagem do filme: <?php echo $filme->nome ?>" >
                    </div>
                <?php } ?>
           </div>
        </section>
    </main>
</body>
</html>