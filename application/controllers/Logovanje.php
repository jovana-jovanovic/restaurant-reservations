
  
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logovanje extends My_Controller{
    public function index(){
        $this->load_view('novi/logovanje');
    }

     public function login()
	{
			$this->load->library('form_validation');
				//$dugme = $this->input->post('tbLogin');
					   // if(isset($dugme))
			$is_post=$this->input->server('REQUEST_METHOD') == 'POST';

				 if($is_post){            
					{
							 $this->form_validation->set_rules('tbUsername','Korisnicko ime','required|trim|min_length[4]|xss_clean');
											 
							 $this->form_validation->set_rules('tbPassword','Password','required|trim|min_length[8]|xss_clean|');
							 $this->form_validation->set_message('required','Polje %s je obavezno');
							 $this->form_validation->set_message('min_length','Polje %s mora imati vise karaktera');

							 if($this->form_validation->run()==false){

							 $this->load_view('novi/logovanje');
							 }

                    else
                     {
							 $username=$this->input->post('tbUsername');
							 $md5Password=md5($this->input->post('tbPassword'));
							 $data['podaci']=array(
							 'username'=>$username,
							 'password'=>$md5Password,
							 );
							 $this->load->model('korisnik_model');
							 $this->korisnik_model->username=$username;
							 $this->korisnik_model->password=$md5Password;
							 
							 $provera=$this->korisnik_model->login();
							 if($provera!=false){
     
 
								 $session_data=array(
								 'id'=>$provera[0]->idKorisnik,
								 'ime'=>$provera[0]->ime,
								 'prezime'=>$provera[0]->prezime,
							      'username'=>$provera[0]->username,
								  'idUloga'=>$provera[0]->idUloga
								 );
								 $idUloga=$provera[0]->idUloga;
								 $this->session->set_userdata($session_data);
								 if($this->session->userdata('idUloga')==2){
								 redirect('Korisnik');
								 }
								 else if($this->session->userdata('idUloga')==3){
								 redirect('Zaposleni');
								 }
								 else if($this->session->userdata('idUloga')==1){
								 redirect('Administracija');
								 }
								 else{
								 redirect('Pocetna');
								 }

								 
								 }
								 else{
								 $data['poruka']='Pogresno korisnicko ime ili loznika.';
								 redirect('Pocetna'); 
								 }
								 }
                }
        }}
        
        public function logout()
	{
						   $this->session->sess_destroy();
						   redirect('Pocetna');
                }
	}
    
    
