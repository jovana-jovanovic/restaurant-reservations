<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pocetna extends My_Controller {
 
	
	public function index()
	{
                $podaci['page_title']="Pocetna";
		$this->load_view('novi/pocetna',$podaci);
                
	}

        }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */