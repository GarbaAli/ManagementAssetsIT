<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Utiliser
 */
class Utiliser
{
    /**
     * @var smallint $idMateriel
     */
    private $idMateriel;

    /**
     * @var string $codeClt
     */
    private $codeClt;


    /**
     * Set idMateriel
     *
     * @param smallint $idMateriel
     * @return Utiliser
     */
    public function setIdMateriel($idMateriel)
    {
        $this->idMateriel = $idMateriel;
        return $this;
    }

    /**
     * Get idMateriel
     *
     * @return smallint 
     */
    public function getIdMateriel()
    {
        return $this->idMateriel;
    }

    /**
     * Set codeClt
     *
     * @param string $codeClt
     * @return Utiliser
     */
    public function setCodeClt($codeClt)
    {
        $this->codeClt = $codeClt;
        return $this;
    }

    /**
     * Get codeClt
     *
     * @return string 
     */
    public function getCodeClt()
    {
        return $this->codeClt;
    }
    /**
     * @var integer $idMatClt
     */
    private $idMatClt;


    /**
     * Get idMatClt
     *
     * @return integer 
     */
    public function getIdMatClt()
    {
        return $this->idMatClt;
    }
}