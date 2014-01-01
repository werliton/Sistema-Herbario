<?php
    /**
     * 
     */
    class Paciente_model extends CI_Model {
        
        private $_table = 'paciente';
        /**
         * Verifica a existencia de um solicitante já cadastrado
         */
        function pacienteExiste($param) {
        	$this->db->where('nome',$param);
        	return $this->db
                        ->get($this->_table)
        		->result();
        }
		
        function insert($dados)
        {
                $this->db->insert($this->_table, $dados); 
                return $this->db->insert_id();
        }
        
        function update($dados,$where) {
                $this->db->where($where);
                return $this->db->update($this->_table, $dados); 
        }
        
        function select($limite=null,$where=null,$like=null) {
            $this->db->select("*");
            $this->db->from($this->_table);
            if($where!=NULL){
                $this->db->where($where);
            }
            if($like!=NULL){
                $this->db->or_like($like);
            }
            return $this->db->get()->result();
        }
    }
    
?>