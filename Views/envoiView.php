<?php
$title = "envoi";
include 'header.php';
?>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12">

            <div class="formulaire">
                <div class="">
                    <span>Ajoutez des fichiers</span>
                </div>
                <form method="post" action="index.php?page=envoi">
                    <label for="fichier" class="label-file">
                    </label><input name="nom" class="input-file" type="texte">
                    <label for="file" class="label-file">
                    </label><input  class="input-file" type="file" multiple="">
                    <label for="file" class="label-file">
                    </label><input class="input-file" tabindex="-1" type="file" multiple="" webkitdirectory="webkitdirectory" directory="directory">
                    <input class="" type="submit" value="Envoyer le formulaire">
                </form>
            </div>


        </div>



    </div>



</div>
<?php
include 'footer.php';
