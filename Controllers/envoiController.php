<?php
require('Models/envoi.php');
// récuperer le fichier  json dans la variable
$json="data.json";
$jsondata =file_get_contents($json);
// convertir en tableau et l'afficher
$arr_data=json_decode($jsondata,true);
// récuperer le prochain Id a insérer
$i_id = count($arr_data);
// Ajouter une nouvelle ligne dans ce tableau arr data

array_push($arr_data,["id"=>$i_id,"nom"=>"test", "date"=>"2019-12-05", "taille"=>"500"]);
$encoded = json_encode($arr_data);
file_put_contents($json, $encoded);


// 
// var_dump($arr_data[count($arr_data)-1]);

// foreach ($arr_data as $value) {
//     echo $value ["id"] .$value ["nom"]. $value ["date"].$value ["taille"]."<br>";
// }
// $nom= $_POST["nom"];


// var_dump($nom);
require('Views/envoiView.php');