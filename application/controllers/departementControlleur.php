<?php


class departementControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->model('departementModel');
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('departement/index');
    }
    
    public function deletedepartement()
    {
        $result = $this->departementModel->supprimer_departement();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    // Ajax 
    public function showAlldepartement()
    {
        $result = $this->departementModel->liste_departement();
        echo json_encode($result);
    }

    public function adddepartement()
    {
        $isExist = $this->departementModel->checkdepartement();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->departementModel->adddepartement();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function editdepartement()
    {
        $result = $this->departementModel->editer_departement();
        echo json_encode($result);
    }

    public function updatedepartement()
    {
        $result = $this->departementModel->updatedepartement();
        $msg['type'] = 'update';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}