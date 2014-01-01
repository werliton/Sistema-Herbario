<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerConsultas extends CI_Controller {

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
		$data['title'] = "Visualizar Consultas" ;     
		$this->validaForm($data);		
	}
	
	function validaForm($data)
	{
            $this->form_validation->set_rules('di','di','required');
             if ($this->form_validation->run() == FALSE) {
                     $this->load->view('visualizarConsultas',$data);
             }else{
                $data['listagem'] = $this->_getListaConsultas();
                $this->load->view('visualizarConsultas',$data);
             } 
	}
	
        function _getListaConsultas() {
            $dataInicio = $this->input->post('di');
            $dataFim    = $this->input->post('df');
            
            $aux = explode("/",$dataInicio);
            $dia = $aux[0];
            $mes = $aux[1];
            $ano = $aux[2];

            $dataInicio = $ano."-".$mes."-".$dia;

            $aux = explode("/",$dataFim);
            $dia = $aux[0];
            $mes = $aux[1];
            $ano = $aux[2];

            $dataFim = $ano."-".$mes."-".$dia;
            
            $where = "data BETWEEN '$dataInicio' AND '$dataFim' AND status=0";
            
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(null,$where,null,null,"ASC");
        }
	
}

/* End of file atendimento.php */
/* Location: ./application/controllers/atendimento.php */