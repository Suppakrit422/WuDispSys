



<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DisplayReport extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dormsup_menu_model', 'dormsup_menu_model');
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
		$this->load->view('report/advisor_dormitory/display_report');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
}