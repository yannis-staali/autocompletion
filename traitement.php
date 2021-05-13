<?php 

if(isset($_GET["search"]))
{
    $a = ucfirst($_GET["search"]);

    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT * FROM authors WHERE nom LIKE '{$a}%' ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    // var_dump($result);

    $response = json_encode($result);
    echo $response;

}






?>