<?php
namespace Model;

class StaffMember {
    private string $firstName;
    private string $lastName;
    private string $picture;
    private string $role;

    public function __construct (string $firstName, string $lastName, string $picture, string $role)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->picture = $picture;
        $this->role = $role;
    }

    public function getFirstName() :string {
        return $this->firstName;
    }
    public function getLastName() :string {
        return $this->lastName;
    }
    public function getPicture() :string {
        return $this->picture;
    }
    public function getRole() :string {
        return $this->role;
    }
    public function setFirstName (int $firstName) : void {
        $this->firstName = $firstName;        
    }
    public function setLastName (string $lastName) : void {
        $this->lastName = $lastName;        
    }
    public function setPicture (string $picture) : void {
        $this->picture = $picture;        
    }
    public function setRole (string $role) : void {
        $this->role = $role;        
    }
}