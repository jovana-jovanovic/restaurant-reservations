
  
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registracija extends My_Controller{

			public function index()
			{
			$title="Registracija";
			 $data=array();
			 $data['page_title']="Registracija";
			 

			 $this->load_view('novi/registracija');
			}
             public function validate_registration(){
			 $this->load->library('form_validation');
			 $this->load->model('korisnik_model');
			 $title="Registracija";

			 $podaci['page_title']="Registracija";


			 $is_post= $this->input->server('REQUEST_METHOD') == 'POST';
			if($is_post){
			 $this->form_validation->set_rules('tbIme','Ime','required|trim|min_length[4]|xss_clean');
			 $this->form_validation->set_rules('tbPrezime','Prezime','required|trim|min_length[4]|xss_clean');
			 $this->form_validation->set_rules('tbUsername','Username','required|trim|min_length[4]|xss_clean');
			 
			 $this->form_validation->set_rules('tbEmail','Email','required|trim|xss_clean|valid_email|is_unique[korisnik.mail]');
			 $this->form_validation->set_rules('tbPassword','Password','required|trim|min_length[8]|matches[tbCPassword]|xss_clean|');
			 $this->form_validation->set_rules('tbCPassword','ConfirmPassword','required|trim|min_length[8]|xss_clean|');
			 $this->form_validation->set_message('required','Polje %s je obavezno');
			 $this->form_validation->set_message('min_length','Polje %s mora imati vise karaktera');
			 $this->form_validation->set_message('valid_email','Polje %s mora biti validno');
			 $this->form_validation->set_message('is_unique','Email mora biti jedinstven');

			 if($this->form_validation->run()==false){
			 $this->load_view('novi/registracija');
			 }
     else{


			 $md5Password=md5($this->input->post('tbPassword'));
			 $hash=md5(rand(0,1000));

				 
			  $ime=$this->input->post('tbIme');
			  $prezime=$this->input->post('tbPrezime');
			  $username=$this->input->post('tbUsername');
			  $mail=$this->input->post('tbEmail');
			  $password=$md5Password;
			  $iduloga='2';
      
             $this->korisnik_model->ime=$ime;
             $this->korisnik_model->prezime=$prezime;
             $this->korisnik_model->username=$username;
             $this->korisnik_model->password=$password;
             $this->korisnik_model->mail=$mail;
             $this->korisnik_model->iduloga=$iduloga;
      
 
 

  
		 $rez=$this->korisnik_model->unosKorisnika();
		 redirect('Logovanje');

 }
 }

 }
 
			 public function aktivacija($hash){
			 $this->load->model('korisnik_model');
			 $rez= $this->korisnik_model->aktivacija_naloga($hash);
					 if($rez){
			 redirect('Pocetna');
}}}