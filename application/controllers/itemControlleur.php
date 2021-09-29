<?php


class itemControlleur extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('item_model');
        $this->load->model('cmd_Model');
        $this->load->model('fsseur_model');
    }

    public function receptionner($id)
    {
        $item = $this->item_model->get_item($id);
        $this->load->view('layouts/menu');
        $this->load->view('cmd/receptionner', array('item'=> $item));
    }
 
    public function store()
    {
             $msg['success'] = false;
            $result = $this->item_model->ajouter_items();
            $msg['type'] = 'add';
            if ($result) {
                $msg['success'] = true;
            }
        echo json_encode($msg);
    }

    public function listeItem()
	{
		$result = $this->item_model->liste_items();
        echo json_encode($result);
	}

    
    public function delete($id)
    {
        $this->item_model->supprimer_items($id);
        $this->session->set_flashdata('success', 'Item supprimé');
        // return redirect('itemControlleur/index', 'refresh');
        return redirect()->back();
    }


}