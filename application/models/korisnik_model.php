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
class Korisnik_model extends CI_Model {
     
    public $id;
    public $ime;
    public $prezime;
    public $username;
    public $password;
    public $mail;
    public $iduloga;
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
       
   public function unosKorisnika(){
      $podaci=array('ime'=>$this->ime,'prezime'=>$this->prezime,'username'=>$this->username,'password'=>$this->password,'mail'=>$this->mail,'idUloga'=>$this->iduloga);
       $this->db->insert('korisnik',$podaci);
      }
      public function registration_insert($data){
			 $this->db->insert('korisnik',$data);
			 if($this->db->affected_rows()>0){
			 return true;
 }
 else{
      return false;}}
	  
  
   
  
     public function listaKorisnika($limit,$start){
        $this->db->select('*');
        $this->db->from('korisnik');
        $this->db->limit($limit,$start);
       $rez= $this->db->get();

       return $rez->result();
     }
     
     public function izmenaKorisnika($podaci){
         $this->db->where('idKorisnik', $this->id);
         $this->db->update('korisnik',$podaci);
     }
     public function brisanjeKorisnika(){
         $this->db->where('idKorisnik',$this->id);
         $this->db->delete('korisnik');
     }
     public function dohvatiKorisnika(){
          $this->db->select('*');
          $this->db->from('korisnik');
          $this->db->where('idKorisnik',$this->id);
           return $this->db->get();
     }
      public function login(){
          $podaci=array('username'=>$this->username,'password'=>$this->password);
          $this->db->select('*');
          $this->db->from('korisnik');
          $this->db->where('username',$this->username);
          $this->db->where('password',$this->password);
           
           return $this->db->get()->result();
     }
     public function aktivacija_naloga($hash){
			 $data=array('status'=>1);
			 $this->db->where('rand',$hash);
			 $this->db->update('korisnik',$data);
			 if($this->db->affected_rows()>0){
			 return true;

}
 else{
 return false;
}
}}