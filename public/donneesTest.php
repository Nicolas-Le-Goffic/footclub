<?php

$uneEquipe = new Model\Team ("Lille");
$uneEquipe2 = new Model\Team ("Lyon");
$uneEquipe3 = new Model\Team ("Clermont-Ferrand");

$unOpposant = new Model\OpposingClub ("22 bis rue de l'épine", "Marseille");
$unOpposant2 = new Model\OpposingClub ("31 grande rue", "Lyon");
$unOpposant3 = new Model\OpposingClub ("12 rue de salut", "Rennes");

$match1 = new Model\MatchFoot (4, 2, "22/12/2024", $uneEquipe2, "Lyon", $unOpposant);
$match2 = new Model\MatchFoot (2, 2, "20/10/2024", $uneEquipe, "Paris", $unOpposant3);
$match3 = new Model\MatchFoot (3, 5, "12/11/2024", $uneEquipe3, "Clermont", $unOpposant);
$match4 = new Model\MatchFoot (1, 3, "25/09/2024", $uneEquipe2, "Bordeaux", $unOpposant3);
$match5 = new Model\MatchFoot (4, 7, "30/12/2024", $uneEquipe, "Strasbourg", $unOpposant2);

$joueur = new Model\Player ("Nicolas" , "Le Goffic", "17/03/2006", "image.jpg");
$joueur2 = new Model\Player ("Lucas" , "Le Goffic", "05/03/2010", "image.jpg");
$joueur3 = new Model\Player ("Clara" , "Le Goffic", "10/02/2008", "image.jpg");

$joueurTeam = new Model\PlayerHasTeam ($joueur , $uneEquipe2, "attaquant");
$joueurTeam2 = new Model\PlayerHasTeam ($joueur , $uneEquipe, "defenseur");
$joueurTeam3 = new Model\PlayerHasTeam ($joueur2 , $uneEquipe, "defenseur");

$membreStaff = new Model\StaffMember ("Laetita" , "Hammer" , "image.jpg" , "Entraineuse");
$membreStaff2 = new Model\StaffMember ("Willy" , "Le Goffic" ,"image.jpg" , "Préparateur");
$membreStaff3 = new Model\StaffMember ("Luana" , "Le Goffic" , "image.jpg" , "Analyste");
?>