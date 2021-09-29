<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class siteModel extends CI_Model
{
	protected $table = 'site';
	
	/**
	 *	Ajoute une site
	 */ 
	// public function ajouter_site($site)
	// {
	// 	return $this->db->set('libelle_site',	$site)
	// 			->insert($this->table);
	// }

	public function addSite()
	{
			$site = $this->input->post('site');
		$this->db->set('libelle_site',	$site)
				->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une site déjà existante
	 */
	public function editer_site()
	{
		$id = $this->input->get('id');
		$this->db->where('id_site', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}
	
	/**
	 *	Supprime une site
	 */
	public function supprimer_site()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_site', (int) $id)
				->delete($this->table);
		return true;	
	}
	

	public function updateSite()
	{
		$id = $this->input->post('siteId');
		$site = $this->input->post('site');
		$update_rows = array('libelle_site' => $site);
		$this->db->where('id_site', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}

	public function liste_site()
	{
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	/**
	 *	verifie si ce site existe dja ds la bd
	 */
	public function checkSite()
	{
		$site = $this->input->post('site');
		$query = $this->db->select('libelle_site')
						->from($this->table)
						->where('libelle_site', $site )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	
}


/* End of file site_model.php */
/* Location: ./application/models/site_model.php */