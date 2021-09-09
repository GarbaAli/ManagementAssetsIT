<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Modele
 */
class Modele
{
    /**
     * @var string $idModele
     */
    private $idModele;

    /**
     * @var string $libelleModele
     */
    private $libelleModele;


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
     * Set libelleModele
     *
     * @param string $libelleModele
     * @return Modele
     */
    public function setLibelleModele($libelleModele)
    {
        $this->libelleModele = $libelleModele;
        return $this;
    }

    /**
     * Get libelleModele
     *
     * @return string 
     */
    public function getLibelleModele()
    {
        return $this->libelleModele;
    }
}