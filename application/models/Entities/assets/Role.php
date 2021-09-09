<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\Role
 */
class Role
{
    /**
     * @var integer $idRole
     */
    private $idRole;

    /**
     * @var string $libelleRole
     */
    private $libelleRole;


    /**
     * Get idRole
     *
     * @return integer 
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set libelleRole
     *
     * @param string $libelleRole
     * @return Role
     */
    public function setLibelleRole($libelleRole)
    {
        $this->libelleRole = $libelleRole;
        return $this;
    }

    /**
     * Get libelleRole
     *
     * @return string 
     */
    public function getLibelleRole()
    {
        return $this->libelleRole;
    }
}