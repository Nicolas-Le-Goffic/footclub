<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Connexion</title>
</head>



<?php
require '../vendor/autoload.php';
$connexion = Database\databaseConnexion::connexionDatabase();

$dataJoueurs = Model\joueurDatabase::SelectJoueurId($connexion);
$dataEquipes = Model\EquipeDatabase::SelectToutesLesEquipes($connexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données.
    $data['joueurId'] = trim($data['joueurId']);
    $data['equipeId'] = trim($data['equipeId']);
    $data['roleJoueur'] = trim($data['roleJoueur']);


    // Vérification si l'email n'est pas vide.
    if (empty($data['joueurId'])) {
        $erreurs['joueurId'] = '*Veuillez saisir le prénom du membre du staff.';
    }

    if (empty($data['equipeId'])) {
        $erreurs['equipeId'] = '*Veuillez saisir le nom du membre du staff.';
    }
    if (empty($data['roleJoueur'])) {
        $erreurs['roleJoueur'] = '*Veuillez saisir le role du membre du staff.';
    }


    if (empty($erreurs)){
        $MembreStaff = new Model\StaffMember ($data['joueurId'], $data['equipeId'],$data['roleJoueur']);
        Model\MembreStaffDatabase::AjoutMembreStaff($MembreStaff, $connexion);
    }
}
?>
<body>
    <div class ="contenu">
        <div>
            <h2>Ajoutez un membre du staff</h2>
            <form action="" method="POST">
                <div>
                    <label for="joueurId">Joueur de l'équipe *</label>
                    <?php
                    if (!empty($erreurs['joueurid'])) {
                        echo "<p>{$erreurs['joueurid']}</p>";
                    }
                    ?>
                    <select name="joueurid" id="joueurid">
                        <?php
                        foreach ($dataJoueurs as $dataJoueur) { ?>
                        
                            <option value=" <?= $dataJoueur["id"]?>"> <?= strval($dataJoueur["id"]) . " - " . $dataJoueur["firstname"] ?></option> 
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="equipeId">Equipe du joueur*</label>
                    <?php
                    if (!empty($erreurs['equipeId'])) {
                        echo "<p>{$erreurs['equipeId']}</p>";
                    }
                    ?>
                    <select name="equipeId" id="equipeId">
                        <?php
                        foreach ($dataEquipes as $dataEquipe) { ?>
                            <option value=" <?= $dataEquipe["id"]?>"> <?= strval($dataEquipe["id"]) . " - " . $dataEquipe["name"] ?></option> 
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="roleJoueur">Role du joueur dans l'équipe *</label>
                    <?php
                    if (!empty($erreurs['roleJoueur'])) {
                        echo "<p>{$erreurs['roleJoueur']}</p>";
                    }
                    ?>
                    <select name="roleJoueur" id="roleJoueur">
                        <option default value = "saisirOption">Veuillez saisir une option</option> 
                        <option value="Attaquant">Attaquant</option> 
                        <option value="Millieu">Millieu</option>
                        <option value="Defenseur">Defenseur</option>
                        <option value="Gardien">Gardien</option> 
                    </select>
                </div> 
                <div>
                    <button type="submit" name="submit"><a>Ajouter le produit</a></button>
                </div>
            </form>
        </div>
    </div>
</body>