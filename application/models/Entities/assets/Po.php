<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Po
 */
class Po
{
    /**
     * @var bigint $idPo
     */
    private $idPo;

    /**
     * @var integer $codeFsseur
     */
    private $codeFsseur;

    /**
     * @var bigint $numPo
     */
    private $numPo;

    /**
     * @var date $dteLivraisonPo
     */
    private $dteLivraisonPo;


    /**
     * Get idPo
     *
     * @return bigint 
     */
    public function getIdPo()
    {
        return $this->idPo;
    }

    /**
     * Set codeFsseur
     *
     * @param integer $codeFsseur
     * @return Po
     */
    public function setCodeFsseur($codeFsseur)
    {
        $this->codeFsseur = $codeFsseur;
        return $this;
    }

    /**
     * Get codeFsseur
     *
     * @return integer 
     */
    public function getCodeFsseur()
    {
        return $this->codeFsseur;
    }

    /**
     * Set numPo
     *
     * @param bigint $numPo
     * @return Po
     */
    public function setNumPo($numPo)
    {
        $this->numPo = $numPo;
        return $this;
    }

    /**
     * Get numPo
     *
     * @return bigint 
     */
    public function getNumPo()
    {
        return $this->numPo;
    }

    /**
     * Set dteLivraisonPo
     *
     * @param date $dteLivraisonPo
     * @return Po
     */
    public function setDteLivraisonPo($dteLivraisonPo)
    {
        $this->dteLivraisonPo = $dteLivraisonPo;
        return $this;
    }

    /**
     * Get dteLivraisonPo
     *
     * @return date 
     */
    public function getDteLivraisonPo()
    {
        return $this->dteLivraisonPo;
    }
}