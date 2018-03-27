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
class Tabela_model extends CI_Model {
     
    public $idTabela;
    public $tabela;
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
   
   
   
   
     
     public function dohvatiTabelu(){
		$this->db->select('idTabela');
		$this->db->from('tabela');
		$this->db->where('tabela', $this->tabela);


		return $this->db->get()->first_row();
     }
}
