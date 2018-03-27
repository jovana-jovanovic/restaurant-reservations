<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of backend_Controller
 *
 * @author Jovanaa
 */
class My_Controller extends CI_Controller {
  protected $ulogovan=FALSE;
   
    function __construct() {
        parent::__construct();
		
         $podaci=array();        
         $this->load->helper('form');
         if($this->session->userdata('idUloga')){
         $this->ulogovan=TRUE;}
      
    }
    
    public function load_view($view,$podaci=array()){
       
       
          $podaci['ulogovan']=$this->ulogovan;
          $this->load->model('meni_model');
          $rez=$this->meni_model->listaMeni();
          $tmp=array();
          $base_url='http://localhost/restoran/';
        foreach($rez as $r){
            $tmp['idMeni']=$r->idMeni;
            $tmp['naslov']=$r->naslov;
            $tmp['putanja']=$r->putanja;
            $podaci['meni_podaci'][]=$tmp;
        }
        $this->load->model('anketa_model');    
        
       
        if($this->anketa_model->dohvatiPitanje()){
            $podaci['anketa']=$this->anketa_model->dohvatiPitanje()->pitanje;
        
			$idPitanje=$this->anketa_model->dohvatiPitanje()->idPitanje;
			$rez=$this->anketa_model->dohvatiOdgovore($idPitanje);
			$tmp=array();
			foreach($rez as $r){
            
            $tmp['idOdgovor']=$r->idOdgovor;
            $tmp['odgovor']=$r->odgovor;
            
            $podaci['odgovori'][]=$tmp;
            
        }
        }
        
        $this->load->view('novi/header',$podaci);
        $this->load->view('novi/nav',$podaci);
              
        $this->load->view($view,$podaci);
        $this->load->view('novi/footer',$podaci);
    }
}
