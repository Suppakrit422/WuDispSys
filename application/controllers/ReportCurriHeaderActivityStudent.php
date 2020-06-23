<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportCurriHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('curri_model', 'curri_model');
		$this->load->model('getOffenseCate_model', 'getOffenseCate_model'); //เปลี่ยน //model สร้างฟังชั่นเลือก
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
		$this->load->view('menu/training/menu_training'); //ส่วนเมนู
		$this->load->view('template/template4');
		$this->load->view('report/header_activity_student/report_data_curriculum_header_activity_student');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		$cur_ID = $this->input->post('cur_ID');
		$off_ID =  $this->input->post('off_ID');
	    $result = $this->curri_model->showAll($cur_ID, $off_ID);
		echo json_encode($result);
	}
	public function getCUR_ID()
	{
	    $result = $this->curri_model->getCUR_ID();
		echo json_encode($result);
	}
	
	public function checkkey(){
	    $result = $this->curri_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->curri_model->getGraphData();
		echo json_encode($result);
	}
}
