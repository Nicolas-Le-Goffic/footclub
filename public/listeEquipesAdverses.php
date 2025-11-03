<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();
$EquipesAdverses = Model\EquipeAdverseDatabase::SelectToutesLesEquipesAdverses($connexion);
foreach ($EquipesAdverses as $EquipeAdverse){
    echo $EquipeAdverse["address"];
    echo '</br>';
    echo $EquipeAdverse["city"];
    echo '</br>'; ?>
    <a href = "modifierUneEquipeAdverse.php?id= <?= $EquipeAdverse["id"] ?>"> Voir l'équipe adverse </a>
    <?php
    echo '</br>';
    echo '</br>';
}

?>

<a href = "ajouterUneEquipeAdverse.php">Ajoutez un joueur</a>