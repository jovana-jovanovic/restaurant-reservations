<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uloga_model
 *
 * @author Jovanaa
 */
class Odgovor_model extends CI_Model {
     
    public $idOdgovor;
    public $idPitanje;
    public $odgovor;
   
    
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
     
     public function unosOdgovora(){
		   $podaci=array('idPitanje'=>$this->idPitanje,'odgovor'=>$this->odgovor);
		   $this->db->insert('odgovor',$podaci);
		   $id = $this->db->insert_id();
		   return $id;
   }
  
  
   public function izmenaOdgovora($podaci){
		  $this->db->where('idOdgovor',$this->idOdgovor);
		  $this->db->update('odgovor',$podaci);
  }
  
   public function brisanjeOdgovora(){
       $this->db->where('idOdgovor',$this->idOdgovor);
       $this->db->delete('odgovor');
   }
   public function brisanjeListeOdgovora(){
        $this->db->where('idPitanje',$this->idPitanje);
        $this->db->delete('odgovor');
   }
   public function prebrojOdgovore(){
        $this->db->select('idOdgovor');
        $this->db->where('idPitanje',$this->idPitanje);
        $rez = $this->db->get('odgovor');
        return $rez->num_rows();
   }

      public function listaOdgovora(){
        $this->db->select('*');
        $this->db->from('odgovor');
        $this->db->where('idPitanje',$this->idPitanje);
        
        $rez= $this->db->get();

       return $rez->result();
     }

       public function dohvatiOdgovor(){
       $this->db->select('*');
$this->db->from('odgovor');
$this->db->where('idOdgovor', $this->idOdgovor);


return $this->db->get();
     }
    
         
     
}
