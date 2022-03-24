<P>
<B>DEBUTTTTTT DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
<?php

//l'expiration du script apres 500 secondes
set_time_limit (500);
$path= "docs";

//pour parcourir le repertoire indiqué (docs)
explorerDir($path);

function explorerDir($path)
{
	//ouvrir "docs"
	$folder = opendir($path);
	
	//obtenir le nom de chaque entrée soit fichier ou dossier
	while($entree = readdir($folder))
	{		
		//"."c'est le dossier en cours et ".." c'est le dossier precedent donc Si le nom de l'entrée ne commence pas par "."  ou ".."
		if($entree != "." && $entree != "..")
		{
			//l'entrer est un dossier
			if(is_dir($path."/".$entree))
			{
				echo '<div class="folder"><b>' . $entree . '</b> c est un DOSSIER </br> </div>';
				//obtenir le path du dossier en cours
				$sav_path = $path;
				//passer le path docs avec le dossier en cours (docs/...)
				$path .= "/".$entree;
				//fonction pour parcourir le sous dossier en cours			
				explorerDir($path);
				//
				$path = $sav_path;
			}
			else
			{
			//l'entrer est un fichier
				echo '<li>' . $entree . ' <b>c est un Fichier</b> </li>';
				//obtenir le path du fichier en cours
				$path_source = $path."/".$entree;				
				
				//Si c'est un .png ou un .jpeg		
				//Alors je ferais quoi ? Devinez !
				//...
				// Récupérer le type de la photo
					$extension = pathinfo($entree, PATHINFO_EXTENSION);
					//Recuperer size de photo
					$size = filesize($path_source);
					$lesextension = ["png", "jpg"];

					//Si c'est un .png ou un .jpeg		
					if (in_array($extension, $lesextension)) {

						// Connexion à la base de données
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

						$sql =  "INSERT INTO fichiers"." (nom, type, path, size)"." VALUES "."('$entree','$extension ','$path_source','$size')";

						$statement = $conn->query($sql);
					}
				}
			}
		}
		closedir($folder);
	}
?>
<P>
<B>FINNNNNN DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
	