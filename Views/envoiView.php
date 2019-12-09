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
                        <label for="file" class="label-file" onclick="reset()"> un fichier</label>
                        <input required id="file" class="input-file" type="file" multiple="" name="fichier[]" ><br/>
                  </div>      
                    <label  class="transfer__button transfer__button--inactive" onclick="show_list()">Envoyer</label>
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