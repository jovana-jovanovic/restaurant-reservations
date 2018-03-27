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
class Glasanje_model extends CI_Model {
     
    public $idGlasanje;
    public $idOdgovor;
    public $rezultat;
   
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
       
       
        public function unosIdOdgovora(){
			  $podaci=array('idOdgovor'=>$this->idOdgovor,'rezultat'=>0);
			  $this->db->insert('glasanje',$podaci);
      
     }
       public function dohvatiPitanje(){
       

				 $query= $this->db->get_where('pitanje',array('status'=>1));
				 if($this->db->affected_rows()>0){
					  return $query->first_row();}
       }
 
     
   }
