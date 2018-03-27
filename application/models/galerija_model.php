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
class Galerija_model extends CI_Model {
     
    public $thumb;
    public $putanja;
    public $opis;
    
    
   function __construct() {
       parent::__construct();
       $this->load->database();  }
   
        public function galerija($limit,$start){
				 $this->db->limit($limit,$start);
				 $rez= $this->db->get('galerija');
				 if($rez->num_rows()>0){
				 return $rez->result();

}
 else{
        return false;}}
		
         public function unosSlike(){
				 $data=array(
				 'putanja'=>$this->putanja,
				 'thumb'=>$this->thumb,
				 'opis'=>$this->opis
				 );

				 $this->db->insert('galerija',$data);
				 if($this->db->affected_rows()>0){
				 return true;
				 }
 else{
         return false;}}
    
}
