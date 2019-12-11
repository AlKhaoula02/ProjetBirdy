<?php
require('Models/reception.php');

//  $getNomJson = $_GET["download"];
$nomJ = "upload_1575918961.zip";
//date du jour
$date_auj = date("Y-m-d");
// recup des dates en secondes
$date1 = strtotime($date_auj);

//calcul la difference entre date
function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();
 // convertit la durée obtenue en unité de temps 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
 //retourne resultat en tableau[sec][min][h][j];
    return $retour;
}
// récuperer le fichier  json dans la variable
$json = "data.json";
$json_data = file_get_contents($json);

// convertir en tableau et l'afficher
$arr_data = json_decode($json_data, true);
 
//boucler pour lire chaque nom et comparer au notre

    

foreach ($arr_data as $key => $value) {
    $json_name = $value['nom'];
    $json_date = $value['date'];
    if ( $nomJ ==  $json_name ) {
        $date2=strtotime($json_date);
        $diff_date = dateDiff($date1, $date2);
        //vérif de date json par raport à date ajd, si - de 7 j d'écart on fait href sinon ciao
        if ($diff_date["day"] <= 8)
        {
     
//création url telechargement
        $href = "assets/telechargement/".$nomJ;   
    }
        

    }
}




    




require('Views/receptionView.php');