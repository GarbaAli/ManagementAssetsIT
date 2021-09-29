<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class parse_date extends CI_Model
{

    public function parseDate($str) // Change une date aaaa/mm/dd en dd mois aaaa
    {
    // Récupère la date dans des variables
    list($annee, $mois, $jour) = explode("-", $str);
    // Retire le 0 des jours
    if ($jour=="00") $jour="";
    elseif (substr($jour, 0, 1)=="0") $jour=substr($jour, 1, 1);
    // Met le mois en littéral
    $moisli{1} = "janvier";
    $moisli{2} = "février";
    $moisli{3} = "mars";
    $moisli{4} = "avril";
    $moisli{5} = "mai";
    $moisli{6} = "juin";
    $moisli{7} = "juillet";
    $moisli{8} = "août"; 
    $moisli{9} = "septembre";
    $moisli{10} = "octobre";
    $moisli{11} = "novembre";
    $moisli{12} = "décembre";
    if (substr($mois, 0, 1)=="0") $mois=substr($mois, 1, 1);
    $mois = $moisli[$mois];
    // Met en forme 
    $str = $jour.' '.$mois.' '.$annee;
    return $str;
    }

}