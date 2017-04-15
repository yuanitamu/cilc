<?php

class Detailmodel extends CI_Model{
    
    public function getAllDetail($orderby)
    {
        $this->db->order_by($orderby,'DESC');
        $dataDetil = $this->db->get('negara');
        foreach ($dataDetil->result() as $row)
        {
              
             $this->db->where('idNegara',$row->idNegara);
             $querynegara= $this->db->get('negara');  
             $stack['data1'][$row->idNegara]['negara'] = $querynegara->row_array();

             $this->db->where('idNegara',$row->idNegara);
             $queryharga= $this->db->get('harga');  
             $stack['data1'][$row->idNegara]['harga'] = $queryharga->row_array();
             
             $this->db->where('idNegara',$row->idNegara);
             $querymap= $this->db->get('map'); 
             $stack['data1'][$row->idNegara]['map'] = $querymap->row_array();
        }
        return $stack;
    }

    public function read($id)
    {
        
        $this->db->order_by('IdNegara','DESC');
        $dataDetil = $this->db->get_where('negara', array('IdNegara'=>$id)); 
        foreach ($dataDetil->result() as $row)
        {
              
             $this->db->where('idNegara',$row->idNegara);
             $querynegara= $this->db->get('negara');  
             $stack['data1'][$row->idNegara]['negara'] = $querynegara->row_array();

             $this->db->where('idNegara',$row->idNegara);
             $queryharga= $this->db->get('harga');  
             $stack['data1'][$row->idNegara]['harga'] = $queryharga->row_array();
             
             $this->db->where('idNegara',$row->idNegara);
             $querymap= $this->db->get('map'); 
             $stack['data1'][$row->idNegara]['map'] = $querymap->row_array();
        }
        
        return $stack;
    }
    public function getAllDetailJson($orderby)
    {
         $this->db->order_by($orderby,'DESC');
         $dataDetil = $this->db->get('negara');
         foreach ($dataDetil->result() as $row ) {
             $this->db->where('idNegara',$row->idNegara);
             $querynegara= $this->db->get('negara');  
             $stack= $querynegara->row_array();

             $this->db->where('idNegara',$row->idNegara);
             $queryharga= $this->db->get('harga');  
             $stack += $queryharga->row_array();
             
             $this->db->where('idNegara',$row->idNegara);
             $querymap= $this->db->get('map'); 
             $stack += $querymap->row_array();

             $array[]=$stack;
         }
         return $array;
    }
    public function getAllDetailJsonMin($orderby)
    {
         $this->db->order_by($orderby,'DESC');
         $dataDetil = $this->db->get('negara');
         foreach ($dataDetil->result() as $row ) {
             $this->db->where('idNegara',$row->idNegara);
             $querynegara= $this->db->get('negara');  
             $stack= $querynegara->row_array();

             $array[]=$stack;
         }
         return $array;
    }
    public function readJson($id)
    {
        
        $this->db->order_by('IdNegara','ASC');
        $dataDetil = $this->db->get_where('negara', array('IdNegara'=>$id)); 
        foreach ($dataDetil->result() as $row)
        {
              
             $this->db->where('idNegara',$row->idNegara);
             $querynegara= $this->db->get('negara');  
             $stack= $querynegara->row_array();

             $this->db->where('idNegara',$row->idNegara);
             $queryharga= $this->db->get('harga');  
             $stack+= $queryharga->row_array();
             
             $this->db->where('idNegara',$row->idNegara);
             $querymap= $this->db->get('map'); 
             $stack+= $querymap->row_array();

             $array[]=$stack;
        }
        
        return $array;
    }
}
?>
