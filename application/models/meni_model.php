<?php


class Meni_model extends CI_Model {
     public $idMeni;
    public $naslov;
    public $putanja;
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
   
    
   
    
    public function listaMeni(){
        
        $this->db->select('*');
        $this->db->from('meni');
        return $this->db->get()->result();
    }
   
      
    
}
