<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jelovnik extends My_Controller {
 
	
	public function index()
	{
              $this->load->library('pagination');
					$this->load->database(); 

					 $config['base_url'] = 'http://restoranvintage.esy.es/Administracija/listaJelovnik';
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
							   $podaci['page_title']="Jelovnik";
							   $this->load_view('novi/jelovnik',$podaci); 		

         
     }
    
                
                
                
                
                
                
        }


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */