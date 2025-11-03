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
    $data['prenomStaff'] = trim($data['prenomStaff']);
    $data['nomStaff'] = trim($data['nomStaff']);
    $data['roleStaff'] = trim($data['roleStaff']);
    $data['imageStaff'] = trim($data['imageStaff']);


    // Vérification si l'email n'est pas vide.
    if (empty($data['prenomStaff'])) {
        $erreurs['prenomStaff'] = '*Veuillez saisir le prénom du membre du staff.';
    }

    if (empty($data['nomStaff'])) {
        $erreurs['nomJoueur'] = '*Veuillez saisir le nom du membre du staff.';
    }
    if (empty($data['roleStaff'])) {
        $erreurs['roleStaff'] = '*Veuillez saisir le role du membre du staff.';
    }
    if (empty($data['imageStaff'])) {
        $erreurs['imageStaff'] = "*Veuillez saisir l'image du membre du staff";
    }


    if (empty($erreurs)){
        $MembreStaff = new Model\StaffMember ($data['prenomStaff'], $data['nomStaff'],$data['imageStaff'],$data['roleStaff']);
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
                    <label for="prenomStaff">Prenom du membre du staff *</label>
                    <?php
                    if (!empty($erreurs['prenomStaff'])) {
                        echo "<p>{$erreurs['prenomStaff']}</p>";
                    }
                    ?>
                    <input type="text" id="prenomStaff" name="prenomStaff" required >
                </div>
                <div>
                    <label for="nomStaff">Nom du membre du staff *</label>
                    <?php
                    if (!empty($erreurs['nomStaff'])) {
                        echo "<p>{$erreurs['nomStaff']}</p>";
                    }
                    ?>
                    <input type="text" id="nomStaff" name="nomStaff" required >
                </div>
                <div>
                    <label for="roleStaff">Role du membre du staff *</label>
                    <?php
                    if (!empty($erreurs['roleStaff'])) {
                        echo "<p>{$erreurs['roleStaff']}</p>";
                    }
                    ?>
                    <select name="roleStaff" id="roleStaff">
                        <option default value = "saisirOption">Veuillez saisir une option</option> 
                        <option value="Entraineur">Entraineur</option> 
                        <option value="Préparateur">Préparateur</option>
                        <option value="Analyste">Analyste</option> 
                    </select>
                </div>
                <div>
                    <label for="imageStaff">Image du membre du staff</label>
                    <?php
                    if (!empty($erreurs['imageStaff'])) {
                        echo "<p>{$erreurs['imageStaff']}</p>";
                    }
                    ?>
                    <input type="file" id= "imageStaff" name="imageStaff" accept="image/*">
                </div>
                <div>
                    <button type="submit" name="submit"><a>Ajouter le produit</a></button>
                </div>
            </form>
        </div>
    </div>
</body>