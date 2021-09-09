<?php

use Entities\assets\Modele;


require_once(APPPATH."models/Entities/assets/Modele.php");

class modeleModele extends CI_Model {
     
    /**     
     * @var \Doctrine\ORM\EntityManager $em 
     */
    var $em;
     
    public function __construct() {
        // parent::__construct();
        $this->em = $this->doctrine->em;
    }
     
    /**
     * Add contact messages to database
     * @param array $contact_form
     * @return bool 
     */
    function add_modele($modele)
    {    
        $mod = new Modele();
        $mod->setLibelleModele($modele);
         
        try {
            //save to database
            $this->em->persist($mod);
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
    public function all_modele()
    {
        return $this->em->getRepository("Entities\assets\Modele")->findAll();
    }

    public function detele()
    {
        try
        {
            if(!is_array($ids))
            {
                $ids = array($ids);
            }
            foreach($ids as $id)
            {
                $entity = $this->em->getPartialReference("Entities\assets\Modele", $id);
                $this->em->remove($entity);
            }
            $this->em->flush();
            return TRUE;
        }
        catch(Exception $err)
        {
            return FALSE;
        }
    }


    function get_modele($id)
    {
        try
        {     
            $mod = $this->em->find($id);
            return $mod;
        }
        catch(Exception $err)
        {
            return NULL;
        }
    }
}
