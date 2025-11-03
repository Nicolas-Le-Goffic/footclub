<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();
$joueurs = Model\joueurDatabase::SelectTousLesJoueurs($connexion);
foreach ($joueurs as $joueur){
    echo $joueur["firstname"];
    echo '</br>';
    echo $joueur["lastname"];
    echo '</br>';
    echo $joueur["role"];
    echo '</br>'; ?>
    <a href = "modifierUnJoueur.php?id= <?= $joueur["id"] ?>"> Voir le profil du membre du staff </a>
    <?php
    echo '</br>';
    echo '</br>';
}

?>

<a href = "ajouterRoleEquipeJoueur.php">Ajoutez l'affiliation d'un joueur à une équipe et un rôle</a>