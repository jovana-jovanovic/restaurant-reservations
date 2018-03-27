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
class Sto_model extends CI_Model {
     
    public $id;
    public $ime;
    public $minimum;
    public $maximum;
    public $status;
    
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
       public function unosStola(){
       $podaci=array('ime'=>$this->ime,'minimum'=>$this->minimum,'maximum'=>$this->maximum);
       $this->db->insert('sto',$podaci);
   }
  
  public function izmenaStola($podaci){
      $this->db->where('idSto',$this->id);
      $this->db->update('sto',$podaci);
  }
  public function brisanjeStola(){
       $this->db->where('idSto',$this->id);
       $this->db->delete('sto');
   }
   
   
     public function listaStolova($limit,$start){
        $this->db->select('*');
        $this->db->from('sto');
        $this->db->limit($limit,$start);
       $rez= $this->db->get();

       return $rez->result();
     }
    public function dohvatiSto(){
		$this->db->select('*');
		$this->db->from('sto');
		$this->db->where('idSto', $this->id);


return $this->db->get();
     }
     public function slobodniStolovi($datum,$vreme_pocetka,$vreme_kraja){
			$rez= $this->db->query('select * from sto where idSto not in(select idSto from rezervacija where datum = '.$datum.  ' and ((vreme_pocetka > ' .$vreme_pocetka. '  and vreme_pocetka < '.$vreme_kraja. ' ) or( vreme_pocetka <= ' .$vreme_pocetka.' and idTermin_kraj > '.$vreme_pocetka. '  )));');
			return $rez->result();
			 
     }
         
     
}
