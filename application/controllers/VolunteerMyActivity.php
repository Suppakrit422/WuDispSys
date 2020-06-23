<?php
require_once('Student_dashboard.php');
defined('BASEPATH') or exit('No direct script access allowed');

class VolunteerMyActivity extends Student_dashboard
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('VolunteerMyActivity_model', 'VolunteerMyActivity_model');
	}



	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
		$this->template();
		$this->checkAutoriry();
	}

	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
		$this->load->view('student/VolunteerAc/view_all_myactivity');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}


	public function deletemyactivity(){
		$result = $this->VolunteerMyActivity_model->deletemyactivity();
		echo json_encode($result);
    }
}
