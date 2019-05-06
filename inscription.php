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
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_profan;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        if((!isset($_POST['droit'])) AND (!isset($_POST['mail'])) AND (!isset($_POST['mot_de_passe'])) AND ((!isset($_POST['nom_de_compte']) )) AND ((!isset($_POST['confirmation_mot_de_passe']) )))
            {
            ?>
                <form action="inscription.php" method="post">
                    <p>
                        <input type="text" name="nom_de_compte" placeholder="identifiant" />
                        <input type="password" name="mot_de_passe" />
                        <input type="password" name="confirmation_mot_de_passe" />
                        <input type="email" name="mail" />
                        <input type="number" name="droit" min="0" max="2" /> 
                        <input type="submit" value="valider" />
                        
                    </p>
                </form>
        <?php
            }

        elseif(($_POST['droit']=="") OR ($_POST['mail']=="") OR ($_POST['nom_de_compte']=="") OR $_POST['confirmation_mot_de_passe']=="" OR ($_POST['mot_de_passe']==""))
        {
            ?>
            <form action="inscription.php" method="post">
                <p>
                    <input type="text" name="nom_de_compte" placeholder="identifiant" />
                    <input type="password" name="mot_de_passe" />
                    <input type="password" name="confirmation_mot_de_passe" />
                    <input type="email" name="mail" />
                    <input type="number" name="droit" min="0" max="2" /> 
                    <input type="submit" value="valider" />
                    
                </p>
                <br/>
                <p>Veuillez remplir tous les champs.</p>
            </form>
        <?php
        }    


        else
        {
            if ($_POST['mot_de_passe'] != $_POST['confirmation_mot_de_passe'])
            {
                ?>
                <form action="inscription.php" method="post">
                    <p>
                        <input type="text" name="nom_de_compte" placeholder="identifiant" />
                        <input type="password" name="mot_de_passe" />
                        <input type="password" name="confirmation_mot_de_passe" />
                        <input type="email" name="mail" />
                        <input type="number" name="droit" min="0" max="2" /> 
                        <input type="submit" value="valider" />
                    </p>
                    <br/>
                    <p>Veuillez rentrez deux fois le même mot de passe !</p>
                </form>
            <?php
            }
            
            else
            {
                $req = $bdd->query('SELECT id FROM websiteuser');
                $correct=0;
                while($resultat= $req -> fetch())
                {
                    if($_POST['nom_de_compte']==$resultat['id'])
                    {
                        $correct=1;
                    }
                    
                    
                }
                $req->closeCursor();
                if($correct==1)
                {
                    ?>
                        <form action="inscription.php" method="post">
                            <p>
                                <input type="text" name="nom_de_compte" placeholder="identifiant" />
                                <input type="password" name="mot_de_passe" />
                                <input type="password" name="confirmation_mot_de_passe" />
                                <input type="email" name="mail" />
                                <input type="number" name="droit" min="0" max="2" /> 
                                <input type="submit" value="valider" />
                            </p>
                            <br/>
                            <p>Nom de compte déjà éxistant.</p>
                        </form>
                    <?php
                }
                else
                {
                    $ajout = $bdd->prepare('INSERT INTO websiteuser(id, MotDePasse, email, droits)
                    VALUES(:pseudo, :mdp, :mail, :droit)');

                    $pass_hache= password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

                    $ajout -> execute(array(
                        'pseudo' => $_POST['nom_de_compte'],
                        'mdp' => $pass_hache,
                        'mail' => $_POST['mail'],
                        'droit' => $_POST['droit']
                    ));
                    ?>
                    <p>Votre compte a été créé.</p>
                    <br/>
                    <p><a href = "index.php">Page de connexion</a></p>
                    <?php

                }
            }
            
        }