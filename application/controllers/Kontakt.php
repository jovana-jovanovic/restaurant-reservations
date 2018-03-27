<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontakt extends My_Controller {
 
	
	public function index()
	{
		$this->load_view('novi/kontakt');
                $podaci['page_title']="Kontakt";
	}
        public function rez(){
            
                $podaci['page_title']="Informacije o rezervacijama";
                $this->load_view('novi/rez',$podaci);
        }
        public function autor(){
            
                $podaci['page_title']="Autor";
                $this->load_view('novi/autor',$podaci);
        }
        public function anketa_glasanje(){
				 $idOdgovor= $this->input->post('idOdgovor');
				 $this->load->model('anketa_model');
				 $rez=$this->anketa_model->glasaj($idOdgovor);
				 if($rez){
				 $podaci['poruka']="Uspesno ste glasali!";
				 $rez= $this->anketa_model->dohvatiPitanje();
				 $data1['anketa']=$rez->pitanje;
				 $idPitanje=$rez->idPitanje;
				 $results=$this->anketa_model->dohvatiRezultat($idPitanje);
				 $podaci['results']=$results;
				 $all=$this->anketa_model->ukupanRezultat($idPitanje);
				 $podaci['all_results']=$all;
				 }
				 else{
				 $podaci['poruka_greska']="Glasanje nije uspelo!";
 }
        
        print json_encode($podaci);}
		
        public function mail(){
        
				$this->load->library('form_validation');
				$podaci['page_title']="Kontakt";
				 $is_post= $this->input->server('REQUEST_METHOD') == 'POST';
				 if($is_post){
				 
				 $this->form_validation->set_rules('tbIme','Ime','required|trim|min_length[4]|xss_clean');
				 $this->form_validation->set_rules('tbEmail','Email','required|trim|xss_clean|valid_email');
				 $this->form_validation->set_rules('taPoruka','Poruka','required|trim|xss_clean');

				 $this->form_validation->set_message('required','Polje %s je obavezno');
				 $this->form_validation->set_message('min_length','Polje %s mora imati vise karaktera');
				 $this->form_validation->set_message('valid_email','Polje %s mora biti validno');

				 if($this->form_validation->run()==false){
				 $this->load_view('novi/kontakt');
		 }
		 else{
 //ove podatke treba poslati na mail*/
					 $ime= $this->input->post('tbIme');
					 $email= $this->input->post('tbEmail');
					 $poruka= $this->input->post('taPoruka');

					 $this->load->library('email');
 /*$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

$this->email->initialize($config);
//configure email settings
  / config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'jovanajovanovic794@gmail.com'; // email id
    $config['smtp_pass'] = 'password'; // email password
    $config['mailtype'] = 'html';
    $config['wordwrap'] = TRUE;
    $config['charset'] = 'iso-8859-1';
    $config['newline'] = "\r\n"; //use double quotes here
    $this->email->initialize($config);*/
 //Slanje podataka na mail

				 $this->email->from($email, $ime);
				 $this->email->to('jovanajovanovic794@gmail.com');
				 $this->email->subject('Restoran Vintage');
				 $this->email->message($poruka);
				 $this->email->send();

/*$headers = "From:$email";
mail("jovanajovanovic794@gmail","Restoran Vintage-Kontakt",$poruka,$headers);*/
                     redirect('Kontakt');
}
}
 }
        }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */