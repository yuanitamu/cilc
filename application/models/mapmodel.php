<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
class Mapmodel extends CI_Model{
// fungsi konstruktor
		


		public function delete($id)
		{
			// Loading database library
			$this->load->database();
			// Check the existing data
			if ($this->check_id($id))
			{
				// Found? Now delete it
				$this->db->delete('map', array('idMap' => $id));
			}
			return TRUE;
		}

		public function check_id($id) //user=lingga
		{
			// Loading database library
			$this->load->database();
			
			$query = $this->db->get_where('map', array('idMap'=>$id)); 
			if ($query->num_rows() !== 0) return TRUE;
			return ;
		}
		public function check_id2($id) //user=lingga
		{
			// Loading database library
			$this->load->database();
			
			$query = $this->db->get_where('map', array('idNegara'=>$id)); 
			if ($query->num_rows() !== 0) return TRUE;
			return ;
		}
		
		public function fetchLastID()
		{
			$this->db->order_by('idMap', 'DESC');
		    $query = $this->db->get('map', 1);
		    foreach ($query->result() as $key ) {
		    	 $result=$key->ID_barang;
		    }
		    return $result ;
		}

		public function updateMap($id,$data)
		{
			
			if ($this->check_id2($id))
			{
				$this->db->where('idNegara', $id);
				$this->db->update('map', $data);
				return TRUE;
			}

			return;
		}

}
?>