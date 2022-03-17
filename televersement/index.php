<?php

    // if le fichier est bien importé
    if(isset($_FILES['file'])) {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=televersement','root','root');
       
        // Récupérer les informations du fichier importé        
        $nom = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $path = 'photo/' . $nom;
 
            
          
             //Vérifier si le fichier existe
                if(file_exists("photo/" . $_FILES['file']['name'])) {
                    die("Ce fichier est deje exist.");
                }
               
                    //Déplacer le fichier vers le dossier images
                    if(move_uploaded_file($_FILES['file']['tmp_name'], "photo/". $_FILES['file']['name'])) {
                        $query = "INSERT INTO fichiers (nom, type, path) VALUES (?, ?, ?)";
                        $statement = $pdo->prepare($query);
                        $statement->execute(array($nom, $path));
                        echo "Le téléchargement done";
                    } 
                
                    else {
                        die("Le téléchargement a echoué");
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
            <input type="file" name="file" id="file">
            <input type="submit" value="ok" name="submit"/>
        </form>
    </body>
    
</html>
