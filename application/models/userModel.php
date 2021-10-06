<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userModel extends CI_Model
{
	protected $table = 'utilisateur';
	
	/**
	 *	Ajoute une user
	 */
	public function ajouter_user()   
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
	 *	Édite une user déjà existante
	 */
	public function edituser()
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

	
	public function updateuser()
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
	 *	Supprime une user
	 */
	public function delete()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_fsseur', (int) $id)
				->delete($this->table);
		return true;
	}
	
	/**
	 *	Retourne le nombre de user
	 */
	public function count_user()
	{
		$query = $this->db->query('SELECT * FROM utilsateur');
        return  $query->num_rows();
	}
	
	/**
	 *	Retourne une liste de user
	 */
	public function listeuser()
	{
		$query = $this->db->query('SELECT U.id_user, U.nom_prenom_user, U.email_user, U.fonction_user, U.staff_user, U.phone_user, R.libelle_role, D.libelle_dept FROM utilisateur U, role R, departement D WHERE R.id_role = U.role_id AND D.id_dept = U.departement_id');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}	
	}



	/**
	 *	verifie si la variable passer en parametre existe en bd
	 */
	public function checkuser()
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


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */