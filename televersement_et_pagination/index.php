<?php
    // Initialiser l'objet PDO
    $pdo = new PDO('mysql:host=localhost;dbname=tps_php', 'root', 'root');
    // Utiliser une requête préparée pour se connecter à la BDD
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query1 = "SELECT * FROM `fichiers`";
    // preparation du requete
    $result = $pdo->prepare($query1);
    $result->execute();
    // Récupérer the files
    $rows = $result->fetchAll();

    // Obtenir la page actuelle à partir de l'URL
    if(isset($_GET['page'])) $page = $_GET['page'];
    if(empty($page)) $page=1; // Selectionner la page 1 par défaut
    
    // Nombres de fichiers dans une page
    $nb_fichiers_page = 4;
    
    //Calcul pour avoir le nombre des pages
    $nb_pages = ceil(count($rows)/$nb_fichiers_page); // La fonction ceil() est une fonction intégrée à PHP et est utilisée pour arrondir un nombre à l’entier supérieur le plus proche.

    // la premiere page qu'on doit commencer dans chaque page
    $debut = ($page-1) * $nb_fichiers_page;

    $query2 = "SELECT * FROM fichiers LIMIT ?, ?";
    $result = $pdo->prepare($query2);
    $result->execute(array($debut, $nb_fichiers_page));
    $page_rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" />
        <title>Pagination par images</title>
    </head>
    <body>
        <center>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="fichier" id="file">
                <input type="submit" value="submit" name="submit"/>
            </form>
        </center>
        <h2>les images telecharger </h2>
        <center>
                <div class="images-block">
                    <?php if(count($page_rows) > 0) {
                        foreach($page_rows as $row) {
                            echo '<img src=' . $row['path'] .'>';
                        }
                    }
                    ?>
                </div>
        </center>
    </body>
    <center>
    <footer class="pagina">
        <?php
        // on n'affiche pas precedent dans la premiere page
        if($page != 1) echo '<a href="?page='.($page-1).'">&laquo;</a>'; 
        for($i=1; $i <= $nb_pages; $i++) {
            // Vérifier la selection d'une page 
            if($page!=$i) {
                echo '<a href="?page='.$i.'">'. $i . '</a> &nbsp;';
            }
            // Si une page est selectionnée on applique un style
            else {
                echo '<a href="?page='.$i.'" class="active">'. $i . '</a> &nbsp;';
            }
        }
        // on n'affiche pas suivaant dans la premiere page et si on n'a pas d'images
        if($page != $nb_pages && $nb_pages != 0) echo '<a href="?page='.($page+1).'">&raquo;</a>';
        ?>
    </footer>
</center>
</html>