<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zaposleni extends My_Controller {

    
    function __construct() {
        parent::__construct();
     
         if($this->session->userdata('idUloga')!=3){
                    redirect('Pocetna');
                }
                
    }
		public function index()
		{
			
					$podaci['page_title']='Pregled rezervacija';
				   
					$this->load_view('novi/zaposleni',$podaci);
		}
  
		   public function rezervacijePromena(){


					  $this->load->model('rezervacija_model');
					  $this->rezervacija_model->statusRezervacije();
					  $rez=$this->rezervacija_model->aktivneRezervacije();
					  $output;

				foreach($rez as $r){
					$tmp=array();
					$this->load->model('termin_model');
					$p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
					$k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);

					 $tmp['idRezervacija']=$r->idRezervacija;
					 $tmp['vreme_pocetka']=$p->termin;
					 $tmp['vreme_kraja']=$k->termin;
					 $tmp['datum']=$r->datum;
					 $tmp['username']=$r->username;
					 $tmp['status']=$r->status;




					  $output[]=$tmp;}
    




					 header('Content-Type: text/event-stream');
					 header('Cache-Control: no-cache');
        // $time = date('r');
        // echo "data: ".json_encode($rez);
        // $time = date('r');
					$t=json_encode($output);
				   echo "data: {$t}\n\n";


				  flush();
    }
      
       public function aktivneRezervacije(){
				   $this->load->model('rezervacija_model');
				   $this->rezervacija_model->statusRezervacije();
					$rez=$this->rezervacija_model->aktivneRezervacije();
					foreach($rez as $r){
						 $tmp=array();
					     $this->load->model('termin_model');
					     $p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
					     $k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);

						$tmp['idRezervacija']=$r->idRezervacija;
						$tmp['vreme_pocetka']=$p->termin;
						$tmp['vreme_kraja']=$k->termin;
						$tmp['datum']=$r->datum;
						$tmp['username']=$r->username;
						$tmp['status']=$r->status;

						$podaci['rezervacije'][]=$tmp;


					}
					if($podaci['rezervacije']!=''){
				    $podaci['page_title']='Aktivne rezervacije';
					$this->load_view('novi/zaposleni',$podaci);}
					else {
						redirect('Zaposleni');
        }
         }
          public function zavrseneRezervacije(){
              
                                 
			$this->load->library('pagination');
			$this->load->database(); 

			 $config['base_url'] = 'http://restoranvintage.esy.es/Zaposleni/zavrseneRezervacije';
			 $config['total_rows'] = $this->db->count_all('rezervacija');
			 $config['per_page'] = "10";
			 $config["uri_segment"] = 3;
			 $choice = $config["total_rows"] / $config["per_page"];
			 $config["num_links"] = floor($choice);
			 $config['full_tag_open'] = '<ul class="pagination">';
			 $config['full_tag_close'] = '</ul>';
			 $config['first_link'] = false;
			 $config['last_link'] = false;
			 $config['first_tag_open'] = '<li>';
			 $config['first_tag_close'] = '</li>';
			 $config['prev_link'] = '&laquo';
			 $config['prev_tag_open'] = '<li class="prev">';
			 $config['prev_tag_close'] = '</li>';
			 $config['next_link'] = '&raquo';
			 $config['next_tag_open'] = '<li>';
			 $config['next_tag_close'] = '</li>';
			 $config['last_tag_open'] = '<li>';
			 $config['last_tag_close'] = '</li>';
			 $config['cur_tag_open'] = '<li class="active"><a href="#">';
			 $config['cur_tag_close'] = '</a></li>';
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $this->pagination->initialize($config);
			 $podaci['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
						
					   
           
            $this->load->model('rezervacija_model');
            $this->rezervacija_model->statusRezervacije();
             $rez=$this->rezervacija_model->zavrseneRezervacije($config["per_page"], $podaci['page']);
             foreach($rez as $r){
                  $tmp=array();
                  $this->load->model('termin_model');
                  $p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
                  $k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);
                
                 $tmp['idRezervacija']=$r->idRezervacija;
                 $tmp['vreme_pocetka']=$p->termin;
                 $tmp['vreme_kraja']=$k->termin;
                 $tmp['datum']=$r->datum;
				 $tmp['username']=$r->username;
                 $tmp['status']=$r->status;
                 
                 $podaci['rezervacije'][]=$tmp;
                 
                 
             }
             if($podaci['rezervacije']!=''){
                  $podaci['pagination'] = $this->pagination->create_links();
                  $podaci['page_title']='Zavrsene rezervacije';
                  $this->load_view('novi/zaposleni',$podaci);}
             else {
                 redirect('Zaposleni');
             }
         }
		  public function rezervacijePromenaDanas(){
               $this->load->model('rezervacija_model');
               $s=date('H,i,s,n,j,Y');
               $sa=explode(',', $s);
               $sad=mktime(0,0,0,$sa[3],$sa[4],$sa[5]);
               $this->rezervacija_model->datum=$sad;
               $rez=$this->rezervacija_model->danasRezervacije();
              $output;
           foreach($rez as $r){
                $tmp=array();
                $this->load->model('termin_model');
                $p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
                $k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);

               $tmp['idRezervacija']=$r->idRezervacija;
               $tmp['vreme_pocetka']=$p->termin;
               $tmp['vreme_kraja']=$k->termin;
               $tmp['datum']=$r->datum;
               $tmp['username']=$r->username;
               $tmp['status']=$r->status;

               $output[]=$tmp;


           }
           header('Content-Type: text/event-stream');
            header('Cache-Control: no-cache');
            // $time = date('r');
            // echo "data: ".json_encode($rez);
            // $time = date('r');
            $t=json_encode($output);
          echo "data: {$t}\n\n";


          flush();
         }
          public function danasRezervacije(){
                 $this->load->model('rezervacija_model');
                 $s=date('H,i,s,n,j,Y');
                 $sa=explode(',', $s);
                 $sad=mktime(0,0,0,$sa[3],$sa[4],$sa[5]);
                 $this->rezervacija_model->datum=$sad;
             $rez=$this->rezervacija_model->danasRezervacije();
             foreach($rez as $r){
                  $tmp=array();
                  $this->load->model('termin_model');
                  $p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
                  $k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);
                
                 $tmp['idRezervacija']=$r->idRezervacija;
                 $tmp['vreme_pocetka']=$p->termin;
                 $tmp['vreme_kraja']=$k->termin;
                 $tmp['datum']=$r->datum;
				 $tmp['username']=$r->username;
                 $tmp['status']=$r->status;
                 
                 $podaci['rezervacije'][]=$tmp;
                 
                 
             }
             if($podaci['rezervacije']!=''){
                 $podaci['page_title']='Danasnje rezervacije';
                 $this->load_view('novi/zaposleni',$podaci);}
             else {
                 redirect('Zaposleni');
             }
         }
         
     public function otkaziRezervaciju($id){
			 $this->load->model('rezervacija_model');
			 $this->rezervacija_model->id=$id;
			 $this->rezervacija_model->otkaziRezervaciju();
			 redirect('Zaposleni');
     }
      public function potvrdiRezervaciju($id){
			 $this->load->model('rezervacija_model');
			 $this->rezervacija_model->id=$id;
			 $this->rezervacija_model->potvrdiRezervaciju();
			 redirect('Zaposleni/danasRezervacije');
     }
     
     
     
    }