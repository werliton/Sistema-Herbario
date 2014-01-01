<?php
    /**
     * 
     */
    class Atendimento_model extends CI_Model {
        
        private $_table = 'atendimento';

        /**
         * Verifica a existencia de um solicitante já cadastrado
         */	
        function insert($dados)
        {
                $this->db->insert($this->_table, $dados); 
                return $this->db->insert_id();
        }     
        
        function getAtendimentos($where) {
            $this->db->select('*');
            $this->db->from('paciente');
            $this->db->join($this->_table,'paciente.paciente_id='.$this->_table.'.paciente_id','inner');
            $this->db->where($where);
            $this->db->order_by('data_hora_chegada','ASC');
            
            return $this->db->get()->result();
        }
    }
    
?>