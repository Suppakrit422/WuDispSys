

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DeanDisplayReport extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dean_menu_model', 'dean_menu_model');
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
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
		$this->load->view('report/dean/dean_display_report');
		$this->load->view('template/template5');
		$this->load->view('template/template6');

	
			
	}



	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
}