<?php


class inventaireControlleur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('inventaireModel');
    }


    public function index()
    {
        // $result = $this->inventaireModel->showAllMateriel();
        // var_dump($result);
        // die();
        $this->load->view('layouts/menu');
        $this->load->view('inventaires/index');
    }
    
    public function deleteMateriel()
    {
        $result = $this->inventaireModel->supprimer_Materiel();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    // Ajax 
    public function showAllMateriel()
    {
        $result = $this->inventaireModel->showAllMateriel();
        echo json_encode($result);
    }

    public function addMateriel($id)
    {
        $result = $this->inventaireModel->addMateriel($id);
        $msg['type'] = 'add';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function newMateriel()
    {
        $result = $this->inventaireModel->newMateriel();
        $msg['type'] = 'add';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    

    public function editMateriel()
    {
        $result = $this->inventaireModel->editer_Materiel();
        echo json_encode($result);
    }

    public function updateMateriel()
    {
        $result = $this->inventaireModel->updateMateriel();
        $msg['type'] = 'update';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}