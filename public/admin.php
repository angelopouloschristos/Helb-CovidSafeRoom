<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidSafeAnalysis</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/element.loader.js"></script>
</head>
<body>
<div id="header"></div>

<?php
    session_start();
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! quand on va dans about-> la session est delete
    //                                   c'est pour le developpement 
    //si on est deja connecter alors redirection vers home
    if (isset($_SESSION["logged"])) {
        //echo 'connextion avec succes';
        header("Location : index.php");
        echo '<script>window.location = "index.php"</script>';
    }

    $error_login = false;
    //si les deux input sont vide -> affiche le formulaire
    if (empty($_POST["input_email"]) && empty($_POST["input_password"])) {
        //echo 'please login';

    }else{//les input existe
        $email = $_POST["input_email"];
        $pass = $_POST["input_password"];
        //si elles sont correct
        if ($email == 'helb@gmail.com' && $pass == 'admin') {
            $_SESSION["logged"] = true;
            echo '<script>alert("Connexion avec succes");</script>';
            echo '<script>window.location = "index.php"</script>';
        }else {
            $error_login = true;
        }
    }

?>

<div class="form-background">
<form class="form" method="post">
    <fieldset>
        <legend>Formulaire de connexion</legend>

        <?php if ($error_login == true) {
            echo 'Email ou le mot de passe est invalide';
        }  ?>

        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Adresse mail</label>
            <input type="email" class="form-control" name="input_email" aria-describedby="emailHelp" placeholder="Adresse mail...">
            <small id="emailHelp" class="form-text text-muted">Ne communiquez jamais vos identifiants.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="input_password" placeholder="Mot de passe...">
        </div>
        <input type="submit" name="submit" value="Se Connecter"> 
    </fieldset>
</form>


</div>
</body>
</html>