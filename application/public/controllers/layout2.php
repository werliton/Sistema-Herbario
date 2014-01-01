<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout2 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $data['ultConsultas'] = $this->_ultimasConsultas();
	    $this->load->view('layout2',$data);
	}
        
        function _ultimasConsultas() {
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(3,array('data >='=>date('Y-m-d'),'status'=>0));
        }
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */