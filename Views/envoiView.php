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
                    <label for="file" class="label-file"> un fichier</label>
                    <input id="file" class="input-file" type="file" multiple="multiple" name="fichier[]"><br />
                    <button type="submit" class="transfer__button transfer__button--inactive" name="btn">Envoyer</button>
                </form>
            </div>

        </div>



    </div>



</div>
<?php
include 'footer.php';
