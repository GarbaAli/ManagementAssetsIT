<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\FamilleModele
 */
class FamilleModele
{
    /**
     * @var string $idFamille
     */
    private $idFamille;

    /**
     * @var string $idModele
     */
    private $idModele;


    /**
     * Set idFamille
     *
     * @param string $idFamille
     * @return FamilleModele
     */
    public function setIdFamille($idFamille)
    {
        $this->idFamille = $idFamille;
        return $this;
    }

    /**
     * Get idFamille
     *
     * @return string 
     */
    public function getIdFamille()
    {
        return $this->idFamille;
    }

    /**
     * Set idModele
     *
     * @param string $idModele
     * @return FamilleModele
     */
    public function setIdModele($idModele)
    {
        $this->idModele = $idModele;
        return $this;
    }

    /**
     * Get idModele
     *
     * @return string 
     */
    public function getIdModele()
    {
        return $this->idModele;
    }
    /**
     * @var integer $idModFam
     */
    private $idModFam;


    /**
     * Get idModFam
     *
     * @return integer 
     */
    public function getIdModFam()
    {
        return $this->idModFam;
    }
}