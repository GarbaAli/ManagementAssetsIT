<?php


class familleControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('Famille_model');  
    }

    public function index()
    {
        // $familles = $this->Famille_model->liste_famille();
        // $count_famille = $this->Famille_model->count_famille();
        $this->load->view('layouts/menu');
        $this->load->view('famille/index');
    }

    public function store()
    {
        $isExist = $this->Famille_model->checkFamille();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->Famille_model->addFamille();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }


    public function listeFamille()
    {
        $result = $this->Famille_model->liste_famille();
        echo json_encode($result);
    }
    
    public function deleteFamille()
    {
        $result = $this->Famille_model->deleteFamille();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editFamille()
    {
        $result = $this->Famille_model->editFamille();
        echo json_encode($result);
    }

    public function updateFamille()
    {
        $isExist = $this->Famille_model->checkFamille();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->Famille_model->updateFamille();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }
}