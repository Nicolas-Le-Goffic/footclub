<?php

namespace Model;


class MembreStaffDatabase {

    public static function AjoutMembreStaff (StaffMember $unMembre, $connexion){
        $requete = $connexion->prepare('
            INSERT INTO Staff_Member (firstname, lastname, role , picture) VALUES (
            :firstname,
            :lastname,
            :role,
            :picture
        )');
        $prenom = $unMembre->getFirstName();
        $nom = $unMembre->getLastName();
        $role = $unMembre-> getrole();
        $img = $unMembre-> getPicture();
        $requete->bindParam('firstname', $prenom);
        $requete->bindParam('lastname', $nom);
        $requete->bindParam('role', $role);
        $requete->bindParam('picture',  $img);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function ModifierMembreStaff (StaffMember $unMembre, int $id , $connexion){
        $requete = $connexion->prepare('
            UPDATE Staff_Member SET
            firstname = :firstname,
            lastname = :lastname,
            role = :role,
            picture = :picture
            WHERE id = :id
        ');
        $prenom = $unMembre->getFirstName();
        $nom = $unMembre->getLastName();
        $role = $unMembre-> getrole();
        $img = $unMembre-> getPicture();
        $requete->bindParam('firstname', $prenom);
        $requete->bindParam('lastname', $nom);
        $requete->bindParam('role', $role);
        $requete->bindParam('picture',  $img);
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function SelectUnMembreStaff (int $id, $connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Staff_Member
            WHERE id = :id 
        ');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }

    public static function SelectTousLesMembreStaff ($connexion){
        $requete = $connexion->prepare('
            SELECT *
            FROM Staff_Member
        ');
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
        return $produit;
    }
    public static function SupprimerMembreStaff ($id, $connexion){
        $requete = $connexion->prepare('
        Delete From Staff_Member
        Where id = :id

        ');
        $requete->bindParam('id',  $id);
        $requete->execute();
        $produit = $requete->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>