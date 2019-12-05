<?php
$title = "envoi";
include 'header.php';
?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

        <div class="formulaire">             
                <span>Transférer : </span> 
                <form>
                    <label for="file" class="label-file"> un fichier</label>
                    <input id="file" class="input-file" type="file" multiple="" name="fichier"><br/>
                    <label for="file-dossier" class="label-file">un dossier</label>
                    <input id="file-dossier" class="input-file" tabindex="-1" type="file" multiple="" webkitdirectory="webkitdirectory" directory="directory" name="dossier">
                </form>        
                <button type="submit" class="transfer__button transfer__button--inactive">Envoyer</button>
            </div>
 

        </div>



    </div>



</div>
<?php
include 'footer.php';