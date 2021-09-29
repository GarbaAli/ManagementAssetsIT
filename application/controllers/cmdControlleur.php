<?php


class cmdControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('cmd_Model');
        $this->load->model('cmd_Model');
    }

    public function create()
    {
        // $this->load->view('formulaire');
    }

    public function store()
    {
        $isExist = $this->cmd_Model->checkCmd();
        $msg['success'] = false;
        if ($isExist) {
            $msg['success'] = false;
        }else{
            $result = $this->cmd_Model->ajouter_cmd();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        }
        echo json_encode($msg);
    }

    public function index()
    {
        $this->load->view('layouts/menu');
        $this->load->view('cmd/index');
    }

    public function listeCmd()
	{
		$result = $this->cmd_Model->listeCmd();
        echo json_encode($result);
	}
    
    public function delete($id)
    {
        $this->cmd_Model->supprimer_cmd($id);
        $this->session->set_flashdata('success', 'Commande supprimée');
        return redirect('cmdControlleur/index', 'refresh');
    }

    public function show($id)
    {
        $cmd = $this->cmd_Model->get_cmd($id);
        // $items = $this->cmd_Model->get_items_cmd($id);
        $this->load->view('layouts/menu');
        $this->load->view('cmd/show', array('cmd'=> $cmd));
    }

    public function editCmd()
    {
        $result = $this->cmd_Model->editCmd();
        echo json_encode($result);
    }

    public function updateCmd()
    {
            $result = $this->cmd_Model->updateCmd();
            $msg['success'] = false;
            $msg['type'] = 'update';
            if ($result) {
                $msg['success'] = true;
            }
        echo json_encode($msg);
    }


}