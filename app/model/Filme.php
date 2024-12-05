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
    public $urlIMG;

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

    public function buscarPorId($id) {

        $query = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetch();
    }

    public function excluirFilme($id) {

        $query = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function inserirFilme($nome,$ano,$descricao,$urlIMG) {

        $query = "INSERT INTO $this->tabela (nome,ano,descricao,urlIMG) VALUES (:nome, :ano, :descricao, :urlIMG)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":ano", $ano);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":urlIMG", $urlIMG);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function editarFilme($id, $nome, $ano, $descricao, $urlIMG){

        $query = "UPDATE $this->tabela SET nome=:nome, ano=:ano, descricao=:descricao, urlIMG=:urlIMG WHERE id=:id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':urlIMG', $urlIMG);
        $stmt->execute();

        return $stmt->rowCount() > 0;        
    }



}