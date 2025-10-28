<?php 

namespace Model;

class Player {

    private string $firstname;
    private string $lastname;
    private string $birthdate;
    private string $picture;

    public function __construct (string $firstname, string $lastname, string $birthdate, string $picture)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->picture = $picture;
    }

    public function getFirstName() :string {
        return $this->firstname;
    }
    public function getLastname() :string {
        return $this->lastname;
    }
    public function getPicture() :string {
        return $this->picture;
    }
    public function getBirthdate() : string {
        return $this->birthdate;
    }
    public function setFirstName (int $firstname) : void {
        $this->firstname = $firstname;        
    }
    public function setLastname (string $lastname) : void {
        $this->lastname = $lastname;        
    }
    public function setPicture (string $picture) : void {
        $this->picture = $picture;        
    }
    public function setBirthdate (string $birthdate) : void {
        $this->birthdate = $birthdate;        
    }
}