<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <div class="resultat"></div>
    <!-- Ici on bouclera avec du php en affichant le nom de chaque element du resultat sous forme 
    de a href avec dans le lien un parametre GET avec l'id en question, le lien emmenera vers la derniere page (element.php) qui affichera tous les details-->
</body>
</html>

<?php

if(isset($_GET['search']))
{
    //
    $letter = substr($_GET['search'], 0, 1); 

    var_dump($letter);

    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT nom, id FROM authors WHERE nom LIKE '{$letter}%' ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

     var_dump($result);

    // $response = json_encode($result);
    // // echo $response;
    // echo $response;
}

?>

<script>

//ici on pourra simplement mettre un event click sur un element html pour faire le changement de page en javascript
//avec l'id dans le get 
</script>