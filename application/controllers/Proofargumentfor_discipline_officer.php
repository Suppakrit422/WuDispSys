<?php
require_once('Discipline_officer_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Proofargumentfor_discipline_officer extends Discipline_officer_dashboard  {
    function __construct(){
        parent:: __construct();
        $this->load->model('Proofargumentfor_discipline_officer_model', 'Proofargumentfor_discipline_officer_model');
    }
    public function index()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->checkAutoriry();
        $this->template();
        
    }
    
    
    public function template(){

        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/Discipline_officer/menu_Discipline_officer');
        $this->load->view('template/template4');
        $this->load->view('discipline_officer/proofevidence/view_proof_evidence');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    
    
    function selectproofargument(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->Proofargumentfor_discipline_officer_model->selectproofargument();
        echo json_encode($result);
    }

    function showdetailproofargument(){
        $result = $this->Proofargumentfor_discipline_officer_model->showdetailproofargument();
        echo json_encode($result);

    }

    function Updatestatusproofargument(){
        $result = $this->Proofargumentfor_discipline_officer_model->Updatestatusproofargument();
        echo json_encode($result);

    }

    public function test()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die;
	}
}