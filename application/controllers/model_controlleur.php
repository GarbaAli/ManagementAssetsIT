<?php

class model_controlleur extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('doctrine');
        // $this->load->library('session');
        $this->load->model('modeleModele');
    }

    public function index()
    {
        $modeles = $this->modeleModele->all_modele();
        $this->load->view('layouts/menu');
        $this->load->view('modele/index', array('modeles'=> $modeles));
    }

    public function store()
    {
       //Validation du formulaire
       $this->form_validation->set_rules('model',  '"Modele"',  'trim|required|min_length[3]|max_length[25]');
      
       if($this->form_validation->run())
       {
           // Recuperation des donnees du formulaire
           $famille = $this->input->post('model');
          
            $this->modeleModele->add_modele($famille);

            $modeles = $this->modeleModele->all_modele();
            $this->load->view('layouts/menu');
            $this->load->view('modele/index', array('modeles'=> $modeles));
       }else{
           // $this->session->set_flashdata('message', 'Vous avez des erreurs');
           // echo $this->session->message;
           $modeles = $this->modeleModele->all_modele();
           $this->load->view('layouts/menu');
           $this->load->view('modele/index', array('modeles'=> $modeles));
       }
    }

  
    public function delete()
    {
        
        // $livres = $this->Modele_book->all_livre();
        // $this->load->view('liste', array('livres'=> $livres));
    }
}