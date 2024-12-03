<?php
require_once __DIR__."\..\..\model\Filme.php";

$filmeModel = new Filme();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];

    $sucesso = FALSE;

    if(!empty($id)) {
        // Fluxo para Editar

        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $descricao = $_POST["descricao"];

        $sucesso = $filmeModel->editarFilme($id, $nome, $ano, $descricao);

    } else {
        // Fluxo para Cadastro 

        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $descricao = $_POST["descricao"];
       
        $sucesso = $filmeModel->inserirFilme($nome, $ano, $descricao);
    }

    if($sucesso){
        return header("Location: listar.php?mensagem=sucesso");
    }else{
        return header("Location: listar.php?mensagem=erro");
    }


} else if($_SERVER["REQUEST_METHOD"] === "GET"){
    $filme = null;

    $filme = !empty($_GET["id"]) ? $filme = $filmeModel->findById($_GET["id"]) : new Filme();

    if(!empty($_GET["id"])) {
        // Fluxo Editar
        $filme = $filmeModel->findById($_GET["id"]);
    } else {
        // Fluxo Cadastrar
        $filme = new Filme();
    }
}

?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/catalogo-filmes/public/css/style.css">
 
</head>
<body>
    <section class="container">
        <form action="cadastro.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $filme->id ?>">

            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $filme->nome ?>">
            </div>
            <div>
                <label for="ano">Ano</label>
                <input type="text" name="ano" value="<?php echo $filme->ano ?>">
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" value="<?php echo $filme->descricao ?>">
            </div>
 
            <button>Salvar</button>
        </form>
    </section>
</body>
</html>
 
