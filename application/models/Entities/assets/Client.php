<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Client
 */
class Client  
{
    /**
     * @var string $codeClt
     */
    private $codeClt;

    /**
     * @var string $codeDept
     */
    private $codeDept;

    /**
     * @var string $nomPrenomClt
     */
    private $nomPrenomClt;

    /**
     * @var string $fonctionClt
     */
    private $fonctionClt;

    /**
     * @var string $staffClt
     */
    private $staffClt;

    /**
     * @var string $emailClt
     */
    private $emailClt;

    /**
     * @var string $phoneClt
     */
    private $phoneClt;


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
     * Set codeDept
     *
     * @param string $codeDept
     * @return Client
     */
    public function setCodeDept($codeDept)
    {
        $this->codeDept = $codeDept;
        return $this;
    }

    /**
     * Get codeDept
     *
     * @return string 
     */
    public function getCodeDept()
    {
        return $this->codeDept;
    }

    /**
     * Set nomPrenomClt
     *
     * @param string $nomPrenomClt
     * @return Client
     */
    public function setNomPrenomClt($nomPrenomClt)
    {
        $this->nomPrenomClt = $nomPrenomClt;
        return $this;
    }

    /**
     * Get nomPrenomClt
     *
     * @return string 
     */
    public function getNomPrenomClt()
    {
        return $this->nomPrenomClt;
    }

    /**
     * Set fonctionClt
     *
     * @param string $fonctionClt
     * @return Client
     */
    public function setFonctionClt($fonctionClt)
    {
        $this->fonctionClt = $fonctionClt;
        return $this;
    }

    /**
     * Get fonctionClt
     *
     * @return string 
     */
    public function getFonctionClt()
    {
        return $this->fonctionClt;
    }

    /**
     * Set staffClt
     *
     * @param string $staffClt
     * @return Client
     */
    public function setStaffClt($staffClt)
    {
        $this->staffClt = $staffClt;
        return $this;
    }

    /**
     * Get staffClt
     *
     * @return string 
     */
    public function getStaffClt()
    {
        return $this->staffClt;
    }

    /**
     * Set emailClt
     *
     * @param string $emailClt
     * @return Client
     */
    public function setEmailClt($emailClt)
    {
        $this->emailClt = $emailClt;
        return $this;
    }

    /**
     * Get emailClt
     *
     * @return string 
     */
    public function getEmailClt()
    {
        return $this->emailClt;
    }

    /**
     * Set phoneClt
     *
     * @param string $phoneClt
     * @return Client
     */
    public function setPhoneClt($phoneClt)
    {
        $this->phoneClt = $phoneClt;
        return $this;
    }

    /**
     * Get phoneClt
     *
     * @return string 
     */
    public function getPhoneClt()
    {
        return $this->phoneClt;
    }
}