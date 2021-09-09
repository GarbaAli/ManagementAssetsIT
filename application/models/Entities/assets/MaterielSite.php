<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\MaterielSite
 */
class MaterielSite
{
    /**
     * @var smallint $idMateriel
     */
    private $idMateriel;

    /**
     * @var string $codeSite
     */
    private $codeSite;

    /**
     * @var date $dteAffectation
     */
    private $dteAffectation;

    /**
     * @var string $batiment
     */
    private $batiment;

    /**
     * @var string $bureau
     */
    private $bureau;

    /**
     * @var string $detail
     */
    private $detail;


    /**
     * Set idMateriel
     *
     * @param smallint $idMateriel
     * @return MaterielSite
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
     * Set codeSite
     *
     * @param string $codeSite
     * @return MaterielSite
     */
    public function setCodeSite($codeSite)
    {
        $this->codeSite = $codeSite;
        return $this;
    }

    /**
     * Get codeSite
     *
     * @return string 
     */
    public function getCodeSite()
    {
        return $this->codeSite;
    }

    /**
     * Set dteAffectation
     *
     * @param date $dteAffectation
     * @return MaterielSite
     */
    public function setDteAffectation($dteAffectation)
    {
        $this->dteAffectation = $dteAffectation;
        return $this;
    }

    /**
     * Get dteAffectation
     *
     * @return date 
     */
    public function getDteAffectation()
    {
        return $this->dteAffectation;
    }

    /**
     * Set batiment
     *
     * @param string $batiment
     * @return MaterielSite
     */
    public function setBatiment($batiment)
    {
        $this->batiment = $batiment;
        return $this;
    }

    /**
     * Get batiment
     *
     * @return string 
     */
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Set bureau
     *
     * @param string $bureau
     * @return MaterielSite
     */
    public function setBureau($bureau)
    {
        $this->bureau = $bureau;
        return $this;
    }

    /**
     * Get bureau
     *
     * @return string 
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return MaterielSite
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }
    /**
     * @var integer $idMatSite
     */
    private $idMatSite;


    /**
     * Get idMatSite
     *
     * @return integer 
     */
    public function getIdMatSite()
    {
        return $this->idMatSite;
    }
}