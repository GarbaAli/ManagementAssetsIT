<?php


class fsseurControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('fsseur_model'); 
    }


    public function store()
    {
        $isExist = $this->fsseur_model->checkFournisseur();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->fsseur_model->ajouter_fournisseur();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function listeFournisseur()
    {
        $result = $this->fsseur_model->listeFournisseur();
        echo json_encode($result);
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('fournisseur/index');
    }
    
    public function delete()
    {
        $result = $this->fsseur_model->delete();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editFournisseur()
    {
        $result = $this->fsseur_model->editFournisseur();
        echo json_encode($result);
    }

    public function updateFournisseur()
    {
        
            $result = $this->fsseur_model->updateFournisseur();
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($result) {
                $msg['success'] = true;
            }
        echo json_encode($msg);
    }
}