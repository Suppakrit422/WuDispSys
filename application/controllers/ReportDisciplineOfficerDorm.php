<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDisciplineOfficerDorm extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('officer_dormg_model', 'officer_dormg_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
		$this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/Discipline_officer/menu_Discipline_officer');
		$this->load->view('template/template4');
	    $this->load->view('report/discipline_officer/report_chart_discipline_officer_dorm');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function chart(){
	    $result = $this->dormitory_models->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->dormitory_models->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->dormitory_models->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}

