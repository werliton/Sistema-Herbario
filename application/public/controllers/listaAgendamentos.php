<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListaAgendamentos extends CI_Controller {

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
            $this->form_validation->set_rules('horario','horario','required');
             if ($this->form_validation->run() == FALSE) {
                     $this->load->view('listaAgendamentos');
             }else{
                $data['listagem'] = $this->_agendamentosDiarios();
                $this->load->view('listaAgendamentos',$data);
             } 
	}
        /**
         * _getListaAgendamentos
         */
        function _getListaAgendamentos($where) {
            $this->load->model('agendamento_model');
            return $this->agendamento_model->getUltimasConsultas(null,$where);
        }
        
        /**
         * _getListaAgendamentos
         */
        function _getAgendamentosOrdenada($where) {
            $this->load->model('atendimento_model');
            return $this->atendimento_model->getAtendimentos($where);
        }
	
        function agendamentoDetalhado() {
            $id = $this->uri->segment(3);
            
            if(isset ($id) && !empty ($id) && $id == "id"){
                $data['listagem'] = $this->_getListaAgendamentos(array('agend_id'=>$this->uri->segment(4)));
		$this->load->view('agendamentoConsultaDetail',$data);	
            }
        }
        
        function agendamentoEdit() {
            $id = $this->uri->segment(3);
            
            if(isset ($id) && !empty ($id) && $id == "id"){
                $data['listagem'] = $this->_getListaAgendamentos(array('agend_id'=>$this->uri->segment(4)));
		$this->load->view('edit_agendamentoConsulta',$data);	
            }
        }
        /**
         * ordenada
         * Função que retorna uma view com todos os agendamentos diários em ordem de chegada
         */
        function ordenada() {
            $data['listagem'] = $this->_getAgendamentosOrdenada(array('DATE(data_hora_chegada)'=>date('Y-m-d'))); 
            $this->load->view('listaAgendamentosOrdenada',$data);	
        }
        
        /**
         * 
         */
        function pesquisa() {
            $chave = $this->input->post('campobusca');
            
            $this->form_validation->set_rules('campobusca','campobusca','required');
            
            if(isset ($chave)){
                $this->load->model('agendamento_model');
                $data['listagem'] = $this->agendamento_model
                                         ->getUltimasConsultas(null,null,array('nome'=>$chave),null,'asc');
		$this->load->view('pesquisa',$data);	
            }else{
                
            }
        }
       
        function _agendamentosDiarios() {
            $periodo = $this->input->post('horario');
            
            return $this->_getListaAgendamentos(
                    array('data'=>date('Y-m-d'),
                          'status'=>0, 
                          'horario'=>$periodo
                        )
                    ); 
        }
	
}

/* End of file atendimento.php */
/* Location: ./application/controllers/atendimento.php */