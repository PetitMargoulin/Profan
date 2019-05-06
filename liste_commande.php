<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="style.css" />
        <title>PROFAN GPAO</title>
        <link href="images/logo-lycee-la-fayette.png" rel="shortcut icon" type="image/png"/>
    </head>

    <body>
    <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_profan;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }


        $req = $bdd->query('SELECT * FROM commande');

        while($resultat = $req -> fetch())
        {
            echo $resultat['num_commande'];
            echo ' ';
            echo $resultat['date_commande'];
            echo '</br>';

        }
        ?>