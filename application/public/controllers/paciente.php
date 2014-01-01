<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paciente extends CI_Controller {

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
		$data['title'] = "Cadastro de Paciente" ;     
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
			 $this->load->view('cadastroPaciente',$data);
		 }else{
                    if($this->_salvaPaciente() == 0){
                        $data['msg'] = 'PACIENTE JÁ EXISTE!';
                    }else{
                        $data['msg'] = 'PACIENTE CADASTRO COM SUCESSO!';
                    }
                    
		    $this->load->view('cadastroPaciente',$data);
		 } 
	}
        
        function salvar() {
             $this->form_validation->set_rules('nome','Nome','required');

             if ($this->form_validation->run() == FALSE) {
                $this->load->view('agendConsultaPacienteSemCadastro');
             }else{
                $result_paciente = $this->_salvaPaciente();
                /* Caso o cadastro tenha realizado com sucesso */
                if($result_paciente > 0){
                    redirect('../agendamentoConsulta/continua/id/'.$result_paciente);	
                }else{
                    $data['msg'] = "Paciente já foi cadastrado";
                    $this->load->view('agendConsultaPacienteSemCadastro',$data);	
                } 
             }
        }
	/*
         * Salva um paciente na base de dados
         */
	function _salvaPaciente()
	{		
            $this->load->model("paciente_model");
            $res = $this->paciente_model->pacienteExiste($_POST['nome']);

            if (count($res)>0) {
                return 0;
            }else{
                
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
                     return $last_id;
            }
	}
        
        function pacienteEdit() {
            $id = $this->uri->segment(3);
            
            if(isset ($id) && !empty ($id) && $id == "id"){
                $agend_id = $this->uri->segment(6);
                $data['agend_id'] = $agend_id;
                $data['listagem'] = $this->_getListaPaciente(array('paciente_id'=>$this->uri->segment(4)));
		$this->load->view('edit_paciente',$data);	
            }
        }
        
        function _getListaPaciente($where,$like=null) {
            $this->load->model('paciente_model');
            return $this->paciente_model->select($limite=null,$where,$like);
        }
        
        /*
         * Edita um agendamento de consulta
         */
        function editarPaciente() {
            $id = $this->input->post('paciente_id');            
            $aid = $this->input->post('agend_id');
            if($this->_editaPaciente($id) > 0){
                $data['msg'] = "Edição realizada com sucesso!";
            }else{
                $data['msg'] = "Erro ao editar paciente!";
            }    
            redirect('../listaAgendamentos/agendamentoDetalhado/id/'.$aid, 'refresh');
        }
        
        function _editaPaciente($id)
	{
            if(!empty ($id)){
                $this->load->model('paciente_model'); 
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

		return $this->paciente_model->update($dados,array('paciente_id'=>$id));
            }
		
	}
        
        function buscaPacientes() {
            $chave = $this->input->post('nome');
         
             $this->form_validation->set_rules('nome','Nome','required');

             if ($this->form_validation->run() == FALSE) {
                     $this->load->view('agendConsultaPacienteComCadastro');
             }else{
                if($this->_getListaPaciente(null,array('Nome'=>$chave,'cpf'=>$chave)) > 0){
                    $data['listagem'] = $this->_getListaPaciente(null,array('Nome'=>$chave,'cpf'=>$chave));
                }

                $this->load->view('agendConsultaPacienteComCadastro',$data);
             } 
        }
        
        function buscaPacientesAutoComplete() {
            $chave = $this->input->get('q');
            $data = $this->_getListaPaciente(null,array('Nome'=>$chave,'cpf'=>$chave));
             
            foreach($data as $row){
                     echo $row->nome."|".$row->nome."\n";
            }
               
        }
        
        function marcarConsulta() {
            $id = $this->uri->segment(3);
            
            if(isset ($id) && !empty ($id)){        
                 $data['listagem'] = $this->_getListaPaciente(array('paciente_id'=>$this->uri->segment(4)));
                 $this->load->view('marcarConsulta',$data); 
            }else{
                redirect('../paciente/buscaPacientes');
            }
                      
        }
	
}

/* End of file atendimento.php */
/* Location: ./application/controllers/atendimento.php */