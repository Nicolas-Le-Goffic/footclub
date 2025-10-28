<?php
namespace Model;

class MatchFoot {
    private int $teamScore;
    private int $opponentScore;
    private string $dateMatch;
    private Team $team;
    private string $city;
    private OpposingClub $opposingClub;


    public function __construct ( int $teamScore, int $opponentScore, string $dateMatch, Team $team, string $city, OpposingClub $opposingClub)
    {
        $this->teamScore = $teamScore;
        $this->opponentScore = $opponentScore;
        $this->dateMatch = $dateMatch;
        $this->team = $team;
        $this->city = $city;
        $this->opposingClub = $opposingClub;
    }

    public function getTeamScore() :int {
        return $this->teamScore;
    }
    public function getOpponentScore() :int {
        return $this->opponentScore;
    }
    public function getDateMatch() :string {
        return $this->dateMatch;
    }
    public function getTeam() :Team{
        return $this->team;
    }
    public function getCity() : string {
        return $this->city;
    }
    public function getOpposingClub() :OpposingClub {
        return $this->opposingClub;
    }
    public function setTeamScore(int $teamScore) :void {
        $this->teamScore = $teamScore;
    }
    public function setOpponentScore(int $opponentScore) :void {
        $this->opponentScore = $opponentScore;
    }
    public function setDateMatch(string $dateMatch) :void {
        $this->dateMatch = $dateMatch;
    }
    public function setTeam(Team $team) :void {
        $this->team = $team;
    }
    public function setCity(string $city) :void {
        $this->city = $city;
    }
    public function setOpposingClub(OpposingClub $opposingClub) :void {
        $this->opposingClub = $opposingClub;
    }
}