<?php
    // verification de l'importation de fichier
    if(isset($_FILES['fichier'])) {
        // Connexion à la bdd
        $pdo = new PDO('mysql:host=localhost;dbname=tps_php', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        // Récupérer les info du fichier importé        
        $nom = $_FILES['fichier']['name'];
        $size = $_FILES['fichier']['size'];
        $path = 'photo/' . $nom;
        //verification de la taille maximale d'un fichier
        $maxsize = 8*1024*1024;

        //Les extensions acceptées
        $lesextension = ["png", "jpeg", "jpg", "pjpeg"];

        //Récupérer l'extension du fichier importé
        $extension = pathinfo($nom, PATHINFO_EXTENSION);

        //Vérifier l'extension du fichier
        if(in_array($extension, $lesextension)) {
            
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
                        $query = "INSERT INTO fichiers (nom, type, path, size) VALUES (?, ?, ?, ?)";
                        $statement = $pdo->prepare($query);
                        $statement->execute(array($nom, $extension, $path, $size));
                        echo "Le téléchargement ok";
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



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Téléversement</title>
    </head>
    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fichier">
            <input type="submit" value="Envoyer" name="submit"/>
        </form>
    </body>
    
</html>
