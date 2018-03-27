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
class Log_model extends CI_Model {
     
    public $id;
    public $datum;
    public $idTabela;
    public $idPromena;
    public $idKorisnik;
   
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
       
 public function insertLog(){
     $podaci=array('datum'=>$this->datum,'idTabela'=>$this->idTabela,'idPromena'=>$this->idPromena,'idKorisnik'=>$this->idKorisnik);
     $this->db->insert('log',$podaci);
 }
  
   public function brisanjeLogova(){
       $this->db->where('idLog',$this->id);
       $this->db->delete('log');
   }
   
     
   
    
     public function listaLogova($limit,$start){
            $this->db->select('*');
			$this->db->from('log');
			$this->db->join('korisnik', 'log.idKorisnik = korisnik.idKorisnik');
			$this->db->join('tabela', 'log.idTabela = tabela.idTabela');
			$this->db->join('promena', 'log.idPromena = promena.idPromena');
			$this->db->order_by("datum", "desc");
			$this->db->limit($limit,$start);

			 $rez=$this->db->get();
			 return $rez->result();
     }
     
      
}
