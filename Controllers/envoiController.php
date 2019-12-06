<?php
require('Models/envoi.php');
$destinataire="";
$expediteur="";
$sujet="";

$error = "";
$uploads_dir = './assets/telechargements/';


if (isset($_FILES['fichier'])) {
    $zip = new ZipArchive(); //Variable de zippage
    // Récuperer données du formulaire
    for ($i = 0; $i < count($_FILES['fichier']['tmp_name']); $i++) {

        // Si plus de 1 fichier
        if ((count($_FILES['fichier']['tmp_name'])) > 1) {
            $zip_name = "upload_" . time() . ".zip";
            // creer le zip
            if ($zip->open($uploads_dir . $zip_name, ZipArchive::CREATE) !== TRUE) {
                $error = "Désolé, le  Zip n'a pas été généré.<br/>";
            }
            // recuperer le zip
            $zip->addFromString($_FILES['fichier']['name'][$i], file_get_contents($_FILES['fichier']['tmp_name'][$i]));
            $zip->close();
            $success = basename($zip_name);

            //ajout du zip au json
            $date =  date("Y-m-d");
            // récuperer le fichier  json dans la variable
            $json = "data.json";
            $jsondata = file_get_contents($json);
            // convertir en tableau et l'afficher
            $arr_data = json_decode($jsondata, true);
            // récuperer le prochain Id a insérer
            $i_id = count($arr_data);
            // Ajouter une nouvelle ligne dans ce tableau arr data

            array_push($arr_data, ["id" => $i_id, "nom" => $zip_name, "date" => $date]);
            $encoded = json_encode($arr_data);
            file_put_contents($json, $encoded);
        } else if (count($_FILES['fichier']['name']) == 1) {
            $date =  date("Y-m-d");
            // récuperer le fichier  json dans la variable
            $json = "data.json";
            $jsondata = file_get_contents($json);
            // convertir en tableau et l'afficher
            $arr_data = json_decode($jsondata, true);
            // récuperer le prochain Id a insérer
            $i_id = count($arr_data);
            $name = $_FILES['fichier']['name'][0];
            // Ajouter une nouvelle ligne dans ce tableau arr data

            array_push($arr_data, ["id" => $i_id, "nom" => $name[0], "date" => $date]);
            $encoded = json_encode($arr_data);
            file_put_contents($json, $encoded);
            // mettre le fichier dans le bon repertoire
            $tmp_name = $_FILES["fichier"]["tmp_name"][0];
            $file_name = hash("md5", $name) . "." . pathinfo($name)['extension'];
            move_uploaded_file($tmp_name, $uploads_dir . "/" . $file_name);


        }
    }
}

mail($destinataires, $sujet, $message);
echo "<html></html>" ;

require('Views/envoiView.php');