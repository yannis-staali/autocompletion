
let idInput = document.getElementById('idInput');
let getId = idInput.value;

//ICI LA FONCTION QUI PERMET D'ENVOYER UNE RECHERCHE =======================
document.getElementById('form_search').addEventListener('submit', function(e) {
    e.preventDefault();
    let search_input = document.getElementById('search_input').value;

    //let idSearch= document.getElementById('idInput').value;

    //console.log(idSearch);
    
    if(search_input !== '')
    {
        // let xhr = new XMLHttpRequest();
        window.location = "recherche.php?search="+search_input;
        
        // xhr.onload = function() {
            // console.log(this.response);
            // // console.log(search_input);
        
        // }

        // xhr.open("GET", "traitement.php?id="+idSearch, true);
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.send();
    }
});
// =======================================================================


//ICI LA FONCTION QUI PERMET DE RECUPERER EN BDD EN TEMPS REEL ========
document.getElementById('search_input').addEventListener('input', function(e) {
    
    let barre = document.getElementById('barre');
    let inputZone = document.getElementById('search_input');
    let search_input = inputZone.value;

    let inputZoneId = document.getElementById('idInput');

    console.log(search_input);
    
    let empty = '';

    if(search_input !== '')
    {

        xhr = new XMLHttpRequest();

        //ici la requete recupere a chaque fois ce qui est ecrit dans l'input et requete en temps reel
        xhr.open("GET", "traitement.php?auto="+search_input, true);
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
            //generation du html
            barre.innerHTML = txt;

            let toto = [];
            let inputZone = document.getElementById('search_input');

            for(let x in responseParse)
            {
                toto[x] = document.getElementById('target'+x);
                toto[x].addEventListener('click', function(e){
                   let valueInsert = this.textContent;  
                //    inputZone.textContent = valueInsert;
                //    inputZone.placeholder = valueInsert;
                   inputZone.value = valueInsert;
                   inputZoneId.value = responseParse[x].id
                //    console.log(inputZone);
                });
            }

            // let recupId =[];

            // for(let x in responseParse)
            // {
            //     recupId[x] = responseParse[x].id;
            //     //console.log(recupId[x]);
            // }

        }
    }
    //on remet l'autocompletion a zero
    else  barre.innerHTML = empty;
   

   
  
});
// ===========================================================================

