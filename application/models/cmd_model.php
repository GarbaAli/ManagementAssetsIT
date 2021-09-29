<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cmd_Model extends CI_Model
{
	protected $table = 'cmd';
	
	/**
	 *	Ajoute une cmd
	 */
	public function ajouter_cmd()
	{
		$po = $this->input->post('po');
		$fsseur = $this->input->post('fsseur');
		$dte = $this->input->post('dte');
		$this->db->set('po',$po)
					->set('dte_livraison',$dte)
					->set('fournisseur_id',	$fsseur)
					->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une cmd déjà existante
	 */
	public function editCmd()
	{
        $id = $this->input->get('id');
		$query = $this->db->select('C.id_cmd, C.po, C.dte_livraison, F.nom_fsseur')
		->from('cmd AS C')
		->join('fournisseur AS F', 'C.fournisseur_id = F.id_fsseur')
		->where('id_cmd', $id)
		->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}	
	}

	public function updateCmd()
	{
		$id = $this->input->post('cmdId');
		$po = $this->input->post('po');
		$dte = $this->input->post('dte');
		$fsseur = $this->input->post('fsseur');
		$update_rows = array('po' => $po, 'dte_livraison' => $dte, 'fournisseur_id' => $fsseur);
		$this->db->where('id_cmd', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}
	
	/**
	 *	Supprime une cmd
	 */
	// public function supprimer_cmd($id)
	// {
	// 	return $this->db->where('id_cmd', (int) $id)
	// 			->delete($this->table);
	// }
	
	/**
	 *	Retourne le nombre de cmd
	 */
	public function count()
	{
		$query = $this->db->query('SELECT * FROM cmd');
        return  $query->num_rows();
	}
	
	/**
	 *	Retourne une liste de cmd
	 */
	public function listeCmd()
	{
		$query =  $this->db->select('C.id_cmd, C.po, C.dte_livraison, F.nom_fsseur')
			->from('cmd AS C')
			->join('fournisseur AS F', 'C.fournisseur_id = F.id_fsseur')
			->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
	}

	/**
	 *	verifie si la variable passer en parametre existe en bd
	 */
	public function checkCmd()
	{
		$po = $this->input->post('po');
		$query = $this->db->select('id_cmd')
						->from($this->table)
						->where('po', $po )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

    public function get_cmd($id)
	{
		return $this->db->select('C.id_cmd, C.po, C.dte_livraison, F.nom_fsseur')
            ->from('cmd AS C')
            ->join('fournisseur AS F', 'C.fournisseur_id = F.id_fsseur')
            ->where('id_cmd', (int) $id)
			->get()
			->result();
	}

    public function get_items_cmd($id)
    {
        return $this->db->select('I.id_items, I.libelle_item, I.qte_item, I.famille_id, I.qte_receptionner')
			->from('items AS I')
			->join('cmd AS C', 'I.cmd_id = C.id_cmd')
            ->where('C.id_cmd', (int)$id)
			->get()
			->result();
    }
}


/* End of file cmd_model.php */
/* Location: ./application/models/cmd_model.php */