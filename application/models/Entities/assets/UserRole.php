<?php

namespace Entities\assets;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\assets\UserRole
 */
class UserRole
{
    /**
     * @var integer $idUser
     */
    private $idUser;

    /**
     * @var integer $idRole
     */
    private $idRole;


    /**
     * Set idUser
     *
     * @param integer $idUser
     * @return UserRole
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idRole
     *
     * @param integer $idRole
     * @return UserRole
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;
        return $this;
    }

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
     * @var integer $idUserRole
     */
    private $idUserRole;


    /**
     * Get idUserRole
     *
     * @return integer 
     */
    public function getIdUserRole()
    {
        return $this->idUserRole;
    }
}