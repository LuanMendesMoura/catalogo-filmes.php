<?php

$host = "localhost";
$port = "3306";
$dbName = "filmesdb";
$user = "root";
$pass = "";

$connUrl = "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4";

$pdo = new PDO($connUrl, $user, $pass);

$query = "SELECT * FROM filme";
$stmt = $pdo->prepare($query);
$stmt->execute();

$filmes = $stmt->fetchAll();

//printa formatado no navegador
// echo "<pre>";
// print_r($filmes[1]);
// echo "</pre>";

foreach ($filmes as $filme) {
    echo "
        <tr>
            <td>$filme['id']</td>
            <td>$filme['Nome']</td>
            <td>$filme['Ano']</td>
            <td>$filme['Descricao']</td>
        </tr>
    ";
}

?>

<table border="1">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Ano</th>
        <th>Descrição</th>
    </thead>

    <tbody>

    </tbody>
</table>