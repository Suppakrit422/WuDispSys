<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportAdvisorDorm extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dormsup_model', 'dormsup_model');
		//$this->load->model('getOffenseCate_model', 'getOffenseCate_model'); //เปลี่ยน //model สร้างฟังชั่นเลือก
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
		$this->load->view('menu/Dormitory_advisor/menu_user_dormitory_advisor');
		$this->load->view('template/template4');
		$this->load->view('report/advisor_dormitory/report_data_dormitory');
		$this->load->view('template/template5');
		$this->load->view('template/template6');

		
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		$cur_ID = $this->input->post('cur_ID');
		$off_ID =  $this->input->post('off_ID');
	    $result = $this->dormsup_model->showAll($cur_ID, $off_ID);
		echo json_encode($result);
	}
	
	
	
	public function checkkey(){
	    $result = $this->dormsup_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	public function getGraphData(){
		$result = $this->dormsup_model->getGraphData();
		echo json_encode($result);
	}
}
