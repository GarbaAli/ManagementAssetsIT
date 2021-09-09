<?php

use Entities\assets\Famille;

require_once(APPPATH."models/Entities/assets/Famille.php");

class familleModel extends CI_Model {
     
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
    function add_famille($famille)
    {    
        $fm = new Famille();
        $fm->setLibelleFamille($famille);
         
        try {
            //save to database
            $this->em->persist($fm);
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
    public function all_famille()
    {
        return $this->em->getRepository("Entities\assets\Famille")->findAll();
    }

    #####################################
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
        // $em = $this->em;
        // $famille = $em->getRepository("Entities\assets\Famille")->find($famille_id);

        // if (!$famille) {
        //     throw $this->createNotFoundException('thats not a record');
        // }

        // /** @var $post RedditPost */
        // $famille->setTitle('updated title ' . $text);

        // $em->flush();

        // return redirect()->back();
    }

    public function nb_famille()
    {
        //  $famille = $this->em->getRepository("Entities\assets\Famille")->findAll();
        //  return $famille->Count();
        // $repository = $this->em->getRepository("Entities\assets\Famille");
        // $qb = $repository->createQueryBuilder('f');
        // return $qb
        // ->select('count(f.id)')
        // ->getQuery()
        // ->getSingleScalarResult();
    }
}
