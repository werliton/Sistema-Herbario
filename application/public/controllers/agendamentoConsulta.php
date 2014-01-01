<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AgendamentoConsulta extends CI_Controller {

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
		$data['title'] = "Atendimento de Consulta" ;     
		$this->validaForm($data);		
	}
	
	function validaForm($data)
	{
            /*
             * Não há necessidade de carregar a library nem a help, pois serão carregadas automaticamente
             * foram definidos no autoload
             */		
             $this->form_validation->set_rules('nome','Nome','required');

             if ($this->form_validation->run() == FALSE) {
                $this->load->view('agendamentoConsulta',$data);
             }else{
                /*$result_paciente = $this->_salvaPaciente();
                /* Caso o cadastro tenha realizado com sucesso */
                /*if($result_paciente > 0){
                    $data['listagem'] = $this->_getListaPaciente(array('paciente_id'=>$result_paciente));
                    $this->load->view('agendConsultaPacienteSemCadastroContinua',$data);	
                }else{
                    $data['msg'] = "Paciente já foi cadastrado";
                    $this->load->view('agendConsultaPacienteSemCadastro',$data);	
                } */
             } 
	}
        
        function continua() {
            $id = $this->uri->segment(4);
            $data['listagem'] = $this->_getListaPaciente(array('paciente_id'=>$id));
            $this->load->view('agendConsultaPacienteSemCadastroContinua',$data);           
        }
        
        function salvarAgendamento() {
            $id = $this->input->post('paciente_id');
            
            if($this->validaAgendamento() == 1){
                   redirect('../agendamentoConsulta/continua/id/'.$id.'/msg/1');
            }elseif($this->validaAgendamento() == 2){
                $id_agend = $this->_salvaAgendamento($id);
                if($id_agend > 0){                      
                    redirect('../listaAgendamentos/agendamentoDetalhado/id/'.$id_agend, 'refresh');
                }
            }else{                 
                 redirect('../agendamentoConsulta/continua/id/'.$id.'/msg/0');
            }
        }
        
        function _getListaPaciente($where,$like=null) {
            $this->load->model('paciente_model');
            return $this->paciente_model->select($limite=null,$where,$like);
        }
        
        function validaAgendamento() {
             $data_post = $this->input->post('data');
             $hora_post = $this->input->post('horario');
            
            if(isset ($data_post) && !empty ($data_post)){
                $aux = explode("/", $data_post) ;
                $dia = $aux[0];
		$mes = $aux[1];
                $ano = $aux[2];
                $data = $ano."-".$mes."-".$dia;
                $data_atual = date('Y-m-d');
                /*Testa se a data escolhida e hora é maior ou igual ao data/hora atual*/
                if($data > $data_atual){                  
                    if($this->_numerodeAgendamentos(array('data'=>$data,'horario'=>$hora_post,'status'=>0))
                            >= LIMITE_CONSULTA){
                        return 1;
                        /* Caso tenha excedido o limite de consulta diária*/
                    }else{
                        return 2;
                        /* Caso não tenha excedido o limite de consulta diária*/
                    }
                }  elseif($data == $data_atual && $hora_post > date('H:i')){                  
                    if($this->_numerodeAgendamentos(array('data'=>$data,'horario'=>$hora_post,'status'=>0))
                            >= LIMITE_CONSULTA){
                        return 1;
                        /* Caso tenha excedido o limite de consulta diária*/
                    }else{
                        return 2;
                        /* Caso não tenha excedido o limite de consulta diária*/
                    }
                    
                }
            }  
            /* Caso a data e hora não corresponda com a data atual*/
            return 0;
        }
        
        function _numerodeAgendamentos($where) {
            $this->load->model('agendamento_model');
            return count($this->agendamento_model->getNumAgendamentos($where));
        }
	/*
         * Salva um paciente na base de dados
         */
	function _salvaPaciente()
	{		
            $this->load->model("paciente_model");
            $res = $this->paciente_model->pacienteExiste($_POST['nome']);
            
            if (count($res)<=0) {
                $aux = explode("/", $this->input->post('nascimento')) ;
                $dia = $aux[0];
		$mes = $aux[1];
                $ano = $aux[2];
                $data = $ano."-".$mes."-".$dia;
                
                $dados = array(
                        'cpf' => $this->input->post('cpf'),
                        'nome' => $this->input->post('nome'),
                        'nascimento' => $data,
                        'endereco' => $this->input->post('endereco'),
                        'fone' => $this->input->post('fone'),
                        'celular' => $this->input->post('celular'),
                        'email' => $this->input->post('email')
                 );
                 //Pega o último id inserido
                 $last_id = $this->paciente_model->insert($dados);
                 
                 if ($last_id > 0) {
                     return $last_id;                    
                 }
           }else{
               return 0;
           }
	}
	/*
         * Salva um agendamento de consulta
         */
	function _salvaAgendamento($paciente_id)
	{
		$this->load->model('agendamento_model'); 
                $aux = explode("/", $this->input->post('data')) ;
                $dia = $aux[0];
		$mes = $aux[1];
                $ano = $aux[2];
                $data = $ano."-".$mes."-".$dia;
                
		$dados = array(
                                'id_paciente' => $paciente_id,
                                'data' => $data,
                                'horario' => $this->input->post('horario'),
                                'tipoEnvio' => $this->input->post('tipoEnvio'),
                                'status'=>  0
			 );
                return $this->agendamento_model->insert($dados);
	}
        
        /*
         * Salva um agendamento de consulta
         */
        function atendimento($param) {
            $paciente_id = $this->uri->segment(4);
            $agend_id = $this->uri->segment(6);
            
            if(isset ($paciente_id) && isset($agend_id)){
                if($this->_salvaAtendimento($paciente_id, $agend_id) > 0){
                    $data['msg'] = "";
                }else{
                    $data['msg'] = "";
                }
                redirect('../layout2', 'refresh');
            }
        }
        
	function _salvaAtendimento($pid,$aid)
	{
		$this->load->model('atendimento_model'); 
		
		$dados = array(
                                'paciente_id' => $pid,
                                'agend_id' => $aid,
                                'data_hora_chegada' => date("Y-m-d H:i:s")
			 );
                $this->atendimento_model->insert($dados);
                
                /*
                 * Altera o status do agendamento para atendido
                 */
                $this->load->model('agendamento_model'); 
		
		$dados = array(
                                'status' => 1
			 );
                return $this->agendamento_model->update($dados,$aid);
	}
        
        /*
         * Edita um agendamento de consulta
         */
        function editarAgendamento() {
            $id = $this->input->post('agend_id');
            
            if($this->validaAgendamento() == 1){
                     redirect('../listaAgendamentos/agendamentoEdit/id/'.$id.'/msg/1');
            }elseif($this->validaAgendamento() == 2){
                $id_agend = $this->_editaAgendamento($id);
                if($id_agend > 0){  
                    redirect('../listaAgendamentos/agendamentoDetalhado/id/'.$id, 'refresh');
                }
             }else{
                 redirect('../listaAgendamentos/agendamentoEdit/id/'.$id.'/msg/0');
             }
        }
        
        function cancelarAgendamento(){
            $id = $this->uri->segment(4);
            if($this->_cancelaAgendamento($id) > 0){
                $data['msg'] = "Consulta cancelada com sucesso!";
            }else{
                $data['msg'] = "Erro ao cancelar agendamento!";
            }            
            redirect('../layout2', 'refresh');
        }

        function _editaAgendamento($id)
	{
            if(!empty ($id)){
                $this->load->model('agendamento_model'); 
                $aux = explode("/", $this->input->post('data')) ;
                $dia = $aux[0];
                $mes = $aux[1];
                $ano = $aux[2];
                $data = $ano."-".$mes."-".$dia;

		$dados = array(
                                'data' => $data,
                                'horario' => $this->input->post('horario'),
                                'tipoEnvio' => $this->input->post('tipoEnvio'),
			 );

		return $this->agendamento_model->update($dados,$id);
            }
		
	}
        
        function _cancelaAgendamento($id)
	{
            if(!empty ($id)){
                $this->load->model('agendamento_model'); 
		$dados = array('agend_id' => $id);

		return $this->agendamento_model->delete($dados);
            }
		
	}
        
        function existente() {
            $this->load->view('agendConsultaPacienteComCadastro');
        }
        function semcadastro() {
            $this->load->view('agendConsultaPacienteSemCadastro');
        }
             
        function marcarConsulta() {
            $id = $this->input->post('paciente_id');
            
             $this->form_validation->set_rules('data','Data','required');
		
             if ($this->form_validation->run() == FALSE) {
                 redirect('../paciente/marcarConsulta/id/'.$id);
             }else{
                if($this->validaAgendamento() == 1){
                     redirect('../paciente/marcarConsulta/id/'.$id.'/msg/1');
                }elseif($this->validaAgendamento() == 2){
                    $id_agend = $this->_salvaAgendamento($id);
                    if($id_agend > 0){  
                        $data['listagem'] = $id_agend;
                        $this->load->view('agendamentoSucesso',$data);
                    }
                 }else{
                     redirect('../paciente/marcarConsulta/id/'.$id.'/msg/0');
                 }
             } 
        }
}

/* End of file atendimento.php */
/* Location: ./application/controllers/atendimento.php */