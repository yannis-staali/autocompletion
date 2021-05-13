<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form_search" action="traitement.php" method="get">
        <input id="search_input" type="text" name="search">
        <input type="submit" name="submit">
    </form>

    <div id="barre"></div>

</body>
</html>

<script>

//ICI LA FONCTION QUI PERMET D'ENVOYER UNE RECHERCHE =======================
document.getElementById('form_search').addEventListener('submit', function(e) {
    e.preventDefault();
    let search_input = document.getElementById('search_input').value;

    let xhr = new XMLHttpRequest();

    xhr.onload = function() {
        console.log(this.response);
        console.log(search_input);
    }

    xhr.open("GET", "traitement.php?search="+search_input, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();

});
// =======================================================================


//ICI LA FONCTION QUI PERMET DE RECUPERER EN BDD EN TEMPS REEL ========
document.getElementById('search_input').addEventListener('input', function(e) {
    
    let barre = document.getElementById('barre');
    let search_input = document.getElementById('search_input').value;

    let empty = '';

    if(search_input !== '')
    {

        xhr = new XMLHttpRequest();

        xhr.open("GET", "traitement.php?search="+search_input, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();

        xhr.onload = function() {

            let responseParse = JSON.parse(this.response);
            console.log(responseParse);

            let txt ='';

            for(let x in responseParse)
            {
                txt += "<p id='target"+x+"' >"+responseParse[x].nom+"</p>";
            }

            barre.innerHTML = txt;

            let toto = [];

            for(let x in responseParse)
            {
                toto[x] = document.getElementById('target'+x);
                toto[x].addEventListener('click', function(e){
                   // let valueInsert = this.value;
                    console.log(this.value);
                });
            }

        }
    }
    else  barre.innerHTML = empty;
   

   
  
});
// ===========================================================================

</script>

<style>
#form_search{
    background-color: antiquewhite;
}

</style>