<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="page_connexion.css" />
        <title>PROFAN GPAO</title>
        <link href="images/logo-lycee-la-fayette.png" rel="shortcut icon" type="image/png"/>
    </head>


    <body>
        <header>
            <p><a href="inscription.php">Inscription</a></p>
        </header>

        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_profan;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }


        if((!isset($_POST['mot_de_passe'])) AND ((!isset($_POST['login']) )))
            {
            ?>
            <div class="formulaire">
                <form  action="index.php" method="post">
                    <p>
                        <input class="entree" type="text" name="login" placeholder="identifiant" />
                        <input class="entree" type="password" name="mot_de_passe" placeholder="Mot de passe" />
                        <input id="envoi" type="submit" value="valider" />
                    </p>
                </form>
            </div>
        <?php
            }
            else
            {
                
                
                $req = $bdd->prepare('SELECT id, MotDePasse from websiteuser where id = :idlogin');
                $req -> execute(array(
                    'idlogin'=> $_POST['login']));

                $resultat= $req -> fetch();

                $ispasswordcorrect= password_verify($_POST['mot_de_passe'], $resultat['MotDePasse']);

                if (!$resultat)
                {
                   
                    ?>
                    <form action="index.php" method="post">
                        <p>
                            <input type="text" name="login" placeholder="identifiant" />
                            <input type="password" name="mot_de_passe" />
                            <input type="submit" value="valider" />
                        </p>
                    </form>
                    <h1>Mauvais identifiant ou mot de passe !</h1>
                    <?php
                    
                }
                else
                {
                    
                    if ($ispasswordcorrect) {
                        session_start();
                        $_SESSION['id'] = $resultat['id'];
                        $_SESSION['pseudo'] = $_POST['login'];
                        header('location: Acceuil.php');
                    }
                    else {
                    
                        ?>
                        <form action="index.php" method="post">
                            <p>
                                <input type="text" name="login" placeholder="identifiant" />
                                <input type="password" name="mot_de_passe" />
                                <input type="submit" value="valider" />
                            </p>
                        </form>
                        <h1>Mauvais identifiant ou mot de passe !</h1>
                        <?php
                        
                    }
                }
            }

               
        ?>
    </body>

</html>