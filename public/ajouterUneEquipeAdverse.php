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



    if (empty($erreurs)){
        $EquipeAdverse = new Model\OpposingClub ($data['adresseEquipeAdverse'], $data['villeEquipeAdverse']);
        Model\EquipeAdverseDatabase::AjoutEquipeAdverse($EquipeAdverse, $connexion);
    }
}
?>
<body>
    <div class ="contenu">
        <div>
            <h2>Ajoutez une Equipe adverse</h2>
            <form action="" method="POST">
                <div>
                    <label for="adresseEquipeAdverse">Adresse de l'équipe adverse *</label>
                    <?php
                    if (!empty($erreurs['adresseEquipeAdverse'])) {
                        echo "<p>{$erreurs['adresseEquipeAdverse']}</p>";
                    }
                    ?>
                    <input type="text" id="adresseEquipeAdverse" name="adresseEquipeAdverse" required >
                </div>
                <div>
                    <label for="villeEquipeAdverse">Ville de L'équipe adverse*</label>
                    <?php
                    if (!empty($erreurs['villeEquipeAdverse'])) {
                        echo "<p>{$erreurs['villeEquipeAdverse']}</p>";
                    }
                    ?>
                    <input type="text" id="villeEquipeAdverse" name="villeEquipeAdverse" required >
                <div>
                    <button type="submit" name="submit"><a>Ajouter le produit</a></button>
                </div>
            </form>
        </div>
    </div>
</body>