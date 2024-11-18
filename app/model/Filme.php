<?php

// Importar arquivo, pasta, codigo
require_once __DIR__. "\..\config\database.php";

// Classe que representa a tabela filme do projeto

class Filme {

    private $tabela = "filme";

    private $pdo;

    // Colunas da tabela
    public $id;
    public $nome;
    public $ano;
    public $descricao;

    // Contrutor do PHP
    public function __construct() {
        global $pdo;

        $this->pdo = $pdo;
    }

    // Método que busca todos os filmes
    public function buscarTodos() {

        $query = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetchAll();
    }

    // AULA DO GUILHERME ********************************************************************************************************
    public function findById($id) {
        $query = "SELECT * FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }
}