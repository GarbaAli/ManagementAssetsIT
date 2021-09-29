<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class item_model extends CI_Model
{
	protected $table = 'items';
	
	/**
	 *	Ajoute une items
	 */
	public function ajouter_items()
	{
		$modele = $this->input->post('modele');
		$famille = $this->input->post('famille');
		$qte = $this->input->post('qte');
		$qteLivrer = $this->input->post('qteLivrer');
		$cmd = $this->input->post('cmd');
		$this->db->set('libelle_item',$modele)
					->set('qte_item',$qte)
					->set('famille_id',	$famille)
					->set('qte_livrer',	$qteLivrer)
					->set('qte_receptionner', $qteLivrer)
					->set('cmd_id', $cmd)
					->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
	/**
	 *	Supprime une items
	 */
	public function supprimer_items($id)
	{
		return $this->db->where('id_items', (int) $id)
				->delete($this->table);
	}
	
	/**
	 *	Retourne le nombre de items
	 */
	public function count()
	{
		$query = $this->db->query('SELECT * FROM items');
        return  $query->num_rows();
	}
	
	/**
	 *	Retourne une liste de items
	 */
	public function liste_items()
	{
		$id = $this->input->get('id');
		$query =  $this->db->select('I.id_items, I.libelle_item, I.qte_item, I.famille_id, I.qte_receptionner, F.libelle_famille, I.qte_livrer')
					->from('items AS I')
					->join('cmd AS C', 'I.cmd_id = C.id_cmd')
					->join('famille AS F', 'I.famille_id = F.id_famille')
					->where('C.id_cmd', (int)$id)
					->get();
			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
			
	}

	public function get_item($id)
	{
		return $this->db->select('I.id_items, I.libelle_item, I.qte_item, I.qte_receptionner, I.cmd_id')
            ->from('items AS I')
            ->where('id_items', (int) $id)
			->get()
			->result();
	}
}


/* End of file items_model.php */
/* Location: ./application/models/items_model.php */