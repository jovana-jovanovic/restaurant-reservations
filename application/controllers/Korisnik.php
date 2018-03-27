<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Korisnik extends My_Controller {

    
    function __construct() {
        parent::__construct();
         if($this->session->userdata('idUloga')!=2){
                    redirect('Pocetna');
                }
               
    }
	public function index()
	{
		
                $podaci['page_title']='Rezervacije korisnika';
                $this->load_view('novi/korisnik',$podaci);
               
	}
       
          public function rezervacija(){
                 $d=$this->input->post('datum');
                 $dat= explode('/', $d);
                 $datum=mktime(0,0,0,$dat[0],$dat[1],$dat[2]);
                  $termini_pocetak=$this->input->post('termini_pocetak');
                  $termini_kraj=$this->input->post('termini_kraj');
                  $this->load->model('sto_model');
                  $rez= $this->sto_model->slobodniStolovi($datum,$termini_pocetak,$termini_kraj);
                 
            
                     
                    print json_encode($rez); 
                    
          }
          public function ajaxChange(){
         
			 $this->load->model('termin_model');
			 $rez=$this->termin_model->listaTermina();
         
         
             print json_encode($rez);
         
          }
		  public function rezAjax(){
                            $dat=$this->input->post('datum');
                            $array = explode('/', $dat);
                            $s=date('H,i,s,n,j,Y');
                            $sat=date('H');
                            $sa=explode(',', $s);
                            $sad=mktime(0,0,0,$sa[3],$sa[4],$sa[5]);
                            if($dat!=''){
                            $datum=mktime(0,0,0,$array[0],$array[1],$array[2]);}
                            else{
                                $datum='';
                            }

                             $termini_pocetak=$this->input->post('termini_pocetak');
                             $termini_kraj=$this->input->post('termini_kraj');
                             $sto=$this->input->post('ddlRezervacija');
                             if($termini_pocetak!=0 && $termini_kraj!=0 && $sto!=0 && $datum!=''){
                                 if($datum > $sad){
                              $this->load->model('rezervacija_model');
                              $this->rezervacija_model->datum=$datum;
                              $this->rezervacija_model->vreme_pocetka=$termini_pocetak;
                              $this->rezervacija_model->vreme_kraja=$termini_kraj;
                              $this->rezervacija_model->idSto=$sto;
                              $this->rezervacija_model->status=1;
                              $this->rezervacija_model->idKorisnik=$this->session->userdata('id');


                             $rez= $this->rezervacija_model->unosRezervacije();


                               print "Uspesno ste rezervisali sto";
                                 }
                                else if($datum==$sad){
                                   $this->load->model('termin_model');
                                  $termin= $this->termin_model->dohvatiTermin($termini_pocetak)->termin;

                                  if($sat<$termin){
                                         $this->load->model('rezervacija_model');
                               $this->rezervacija_model->datum=$datum;
                               $this->rezervacija_model->vreme_pocetka=$termini_pocetak;
                               $this->rezervacija_model->vreme_kraja=$termini_kraj;
                               $this->rezervacija_model->idSto=$sto;
                               $this->rezervacija_model->status=1;
                               $this->rezervacija_model->idKorisnik=$this->session->userdata('id');


                             $rez= $this->rezervacija_model->unosRezervacije();
                             print "Uspesno ste rezervisali sto";

                               }
                            //  if($rez){
                            //   print json_encode($rez);}
                            //  redirect('korisnik/rezervisiSto');

                                            else{
            print "Morate rezervisati sto 1h ranije";

                                  }

                                 }
                                  else{
           print "Datum mora biti ispravan";


                                  }
                             }

                        else{
            print "Morate popuniti sva polja";





                  

                             }
                        }


      public function rezervisiSto(){


					 $podaci['forma_rezervacija']=array(
						 'method'=>'post',
						 'name'=>'forma_rezervacija'

                 );

					$podaci['forma_rezervacija_datum']=array(
						'type'=>'text',
						'name'=>'forma_rezervacija_datum',
						'id'=>'datepicker'
                );


					$podaci['forma_rezervacija_submit']=array(
						'type'=>'submit',
						'name'=>'forma_rezervacija_submit',
						'value'=>'Rezervisi',
						'class'=>'btn btn-success',
						'id'=>'forma_rezervacija_submit'
					);
					$podaci['page_title']='Rezervacija stola';
					$this->load_view('novi/korisnik',$podaci);





            //  }

                  }


        
       
      
         
     
         
     public function terminiKraj(){
        $termini_pocetak= $this->input->post('termini_pocetak');
         $this->load->model('termin_model');
         $rez=$this->termin_model->terminiKraj($termini_pocetak);
         
         
       print json_encode($rez);
         
     }    
     public function terminiPocetak(){
        
         $this->load->model('termin_model');
         $rez=$this->termin_model->listaTermina();
         
         
       print json_encode($rez);
         
     }    
         public function mojeRezervacije($idKorisnik){
             $this->load->model('rezervacija_model');
             $this->rezervacija_model->idKorisnik=$idKorisnik;
			 $this->rezervacija_model->statusRezervacijeKorisnik();
            

             $rez=$this->rezervacija_model->mojeRezervacije();
             foreach($rez as $r){
                $tmp=array();
                $this->load->model('termin_model');
                $p=$this->termin_model->dohvatiTermin($r->vreme_pocetka);
                $k=$this->termin_model->dohvatiTermin($r->idTermin_kraj);
                
                 $tmp['idRezervacija']=$r->idRezervacija;
                 $tmp['vreme_pocetka']=$p->termin;
                 $tmp['vreme_kraja']=$k->termin;
                 $tmp['datum']=$r->datum;
                 $tmp['status']=$r->status;
                 
                 $podaci['rezervacije'][]=$tmp;
                 
                 
             }
             if($podaci['rezervacije']!=''){
             $podaci['page_title']='Moje rezervacije';
             $this->load_view('novi/korisnik',$podaci);}
             else {
                 redirect('Korisnik/rezervisiSto');
             }
         }
         
     public function otkaziRezervaciju($id){
         $this->load->model('rezervacija_model');
         $this->rezervacija_model->id=$id;
         $this->rezervacija_model->otkaziRezervaciju();
         redirect('Korisnik/rezervisiSto');
     }
    
      
 }