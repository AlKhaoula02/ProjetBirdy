<?php
$title = "envoi";
include 'header.php';
?>




        <div class="formulaire">             
                <span>Ajoutez vos fichiers et indiquez l'adresse à laquelle les envoyer </span> 
                <form method="POST" enctype="multipart/form-data">
                  <div class ="labels">
                        <label for="file" class="label-file" onclick="reset()"> Un fichier</label>
                        <input required id="file" class="input-file" type="file" multiple="" name="fichier[]" ><br/>
                  </div>      
                  <div id="champs">
                  <div id="destinataire">
                        <label for="mail_dest">Envoyer à : </label>
                        <input  name = "mail_dest" type="email" id="email_dest" class="input_content"  placeholder="e-mail du destinataire"> <br/>  
                  </div>
                  <div id="expediteur">
                        <label for="mail_exp">Votre mail : </label>
                        <input  name = "mail_exp" type="email" id="email_exp" class="input_content"  placeholder=" votre e-mail"><br/>  
                  </div>
                  <div id="zone_message">
                        <label for="message">Message :</label>
                        <textarea name="message" type="text" id="message" placeholder="Optionnel"></textarea>
                  </div>
            </div>
            
                <label for="button" class="transfer__button" onclick="show_list()">Envoyer</label>
                <input type="submit" id="button" class="input-file" >
                </form>        
            </div>
 

    <div id="list_files" class="hide hide_mobile">
    <span class ="title_list">Vos fichiers prêts à l'envoi</span>
    <div id="p"></div>
    </div>

 <div class="nuage">

 </div>
    
    

<!-- le popup dois s'afficher quand on veut envoyer fichier
si un truc ? = quelque chose on affiche ça = oui
sinon si un truc ? = autre chose on affiche ça = non
-->

<!-- créer popup après envoi fichier -->
<?php
if (isset($_POST['ferme_pop'])) {
    $erreur = "";
}


if (isset($erreur)) {
if ($erreur == "oui") {
//   création de la div avec du contenu
?>
    <div id="mess_reussite">
            <form method="post" id="pop_form">
                <label for="close" class="fermer">X</label>
                <input type="submit" id="close" class="hide">
            </form>
            <p> Le message a été envoyé avec les fichiers</p>
               
        </div>
<?php
}
elseif ($erreur=="non") {
?>
<div id= "mess_echec">
<form method="post" id="pop_form">
                <label for="close" class="fermer">X</label>
                <input name="ferme_pop" type="submit" id="close" class="hide">
            </form>
<p> erreur dans le formulaire</p>
</div>
<?php
}
else{
    $erreur = "";
}
}
include 'footer.php';