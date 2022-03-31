<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location: admin.php");
}
//connection a la bases de donnees
$con = mysqli_connect("localhost", "root", "root", "tps_php");
$con->query('SET NAMES utf8');
$erreur = "";
if(isset($_POST['connexion'])) { //dans la recuperation des donnees inseree par l'utilisateur
  $user = htmlspecialchars($_POST['username']);//on recupere et on stock le username dans la variable $user
  $pw = htmlspecialchars($_POST['password']);//on recupere et on stock le motpass dans la variable $password
  $login = mysqli_query($con,"SELECT * FROM users WHERE username = '$user'  AND password = '$pw'");
  if(mysqli_num_rows($login) ==  1){//si en trouve un utilisateur dont la bases de donnees on passe a la page admin(c'est la page d'affichage de donnees)
      $userinfo = mysqli_fetch_assoc($login);
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['username'] = $userinfo['username'];
      header("Location: admin.php");

  }else{
    $erreur = "<div class='alert alert-danger' role='alert'>Email ou mot de passe incorrect !</div>";
  }
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>Connexion</title>
</head>
<body>

  <main role="main" class="container p-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="login-form shadow-sm p-4 mb-5 bg-light rounded" style="width: 23em;">

          <div class="text-center">
           <h2>Bonjour</h2>
           <p>Connectez-vous</p>
         </div>
       
         <form action="index.php" method="post" class="form-signin">
          <label for="inputuser">Nom d'utilisateur :</label>
          <input type="text" id="inputuser" class="form-control" name="username" required autofocus>
          <label for="inputpw" >Mot de passe :</label>
          <input type="password" id="inputpw" class="form-control" name="password" required>
          <button class="btn btn-info btn-block mt-3 pt-2" name="connexion" type="submit">Se connecter</button>
          <br>
          <div class="dropdown-divider mb-3"></div>  <?php echo $erreur;?>
        </form>
      </div>
    </div>  
  </div> 
</main>




</body>
</html>
