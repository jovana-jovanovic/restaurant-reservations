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
class Anketa_model extends CI_Model {
     
    public $idPitanje;
    public $pitanje;
    public $status;
   
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
       
       
        public function brisanjeAnkete(){
			   $this->db->where('idPitanje',$this->idPitanje);
			   $this->db->delete('pitanje');
   }
       public function dohvatiPitanje(){
      

				 $query= $this->db->get_where('pitanje',array('status'=>1));
				      if($this->db->affected_rows()>0){
					             return $query->first_row();}
					   }
       public function unosAnkete(){
			   $podaci=array('pitanje'=>$this->pitanje,'status'=>$this->status);
			   $this->db->insert('pitanje',$podaci);
			   $id = $this->db->insert_id();
			   return $id;
 }
       public function dohvatiOdgovore($id){
			 $query= $this->db->get_where('odgovor',array('idPitanje'=>$id));
			 return $query->result();
       }
        public function listaAnketa($limit,$start){
				$this->db->select('*');
				$this->db->from('pitanje');
				$this->db->limit($limit,$start);
				$rez= $this->db->get();

				return $rez->result();
     }
		public function izborAnkete(){
				$this->db->select('*');
				$this->db->from('pitanje');
				
			    $rez= $this->db->get();

			   return $rez->result();
     }
       public function dohvatiAnketu(){
			   $this->db->select('*');
			   $this->db->from('pitanje');
			   $this->db->where('idPitanje', $this->idPitanje);


              return $this->db->get();
     }
    
       public function glasaj($idOdgovor){
				 $this->db->where('idOdgovor',$idOdgovor);
				 $query= $this->db->get('glasanje');
				 $rez=$query->result();
				 $rez1=$rez[0]->rezultat;
				 $rez1=$rez1+1;
				 $data1=array('rezultat'=>$rez1);
				 $this->db->where('idOdgovor',$idOdgovor);
				 $this->db->update('glasanje',$data1);
				 if($this->db->affected_rows()>0){
				 return true;

}
 else{
       return false;}}
        public function dohvatiRezultat($idPitanje){
				 $this->db->select('*');
				 $this->db->from('glasanje');
				 $this->db->join('odgovor','glasanje.idOdgovor=odgovor.idOdgovor','left');
				 $this->db->where('odgovor.idPitanje',$idPitanje);
				 $query= $this->db->get();
        return $query->result();}
		
		
     public function izmenaAnkete($podaci){
				   $this->db->where('idPitanje',$this->idPitanje);
				   $this->db->update('pitanje',$podaci);
   }
     public function izmenaStatusa($podaci){
				   $this->db->where('idPitanje !=',$this->idPitanje);
				   $this->db->update('pitanje',$podaci);
   }
   
   public function ukupanRezultat($idPitanje){
				 $this->db->select_sum('rezultat');
				 $this->db->from('glasanje');
				 $this->db->join('odgovor','glasanje.idOdgovor=odgovor.idOdgovor','left');
				 $this->db->where('odgovor.idPitanje',$idPitanje);
				 $query= $this->db->get();
				 return $query->result();}
				   
   
    
}
