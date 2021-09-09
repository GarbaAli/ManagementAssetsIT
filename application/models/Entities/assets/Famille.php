<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Famille
 */
class Famille
{
    /**
     * @var string $idFamille
     */
    private $idFamille;

    /**
     * @var string $libelleFamille
     */
    private $libelleFamille;


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
     * Set libelleFamille
     *
     * @param string $libelleFamille
     * @return Famille
     */
    public function setLibelleFamille($libelleFamille)
    {
        $this->libelleFamille = $libelleFamille;
        return $this;
    }

    /**
     * Get libelleFamille
     *
     * @return string 
     */
    public function getLibelleFamille()
    {
        return $this->libelleFamille;
    }
}