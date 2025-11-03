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

$dataTeam = Model\EquipeDatabase::SelectUneEquipe($id, $connexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données.
    $data['nomEquipe'] = trim($data['nomEquipe']);


    // Vérification si l'email n'est pas vide.
    if (empty($data['nomEquipe'])) {
        $erreurs['nomEquipe'] = "*Veuillez saisir le nom de l'équipe.";
    }


    if (empty($erreurs) && isset($data["modifier"])){
        $Team = new Model\Team ($data['nomEquipe']);
        Model\EquipeDatabase::ModifierEquipe($Team,$id ,$connexion);
    }
    if (isset($data["supprimer"])){
        Model\EquipeDatabase::SupprimerEquipe($id, $connexion);
    }
}
?>

<body>
    <div class ="contenu">
        <div>
            <h2>Modifiez les informations d'une équipe</h2>
            <form action="" method="POST">
                <div>
                    <label for="nomEquipe">Nom de l'équipe *</label>
                    <?php
                    if (!empty($erreurs['nomEquipe'])) {
                        echo "<p>{$erreurs['nomEquipe']}</p>";
                    }
                    ?>
                    <input type="text" id="nomEquipe" value ="<?= $dataTeam[0]["name"] ?>" name="nomEquipe">
                </div>
                <div>
                    <button type="submit" name="modifier"><a>Modifier l'équipe</a></button>
                    <button type="submit" name="supprimer"><a>Supprimer l'équipe</a></button>
                </div>
            </form>
        </div>
    </div>
</body>