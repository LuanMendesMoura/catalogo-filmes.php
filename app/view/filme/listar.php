<?php

require_once __DIR__ . "\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

// Printa formatado no navegador
// echo "<pre>";
// print_r($filmes[1]);
// echo "</pre>";

// var_dump($filmes)

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela De Filmes</title>

    <link rel="stylesheet" href="/catalogo-filmes/public/css/style.css">
</head>
<body>
    <header>
        <nav>
            <!-- <a class="logo" href="#">Meu Site</a> -->
            <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="listar.php">Listar</a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <h2>Filme</h2>

        <div class="acao">
            <a href="cadastro.php">
                <button>
                    <span>Novo</span>
                    <span class="material-symbols-outlined">
                        add
                    </span>
                </button>
            </a>
        </div>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th></th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($filmes as $filme) { ?>
                    <tr>
                        <td><?php echo $filme->id ?></td>
                        <td><?php echo $filme->nome ?></td>
                        <td><?php echo $filme->ano ?></td>
                        <td><?php echo $filme->descricao ?></td>
                        <td><img class="img" src="<?php echo $filme->urlIMG?>" alt="Imagem do filme: <?php echo $filme->nome ?>" ></td>
            
                        <td>
                            <form action="visualizarFilme.php" method="GET">
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        visibility
                                    </span>
                                </button>
                            </form>
            
                            <form action="cadastro.php" method="GET">
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="excluirFilme.php" method="POST">
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button onclick="return confirm('Tem certaza que deseja excluir o filme?')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <script src="/catalogo-filmes/public/js/main.js" ></script>
</body>
</html>


