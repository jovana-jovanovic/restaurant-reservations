<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracija extends My_Controller {

    
    function __construct() {
        parent::__construct();
		 if($this->session->userdata('idUloga')!=1){
                    redirect('Pocetna');
                }
    }
	public function index()
	{
		
                $podaci['page_title']='Administracija';
               
              
                $this->load_view('novi/content',$podaci);
           
                
	}

        
     public function formaZaUnos ($tip){
      
         if($tip=='korisnik'){
             $dugme=$this->input->post('btnDodajK');
             if($dugme!=''){
                  $podaci['forma_korisnik']=array(
                     'name'=>'forma_korisnik',
                     'method'=>'post'
                 );
                 $podaci['forma_korisnik_ime']=array(
                     'type'=>'text',
                     'name'=>'forma_korisnik_ime',
                     'class'=>'textbox'
                     
                 );
                 $podaci['forma_korisnik_prezime']=array(
                     'type'=>'text',
                     'name'=>'forma_korisnik_prezime',
                     'class'=>'textbox'
                     
                 );
                 $podaci['forma_korisnik_username']=array(
                     'type'=>'text',
                     'name'=>'forma_korisnik_username',
                     'class'=>'textbox'
                     
                 );
                 $podaci['forma_korisnik_password']=array(
                     'type'=>'password',
                     'name'=>'forma_korisnik_password',
                     'class'=>'textbox'
                     
                 );
                $podaci['forma_korisnik_mail']=array(
                     'type'=>'text',
                     'name'=>'forma_korisnik_mail',
                    'class'=>'textbox'
                     
                 );
                 
                
                 $podaci['forma_korisnik_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_korisnik_submit',
                     'value'=>'Unesi',
                     'class'=>'btn btn-success'
                 );
             
            
         }
         else{ redirect('Administracija/listaKorisnika');}
          $podaci['page_title']='Unos korisnika';
        }
		if($tip=='anketa'){
             $dugme=$this->input->post('btnDodajAnketu');
             if($dugme!=''){
                 $podaci['forma_anketa']=array(
                     'name'=>'forma_anketa',
                     'method'=>'post'
                 );
                 $podaci['forma_anketa_pitanje']=array(
                     'type'=>'text',
                     'name'=>'forma_anketa_pitanje',
                     'class'=>'textbox'
                     
                 );
                  $podaci['forma_anketa_status']=array(
                     
                     '0'=>'Nije aktivna',
                      '1'=>'Aktivna'
                      
                   );
                 
                 
                 $podaci['forma_anketa_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_anketa_submit',
                     'value'=>'Unesi anketu',
                     'class'=>'btn btn-success'
                 );
                
             }
             else{ redirect('Administracija/listaAnketa');}
       
             $podaci['page_title']='Unos ankete';
         }
         
         if($tip=='sto'){
             $dugme=$this->input->post('btnDodajSto');
             if($dugme!=''){
                 $podaci['forma_sto']=array(
                     'name'=>'forma_sto',
                     'method'=>'post'
                 );
                 $podaci['forma_sto_ime']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_ime',
                     'class'=>'textbox'
                     
                 );
                  $podaci['forma_sto_minimum']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_minimum',
                      'class'=>'textbox'
                     
                 );
                   $podaci['forma_sto_maximum']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_maximum',
                       'class'=>'textbox'
                     
                 );
                    $podaci['forma_sto_status']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_status',
                        'class'=>'textbox'
                     
                 );
                 $podaci['forma_sto_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_sto_submit',
                     'value'=>'Unesi',
                     'class'=>'btn btn-success'
                 );
                
             }
             else{ redirect('Administracija/listaStolova');}
       
             $podaci['page_title']='Unos stola';
         }
          if($tip=='odgovor'){
             $dugme=$this->input->post('btnDodajOdgovor');
             if($dugme!=''){
                 $podaci['forma_odgovor']=array(
                     'name'=>'forma_odgovor',
                     'method'=>'post'
                 );
                 $this->load->model('anketa_model');
                 $rez=$this->anketa_model->izborAnkete();
                 $podaci['izborAnkete']=$rez;
                 $podaci['forma_odgovor_odgovor']=array(
                     'type'=>'text',
                     'name'=>'forma_odgovor_odgovor',
                     'class'=>'textbox'
                     
                 );
                 
                  
                 $podaci['forma_odgovor_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_odgovor_submit',
                     'value'=>'Unesi odgovor',
                     'class'=>'btn btn-success'
                 );
                
             }
             else{ redirect('Administracija/listaOdgovora');}
       
             $podaci['page_title']='Unos odgovora';
         }
 
         if($tip=='jelovnik'){
            $dugme=$this->input->post('btnDodajJ');
            if($dugme!=''){
                
                $podaci['forma_jelovnik']=array(
                    'method'=>'post',
                    'name'=>'forma_jelovnik'
                    
                );
                $podaci['forma_jelovnik_naziv']=array(
                    'type'=>'text',
                    'name'=>'forma_jelovnik_naziv',
                     'class'=>'textbox'
                    );
                $podaci['forma_jelovnik_cena']=array(
                    'type'=>'text',
                    'name'=>'forma_jelovnik_cena',
                     'class'=>'textbox'
                    );
                $podaci['forma_jelovnik_kategorija']=array(
                    'type'=>'text',
                    'name'=>'forma_jelovnik_kategorija',
                    'class'=>'textbox'
                    );
                $podaci['forma_jelovnik_submit']=array(
                    'type'=>'submit',
                    'name'=>'forma_jelovnik_submit',
                    'value'=>'Dodaj',
                    'class'=>'btn btn-success'
                    
                );
                 }
             else{ redirect('Administracija/listaJelovnik');}
             
             $podaci['page_title']='Unos jela';
             
         }
              
        $this->load_view('novi/unos',$podaci);
             }



     public function listaKorisnika(){
        
       
			 $this->load->library('pagination');
			 $this->load->database(); 

			 $config['base_url'] = 'http://localhost/restoran/Administracija/listaKorisnika';
			 $config['total_rows'] = $this->db->count_all('korisnik');
			 $config['per_page'] = "7";
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
 
 
 
            $this->load->model('korisnik_model');
			$rez=$this->korisnik_model->listaKorisnika($config["per_page"], $podaci['page']);
			$tmp=array();
				foreach($rez as $r){
					
					$tmp['idKorisnik']=$r->idKorisnik;
					$tmp['ime']=$r->ime;
					$tmp['prezime']=$r->prezime;
					$tmp['username']=$r->username;
					$tmp['password']=$r->password;
					$tmp['mail']=$r->mail;
					$tmp['idUloga']=$r->idUloga;
					$podaci['korisnici'][]=$tmp;
					
        }
            $podaci['pagination'] = $this->pagination->create_links();

        
   
			$podaci['page_title']='Lista korisnika';
			$this->load_view('novi/content',$podaci);
     }
      public function slika(){
          $this->load_view('novi/admin_unos');
      }
	  
	  function resize($path,$file,$sirina,$visina){
          
			 $config['maintain_ratio'] = TRUE;
			 
			 $config['image_library']="gd2";
			 $config['max_size'] = 2048;
			 $config['source_image']=$path;
			 $config['height']=150;
			 $odnos=$visina/200;
			 $config['width']=150;
			 $config['create_thumb'] = TRUE;

			 $config['new_image']="./images/"."mala_".$file;
			 $this->load->library('image_lib',$config);
		     $this->image_lib->resize();}
	  
     public function dodaj_sliku(){ 
         $dugme=$this->input->post('btnPostavi');
         if($dugme!=''){
              $config['upload_path'] = './images/';
              $config['allowed_types'] = 'gif|jpg|png|JPEG';
             
              $name=time();
              $confif['file_name']=$name;
              $this->load->library('upload',$config);
            

               if (!$this->upload->do_upload('slika')){
                   $info['error']=$this->upload->display_errors();
                   
               }
               else{
         
					 $data=array('upload_data'=>$this->upload->data());
					 $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name'],
					 $data['upload_data']['image_width'],$data['upload_data']['image_height']);
					 $this->load->model('galerija_model');
					 $velika="images/".$data['upload_data']['file_name'];
					 $file_name=$data['upload_data']['raw_name'];
					 $mala="images/mala_".$file_name."_thumb".$data['upload_data']['file_ext'];
					 $this->galerija_model->thumb=$mala;
					 $this->galerija_model->opis=$this->input->post('tbOpis');
					 
					 $this->galerija_model->putanja=$velika;
					 $rez=$this->galerija_model->unosSlike();
					 redirect('Galerija');
               }
              
                            
         }
 }

 
 
     
     public function unosKorisnika(){
            $dugme=$this->input->post('forma_korisnik_submit');
            if($dugme!=''){
             $ime=$this->input->post('forma_korisnik_ime');
             $prezime=$this->input->post('forma_korisnik_prezime');
             $username=$this->input->post('forma_korisnik_username');
             $password=md5($this->input->post('forma_korisnik_password'));
             $mail=$this->input->post('forma_korisnik_mail');
             $idUloga=$this->input->post('forma_korisnik_uloga');
             $this->load->model('korisnik_model');
             $this->korisnik_model->ime=$ime;
             $this->korisnik_model->prezime=$prezime;
             $this->korisnik_model->username=$username;
             $this->korisnik_model->password=$password;
             $this->korisnik_model->mail=$mail;
             $this->korisnik_model->iduloga=$idUloga;
             
            
             $this->korisnik_model->unosKorisnika();
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="korisnik";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="INSERT";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
           }
            
                
         
           redirect('Administracija/listaKorisnika');
        }
        
        
     public function izmenaKorisnika($id=''){
         $dugme=$this->input->post('forma_korisnik_submit');
         if($dugme!=''){
			 $this->load->model('korisnik_model');
			 $ime=$this->input->post('forma_korisnik_ime');
			 $id=$this->input->post('forma_korisnik_id');
			 $prezime=$this->input->post('forma_korisnik_prezime');
			 $username=$this->input->post('forma_korisnik_username');
			 $password=$this->input->post('forma_korisnik_password');
			 $mail=$this->input->post('forma_korisnik_mail');
			 $idUloga=2;
			 $this->korisnik_model->id=$id;
			 $podaci=array('ime'=>$ime, 'prezime'=>$prezime, 'username'=>$username,'password'=>$password,'mail'=>$mail,'iduloga'=>$uloga);
			 $this->korisnik_model->izmenaKorisnika($podaci);
			 $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="korisnik";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="UPDATE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
             redirect('Administracija/listaKorisnika');
         }
         
         
         
     else{
			 if($id!=''){
			 $this->load->model('korisnik_model');
			 $this->korisnik_model->id=$id;
			 $rez=$this->korisnik_model->dohvatiKorisnika()->result();
			 $tmp=array();
			 foreach($rez as $r){
            
					 $tmp['idKorisnik']=$r->idKorisnik;
					 $tmp['ime']=$r->ime;
					 $tmp['prezime']=$r->prezime;
					 $tmp['username']=$r->username;
					 $tmp['password']=$r->password;
					 $tmp['mail']=$r->mail;
         }
         
             $podaci['forma_korisnik']=array(
             'name'=>'forma_korisnik',
             'method'=>'post'
             
         );
             $podaci['forma_korisnik_id']=array(
                 'forma_korisnik_id'=>$tmp['idKorisnik']
                 
             );
             
         $podaci['forma_korisnik_ime']=array(
             'type'=>'text',
             'name'=>'forma_korisnik_ime',
             'value'=>$tmp['ime'],
             'class'=>'textbox'
        );
          $podaci['forma_korisnik_prezime']=array(
             'type'=>'text',
             'name'=>'forma_korisnik_prezime',
              'value'=>$tmp['prezime'],
              'class'=>'textbox'
             
         );
           $podaci['forma_korisnik_username']=array(
             'type'=>'text',
             'name'=>'forma_korisnik_username',
               'value'=>$tmp['username'],
               'class'=>'textbox'
             
         );
          $podaci['forma_korisnik_password']=array(
             'type'=>'text',
             'name'=>'forma_korisnik_password',
             'value'=>$tmp['password'],
              'class'=>'textbox'
         );
           $podaci['forma_korisnik_mail']=array(
             'type'=>'text',
             'name'=>'forma_korisnik_mail',
               'value'=>$tmp['mail'],
               'class'=>'textbox'
             
         );
           
            $podaci['forma_korisnik_submit']=array(
             'type'=>'submit',
             'name'=>'forma_korisnik_submit',
              'value'=>'Sacuvaj izmene',
              'class'=>'btn btn-success'
             
         );
         }
         else{
             redirect('Administracija/listaKorisnika');
         }
            $podaci['page_title']="Izmena korisnika";
            $this->load_view('novi/izmena',$podaci);
         
         }
         
     
         
     }
     public function brisanjeKorisnika($id){
         if($id!=''){
			 $this->load->model('korisnik_model');
			 $this->korisnik_model->id=$id;
			 $this->korisnik_model->brisanjeKorisnika();
			 $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="korisnik";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="DELETE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
             redirect('Administracija/listaKorisnika');
         }
         else{
             redirect('Administracija/listaKorisnika');
         }
     }
    public function listaStolova(){
          $this->load->library('pagination');
          $this->load->database(); 

				 $config['base_url'] = 'http://localhost/restoran/Administracija/listaStolova';
				 $config['total_rows'] = $this->db->count_all('sto');
				 $config['per_page'] = "7";
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
							$this->load->model('sto_model');
							 $rez=$this->sto_model->listaStolova($config["per_page"], $podaci['page']);
            
            foreach($rez as $r){
                $tmp=array();
                $tmp['idSto']=$r->idSto;
                $tmp['ime']=$r->ime;
                $tmp['minimum']=$r->minimum;
                $tmp['maximum']=$r->maximum;
                
                $podaci['stolovi'][]=$tmp;
            }
            $podaci['pagination'] = $this->pagination->create_links();
            $podaci['page_title']='Lista stolova';
            $this->load_view('novi/content',$podaci);
        }
		
    public function listaOdgovora($idPitanje){
               $this->load->library('pagination');
               $this->load->database(); 
               $this->load->model('odgovor_model');
               $this->odgovor_model->idPitanje=$idPitanje;
               $rez=$this->odgovor_model->listaOdgovora();
            
            foreach($rez as $r){
                $tmp=array();
                $tmp['idOdgovor']=$r->idOdgovor;
                $tmp['idPitanje']=$r->idPitanje;
                $tmp['odgovor']=$r->odgovor;
              
                
			    $podaci['aOdgovori'][]=$tmp;}
     
               $podaci['page_title']='Lista odgovora';
               $this->load_view('novi/content',$podaci);
              }
        
     public function unosOdgovora(){
          $dugme=$this->input->post('forma_odgovor_submit');
            if($dugme!=''){
             $idPitanje=$this->input->post('forma_odgovor_anketa');
             $odgovor=$this->input->post('forma_odgovor_odgovor');
            
             $this->load->model('odgovor_model');
             $this->odgovor_model->idPitanje=$idPitanje;
             $this->odgovor_model->odgovor=$odgovor;
             $rez=$this->odgovor_model->prebrojOdgovore();
           
         if($rez < 4){
             
             $id=$this->odgovor_model->unosOdgovora();
             $this->load->model('glasanje_model');
             $this->glasanje_model->idOdgovor=$id;
             $this->glasanje_model->unosIdOdgovora();
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="odgovor";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="INSERT";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
            redirect('Administracija/listaAnketa');}
            
                
           
            else{ 
              ?>
                    <script type="text/javascript">
                    alert("Za izabranu anketu vec postoji 4 odgovora, da biste uneli novi morate izbrisati neki od postojecih.");
         </script>
      <?php
             $this->odgovor_model->idPitanje=$idPitanje;
             $rez=$this->odgovor_model->listaOdgovora();
            
            foreach($rez as $r){
                $tmp=array();
                $tmp['idOdgovor']=$r->idOdgovor;
                $tmp['idPitanje']=$r->idPitanje;
                $tmp['odgovor']=$r->odgovor;
              
                
                $podaci['aOdgovori'][]=$tmp;
            }
               $podaci['page_title']='Lista odgovora';
               $this->load_view('novi/content',$podaci);
            }
         }
         
     }  
   
            
     public function unosStola(){
             $dugme=$this->input->post('forma_sto_submit');
            if($dugme!=''){
             $ime=$this->input->post('forma_sto_ime');
             $minimum=$this->input->post('forma_sto_minimum');
             $maximum=$this->input->post('forma_sto_maximum');
             $this->load->model('sto_model');
             $this->sto_model->ime=$ime;
             $this->sto_model->minimum=$minimum;
             $this->sto_model->maximum=$maximum;
         
             $this->sto_model->unosStola();
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="sto";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="INSERT";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
            }
                
               redirect('Administracija/listaStolova');}
            
            
         
   
            
                
         
      
    public function unosAnkete(){
            $dugme=$this->input->post('forma_anketa_submit');
            if($dugme!=''){
             $pitanje=$this->input->post('forma_anketa_pitanje');
             $status=$this->input->post('forma_anketa_status');
             $this->load->model('anketa_model');
             $this->anketa_model->pitanje=$pitanje;
             $this->anketa_model->status=$status;
           
             $id=$this->anketa_model->unosAnkete();
              
            if($status==1){
				 $this->anketa_model->idPitanje=$id;
				 $podaci=array('status'=>'0');
				 $this->anketa_model->izmenaStatusa($podaci);
         }
             
            
          
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="sto";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="INSERT";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
            }
                
            redirect('Administracija/listaAnketa');}
            
            
    public function izmenaOdgovora($id=''){
              $dugme=$this->input->post('forma_odgovor_submit');
             if($dugme!=''){
                   $odgovor=$this->input->post('forma_odgovor_odgovor');
                  
                   
                 $id=$this->input->post('forma_odgovor_id');
                 $this->load->model('odgovor_model');
                 $this->odgovor_model->idOdgovor=$id;
                 $podaci=array('odgovor'=>$odgovor);
				 $this->odgovor_model->izmenaOdgovora($podaci);
				 $d=date('n/j/Y/H/i/s');
				 $dat=explode('/',$d);
				 $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
				 $this->load->model('tabela_model');
				 $this->tabela_model->tabela="odgovor";
				 $idTabela=$this->tabela_model->dohvatiTabelu();
				 $this->load->model('promena_model');
				 $this->promena_model->promena="UPDATE";
				 $idPromena=$this->promena_model->dohvatiPromenu();
				 $this->load->model('log_model');
				 $this->log_model->datum=$datum;
				 $this->log_model->idTabela=$idTabela->idTabela;
				 $this->log_model->idPromena=$idPromena->idPromena;
				 $this->log_model->idKorisnik=$this->session->userdata('id');;
			     $this->log_model->insertLog();
			     redirect('Administracija/listaAnketa');}
            
                 else{
                      if($id!=''){
							 $this->load->model('odgovor_model');
							 $this->odgovor_model->idOdgovor=$id;
							 $rez=$this->odgovor_model->dohvatiOdgovor()->result();
                     foreach($rez as $r){
                         $tmp=array();
                         $tmp['idOdgovor']=$r->idOdgovor;
                         $tmp['odgovor']=$r->odgovor;
                         $tmp['idPitanje']=$r->idPitanje;
                        
                         
                     }
                     
                 $podaci['forma_odgovor']=array(
                     'name'=>'forma_odgovor',
                     'method'=>'post'
                     
                     
                 );
                 $podaci['forma_odgovor_odgovor']=array(
                     'type'=>'text',
                     'name'=>'forma_odgovor_odgovor',
                     'class'=>'textbox',
                     'value'=>$tmp['odgovor']
                   
                     
                     
                 );
                
                
                 $podaci['forma_odgovor_id']=array(
                     
                   'forma_odgovor_id' => $tmp['idOdgovor']);

                 
                 $podaci['forma_odgovor_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_odgovor_submit',
                     'class'=>'btn btn-success',
                     'value'=>'Unesi'
                 );
                   }
         else{
             redirect('Administracija/listaAnketa');
         }
            $podaci['page_title']="Izmena odgovora";
            $this->load_view('novi/izmena',$podaci);
         
         }
         
     
         
     }
                
             
     
    public function izmenaStola($id=''){
              $dugme=$this->input->post('forma_sto_submit');
              if($dugme!=''){
					  $ime=$this->input->post('forma_sto_ime');
					  $minimum=$this->input->post('forma_sto_minimum');
					  $maximum=$this->input->post('forma_sto_maximum');
					   
					   $id=$this->input->post('forma_sto_id');
					   $this->load->model('sto_model');
					   $this->sto_model->id=$id;
					   $podaci=array('ime'=>$ime,'minimum'=>$minimum,'maximum'=>$maximum);
					   $this->sto_model->izmenaStola($podaci);
					   $d=date('n/j/Y/H/i/s');
					   $dat=explode('/',$d);
					   $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
					   $this->load->model('tabela_model');
					   $this->tabela_model->tabela="sto";
					   $idTabela=$this->tabela_model->dohvatiTabelu();
					   $this->load->model('promena_model');
					   $this->promena_model->promena="UPDATE";
					   $idPromena=$this->promena_model->dohvatiPromenu();
					   $this->load->model('log_model');
					   $this->log_model->datum=$datum;
					   $this->log_model->idTabela=$idTabela->idTabela;
					   $this->log_model->idPromena=$idPromena->idPromena;
					   $this->log_model->idKorisnik=$this->session->userdata('id');;
				       $this->log_model->insertLog();
				       redirect('Administracija/listaStolova');}
            
                 else{
                      if($id!=''){
						 $this->load->model('sto_model');
						 $this->sto_model->id=$id;
						 $rez=$this->sto_model->dohvatiSto()->result();
                     foreach($rez as $r){
                         $tmp=array();
                         $tmp['idSto']=$r->idSto;
                         $tmp['ime']=$r->ime;
                         $tmp['minimum']=$r->minimum;
                         $tmp['maximum']=$r->maximum;
                         
                         
                     }
                     
                 $podaci['forma_sto']=array(
                     'name'=>'forma_sto',
                     'method'=>'post'
                     
                     
                 );
                 $podaci['forma_sto_ime']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_ime',
                     'class'=>'textbox',
                     'value'=>$tmp['ime']
                   
                     
                     
                 );
                 $podaci['forma_sto_minimum']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_minimum',
                      'class'=>'textbox',
                     'value'=>$tmp['minimum']
                   );
                 $podaci['forma_sto_maximum']=array(
                     'type'=>'text',
                     'name'=>'forma_sto_maximum',
                     'class'=>'textbox',
                     'value'=>$tmp['maximum']
                   );
                
                 $podaci['forma_sto_id']=array(
                     
                   'forma_sto_id' => $tmp['idSto']);

                 
                 $podaci['forma_sto_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_sto_submit',
                     'class'=>'btn btn-success',
                     'value'=>'Unesi'
                 );
                   }
         else{
             redirect('Administracija/listaStolova');
         }
            $podaci['page_title']="Izmena stola";
            $this->load_view('novi/izmena',$podaci);
         
         }
         
     
         
     }
                
             
     
     public function brisanjeStola($id){
         if($id!=''){
			 $this->load->model('sto_model');
			 $this->sto_model->id=$id;
			 $this->sto_model->brisanjeStola();
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="sto";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="DELETE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
            redirect('Administracija/listaStolova');
     }
     else{
                         redirect('Administracija/listaStolova');
                     }
         
     }
    public function brisanjeOdgovora($id){
         if($id!=''){
             $this->load->model('odgovor_model');
             $this->odgovor_model->idOdgovor=$id;
             $this->odgovor_model->brisanjeOdgovora();
             $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="odgovor";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="DELETE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
         redirect('Administracija/listaAnketa');
     }
     else{
                         redirect('Administracija/listaAnketa');
                     }
         
     }
     public function brisanjeAnkete($id){
         if($id!=''){
			 $this->load->model('anketa_model');
			 $this->anketa_model->idPitanje=$id;
			 $this->anketa_model->brisanjeAnkete();
			 $this->load->model('odgovor_model');
			 $this->odgovor_model->idPitanje=$id;
			 $this->odgovor_model->brisanjeListeOdgovora();
			 $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="pitanje";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="DELETE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
             redirect('Administracija/listaAnketa');
     }
     else{
                         redirect('Administracija/listaAnketa');
                     }
         
     }
     public function listaAnketa(){
          $this->load->library('pagination');
			$this->load->database(); 

			 $config['base_url'] = 'http://localhost/restoran/Administracija/listaAnketa';
			 $config['total_rows'] = $this->db->count_all('pitanje');
			 $config['per_page'] = "7";
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
			 $this->load->model('anketa_model');
			 $rez=$this->anketa_model->listaAnketa($config["per_page"], $podaci['page']);
						
            foreach($rez as $r){
                $tmp=array();
                $tmp['idPitanje']=$r->idPitanje;
                $tmp['pitanje']=$r->pitanje;
                $tmp['status']=$r->status;
                
                
                $podaci['ankete'][]=$tmp;
            }
            $podaci['pagination'] = $this->pagination->create_links();
            $podaci['page_title']='Lista anketa';
            $this->load_view('novi/content',$podaci);
        }
        
     
    

    
     
      public function listaJelovnik(){
				$this->load->library('pagination');
				$this->load->database(); 

				 $config['base_url'] = 'http://localhost/restoran/Administracija/listaJelovnik';
				 $config['total_rows'] = $this->db->count_all('jelovnik');
				 $config['per_page'] = "7";
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
				 $this->load->model('jelovnik_model');
			     $rez=$this->jelovnik_model->listaJelovnik($config["per_page"], $podaci['page']);
					 
         foreach($rez as $r){
             $tmp=array();
             $tmp['idJelovnik']=$r->idJelovnik;
             $tmp['naziv']=$r->naziv;
             $tmp['cena']=$r->cena;
            
             $podaci['jelovnici'][]=$tmp;
         }
           $podaci['pagination'] = $this->pagination->create_links();
           $podaci['page_title']="Lista jelovnik";
           $this->load_view('novi/content',$podaci); 		

         
     }
    
     public function unosJelovnika(){
         $dugme=$this->input->post('forma_jelovnik_submit');
         if($dugme!=''){
             $naziv=$this->input->post('forma_jelovnik_naziv');
             $cena=$this->input->post('forma_jelovnik_cena');
         
			 $this->load->model('jelovnik_model');
			 $this->jelovnik_model->naziv=$naziv;
			 $this->jelovnik_model->cena=$cena;
      
             $this->jelovnik_model->unosJelovnika();
         $d=date('n/j/Y/H/i/s');
				 $dat=explode('/',$d);
				 $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
				 $this->load->model('tabela_model');
				 $this->tabela_model->tabela="jelovnik";
				 $idTabela=$this->tabela_model->dohvatiTabelu();
				 $this->load->model('promena_model');
				 $this->promena_model->promena="INSERT";
				 $idPromena=$this->promena_model->dohvatiPromenu();
				 $this->load->model('log_model');
				 $this->log_model->datum=$datum;
				 $this->log_model->idTabela=$idTabela->idTabela;
				 $this->log_model->idPromena=$idPromena->idPromena;
				 $this->log_model->idKorisnik=$this->session->userdata('id');;
			     $this->log_model->insertLog();
			     redirect('Administracija/listaJelovnik');}
     }
   
     public function izmenaJelovnika($id){
         $dugme=$this->input->post('forma_jelovnik_submit');
         if($dugme!=''){
			 $this->load->model('jelovnik_model');
			 $naziv=$this->input->post('forma_jelovnik_naziv');
			 $cena=$this->input->post('forma_jelovnik_cena');
	 
			 $id=$this->input->post('forma_jelovnik_id');
			
			 $this->jelovnik_model->id=$id;
			 $podaci=array('naziv'=>$naziv,'cena'=>$cena);
			 $this->jelovnik_model->izmenaJelovnika($podaci);
			 $d=date('n/j/Y/H/i/s');
             $dat=explode('/',$d);
             $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
             $this->load->model('tabela_model');
             $this->tabela_model->tabela="jelovnik";
             $idTabela=$this->tabela_model->dohvatiTabelu();
             $this->load->model('promena_model');
             $this->promena_model->promena="UPDATE";
             $idPromena=$this->promena_model->dohvatiPromenu();
             $this->load->model('log_model');
             $this->log_model->datum=$datum;
             $this->log_model->idTabela=$idTabela->idTabela;
             $this->log_model->idPromena=$idPromena->idPromena;
             $this->log_model->idKorisnik=$this->session->userdata('id');;
             $this->log_model->insertLog();
             redirect('Administracija/listaJelovnik');
         }
       else{
            if($id!=''){
                     $this->load->model('jelovnik_model');
                     $this->jelovnik_model->id=$id;
                     $rez=$this->jelovnik_model->dohvatiJelovnik()->result();
                     foreach($rez as $r){
                         $tmp=array();
                         $tmp['idJelovnik']=$r->idJelovnik;
                         $tmp['naziv']=$r->naziv;
                         $tmp['cena']=$r->cena;
                       
                         
                     }
                     
                 $podaci['forma_jelovnik']=array(
                     'name'=>'forma_jelovnik',
                     'method'=>'post'
                     
                     
                 );
                 $podaci['forma_jelovnik_naziv']=array(
                     'type'=>'text',
                     'name'=>'forma_jelovnik_naziv',
                     'class'=>'textbox',
                     'value'=>$tmp['naziv']
                   );
                  $podaci['forma_jelovnik_cena']=array(
                     'type'=>'text',
                     'name'=>'forma_jelovnik_cena',
                      'class'=>'textbox',
                     'value'=>$tmp['cena']
                   );
                 
                 $podaci['forma_jelovnik_id']=array(
                     
                   'forma_jelovnik_id' => $tmp['idJelovnik']);

                 
                 $podaci['forma_jelovnik_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_jelovnik_submit',
                     'value'=>'Unesi',
                     'class'=>'btn btn-success'
                 );
                  }
                     else{
                         redirect('Administracija/listaJelovnik');
                     }
             
             $podaci['page_title']='Izmena jela';
         
            
           $this->load_view('novi/izmena',$podaci);
              
                 }
     }
                
             
     public function izmenaAnkete($id){
         $dugme=$this->input->post('forma_anketa_submit');
         if($dugme!=''){
			 $this->load->model('anketa_model');
			 $pitanje=$this->input->post('forma_anketa_pitanje');
			 $status=$this->input->post('forma_anketa_status');
			 $id=$this->input->post('forma_anketa_id');
        
			 $this->anketa_model->idPitanje=$id;
			 $podaci=array('pitanje'=>$pitanje,'status'=>$status);
			 $this->anketa_model->izmenaAnkete($podaci);
         if($status==1){
             $this->anketa_model->idPitanje=$id;
             $podaci=array('status'=>'0');
             $this->anketa_model->izmenaStatusa($podaci);
         }
         $d=date('n/j/Y/H/i/s');
				 $dat=explode('/',$d);
				 $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
				 $this->load->model('tabela_model');
				 $this->tabela_model->tabela="pitanje";
				 $idTabela=$this->tabela_model->dohvatiTabelu();
				 $this->load->model('promena_model');
				 $this->promena_model->promena="UPDATE";
				 $idPromena=$this->promena_model->dohvatiPromenu();
				 $this->load->model('log_model');
				 $this->log_model->datum=$datum;
				 $this->log_model->idTabela=$idTabela->idTabela;
				 $this->log_model->idPromena=$idPromena->idPromena;
				 $this->log_model->idKorisnik=$this->session->userdata('id');;
			     $this->log_model->insertLog();
			     redirect('Administracija/listaAnketa');
         }
       else{
            if($id!=''){
                     $this->load->model('anketa_model');
                     $this->anketa_model->idPitanje=$id;
                     $rez=$this->anketa_model->dohvatiAnketu()->result();
                     foreach($rez as $r){
                         $tmp=array();
                         $tmp['idPitanje']=$r->idPitanje;
                         $tmp['pitanje']=$r->pitanje;
                         $tmp['status']=$r->status;
                        
                         
                     }
                     
                 $podaci['forma_anketa']=array(
                     'name'=>'forma_anketa',
                     'method'=>'post'
                     
                     
                 );
                 $podaci['forma_anketa_pitanje']=array(
                     'type'=>'text',
                     'name'=>'forma_anketa_pitanje',
                     'class'=>'textbox',
                     'value'=>$tmp['pitanje']
                   );
                 $podaci['status']=$tmp['status'];
                
              
                     $podaci['forma_anketa_status']=array(
                     
                     '0'=>'Nije aktivna',
                      '1'=>'Aktivna'
                      
                   );
                 
                   
                 $podaci['forma_anketa_id']=array(
                     
                   'forma_anketa_id' => $tmp['idPitanje']);

                 
                 $podaci['forma_anketa_submit']=array(
                     'type'=>'submit',
                     'name'=>'forma_anketa_submit',
                     'value'=>'Unesi',
                     'class'=>'btn btn-success'
                 );
                  }
                     else{
                         redirect('Administracija/listaAnketa');
                     }
             
             $podaci['page_title']='Izmena ankete';
         
            
           $this->load_view('novi/izmena',$podaci);
              
                 }
     }
                
             
         
     public function brisanjeJelovnika($id){
         if($id!=''){
				 $this->load->model('jelovnik_model');
				 $this->jelovnik_model->id=$id;
				 $this->jelovnik_model->brisanjeJelovnika();
				 $d=date('n/j/Y/H/i/s');
				 $dat=explode('/',$d);
				 $datum=mktime($dat[3],$dat[4],$dat[5],$dat[0],$dat[1],$dat[2]);
				 $this->load->model('tabela_model');
				 $this->tabela_model->tabela="jelovnik";
				 $idTabela=$this->tabela_model->dohvatiTabelu();
				 $this->load->model('promena_model');
				 $this->promena_model->promena="DELETE";
				 $idPromena=$this->promena_model->dohvatiPromenu();
				 $this->load->model('log_model');
				 $this->log_model->datum=$datum;
				 $this->log_model->idTabela=$idTabela->idTabela;
				 $this->log_model->idPromena=$idPromena->idPromena;
				 $this->log_model->idKorisnik=$this->session->userdata('id');;
				 $this->log_model->insertLog();
				redirect('Administracija/listaJelovnik');
         }
         else{
                         redirect('Administracija/listaJelovnik');
                     }
         
     }

   public function listaLogova(){
			$this->load->library('pagination');
			$this->load->database(); 

			 $config['base_url'] = 'http://localhost/restoran/Administracija/listaLogova';
			 $config['total_rows'] = $this->db->count_all('log');
			 $config['per_page'] = "7";
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
			 $this->load->model('log_model');
			 $rez=$this->log_model->listaLogova($config["per_page"], $podaci['page']);
					 
					 
   
         foreach($rez as $r){
             $tmp=array();
             $tmp['idLog']=$r->idLog;
             $tmp['datum']=$r->datum;
             $tmp['idTabela']=$r->idTabela;
             $tmp['idVrsta']=$r->idPromena;
             $tmp['idKorisnik']=$r->idKorisnik;
             $tmp['promena']=$r->promena;
             $tmp['tabela']=$r->tabela;
             $tmp['username']=$r->username;
             $podaci['logovi'][]=$tmp;
         }
         if($podaci['logovi']!=null){
               $podaci['pagination'] = $this->pagination->create_links();
               $podaci['page_title']='Lista logova';
               $this->load_view('novi/content',$podaci);}
         else{
             redirect('Administracija');
         }
         		

         
     }
    public function brisanjeLogova($id){
         if($id!=''){
         $this->load->model('log_model');
         $this->log_model->id=$id;
         $this->log_model->brisanjeLogova();
         
        redirect('Administracija/listaLogova');
         }
         else{
                         redirect('Administracija/listaJelovnik');
                     }
         
     }
    

    
     
   
}