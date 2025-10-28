<?php
namespace Model;

class PlayerHasTeam {
    private Player $player;
    private Team $team;
    private string $role;

    public function __construct ( Player $player, Team $team, string $role)
    {
        $this->player = $player;
        $this->team = $team;
        $this->role = $role;
    }
    public function getPlayer() :int {
        return $this->player;
    }
    public function getTeam() :int {
        return $this->team;
    }
    public function getRole() :string {
        return $this->role;
    }
    public function setPlayer(Player $player) :void {
        $this->player = $player;
    }
    public function setTeam(Team $team) :void {
        $this->team = $team;
    }
    public function setRole(string $role) :void {
        $this->role = $role;
    }
}
?>