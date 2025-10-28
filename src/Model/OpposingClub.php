<?php
namespace Model;

class OpposingClub {
    private string $address;
    private string $city;

    public function __construct (string $address, string $city)
    {
        $this->address = $address;
        $this->city = $city;
    }
    public function getAddress() :string {
        return $this->address;
    }
    public function getCity() :string {
        return $this->city;
    }
    public function setAddress(string $newAddress) :void {
        $this->address = $newAddress;
    }
    public function setCity(string $newCity) :void {
        $this->city = $newCity;
    }
}
?>