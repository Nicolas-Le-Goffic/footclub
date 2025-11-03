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
    $data['nomEquipe'] = trim($data['nomEquipe']);


    // Vérification si l'email n'est pas vide.
    if (empty($data['nomEquipe'])) {
        $erreurs['nomEquipe'] = "*Veuillez saisir le nom de l'équipe.";
    }


    if (empty($erreurs)){
        $Team = new Model\Team ($data['nomEquipe']);
        Model\EquipeDatabase::AjoutEquipe($Team, $connexion);
    }
}
?>
<body>
    <div class ="contenu">
        <div>
            <h2>Ajoutez une Equipe</h2>
            <form action="" method="POST">
                <div>
                    <label for="nomEquipe">Nom de l'équipe *</label>
                    <?php
                    if (!empty($erreurs['nomEquipe'])) {
                        echo "<p>{$erreurs['nomEquipe']}</p>";
                    }
                    ?>
                    <input type="text" id="nomEquipe" name="nomEquipe" required >
                </div>
                <div>
                    <button type="submit" name="submit"><a>Ajouter le produit</a></button>
                </div>
            </form>
        </div>
    </div>
</body>