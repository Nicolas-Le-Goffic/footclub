<?php

namespace Model;


class joueurDatabase {

    public static function AjoutJoueur (Player $unjoueur, $connexion){
        $requete = $connexion->prepare('
            INSERT INTO player (firstname, lastname, birthdate , picture) VALUES (
            :firstname,
            :lastname,
            :birthdate,
            :picture
        )');
        $prenom = $unjoueur->getFirstName();
        $nom = $unjoueur->getLastName();
        $naissance = $unjoueur-> getBirthdate();
        $img = $unjoueur-> getPicture();
        $requete->bindParam('firstname', $prenom);
        $requete->bindParam('lastname', $nom);
        $requete->bindParam('birthdate', $naissance);
        $requete->bindParam('picture',  $img);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function ModifierJoueur (Player $unjoueur, int $id , $connexion){
        $requete = $connexion->prepare('
            UPDATE player SET
            firstname = :firstname,
            lastname = :lastname,
            birthdate = :birthdate,
            picture = :picture
            WHERE id = :id
        )');

        $requete->bindParam('firstname', $unjoueur->getFirstName());
        $requete->bindParam('lastname', $unjoueur->getLastName());
        $requete->bindParam('birthdate', $unjoueur-> getBirthdate());
        $requete->bindParam('picture',  $unjoueur-> getPicture());
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SelectUnJoueur (int $id, $connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Player
            WHERE id = :id 
        )');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SelectTousLesJoueurs ($connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Player
        )');
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);

    }
    
}

?>