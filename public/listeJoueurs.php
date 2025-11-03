<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();
$joueurs = Model\joueurDatabase::SelectTousLesJoueurs($connexion);
foreach ($joueurs as $joueur){
    echo $joueur["firstname"];
    echo '</br>';
    echo $joueur["lastname"];
    echo '</br>';
    echo date("d/m/Y", strtotime($joueur["birthdate"]));
    echo '</br>'; ?>
    <a href = "modifierUnJoueur.php?id= <?= $joueur["id"] ?>"> Voir le profil du joueur </a>
    <?php
    echo '</br>';
    echo '</br>';
}

?>

<a href = "ajouterUnJoueur.php">Ajoutez un joueur</a>