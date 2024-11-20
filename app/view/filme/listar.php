<?php

require_once __DIR__ . "\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

// Printa formatado no navegador
// echo "<pre>";
// print_r($filmes[1]);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main>
        <table border="1">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th>Ação</th>
            </thead>
            <tbody>
                <?php foreach ($filmes as $filme) { ?>
                    <tr>
                        <td><?php echo $filme->id ?></td>
                        <td><?php echo $filme->nome ?></td>
                        <td><?php echo $filme->ano ?></td>
                        <td><?php echo $filme->descricao ?></td>
        
                        <td>
                            <form action="visualizarFilme.php" method="GET">
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button>Detalhes</button>
                            </form>
        
                            <form action="excluirFilme.php" method="POST">
                                <input type="hidden" name="id" value="<?= $filme->id; ?>">
                                <button onclick="return confirm('Tem certaza que deseja excluir o filme?')">
                                Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <script>
        const parametros = new URLSearchParams(window.location.search)
        const tipoMensagem = parametros.get("msg")
        const notificacao = document.createElement("div")

        if (tipoMensagem === "sucesso") {
            notificacao.innerHTML = "Operação realizada com sucesso"
        } else if (tipoMensagem === "erro") {
            notificacao.innerHTML = "Erro ao realizar operação"
        }

        document.body.appendChild(notificacao)
    </script>
</body>
</html>


