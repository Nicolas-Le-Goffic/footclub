<?php
namespace Model;

class Team {
    private string $name;

    public function __construct (string $name)
    {
        $this->name = $name;
    }

    public function getName() :string {
        return $this->name;
    }
    public function setName(string $newName) : void {
        $this->name = $newName;
    }
}