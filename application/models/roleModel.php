<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class roleModel extends CI_Model
{
	protected $table = 'role';
	
	public function addrole()
	{
			$role = $this->input->post('role');
		$this->db->set('libelle_role',	$role)
				->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une role déjà existante
	 */
	public function editer_role()
	{
		$id = $this->input->get('id');
		$this->db->where('id_role', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}
	
	/**
	 *	Supprime une role
	 */
	public function supprimer_role()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_role', (int) $id)
				->delete($this->table);
		return true;	
	}
	

	public function updaterole()
	{
		$id = $this->input->post('roleId');
		$role = $this->input->post('role');
		$update_rows = array('libelle_role' => $role);
		$this->db->where('id_role', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}

	public function liste_role()
	{
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 *	verifie si ce role existe dja ds la bd
	 */
	public function checkrole()
	{
		$role = $this->input->post('role');
		$query = $this->db->select('libelle_role')
						->from($this->table)
						->where('libelle_role', $role )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	
}


/* End of file role_model.php */
/* Location: ./application/models/role_model.php */