<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM; 

/**
 * Entities\assets\Departement
 */
class Departement
{
    /** 
     * @var string $codeDept
     */
    private $codeDept;

    /**
     * @var string $libelleDept
     */
    private $libelleDept;

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
     * Set libelleDept
     *
     * @param string $libelleDept
     * @return Departement
     */
    public function setLibelleDept($libelleDept)
    {
        $this->libelleDept = $libelleDept;
        return $this;
    }

    /**
     * Get libelleDept
     *
     * @return string 
     */
    public function getLibelleDept()
    {
        return $this->libelleDept;
    }
}