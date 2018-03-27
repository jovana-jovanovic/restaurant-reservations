
  
		 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		class Galerija extends My_Controller{

		public function index()
		{
		$title="Galerija";
		 $data=array();
		 $data['page_title']="Galerija";
		 

 




 //PAGINATION
			 $this->load->library('pagination');
			 $this->load->model('galerija_model');

			 $config['base_url'] = 'http://restoranvintage.esy.es/Galerija/index';
			 $config['total_rows'] = $this->db->count_all('galerija');
			 $config['per_page'] = "6";
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
			 $this->load->model('galerija_model');
			 $podaci['slike'] = $this->galerija_model->galerija($config["per_page"], $podaci['page']);
			 $podaci['pagination'] = $this->pagination->create_links();

			 $this->load_view('novi/galerija',$podaci);
 
}}