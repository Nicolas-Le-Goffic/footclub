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

$id = $_GET["id"];
$id =intval($id);

$dataOpposingClub = Model\EquipeAdverseDatabase::SelectUneEquipeAdverse($id, $connexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données.
    $data['adresseEquipeAdverse'] = trim($data['adresseEquipeAdverse']);
    $data['villeEquipeAdverse'] = trim($data['villeEquipeAdverse']);

    // Vérification si l'email n'est pas vide.
    if (empty($data['adresseEquipeAdverse'])) {
        $erreurs['adresseEquipeAdverse'] = '*Veuillez saisir le prénom du joueur.';
    }

    if (empty($data['villeEquipeAdverse'])) {
        $erreurs['villeEquipeAdverse'] = '*Veuillez saisir le nom du joueur.';
    }



    if (empty($erreurs) && isset($data["modifier"])){
        $EquipeAdverse = new Model\OpposingClub ($data['adresseEquipeAdverse'], $data['villeEquipeAdverse']);
        Model\EquipeAdverseDatabase::ModifierEquipeAdverse($EquipeAdverse,$id , $connexion);
    }
    if (isset($data["supprimer"])){
        Model\EquipeAdverseDatabase::SupprimerEquipeAdverse($id, $connexion);
    }
}
?>
<body>
    <div class ="contenu">
        <div>
            <h2>Modifiez les informations d'une équipe adverse</h2>
            <form action="" method="POST">
                <div>
                    <label for="adresseEquipeAdverse">Adresse de l'équipe adverse *</label>
                    <?php
                    if (!empty($erreurs['adresseEquipeAdverse'])) {
                        echo "<p>{$erreurs['adresseEquipeAdverse']}</p>";
                    }
                    ?>
                    <input type="text" id="adresseEquipeAdverse" value ="<?= $dataOpposingClub[0]["address"] ?>" name="adresseEquipeAdverse">
                </div>
                <div>
                    <label for="villeEquipeAdverse">Ville de L'équipe adverse*</label>
                    <?php
                    if (!empty($erreurs['villeEquipeAdverse'])) {
                        echo "<p>{$erreurs['villeEquipeAdverse']}</p>";
                    }
                    ?>
                    <input type="text" id="villeEquipeAdverse" value ="<?= $dataOpposingClub[0]["city"] ?>" name="villeEquipeAdverse">
                <div>
                    <button type="submit" name="modifier"><a>Modifier l'équipe adverse</a></button>
                    <button type="submit" name="supprimer"><a>Supprimer l'équipe adverse</a></button>
                </div>
            </form>
        </div>
    </div>
</body>