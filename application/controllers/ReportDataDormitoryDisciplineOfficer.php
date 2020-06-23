
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportDataDormitoryDisciplineOfficer extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('report_data_dormitory_discipline_officer_model', 'report_data_dormitory_discipline_officer_model');
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
		$this->load->view('menu/Discipline_officer/menu_Discipline_officer');
		$this->load->view('template/template4');
		$this->load->view('report/discipline_officer/report_data_dormitory_discipline_officer');
		//$this->load->view('Test');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
	public function showAll()
	{
		
	    $result = $this->report_data_dormitory_discipline_officer_model->showAll();
		echo json_encode($result);
	}
	
	
	public function checkkey(){
	    $result = $this->report_data_dormitory_discipline_officer_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	
   
    
}
