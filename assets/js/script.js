
 //def de la variable qui recup le nom
 let recup_file = document.getElementById("file");
let affiche_list=document.getElementById("p");
let list_files=document.getElementById("list_files");

function reset() {
    let p = document.getElementsByTagName('p');
    console.log(p);
    for (let index = 0; index < p.length; index++) {
        const element = p[index];
        
        element.classList.add("hide");
    }
}

document.getElementById('file').onchange=function(){
    // On récupère la liste des fichiers
    var listeFichiers = document.getElementById('file').files;
    for ( var i = 0; i < listeFichiers.length; i ++ )
    {
        list_files.classList.remove("hide");
        let p = document.createElement("p");
        var unFichier = listeFichiers[i];
        var message = unFichier.name;
        p.innerHTML=message;    
        affiche_list.appendChild(p); 
        }
    };

let formulaire = document.getElementsByClassName('formulaire');
let message_oui = document.getElementById('mess_reussite');
let message_non = document.getElementsById('mess_echec');
if (typeof message_oui != "undefined") {
    formulaire.classList.add("blur");
}
if (typeof message_non != "undefined") {
    formulaire.classList.add("blur");
} else {
    formulaire.classList.remove("blur");
}


