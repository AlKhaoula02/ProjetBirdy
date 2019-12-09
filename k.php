<?php
require('Models/envoi.php');

$error = "";
$uploads_dir = './assets/telechargements/';


if (isset($_FILES['fichier'])) {
    $zip = new ZipArchive(); //Variable de zippage
    // Récuperer données du formulaire
    for ($i = 0; $i < count($_FILES['fichier']['tmp_name']); $i++;) {
    }
}





require('Views/envoiView.php');