


<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HeaderSchoolDisplayReport extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('branch_menu_model', 'branch_menu_model');
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
        $this->load->view('menu/branch_head/menu_branch_head');
        $this->load->view('template/template4');
        $this->load->view('report/header_school/header_school_display_Report');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
}