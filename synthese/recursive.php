-<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="recrusive.css" />	
    <title>lecture recursive</title>
</head>

<body>
    <div class="links">
    </div>
    <div class="recrusive">
        <?php
        // Fixer le temps d'expiration du script après 500 secondes
        set_time_limit(500);
        $path = "docs";
        echo '<p class="parent"><i class="fa fa-folder-open"></i> Docs </p>';
        // Appeler la fonction pour la première fois pour parcourir le répértoire docs
        explorerDir($path);

        function explorerDir($path)
        {
            echo '<ul>';
            // Ouvrir le répertoire
            $folder = opendir($path);

            	//obtenir le nom de chaque entrée soit fichier ou dossier
            while ($entree = readdir($folder)) {
              	//"."c'est le dossier en cours et ".." c'est le dossier precedent donc Si le nom de l'entrée ne commence pas par "."  ou ".." On ignore les entrées

                if ($entree != "." && $entree != "..") {

					//On vérifie si il s'agit d'un dossier  
                    if (is_dir($path . "/" . $entree)) {
                        echo '<li class="container"> <p><i class="fa fa-folder-open"></i> ' . $entree . '</p>';
						//obtenir le path du dossier en cours
                        $sav_path = $path;

                        //passer le path docs avec le dossier en cours (docs/...)
                        $path .= "/" . $entree;

                   		//fonction pour parcourir le sous dossier en cours, on parcours le nouveau répertoire			
                        explorerDir($path);

                        // Affecter au path le chemin du dossier parent du dossier courant (c'est-à-dire revenir vers l'arrière)
                        $path = $sav_path;
                    }
                    // Si l'entrée est un fichier
                    else {
                        if (pathinfo($entree, PATHINFO_EXTENSION) == 'jpg' || pathinfo($entree, PATHINFO_EXTENSION) == 'png') {
                            echo '<li class="container"><p><i class="fa fa-picture-o" aria-hidden="true"></i> ' . $entree . '</p>';
                        } elseif (pathinfo($entree, PATHINFO_EXTENSION) == 'htm') {
                            echo '<li class="container"><p><i class="fa fa-code" aria-hidden="true"></i> ' . $entree . '</p>';
                        } elseif (pathinfo($entree, PATHINFO_EXTENSION) == 'txt') {
                            echo '<li class="container"><p><i class="fa fa-file-text-o" aria-hidden="true"></i> ' . $entree . '</p>';
                        }
                        // Récupérer le chemin complet du fichier courant
                        $path_source = $path . "/" . $entree;

						// Récupérer le type de la photo
                        $extension = pathinfo($entree, PATHINFO_EXTENSION);
                        $size = filesize($path_source);
                        $accepted_extensions = ["png", "jpeg", "jpg", "pjpeg"];

                        // Vérifier si le fichier est une image		
                        if (in_array($extension, $accepted_extensions)) {

                            //On établit la connexion
                            $pdo = new PDO('mysql:host=localhost;dbname=tps_php', 'root', 'root');
                            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $query =  "INSERT INTO fichiers (nom, type, path, size) VALUES (?, ?, ?, ?)";
                            $statement = $pdo->prepare($query);
                            $statement->execute(array($entree, $extension, $path_source, $size));
                        }
                    }
                }
            }
            closedir($folder);
            echo '</ul>';
        }
        ?>
    </div>

</body>

</html>