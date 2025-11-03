<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();
$MembresStaff = Model\MembreStaffDatabase::SelectTousLesMembreStaff($connexion);
foreach ($MembresStaff as $MembreStaff){
    echo $MembreStaff["firstname"];
    echo '</br>';
    echo $MembreStaff["lastname"];
    echo '</br>';
    echo $MembreStaff["role"];
    echo '</br>'; ?>
    <a href = "modifierUnMembreStaff.php?id= <?= $MembreStaff["id"] ?>"> Voir le profil du membre du staff </a>
    <?php
    echo '</br>';
    echo '</br>';
}

?>

<a href = "ajoutMembreStaff.php">Ajoutez un joueur</a>