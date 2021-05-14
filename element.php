<?php

if(isset($_GET['id']))
{
    $id = $_GET["id"];

    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT * FROM authors WHERE id = {$id} ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    // echo '<pre>';
    // var_dump($result);
    // echo '<pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php require_once('header.php');?>
    </header>

    <h1>Fiche auteur</h1>
    <div class="each">
        <p>Nom : <?= $result[0]->nom ?></p>
        <p>Adresse : <?= $result[0]->adresse ?></p>
        <p>Age : <?= $result[0]->age ?></p>
        <p>Mail : <?= $result[0]->mail ?></p>
    </div>   

    <script src="script.js"></script> 
</body>
</html>

<style>
.each{
    border: solid black 1px;
    width: 20%;
    margin: auto;
    text-align:center;
}

#form_search{
    background-color: antiquewhite;
}

p:hover{
    cursor:pointer;
    background-color: grey;
}
p{
    margin : 0;
    padding: 0.2rem;
}
</style>