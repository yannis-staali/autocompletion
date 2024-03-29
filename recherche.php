<?php
if(isset($_GET['search']))
{  
    $letter = substr($_GET['search'], 0, 1); 
    $connexion = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $connexion->prepare("SELECT nom, id FROM authors WHERE nom LIKE '{$letter}%' ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,300;1,400&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <title>Recherche</title>
</head>
<body>
    <header>
        <?php require_once('header.php');?>
    </header>

    <h1>Resultats de recherche</h1>
   <div class="resultat">
        <?php for($i=0; isset($result[$i]); $i++): ?>
            <div class="each_resultat">
                <a class="result_search" href="element.php?id=<?=$result[$i]->id?>"><?=$result[$i]->nom?></a>
                <!--<?= $result[$i]->nom ?> -->
                <!-- <?=$result[$i]->id?>  -->
            </div>
        <?php endfor;?>

   </div>
    <!-- Ici on bouclera avec du php et du html en affichant le nom de chaque element du resultat sous forme de a href avec dans le lien un parametre GET avec l'id en question, le lien emmenera vers la derniere page (element.php) qui affichera tous les details-->

    <script src="script.js"></script> 
</body>
</html>



<script>

//ici on pourra simplement mettre un event click sur un element html pour faire le changement de page en javascript
//avec l'id dans le get 
</script>

<style>

</style>