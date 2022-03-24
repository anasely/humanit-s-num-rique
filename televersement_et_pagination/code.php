<?php
    // verification de l'importation de fichier
    if(isset($_FILES['fichier'])) {
        // Connexion à la bdd
         $servername = 'localhost';
            $username = 'root';
            $password = 'root';
            $dbname='tps_php';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$dbname);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            

       
        // Récupérer les info du fichier importé        
        $nom = $_FILES['fichier']['name'];
        $size = $_FILES['fichier']['size'];
        $path = 'photo/' . $nom;
        //verification de la taille maximale d'un fichier
        $maxsize = 8*1024*1024;

        //Les extensions acceptées
        $lesextension = ["png", "jpeg", "jpg", "pjpeg"];

        //Récupérer l'extension du fichier importé
        $type = pathinfo($nom, PATHINFO_EXTENSION);

        //Vérifier l'extension du fichier
        if(in_array($type, $lesextension)) {
            
            //Vérifier la taille du fichier
            if($size > $maxsize) {
                die("La taille du fichier dépasse la taille autorisée");
            } 
            else {
                //Vérifier si le fichier existe
                if(file_exists("photo/" . $_FILES['fichier']['name'])) {
                    die("Ce fichier existe déjà.");
                }
                else {

                    //Déplacer le fichier vers le dossier photo
                    if(move_uploaded_file($_FILES['fichier']['tmp_name'], "photo/". $_FILES['fichier']['name'])) {
                        $sql = "INSERT INTO fichiers"." (nom, type, path, size)"." VALUES "."('$nom','$type ','$path','$size')";
                         if ($conn->query($sql)==TRUE) {
                             echo "";
                           }else {
                              
                            echo "Error: ".$sql."<br>".$conn->error;
                           }

                        
                        header('Location: /humanit-s-num-rique/televersement_et_pagination');
                    } 
                    else {
                        die("Le téléchargement a échoué");
                    }
                }
            }
        }
        else {
            die("le fichier dois etre soit PNG, JPEG, JPG ou PJPEG");
        }
    }
?>

