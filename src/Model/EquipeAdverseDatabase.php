<?php

namespace Model;


class EquipeAdverseDatabase {

    public static function AjoutEquipeAdverse (OpposingClub $EquipeAdverse, $connexion){
        $requete = $connexion->prepare('
            INSERT INTO Opposing_Club (address, city) VALUES (
            :address,
            :city
        )');
        $adresse = $EquipeAdverse->getAddress();
        $ville = $EquipeAdverse->getCity();

        $requete->bindParam('address', $adresse);
        $requete->bindParam('city', $ville);

        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function ModifierEquipeAdverse (OpposingClub $EquipeAdverse, int $id , $connexion){
        $requete = $connexion->prepare('
            UPDATE Opposing_Club SET
            address = :address,
            city = :city
            WHERE id = :id
        ');
        $adresse = $EquipeAdverse->getAddress();
        $ville = $EquipeAdverse->getCity();
        $requete->bindParam('address', $adresse);
        $requete->bindParam('city', $ville);
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SelectUneEquipeAdverse (int $id, $connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Opposing_Club
            WHERE id = :id 
        ');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }

    public static function SelectToutesLesEquipesAdverses ($connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Opposing_Club
        ');
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }
    public static function SupprimerEquipeAdverse (int $id , $connexion){
        $requete = $connexion->prepare('
            Delete From Opposing_club
            Where id = :id
        ');

        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>