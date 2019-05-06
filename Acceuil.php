<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="style.css" />
        <title>PROFAN GPAO</title>
        <link href="images/logo-lycee-la-fayette.png" rel="shortcut icon" type="image/png"/>
    </head>

    <?php
    session_start();

    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
        echo 'Bonjour ' . $_SESSION['pseudo'];
        ?>
        <body>
        <header>
            <a href="deconnexion.php">Deconnexion</a>
            <a href="Acceuil.php"><img id="imageLogoLafayetteHeader" src="images/logo-lycee-la-fayette.png" alt="Logo du lycée Lafayette"/></a>
            <a href="liste_commande.php">Liste des Commandes</a>
            
        </header>        

        <?php
            $test = 42; 
            echo "ceci est un test $test"; 
        ?>
    </body>
    <?php
    }
    ?>
