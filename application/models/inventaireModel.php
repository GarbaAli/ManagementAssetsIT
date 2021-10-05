<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventaireModel extends CI_Model
{
	protected $table = 'materiel';
	protected $table2 = 'materiel_site';
	
	/**
	 *	Ajoute une materiel
	 */
	public function addMateriel($id)
	{

			$this->db->trans_begin();
		
			$sn = $this->input->post('sn'.$id);
			$mac = $this->input->post('mac'.$id);
			$modele = $this->input->post('modele'.$id);
			$item = $this->input->post('item'.$id);
			$qte = $this->input->post('qte');
			$statut = 'En stock';
			$this->db->set('sn',	$sn)
					->set('num_mac', $mac)
					->set('modele', $modele)
					->set('items_id', $item)
					->set('statut', $statut)
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
			$sn = $this->input->post('serailnber');
			$mac = $this->input->post('mac');
			$modele = $this->input->post('modele');
			$famille = $this->input->post('famille');
			$code = $this->input->post('code');
			$designation = $this->input->post('designation');
			$statut = $this->input->post('statut');
			$observation = $this->input->post('observation');
			$this->db->set('sn',	$sn)
					->set('num_mac', $mac)
					->set('modele', $modele)
					->set('code_mat', $code)
					->set('designation_mat', $designation)
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

	// MAD
	public function affectation()
	{
			$this->db->trans_begin();

			$site = $this->input->post('site');
			$batiment = $this->input->post('batiment');
			$bureau = $this->input->post('bureau');
			$detail = $this->input->post('detail');
			$dte_mad = $this->input->post('dte_mad');
			$materiel = $this->input->post('materiel_id');
			$hostname = $this->input->post('hostnameMAD');
			$type = 'Mise a disposition';
			$status = 'En production';
			
			$this->db->set('materiel_id',	$materiel)
					->set('site_id', $site)
					->set('dte_affectation', $dte_mad)
					->set('batiment', $batiment)
					->set('hostname', $hostname)
					->set('bureau', $bureau)
					->set('details', $detail)
					->set('statut', $status)
					->set('typeMAD', $type)
				->insert($this->table2);
			//Dans la bd materiel --------------------------------------------

			
			$update_rows = array('statut' => $status);
			$this->db->where('id_mat', $materiel);
			$query = $this->db->update('materiel', $update_rows);
			if ($this->db->trans_status() === false) {
				$this->db->trans_rollback();
				return false;
			}else{
				$this->db->trans_commit();
				return true;
			}
	}

	public function RecupererMateriel()
	{
			$this->db->trans_begin();

			$dte = $this->input->post('dte_recup');
			$materiel = $this->input->post('materiel_id');
			$statut = 'Retour en Stock';
			$hostname = $this->input->post('hostname');
			$site = 1;
			$type = 'Recuperation';
			$this->db->set('materiel_id',	$materiel)
					->set('dte_affectation', $dte)
					->set('statut', $statut)
					->set('hostname', $hostname)
					->set('site_id', $site)
					->set('typeMAD', $type)
				->insert($this->table2);

			//--------------------------------------------
			$status = 'En stock';
				$update_rows = array('statut' => $status);
				$this->db->where('id_mat', $materiel);
				$query = $this->db->update('materiel', $update_rows);
				if ($this->db->trans_status() === false) {
					$this->db->trans_rollback();
					return false;
				}else{
					$this->db->trans_commit();
					return true;
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
	 *	Liste toutes les localisation d'un materiel
	 */
	public function materielSite()
	{
		$id = $this->input->get('id');
		$query = $this->db->query('SELECT M.sn, S.libelle_site, A.dte_affectation, A.batiment, A.bureau, A.details, A.hostname, A.hostnameSortant, A.statut, A.typeMAD, A.dte_retour FROM materiel M, site S, materiel_site A WHERE A.materiel_id = M.id_mat AND S.id_site = A.site_id AND M.id_mat ='.$id);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}	

	}
	
	/**
	 *	Édite un materiel déjà existante
	 */
	public function updateMateriel()
	{
		$id = $this->input->post('matId');
		$sn = $this->input->post('serailnber');
		$mac = $this->input->post('mac');
		$modele = $this->input->post('modele');
		$famille = $this->input->post('famille');
		$code = $this->input->post('code');
		$designation = $this->input->post('designation');
		$statut = $this->input->post('statut');
		$observation = $this->input->post('observation');
		$update_rows = array('sn' => $sn, 'num_mac' => $mac, 'modele' => $modele, 'famille' => $famille, 'code_mat'=>$code, 'designation_mat'=> $designation, 'statut'=>$statut, 'observation'=>$observation);
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
		$result = $this->db->select('M.id_mat, M.code_mat, M.designation_mat, M.sn, M.num_mac,, M.modele, M.observation, M.statut, M.items_id, M.famille, F.libelle_famille')
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