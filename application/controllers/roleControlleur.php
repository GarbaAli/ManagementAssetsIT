<?php


class roleControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('roleModel');
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('role/index');
    }
    
    public function deleterole()
    {
        $result = $this->roleModel->supprimer_role();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    // Ajax 
    public function showAllrole()
    {
        $result = $this->roleModel->liste_role();
        echo json_encode($result);
    }

    public function addrole()
    {
        $isExist = $this->roleModel->checkrole();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->roleModel->addrole();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function editrole()
    {
        $result = $this->roleModel->editer_role();
        echo json_encode($result);
    }

    public function updaterole()
    {
        $result = $this->roleModel->updaterole();
        $msg['type'] = 'update';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}