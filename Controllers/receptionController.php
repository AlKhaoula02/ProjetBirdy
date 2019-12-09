<?php
require('Models/reception.php');

 $getNomJson = $_GET["download"];
$nomJ = "upload_1575628301";
// récuperer le fichier  json dans la variable
$json = "data.json";
$json_data = file_get_contents($json);

// convertir en tableau et l'afficher
$arr_data = json_decode($json_data, true);
 
//boucler pour lire chaque nom et comparer au notre

    

foreach ($arr_data as $key => $value) {
    $json_name = $value['nom'];
    if ( $getNomJson ==  $json_name ) {
        //création url telechargement
     $href = "assets/telechargement/".$getNomJson;   

    }
}





require('Views/receptionView.php');