<?php
require_once('Student_dashboard.php');
defined('BASEPATH') or exit('No direct script access allowed');

class ReportOffender extends Student_dashboard
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ReportOffender_model', 'ReportOffender_model');
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
		$this->load->view('student/report/view_report_offender');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}
	function selectstudentoffensehead(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->ReportOffender_model->selectstudentoffensehead();
        echo json_encode($result);
	}
	function updatestatusoffAdmitwrongoffensestd(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->ReportOffender_model->updatestatusoffAdmitwrongoffensestd();
        echo json_encode($result);
	}
	
}
