<?php

use Doctrine\ORM\EntityManager;
use Entities\assets\Departement;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Driver\Statement;

require_once(APPPATH."models/Entities/assets/Departement.php");

class departementModele extends CI_Model {
     
    /**     
     * @var \Doctrine\ORM\EntityManager $em 
     */
    var $em;
     
    public function __construct() {
        // parent::__construct();
        $this->em  = $this->doctrine->em;
    }
     
    /**
     * Add contact messages to database
     * @param array $contact_form
     * @return bool 
     */
    function add_departement($libelle)
    {    
        $departement = new Departement();
        $departement->setLibelleDept($libelle);
         
        try {
            //save to database
            $this->em->persist($departement);
            $this->em->flush();
        }
        catch(Exception $err){
            die($err->getMessage());
        }
        return true;  
    }

    /**
     * get book in database
     * @return array 
     */
    public function all_departement()
    {
         $depart = $this->em->getRepository("Entities\assets\Departement");
        
             $qb = $this->em->createQueryBuilder();

            $qb->select('d')->from("Entities\assets\Departement", 'd');
            $query = $qb->getQuery();

            // echo $query->getDQL(), "\n";
            return  $query->getArrayResult();
    }

    public function deletes($famille_id)
    {
        $em = $this->em;
        $famille = $em->getRepository("Entities\assets\Famille")->find($famille_id);

        if (!$famille) {
            return false;
        }

        $em->remove($famille);
       return  $em->flush();
    }


    public function update($famille_id)
    {
        
    }

    public function nb_famille()
    {
        
    }
}
