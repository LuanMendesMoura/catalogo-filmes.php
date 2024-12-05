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
                    <form action="visualizarFilme.php">
                        <input type="hidden" name="id" value="<?= $filme->id; ?>">
                            <button class="card">
                                <div class="filme">
                                    <?php echo"<span class='span-filme'> $filme->nome </span>" ?>
                                    <img class="img" src="<?php echo $filme->urlIMG?>" alt="Imagem do filme: <?php echo $filme->nome ?>" >
                                </div>
                            </button>
                    </form>
                <?php } ?>
           </div>
        </section>
    </main>
</body>
</html>