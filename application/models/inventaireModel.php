<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventaireModel extends CI_Model
{
	protected $table = 'materiel';
	
	/**
	 *	Ajoute une materiel
	 */
	public function addMateriel($id)
	{

			$this->db->trans_begin();
		
			$sn = $this->input->post('sn'.$id);
			$reference = $this->input->post('reference'.$id);
			$mac = $this->input->post('mac'.$id);
			$modele = $this->input->post('modele'.$id);
			$item = $this->input->post('item'.$id);
			$qte = $this->input->post('qte');
			$this->db->set('sn',	$sn)
					->set('reference', $reference)
					->set('num_mac', $mac)
					->set('modele', $modele)
					->set('items_id', $item)
				->insert($this->table);
			// ------------------------------------------------
			$update_rows = array('qte_receptionner' => $qte);
			$this->db->where('id_items', $item);
			$query = $this->db->update('items', $update_rows);

			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			}else{
				$this->db->trans_commit();
				return true;
			}
	}

	public function newMateriel()
	{
		
			$sn = $this->input->post('sn');
			$reference = $this->input->post('reference');
			$mac = $this->input->post('mac');
			$modele = $this->input->post('modele');
			$famille = $this->input->post('famille');
			$code = $this->input->post('code');
			$designation = $this->input->post('designation');
			$etat = $this->input->post('etat');
			$service = $this->input->post('service');
			$localisation = $this->input->post('localisation');
			$statut = $this->input->post('statut');
			$observation = $this->input->post('observation');
			// $localisation = $this->input->post('localisation');
			$this->db->set('sn',	$sn)
					->set('reference', $reference)
					->set('num_mac', $mac)
					->set('modele', $modele)
					->set('code_mat', $code)
					->set('designation_mat', $designation)
					->set('etat', $etat)
					->set('service', $service)
					->set('derniere_localisation', $localisation)
					->set('statut', $statut)
					->set('observation', $observation)
					->set('famille', $famille)
				->insert($this->table);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}

	public function editer_materiel()
	{
		$id = $this->input->get('id');
		$this->db->where('id_mat', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}		
	}
	
	/**
	 *	Édite une materiel déjà existante
	 */
	public function updateMateriel()
	{
		$id = $this->input->post('matId');
		$sn = $this->input->post('sn');
		$reference = $this->input->post('reference');
		$mac = $this->input->post('mac');
		$modele = $this->input->post('modele');
		$famille = $this->input->post('famille');
		$code = $this->input->post('code');
		$designation = $this->input->post('designation');
		$etat = $this->input->post('etat');
		$service = $this->input->post('service');
		$localisation = $this->input->post('localisation');
		$statut = $this->input->post('statut');
		$observation = $this->input->post('observation');

		$update_rows = array('sn' => $sn, 'reference' => $reference, 'num_mac' => $mac, 'modele' => $modele, 'famille' => $famille, 'code_mat');
		$this->db->where('id_mat', $id);
		$query = $this->db->update($this->table, $update_rows);
		return true;
	}
	
	/**
	 *	Supprime une materiel
	 */
	public function supprimer_materiel()
	{
		$id = $this->input->get('id');
		 $query = $this->db->where('id_mat', (int) $id)
				->delete($this->table);
		return true;	
	}
	
	/**
	 *	Retourne le nombre de materiel
	 */
	public function count()
	{
		$query = $this->db->query('SELECT * FROM materiel');
        return  $query->num_rows();
	}
	
	/**
	 *	Retourne une liste de materiel
	 */
	public function showAllMateriel()
	{
		$result = $this->db->select('M.id_mat, M.code_mat, M.designation_mat, M.sn, M.reference, M.num_mac, M.etat, M.service, M.modele, M.observation, M.statut, M.derniere_localisation, M.items_id, M.famille, F.libelle_famille')
        ->from('materiel AS M')
        ->join('items AS I', 'M.items_id = I.id_items', 'left')
		->join('famille AS F', 'I.famille_id = F.id_famille', 'left')
			->get()
			->result();

        return $result;
        
            // echo json_encode($result);
	}

}


/* End of file inventaireModel.php */
/* Location: ./application/models/inventaireModel.php */