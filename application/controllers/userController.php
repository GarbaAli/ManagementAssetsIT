<?php


class fsseurControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('userModel'); 
    }


    public function store()
    {
        $isExist = $this->userModel->checkuser();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->userModel->ajouter_user();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function listeUser()
    {
        $result = $this->userModel->listeuser();
        echo json_encode($result);
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('utilisateur/index');
    }
    
    public function delete()
    {
        $result = $this->userModel->delete();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function edituser()
    {
        $result = $this->userModel->edituser();
        echo json_encode($result);
    }

    public function updateuser()
    {
        
            $result = $this->userModel->updateuser();
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($result) {
                $msg['success'] = true;
            }
        echo json_encode($msg);
    }
}