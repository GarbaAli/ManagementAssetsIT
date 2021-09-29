<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Famille_model extends CI_Model
{
	protected $table = 'famille';
	
	/**
	 *	Ajoute une famille
	 */
	public function addFamille()
	{
		$famille = $this->input->post('famille');
		$this->db->set('libelle_famille',	$famille)
				->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une famille déjà existante
	 */
	public function updateFamille()
	{
		$id = $this->input->post('familleId');
		$famille = $this->input->post('famille');
		$update_rows = array('libelle_famille' => $famille);
		$this->db->where('id_famille', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}
	
	/**
	 *	Supprime une famille
	 */
	public function deleteFamille()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_famille', (int) $id)
				->delete($this->table);
		return true;
	}
	
	/**
	 *	Retourne le nombre de famille
	 */
	public function count_famille()
	{
		$query = $this->db->query('SELECT * FROM famille');
        return  $query->num_rows();
	}

	/**
	 *	Retourne le nombre de famille
	 */
	public function checkFamille()
	{
		$famille = $this->input->post('famille');
		$query = $this->db->select('libelle_famille')
						->from($this->table)
						->where('libelle_famille', $famille )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Retourne une liste de famille
	 */
	public function liste_famille()
	{
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 *	Recuperer les donnees dune famille
	 */
	public function editFamille()
	{
		$id = $this->input->get('id');
		$this->db->where('id_famille', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}

	public function get_libelle($id)
	{
		$var =  $this->db->select('libelle_famille')
			->from($this->table)
			->where('id_famille', (int)$id)
			->get()
			->result();

		$libelle = $var[0]->libelle_famille;

		return $libelle;
	}
}


/* End of file famille_model.php */
/* Location: ./application/models/famille_model.php */