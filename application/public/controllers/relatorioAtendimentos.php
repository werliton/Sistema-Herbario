<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class relatorioAtendimentos extends CI_Controller {

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
            $data['title']="Atendimento";
            $this->validaForm($data);		
	}
	
	function validaForm($data)
	{
            $this->form_validation->set_rules('di','di','required');
             if ($this->form_validation->run() == FALSE) {
                     $this->load->view('relatorioAtendimentos');
             }else{
                $data['listagem'] = $this->_getListaAtendimentos();
                $this->load->view('relatorioAtendimentos',$data);
             } 
	}
	
        function _getListaAtendimentos() {
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
            
            $where = "data BETWEEN '$dataInicio' AND '$dataFim' AND status=1";
            
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(null,$where,"nome",null,"ASC");
        }
        
         /**
         * naoassiduo
         * Lista todos os pacientes que agendaram uma consulta, mas não marcaram presença
         */
        function naoassiduo() {
            $data['listagem'] = $this->_getPacientesNaoAssiduos(array('data < '=>date('Y-m-d'),'status'=>0)); 
            $this->load->view('relatorioAssiduidade',$data);	
        }
        
        function assiduo() {
            $data['listagem'] = $this->_getPacientesNaoAssiduos(array('data <'=>date('Y-m-d'),'status'=>1)); 
            $this->load->view('relatorioAssiduidade',$data);	
        }
        
         /**
         * _getListaAgendamentos
         */
        function _getPacientesNaoAssiduos($where) {
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(null,$where);
        }
	
}

/* End of file atendimento.php */
/* Location: ./application/controllers/atendimento.php */