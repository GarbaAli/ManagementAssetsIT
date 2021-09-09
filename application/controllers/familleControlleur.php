<?php


class familleControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('doctrine');
        // $this->load->library('session');
        $this->load->model('familleModel');
    }

    public function create()
    {
        $this->load->view('formulaire');
    }

    public function store()
    {
       //Validation du formulaire
       $this->form_validation->set_rules('famille',  '"Famille"',  'trim|required|min_length[3]|max_length[25]');
      

       if($this->form_validation->run())
       {
           // Recuperation des donnees du formulaire
           $famille = $this->input->post('famille');
          

            $this->familleModel->add_famille($famille);

            $familles = $this->familleModel->all_famille();
            $this->load->view('layouts/menu');
            $this->load->view('famille/index', array('familles'=> $familles));

       }else{
           // $this->session->set_flashdata('message', 'Vous avez des erreurs');
           // echo $this->session->message;
           $familles = $this->familleModel->all_famille();
           $this->load->view('layouts/menu');
           $this->load->view('famille/index', array('familles'=> $familles));
       }
    }

    public function index()
    {
        $familles = $this->familleModel->all_famille();
        // $count_famille = $this->familleModel->nb_famille();
        $this->load->view('layouts/menu');
        $this->load->view('famille/index', array('familles'=> $familles));
    }
    
    public function delete($famille_id)
    {
        $this->familleModel->deletes($famille_id);
        return redirect()->back();
    }
}