<?php
// La connexion a la bd
include_once('db.php');

// nombre des personnes par page
$nbparpage = 5;

// Obtenir la page actuel : si on est dans la premiere page alors c'est la page 1
$pageactuel = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcul pour les premier 5 personnes sur la page
// dbpage ça augmente toujour par 5
// par ex : page 1 c'est 0 | page 2 c'est 5 | page 3 c'est 10 ... afin de l'utiliser dans la requête
$dbpage = ($pageactuel * $nbparpage) - $nbparpage;

// Requête pour obtenir le nombre des personnes dans la bd
$nbPerso = mysqli_num_rows($conn->query("SELECT * FROM data"));

// Calcul pour avoir le nombre des pages
$pages = ceil($nbPerso / $nbparpage);//La fonction ceil() est une fonction intégrée à PHP et est utilisée pour arrondir un nombre à l’entier supérieur le plus proche.

// La requête avec l'option de limitation 
// $dbpage c'est le debut   
// 5 c'est le nombre des personnes pour afficher des le debut indiqué
$sql = "SELECT * FROM data LIMIT $dbpage, $nbparpage";

// Exécution de requête 
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination TP</title>
    <style>
        li {
            float: left;
            padding: 10;
            list-style-type: none;
        }

        .desactive {
            pointer-events: none;
            cursor: default;
            opacity: 0.6;
        }
     
        .table{
            padding: 15px;
            font-size: 25px;

        }
        h1{
            margin-left: 20px;
        }
    </style>

</head>

<body>
    <h1>Liste des personnes</h1>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Téléphone</th>


        </thead>
        <tbody>
            <?php
            // Manipulation
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['phone'] ?></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <nav>
        <ul>
            <!-- Lien précédente .. désactivé si on se trouve sur la 1ère page -->
            <li class="page-item <?= ($pageactuel == 1) ? "desactive" : "" ?>">
                <a href="./index.php?page=<?= $pageactuel - 1 ?>" class="page-link"><button>Précédente</button></a></button>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                <!-- Lien des pages .. désactivé si on se trouve sur la page actuel -->
                <li class="page-item <?= ($pageactuel == $page) ? "desactive" : "" ?>">
                    <a href="./index.php?page=<?= $page ?>" class="page-link"><button><?= $page ?></button></a>
                </li>
            <?php endfor ?>
            <!-- Lien suivant .. désactivé si on se trouve sur la derniere page -->
            <li class="page-item <?= ($pageactuel == $pages) ? "desactive" : "" ?>">
                <a href="./index.php?page=<?= $pageactuel + 1 ?>" class="button page-link"><button>Suivant</button></a>
            </li>
        </ul>
    </nav>

</body>

</html>