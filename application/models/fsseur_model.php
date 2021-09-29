<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fsseur_model extends CI_Model
{
	protected $table = 'fournisseur';
	
	/**
	 *	Ajoute une fournisseur
	 */
	public function ajouter_fournisseur()   
	{
		$nom = $this->input->post('nom');
		$email = $this->input->post('email');
		$phone1 = $this->input->post('phone1');
		$phone2 = $this->input->post('phone2');
		$this->db->set('nom_fsseur',	$nom)
					->set('email_fsseur',	$email)
					->set('phone1_fsseur',	$phone1)
					->set('phone2_fsseur',	$phone2)
					->insert($this->table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 *	Édite une fournisseur déjà existante
	 */
	public function editFournisseur()
	{
		$id = $this->input->get('id');
		$this->db->where('id_fsseur', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}

	
	public function updateFournisseur()
	{
		$id = $this->input->post('fsseurId');
		$nom = $this->input->post('nom');
		$email = $this->input->post('email');
		$phone1 = $this->input->post('phone1');
		$phone2 = $this->input->post('phone2');
		$update_rows = array('nom_fsseur' => $nom, 'email_fsseur' => $email, 'phone1_fsseur' => $phone1,'phone2_fsseur' => $phone2 );
		$this->db->where('id_fsseur', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}
	
	/**
	 *	Supprime une fournisseur
	 */
	public function delete()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_fsseur', (int) $id)
				->delete($this->table);
		return true;
	}
	
	/**
	 *	Retourne le nombre de fournisseur
	 */
	public function count_fournisseur()
	{
		$query = $this->db->query('SELECT * FROM fournisseur');
        return  $query->num_rows();
	}
	
	/**
	 *	Retourne une liste de Fournisseur
	 */
	public function listeFournisseur()
	{
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function listeFsseur()
	{
		$query = $this->db->get($this->table)->result();
		return $query;
	}

	/**
	 *	verifie si la variable passer en parametre existe en bd
	 */
	public function checkFournisseur()
	{
		$nom = $this->input->post('nom');
		$email = $this->input->post('email');
		$query = $this->db->select('id_fsseur')
						->from($this->table)
						->where('email_fsseur', $email )
						->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}


/* End of file fournisseur_model.php */
/* Location: ./application/models/fournisseur_model.php */