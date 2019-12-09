<?php
require('Models/envoi.php');

$error = "";
$uploads_dir = './assets/telechargements/';


if (isset($_FILES['fichier'])) {
    $zip = new ZipArchive(); //Variable de zippage
    // Récuperer données du formulaire
    for ($i = 0; $i < count($_FILES['fichier']['tmp_name']); $i++) {

        // Si plus de 1 fichier
        if (count($_FILES['fichier']['tmp_name']) > 1) {
            $zip_name = "upload_" . time() . ".zip";
            // creer le zip
            if ($zip->open($uploads_dir . $zip_name, ZipArchive::CREATE) !== TRUE) {
                $error = "Désolé, le  Zip n'a pas été généré.<br/>";
            };
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
            $name = $zip_name;
        }
        else if (count($_FILES['fichier']['name']) == 1) {
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
           
            array_push($arr_data, ["id" => $i_id, "nom" => $name, "date" => $date]);
            
            $encoded = json_encode($arr_data);
            file_put_contents($json, $encoded);
            // mettre le fichier dans le bon repertoire
            $tmp_name = $_FILES["fichier"]["tmp_name"][0];
            
            $file_name = hash("md5", $name) . "." . pathinfo($name)['extension'];
            move_uploaded_file($tmp_name, $uploads_dir . "/" . $file_name);
            // recuperer l'url
            echo ="ytr";
        };

        }

        $url = "https://khaoulaa.promo-31.codeur.online/ProjetBirdypage=reception&download=/".$name;
       
        // preparer le mail
        if (isset($_POST["mail_dest"])){

        $destinataire = $_POST["mail_dest"];
        $expediteur = $_POST["mail_exp"];
        $message_user = $_POST["message"];
        $headers = 'From:'. $expediteur."\r\n".'Reply-To:'. $expediteur;
        $message = $message_user.
        '<!doctype html>
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
          <title> mail Birdy </title>
          
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <style type="text/css">
            #outlook a {
              padding: 0;
            }
        
            body {
              margin: 0;
              padding: 0;
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
            }
        
            table,
            td {
              border-collapse: collapse;
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }
        
            img {
              border: 0;
              height: auto;
              line-height: 100%;
              outline: none;
              text-decoration: none;
              -ms-interpolation-mode: bicubic;
            }
        
            p {
              display: block;
              margin: 13px 0;
            }
          </style>
        
          <style type="text/css">
            @media only screen and (min-width:480px) {
              .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
              }
              .mj-column-per-35 {
                width: 35% !important;
                max-width: 35%;
              }
              .mj-column-per-65 {
                width: 65% !important;
                max-width: 65%;
              }
              .mj-column-per-80 {
                width: 80% !important;
                max-width: 80%;
              }
            }
          </style>
          <style type="text/css">
            @media only screen and (max-width:480px) {
              table.mj-full-width-mobile {
                width: 100% !important;
              }
              td.mj-full-width-mobile {
                width: auto !important;
              }
            }
          </style>
        </head>
        
        <body style="background-color:#F2F2F2;">
          <div style="background-color:#F2F2F2;">
           
            <div style="margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:10px 0 20px 0;text-align:center;">
           
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"> </table>
                      </div>
              
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
           
            <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 20px 0 20px;text-align:center;">
                
                      <div class="mj-column-per-35 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                              <div style="font-family:Montserrat, Helvetica, Arial, sans-serif;font-size:20px;font-weight:500;line-height:24px;text-align:left;color:#000000;">// BIRDY</div>
                            </td>
                          </tr>
                        </table>
                      </div>
                 
                      <div class="mj-column-per-65 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"> </table>
                      </div>
                 
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
           
            <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:20px 20px 0 20px;text-align:center;">
                   
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:30px 40px 10px 40px;word-break:break-word;">
                              <div style="font-family:Montserrat, Helvetica, Arial, sans-serif;font-size:32px;font-weight:300;line-height:40px;text-align:center;color:#630077 ;">Bonjour,</div>
                            </td>
                          </tr>
                        </table>
                      </div>
             
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
            <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:10px 20px;text-align:center;">
               
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                              <p style="border-top:solid 3px #9B9B9B;font-size:1;margin:0px auto;width:30px;"> </p>
           
                            </td>
                          </tr>
                        </table>
                      </div>
            
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        
            <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:0 20px 20px 20px;text-align:center;">
               
                      <div class="mj-column-per-80 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:0px;padding-top:10px;word-break:break-word;">
                              <div style="font-family:Montserrat, Helvetica, Arial, sans-serif;font-size:16px;font-weight:500;line-height:24px;text-align:center;color:#000000;">Vous avez reçu un ou plusieurs fichiers à telecharger sur l\'adresse suivante:</div>
                            </td>
                          </tr>
                        </table>
                      </div>
                
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          
            <div style="background:url(http://nimus.de/share/tpl-card/bg.jpg) top center / cover no-repeat;margin:0px auto;max-width:600px;">
              <div style="line-height:0;font-size:0;">
                <table align="center" background="http://nimus.de/share/tpl-card/bg.jpg" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:url(http://nimus.de/share/tpl-card/bg.jpg) top center / cover no-repeat;width:100%;">
                  <tbody>
                    <tr>
                      <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                    
                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                            <tr>
                              <td align="center" style="font-size:0px;padding:0px;word-break:break-word;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                  <tbody>
                                    <tr>
                                      <td style="width:600px;"> <img alt="" height="auto" src="http://nimus.de/share/tpl-card/lineshadow.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="600" /> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" vertical-align="middle" style="font-size:0px;padding:10px 25px;padding-top:20px;padding-bottom:70px;word-break:break-word;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                                  <tr>
                                    <td align="center" bgcolor="#630077 " role="presentation" style="border:none;border-radius:2px;cursor:auto;mso-padding-alt:15px 30px;background:#630077 ;" valign="middle"> <a href="'.$url.'" style="display:inline-block;background:#630077 ;color:#FFFFFF;font-family:Montserrat, Helvetica, Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:15px 30px;mso-padding-alt:0px;border-radius:2px;"
                                        target="_blank">
                      Par ici
                    </a> </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </div>
                
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
            <div style="background:#FFFFFF;background-color:#FFFFFF;margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#FFFFFF;background-color:#FFFFFF;width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:50px 0 0 0;text-align:center;">
                
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:0px;word-break:break-word;">
                              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                <tbody>
                                  <tr>
                                    <td style="width:600px;"> <img alt="bottom border" height="auto" src="http://nimus.de/share/tpl-card/bottom.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="600" /> </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </div>
                
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
         
            <div style="margin:0px auto;max-width:600px;">
              <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                  <tr>
                    <td style="direction:ltr;font-size:0px;padding:10px 0 20px 0;text-align:center;">
        
                      <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                          <tr>
                            <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                              <div style="font-family:Montserrat, Helvetica, Arial, sans-serif;font-size:11px;font-weight:400;line-height:24px;text-align:center;color:#9B9B9B;"><a href="#" style="color: #9B9B9B;">Unsubscribe</a> from this newsletter<br/> <a href="#" style="color: #9B9B9B; text-decoration:none;">Made by Birdy</a></div>
                            </td>
                          </tr>
                        </table>
                      </div>
        
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        
          </div>
        </body>
        
        </html>';
        $sujet = "Envoi de fichier";
        mail($destinataire, $sujet, $message, $headers);
    }
    }

 



require('Views/envoiView.php');