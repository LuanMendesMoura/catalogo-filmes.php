<?php

require_once __DIR__ . "\..\..\model\Filme.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    if (!empty($id)) {
        $filmeModel = new Filme();
        $sucesso = $filmeModel->excluirFilme($id);

        if ($sucesso) {
            return header("Location: listar.php?msg=sucesso");
        } else {
            return header("Location: listar.php?msg=erro");
        }
    }
}

return header("Location: listar.php");

?>