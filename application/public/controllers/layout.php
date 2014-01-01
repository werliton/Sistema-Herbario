<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout extends CI_Controller {

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
		$data['title'] = "Início" ;
		$this->load->view('layout',$data);
	}
        
        function logar() {
            $this->_validaForm();
        }
	
        function _validaForm()
	{
            $this->form_validation->set_rules('user','user','required');
            $this->form_validation->set_rules('password','password','required');
            
             if ($this->form_validation->run() == FALSE) {
                $this->load->view('layout');
             }else{
                if($this->_verificaLogin()==1){
                    $data['ultConsultas'] = $this->_ultimasConsultas();
                    $this->load->view('layout2',$data);
                }else{
                    $this->load->view('layout');
                }
             } 
	}
        
        function _verificaLogin() {
            $login = $this->input->post('user');
            $senha = $this->input->post('password');
            
            if($login == LOGIN && $senha==PASS){
                return 1;
            }
            return 0;
        }
	
        function _ultimasConsultas() {
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(3,array('status'=>0,'data'=>date('Y-m-d')));
        }
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */