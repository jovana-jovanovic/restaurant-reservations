<?php


class Termin_model extends CI_Model {
     public $idTermin;
    public $termin;
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function terminiKraj($termini_pocetak){
        
        $this->db->select('*');
        $this->db->from('termin');
        $this->db->where('idTermin >',$termini_pocetak);
        
        return $this->db->get()->result();
    }
    
   
    
    public function listaTermina(){
        
        $this->db->select('*');
        $this->db->from('termin');
        return $this->db->get()->result();
    }
    public function dohvatiTermin($idTermin){
        $this->db->select('termin');
        $this->db->from('termin');
        $this->db->where('idTermin',$idTermin);
        return $this->db->get()->first_row();
        
    }
    
}
