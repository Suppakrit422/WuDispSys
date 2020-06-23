



<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TeacherDisplayReport extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('teacher_menu_model', 'teacher_menu_model');
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
		$this->load->view('menu/Teacher/menu_user_teacher');
		$this->load->view('template/template4');
		//$this->load->view('teacher/firstpage');
		$this->load->view('report/teacher/teacher_display_Report');
		//$this->load->view('teacher/VolunteerAc/test');
		//$this->load->view('teacher/VolunteerAc/AcceptActivityOffVolunteer');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table personnel และแสดงข้อมูลในview
}