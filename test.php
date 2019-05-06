<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet_profan;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$pass_hache= password_hash('test', PASSWORD_DEFAULT);
$req= $bdd->prepare('INSERT INTO websiteuser(id, MotDePasse, email, droits) 
VALUES(:pseudo, :mdp, :mail, :droit)');

$req ->execute(array(
    'pseudo'=> "test",
    'mdp'=> $pass_hache,
    'mail'=> "yolo",
    'droit'=> 1
));
echo 'ca y est cest bon';

$reponse = $bdd->query('SELECT * FROM websiteuser');

while ($donnees = $reponse->fetch())
{
?>
    <p>
        <strong>Numero commande</strong>: <?php echo $donnees['id']; ?> <br />
        <strong>Date de la commande</strong>: <?php echo $donnees['MotDePasse']; ?> <br />
        <strong>Date butoire de la commande</strong>: <?php echo $donnees['email']; ?> <br />
        <strong>Type de finition</strong>: <?php echo $donnees['droits']; ?> <br />
    </p>
<?php
}

$reponse->closeCursor();

?>