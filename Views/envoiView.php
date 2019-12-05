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
                <form>
                <label for="file" class="label-file">
                    </label><input class="input-file" type="file" multiple="">
                    <label for="file" class="label-file">
                    </label><input class="input-file" tabindex="-1" type="file" multiple="" webkitdirectory="webkitdirectory" directory="directory">
                </form>
                        
                            <button type="button" disabled="" class="transfer__button transfer__button--inactive">Transférer</button>
                            </div>
 

        </div>



    </div>



</div>
<?php
include 'footer.php';