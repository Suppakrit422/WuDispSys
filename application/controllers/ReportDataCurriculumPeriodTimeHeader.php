<?php

defined('BASEPATH') or exit('No direct script access allowed');

class  ReportDataCurriculumPeriodTimeHeader extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('report_data_curriculum_period_time_header_model', 'report_data_curriculum_period_time_header_model');
		$this->load->model('getOffenseCate_model', 'getOffenseCate_model');
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
        $this->load->view('menu/affairs/menu_affairs');
		$this->load->view('template/template4');
		//$this->load->view('student/notify/notify_page');
		//$this->load->view('student/notify/NotifyUserStudentPage');
		$this->load->view('report/header_activity_student/report_data_curriculum_period_time_header');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
	    $result = $this->report_data_curriculum_period_time_header_model->showAll();
		echo json_encode($result);
	}
	public function btweendate()
	{
		$result = $this->report_data_curriculum_period_time_header_model->btweendate();
		
		echo json_encode($result);
	}
	
	public function checkkey(){
	    $result = $this->report_data_curriculum_period_time_header_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
    }
    
    public function time_report_curriculum(){
        //print_r($this->input->get('offid'));
        $result = $this->report_data_curriculum_period_time_header_model->btweendate();
		echo json_encode($result);
    }
    
}
