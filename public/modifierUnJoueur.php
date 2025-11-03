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

$dataPlayer = Model\joueurDatabase::SelectUnJoueur ($id, $connexion);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données.
    $data['prenomJoueur'] = trim($data['prenomJoueur']);
    $data['nomJoueur'] = trim($data['nomJoueur']);
    $data['naissanceJoueur'] = trim($data['naissanceJoueur']);
    $data['imageJoueur'] = trim($data['imageJoueur']);


    // Vérification si l'email n'est pas vide.
    if (empty($data['prenomJoueur'])) {
        $erreurs['prenomJoueur'] = '*Veuillez saisir le prénom du joueur.';
    }

    if (empty($data['nomJoueur'])) {
        $erreurs['nomJoueur'] = '*Veuillez saisir le nom du joueur.';
    }
    if (empty($data['naissanceJoueur'])) {
        $erreurs['naissanceJoueur'] = '*Veuillez saisir la date de naissance du joueur.';
    }
    if (empty($data['imageJoueur'])) {
        $erreurs['imageJoueur'] = "*Veuillez saisir l'image du joueur";
    }


    if (empty($erreurs) && isset($data["modifier"])){
        $player = new Model\Player ($data['prenomJoueur'], $data['nomJoueur'],$data['naissanceJoueur'],$data['imageJoueur']);
        Model\joueurDatabase::ModifierJoueur($player, $id, $connexion);
    }
    if (isset($data["supprimer"])){
        Model\joueurDatabase::SupprimerJoueur($id, $connexion);
    }
}
?>
<body>
    <div class ="contenu">
        <div>
            <h2>Modifiez les informations d'un joueur</h2>
            <form action="" method="POST">
                <div>
                    <label for="prenomJoueur">Prenom du joueur *</label>
                    <?php
                    if (!empty($erreurs['prenomJoueur'])) {
                        echo "<p>{$erreurs['prenomJoueur']}</p>";
                    }
                    ?>
                    <input type="text" id="prenomJoueur" value ="<?= $dataPlayer[0]["firstname"] ?>" name="prenomJoueur">
                </div>
                <div>
                    <label for="nomJoueur">Nom du joueur *</label>
                    <?php
                    if (!empty($erreurs['nomJoueur'])) {
                        echo "<p>{$erreurs['nomJoueur']}</p>";
                    }
                    ?>
                    <input type="text" id="nomJoueur" value ="<?= $dataPlayer[0]["lastname"] ?>" name="nomJoueur">
                </div>
                <div>
                    <label for="naissanceJoueur">Date de naissance du joueur *</label>
                    <?php
                    if (!empty($erreurs['naissanceJoueur'])) {
                        echo "<p>{$erreurs['naissanceJoueur']}</p>";
                    }
                    ?>
                    <input type="date" id="naissanceJoueur" value ="<?= $dataPlayer[0]["birthdate"] ?>" name="naissanceJoueur">
                </div>
                <div>
                    <label for="imageJoueur">Image du joueur</label>
                    <?php
                    if (!empty($erreurs['imageJoueur'])) {
                        echo "<p>{$erreurs['imageJoueur']}</p>";
                    }
                    ?>
                    <input type="file" id= "imageJoueur" value ="<?= $dataPlayer[0]["picture"] ?>" name="imageJoueur" accept="image/*">
                </div>
                <div>
                    <button type="submit" name="modifier"><a>Modifier le joueur</a></button>
                    <button type="submit" name="supprimer"><a>Supprimer le joueur</a></button>
                </div>
            </form>
        </div>
    </div>
</body>