<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
class Hargamodel extends CI_Model{
// fungsi konstruktor
		


		public function getHarga($id){
			$data = array();
			$this->db->where('idMakan',$id);
			$this->db->limit(1);
			$Q = $this->db->get('harga');
			if($Q->num_rows() > 0){
			$data = $Q->row_array();
			}
			$Q->free_result();
			return $data;
		}


		public function getAllHarga($orderby){
			
			$this->db->order_by($orderby);
			$Q = $this->db->get('harga');
			return $Q;
		}

		public function getArrayAllHarga($orderby){
			
			$this->db->order_by($orderby);
			$Q = $this->db->get('harga');
			return $Q->row_array();
		}
		public function addHarga($data){
			
				$this->db->insert('harga',$data);
				return TRUE;
		}


		public function editHarga($data,$id){
			if ($this->check_id($id))
			{
				$this->db->where('idMakan',$id);
				$this->db->update('harga',$data);
				return TRUE;
			}
			return;
		}

		public function delete($id)
		{
			// Loading database library
			$this->load->database();
			// Check the existing data
			if ($this->check_id($id))
			{
				// Found? Now delete it
				$this->db->delete('harga', array('idMakan' => $id));
			}
			return TRUE;
		}

		public function check_id($id) //user=lingga
		{
			// Loading database library
			$this->load->database();
			
			$query = $this->db->get_where('harga', array('idMakan'=>$id)); 
			if ($query->num_rows() !== 0) return TRUE;
			return ;
		}
		public function check_id2($id) //user=lingga
		{
			// Loading database library
			$this->load->database();
			
			$query = $this->db->get_where('harga', array('idNegara'=>$id)); 
			if ($query->num_rows() !== 0) return TRUE;
			return ;
		}

		public function fetchLastID()
		{
			$this->db->order_by('idMakan', 'DESC');
		    $query = $this->db->get('harga', 1);
		    foreach ($query->result() as $key ) {
		    	 $result=$key->ID_barang;
		    }
		    return $result ;
		}

		public function updateHarga($id,$data)
		{
			
			if ($this->check_id2($id))
			{
				$this->db->where('idNegara', $id);
				$this->db->update('harga', $data);
				return TRUE;
			}

			return;
		}

}
?>