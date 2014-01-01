<?php

/**
 * 
 */
class Atendimento {

    private $id;
    private $solicitante_id; 
    private $conselheiro_id;
    private $situacao_id;
    private $data_hora;
    private $num_processo;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSolicitante_id() {
        return $this->solicitante_id;
    }

    public function setSolicitante_id($solicitante_id) {
        $this->solicitante_id = $solicitante_id;
    }

    public function getConselheiro_id() {
        return $this->conselheiro_id;
    }

    public function setConselheiro_id($conselheiro_id) {
        $this->conselheiro_id = $conselheiro_id;
    }

    public function getSituacao_id() {
        return $this->situacao_id;
    }

    public function setSituacao_id($situacao_id) {
        $this->situacao_id = $situacao_id;
    }

    public function getData_hora() {
        return $this->data_hora;
    }

    public function setData_hora($data_hora) {
        $this->data_hora = $data_hora;
    }

    public function getNum_processo() {
        return $this->num_processo;
    }

    public function setNum_processo($num_processo) {
        $this->num_processo = $num_processo;
    }



}

?>