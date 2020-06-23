<?php
require_once('Student_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Proofargument extends Student_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('Proofargument_model', 'Proofargument_model');
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
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
		$this->load->view('Proofargument/view_Proofargument');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
        
    }
    
    
    function selectstudentproofargument(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->Proofargument_model->selectstudentproofargument();
        echo json_encode($result);
    }
    function selectoffenseorder(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->Proofargument_model->selectoffenseorder();
        echo json_encode($result);
    }
    
    
    
    
}