<?php
$title = "envoi";
include 'header.php';
?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

        <div class="formulaire">             
                <span>Transférer : </span> 
                <form method="post" action="index.php?page=envoi" enctype="multipart/form-data">
                  <div class ="labels">
                        <label for="file" class="label-file" onclick="reset()"> Un fichier</label>
                        <input required id="file" class="input-file" type="file" multiple="" name="fichier[]" ><br/>
                  </div>      
                  <div id="champs">
                  <label for="mail_dest">Envoyer à : </label>
                  <input  name = "mail_dest" type="email" id="email_dest" class="input_content"  placeholder="saisissez l'adresse du destinataire ici "> <br/>  
                  
                  <label for="mail_exp">Votre mail : </label>
                  <input  name = "mail_exp" type="email" id="email_exp" class="input_content"  placeholder="saisissez ici votre adresse mail ici"><br/>  
                   
                  <div id="mail_info" >
                  <label for="message">Message :</label>
                  <textarea name="message" type="text" id="message" placeholder="Optionnel"></textarea>
                </div>
            
            </div>
            
                <label for="button" class="transfer__button transfer__button--inactive" onclick="show_list()">Envoyer</label>
                <input type="submit" id="button" class="input-file" >
                </form>        
            </div>
 

        </div>



    </div>
    <div id="list_files" class="hide">
    <span class ="title_list">Vos fichiers prêts à l'envoi</span>
    <div id="p"></div>
    </div>


</div>
<?php
include 'footer.php';