<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class departementModel extends CI_Model
{
	protected $table = 'departement';
	
	public function adddepartement()
	{
			$departement = $this->input->post('departement');
		$this->db->set('libelle_dept',	$departement)
				->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une departement déjà existante
	 */
	public function editer_departement()
	{
		$id = $this->input->get('id');
		$this->db->where('id_dept', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}
	
	/**
	 *	Supprime une departement
	 */
	public function supprimer_departement()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_dept', (int) $id)
				->delete($this->table);
		return true;	
	}
	

	public function updatedepartement()
	{
		$id = $this->input->post('departementId');
		$departement = $this->input->post('departement');
		$update_rows = array('libelle_dept' => $departement);
		$this->db->where('id_dept', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}

	public function liste_departement()
	{
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 *	verifie si ce departement existe dja ds la bd
	 */
	public function checkdepartement()
	{
		$departement = $this->input->post('departement');
		$query = $this->db->select('libelle_dept')
						->from($this->table)
						->where('libelle_dept', $departement )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	
}


/* End of file departement_model.php */
/* Location: ./application/models/departement_model.php */