<?php


class siteControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        // $this->load->library('session');
        $this->load->model('siteModel');
    }

    public function create()
    {
        $this->load->view('formulaire');
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('site/index');
    }
    
    public function deleteSite()
    {
        $result = $this->siteModel->supprimer_site();
        $msg['success'] = true;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    // Ajax 
    public function showAllSite()
    {
        $result = $this->siteModel->liste_site();
        echo json_encode($result);
    }

    public function addSite()
    {
        $isExist = $this->siteModel->checkSite();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->siteModel->addSite();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function editSite()
    {
        $result = $this->siteModel->editer_site();
        echo json_encode($result);
    }

    public function updateSite()
    {
        $result = $this->siteModel->updateSite();
        $msg['type'] = 'update';
        $msg['success'] = false;
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}