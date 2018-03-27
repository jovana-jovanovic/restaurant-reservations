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
class Promena_model extends CI_Model {
     
    public $idPromena;
    public $promena;
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
   
   
   
     
     public function dohvatiPromenu(){
        $this->db->select('idPromena');
		$this->db->from('promena');
		$this->db->where('promena', $this->promena);


return $this->db->get()->first_row();
     }
}
