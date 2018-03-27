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
class Jelovnik_model extends CI_Model {
     
    public $id;
    public $naziv;
    public $cena;
    public $idKategorija;
   
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
       
 public function unosJelovnika(){
     $podaci=array('naziv'=>$this->naziv,'cena'=>$this->cena);
     $this->db->insert('jelovnik',$podaci);
 }
   public function izmenaJelovnika($podaci){
       $this->db->where('idJelovnik',$this->id);
       $this->db->update('jelovnik',$podaci);
   }
   public function brisanjeJelovnika(){
       $this->db->where('idJelovnik',$this->id);
       $this->db->delete('jelovnik');
   }
   
     
   
    
     
     public function listaJelovnik($limit,$start){
        $this->db->select('*');
        $this->db->from('jelovnik');
        $this->db->limit($limit,$start);
        $rez= $this->db->get();

       return $rez->result();
     }
      public function dohvatiJelovnik(){
       $this->db->select('*');
$this->db->from('jelovnik');
$this->db->where('idJelovnik', $this->id);


return $this->db->get();
     }
}
