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
class Rezervacija_model extends CI_Model {
     
    public $id;
    public $datum;
    public $vreme_pocetka;
    public $vreme_kraja;
    public $idSto;
    public $idKorisnik;
    public $status;
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
  public function unosRezervacije(){
      $podaci=array('datum'=>$this->datum,'vreme_pocetka'=>$this->vreme_pocetka,'idTermin_kraj'=>$this->vreme_kraja,'idSto'=>$this->idSto,'idKorisnik'=>$this->idKorisnik,'status' =>1);
      $this->db->insert('rezervacija',$podaci);
      
      
  }
  public function mojeRezervacije(){
      $this->db->select('*');
      $this->db->from('rezervacija');
      $this->db->where('idKorisnik',$this->idKorisnik);
      $this->db->order_by("datum", "desc");
      $this->db->order_by("vreme_pocetka", "desc");
      return $this->db->get()->result();
      
  }
  public function sveRezervacije(){
      $this->db->select('*');
      $this->db->from('rezervacija');
      $this->db->order_by("datum", "desc");
      return $this->db->get()->result();
      
  }
   public function aktivneRezervacije(){
      $this->db->select('*');
      $this->db->from('rezervacija');
	  $this->db->join('korisnik', 'rezervacija.idKorisnik = korisnik.idKorisnik');
      $this->db->where('status',1);
      $this->db->order_by("datum", "desc");
      return $this->db->get()->result();
      
  }
  public function zavrseneRezervacije($limit,$start){
      $where = "status = 0 OR status = 2";


      $this->db->select('*');
      $this->db->from('rezervacija');
	  $this->db->join('korisnik', 'rezervacija.idKorisnik = korisnik.idKorisnik');
      $this->db->where($where);
      
      $this->db->order_by("datum", "desc");
      $this->db->limit($limit,$start);
      return $this->db->get()->result();
      
  }
  public function statusRezervacije(){
		  $danas=mktime(0, 0, 0, date("n")  , date("j"), date("Y"));
		  $where = "datum < '$danas' AND status = 1 ";
		  $podaci=array('status'=>0);
      
			$this->db->where($where );
  
      
       
			$this->db->update('rezervacija',$podaci);
      
  }
   public function statusRezervacijeKorisnik(){
		  $danas=mktime(0, 0, 0, date("n")  , date("j"), date("Y"));
		  $where = "datum < '$danas' AND status = 1 AND idKorisnik= ".$this->idKorisnik;
		  $podaci=array('status'=>0);
      
		   $this->db->where($where );
  
      
       
          $this->db->update('rezervacija',$podaci);
      
  }
  
  public function danasRezervacije(){
      $this->db->select('*');
      $this->db->from('rezervacija');
	  $this->db->join('korisnik', 'rezervacija.idKorisnik = korisnik.idKorisnik');
      $this->db->where('datum',$this->datum);
      $this->db->order_by("vreme_pocetka", "asc");
      return $this->db->get()->result();
      
  }
  public function otkaziRezervaciju(){
       $this->db->where('idRezervacija',$this->id);
       $this->db->delete('rezervacija');
   }
    public function potvrdiRezervaciju(){
        $podaci=array('status'=>2);
       $this->db->where('idRezervacija',$this->id);
       $this->db->update('rezervacija',$podaci);
   }
   
  
  
   
     

}
