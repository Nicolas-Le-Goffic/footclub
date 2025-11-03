<?php

namespace Model;


class EquipeDatabase {

    public static function AjoutEquipe (Team $Equipe, $connexion){
        $requete = $connexion->prepare('
            INSERT INTO Team (name) VALUES (
            :name
        )');
        $name = $Equipe->getName();

        $requete->bindParam('name', $name);

        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function ModifierEquipe (Team $Equipe, int $id , $connexion){
        $requete = $connexion->prepare('
            UPDATE Team SET
            name = :name
            WHERE id = :id
        ');
        $nomEquipe = $Equipe->getName();
        $requete->bindParam('name', $nomEquipe);
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SelectUneEquipe (int $id, $connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Team
            WHERE id = :id 
        ');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }

    public static function SelectToutesLesEquipes ($connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Team
        ');
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }
    public static function SupprimerEquipe (int $id , $connexion){
        $requete = $connexion->prepare('
            Delete From Team
            WHERE id = :id
        ');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

}

?>