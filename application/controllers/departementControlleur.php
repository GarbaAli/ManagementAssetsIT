<?php

class departementControlleur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('doctrine');
        // $this->load->library('session');
        $this->load->model('departementModele');
    }

    


    public function index()
    {
        $departements = $this->departementModele->all_departement();
        $this->load->view('layouts/menu');
        $this->load->view('departement/index', array('departements'=> $departements));
    }

    public function store()
    {
         //Validation du formulaire
       $this->form_validation->set_rules('libelle',  '"Libelle Departement"',  'trim|required|min_length[2]|max_length[25]');
      

       if($this->form_validation->run())
       {
           // Recuperation des donnees du formulaire
           $libelle = $this->input->post('libelle');
            $this->departementModele->add_departement($libelle);
            $departements = $this->departementModele->all_departement();
            $this->load->view('layouts/menu');
            $this->load->view('departement/index', array('departements'=> $departements));

       }else{
           // $this->session->set_flashdata('message', 'Vous avez des erreurs');
           // echo $this->session->message;
           $departements = $this->departementModele->all_departement();
            $this->load->view('layouts/menu');
             $this->load->view('departement/index', array('departements'=> $departements));
       }
    }
}