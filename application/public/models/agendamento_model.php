<?php
    /**
     * 
     */
    class Agendamento_model extends CI_Model {
        
        private $_table = 'agendamento';

        /**
         * Verifica a existencia de um solicitante já cadastrado
         */	
        function insert($dados)
        {
                $this->db->insert($this->_table, $dados); 
                return $this->db->insert_id();
        }
        
        function update($dados,$id) {
                $this->db->where('agend_id', $id);
                return $this->db->update($this->_table, $dados); 
        }
        
        function delete($dados) {
                $this->db->delete($this->_table, $dados); 
        }
        
        function getUltimasConsultas($limite=null,$where=null,$like=null,$group=null,$ordem="desc") {
            $this->db->select("*");
            $this->db->from("paciente");
            $this->db->join($this->_table,"paciente.paciente_id = {$this->_table}.id_paciente",'inner');
            if($where!=NULL){
                $this->db->where($where);
            }
            if($like!=NULL){
                $this->db->like($like);
            }
            if($group!=NULL){
                $this->db->group_by($group);
            }
            $this->db->order_by('data',$ordem);
            if($limite!=NULL){
                $this->db->limit($limite);
            }
            return $this->db->get()->result();
        }
        
        function getNumAgendamentos($where) {
            $this->db->select("agend_id");
            $this->db->from($this->_table);
            $this->db->where($where);
            return $this->db->get()->result();
        }
        
    }
    
?>