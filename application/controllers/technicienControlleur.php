<?php

class technicienControlleur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('doctrine');
        // $this->load->library('session');
        $this->load->model('technicienModel');
    }


    public function index()
    {
        $technicien = $this->technicienModel->all_technicien();
        var_dump($technicien);
        die();
        $this->load->view('layouts/menu');
        $this->load->view('techniciens/index');
    }
}