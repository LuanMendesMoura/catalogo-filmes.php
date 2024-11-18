<?php

require_once __DIR__ . "\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

// Printa formatado no navegador
// echo "<pre>";
// print_r($filmes[1]);
// echo "</pre>";

?>

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
                    <form action="visualizar.php" method="GET">
                        <input type="hidden" name="id" value="<?= $filme->id; ?>">
                        <button title="detalhes">
                            <span class="material-symbols-outlined">
                                Detalhes
                            </span>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>