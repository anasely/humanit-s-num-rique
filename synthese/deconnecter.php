<?php
session_start();
session_destroy();//deconnecter est passer directement a la page de connection
header("Location: index.php");
?>
