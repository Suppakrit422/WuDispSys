<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportCurriHeaderSchool extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('branch_model', 'branch_model');
    }

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}



	public function template()
	{
		$this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/branch_head/menu_branch_head');
        $this->load->view('template/template4');
        $this->load->view('report/header_school/report_data_cur_header_school_student');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		
	    $result = $this->branch_model->showAll();
		echo json_encode($result);
	}
	
	
	public function checkkey(){
	    $result = $this->branch_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->branch_model->getGraphData();
		echo json_encode($result);
	}
}
