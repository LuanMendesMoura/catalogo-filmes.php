<?php 

// $nome = "Fulano";

// escreve STRING e INT/LONG BOOL na tela
// echo "$nome";

// escreve na tela o tipo e valor da variavel
// var_dump($nome);

// para estruturas compostas usamos essas alternativas
// $nomes = ["João","Maria","Gabriel","Julia"];
// print_r($nomes);

?>

<?php

class Pessoa {
    public $nome;

    private $cpf;
}

$obj = new Pessoa(); // instanciando um objeto

$obj->nome = "João";
// $obj->cpf = "123445"; // não pode acessar pq é privado, (somente com metodos 'funcao')

echo "<pre>";
var_dump( $obj);
echo "</pre>";


?>