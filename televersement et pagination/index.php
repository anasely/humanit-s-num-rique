<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" />
        <title>Pagination des images</title>
    </head>
    <body>
        <center>
            <form action="script.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <input type="submit" value="Envoyer" name="submit"/>
            </form>
        </center>
        <h2>Liste des images importées</h2>
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