<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();
$Equipes = Model\EquipeDatabase::SelectToutesLesEquipes($connexion);

foreach ($Equipes as $Equipe){
    echo $Equipe["name"];
    echo '</br>'; ?>
    <a href = "modifierUneEquipe.php?id= <?= $Equipe["id"] ?>"> Voir l'équipe </a>
    <?php
    echo '</br>';
    echo '</br>';
}

?>

<a href = "ajouterUneEquipe.php">Ajoutez une Equipe</a>