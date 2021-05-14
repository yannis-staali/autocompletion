<?php 

if(isset($_GET["id"]))
{
    $id = $_GET["id"];

    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT * FROM authors WHERE id = {$id} ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    // var_dump($result);

    $response = json_encode($result);

    // header('Location: recherche.php');
    // die();
    echo $response;
    // echo 'yo';

}

// var_dump($result);
if(isset($_GET["auto"]))
{
    $a = ucfirst($_GET["auto"]);

    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT nom FROM authors WHERE nom LIKE '{$a}%' ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    // var_dump($result);

    $response = json_encode($result);
    // echo $response;
    echo $response;

}




