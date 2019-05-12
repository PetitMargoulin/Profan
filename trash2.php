<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>PROFAN GPAO</title>
        <link href="images/logo-lycee-la-fayette.png" rel="shortcut icon" type="image/png"/>
    </head>

    <?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_profan;charset=utf8', 'root', '');
    }
        
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    ?>

    <body>
        <?php
            if((!isset($_POST['mot_de_passe']) OR $_POST['mot_de_passe']!= "test") AND ((!isset($_POST['login']) OR $_POST['login']!= "test")))
            {
            ?>
                <form action="index.php" method="post">
                    <p>
                        <input type="text" name="login" value="identifiant" />
                        <input type="password" name="mot_de_passe" />
                        <input type="submit" value="valider" />
                    </p>
                </form>
        <?php
            }
            else
            {
                include("Acceuil.php");

            }
            ?>
    </body>
</html>