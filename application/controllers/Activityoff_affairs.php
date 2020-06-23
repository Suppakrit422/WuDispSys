<?php
require_once('Headofstudent_affairs_dashboard.php');
defined('BASEPATH') or exit('No direct script access allowed');

class Activityoff_affairs extends Headofstudent_affairs_dashboard
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('teacher_dashboard_model', 'teacher_dashboard_model');
		$this->load->model('Service_Feedback_model', 'Service_Feedback_model');
		$this->load->model('SettimeSession', 'SettimeSession');
	}


	public function index()
	{

		$this->checkAutoriry();
		$this->template();
	}

	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/affairs/menu_affairs');
		$this->load->view('template/template4');
		//$this->load->view('teacher/firstpage');
		//$this->load->view('teacher/VolunteerAc/ShowActivityVolunteer');
		//$this->load->view('teacher/VolunteerAc/test');
		$this->load->view('teacher/VolunteerAc/AcceptActivityOffVolunteer');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}




	function selectstudentfirstpage()
	{
		//  $username = $this->session->userdata('username');

		$result = $this->teacher_dashboard_model->selectstudentfirstpage();
		// echo json_encode($result);
	}

	function selectstudentall()
	{
		//  $username = $this->session->userdata('username');

		$result = $this->teacher_dashboard_model->selectstudentall();
		echo json_encode($result);
	}
	function selectscorestudent()
	{
		//  $username = $this->session->userdata('username');

		$result = $this->teacher_dashboard_model->selectscorestudent();
		echo json_encode($result);
	}
	function student_offense()
	{

		$result = $this->teacher_dashboard_model->student_offense();
		echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	function Allactivity()
	{

		$result = $this->teacher_dashboard_model->Allactivity();
		echo json_encode($result);
	}

	//170263
	function selectscoreservice()
	{
		$result = $this->teacher_dashboard_model->selectscoreservice();
		echo json_encode($result);
	}
	function studentinactivity()
	{
		$result = $this->teacher_dashboard_model->studentinactivity();
		echo json_encode($result);
	}
	//170263
	function selectscoretraining()
	{
		//  $username = $this->session->userdata('username');

		$result = $this->branch_head_dashboard_model->selectscoretraining();
		echo json_encode($result);
	}
	function selectservice()
	{
		$result = $this->Service_Feedback_model->selectservice();
		echo json_encode($result);
	}
	function Updateactivityforperson()
	{
		$result = $this->Service_Feedback_model->Updateactivityforperson();
		echo json_encode($result);
	}
	function Updateactivityfordiscipline_officer()
	{
		$result = $this->Service_Feedback_model->Updateactivityfordiscipline_officer();
		echo json_encode($result);
	}

  
  function Updatestatusparticipationactivities(){
		$result = $this->Service_Feedback_model->Updatestatusparticipationactivities();
	    echo json_encode($result);

	}
	function selectproposer(){
		$result = $this->Service_Feedback_model->selectproposer();
	    echo json_encode($result);

	}

	/*
	function selectstudent(){
	   // $username = $this->session->userdata('username');
	   // echo $username;
	    
	    $result = $this->model->selectstudent();
	    //var_dump($result);
	    echo json_encode($result);
	}
*/

	
	// =====================================
	public function showAll()
	{
		$result = $this->teacher_dashboard_model->showAll();
		echo json_encode($result);
	}


	//ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย
	public function addnotify()
	{
		$result = $this->teacher_dashboard_model->addnotify();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		/*
	
	if($result){
		$msg['success'] = true;
		
		
	}else{
		$msg['success'] = false;
		redirect(base_url() . 'index.php/notify_page/index');
	}*/
		echo json_encode($result);
	}

	//ฟังก์ชันแสดงการแก้ไขข้อมูล
	public function editnotify()
	{

		$result = $this->teacher_dashboard_model->editnotify();
		echo json_encode($result);
	}

	//ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
	public function updatenotify()
	{
		$result = $this->teacher_dashboard_model->updatenotify();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		} else {
			$msg['success'] = false;
			redirect(base_url() . 'index.php/notify_page/index');
		}
		echo json_encode($msg);
	}

	//ฟังก์ชันการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
	public function deletenotify()
	{
		$result = $this->teacher_dashboard_model->deletenotify();
		/*
	if($result){
		$msg['success'] = true;     
	}else{
		$msg['success'] = false;
		redirect(base_url() . 'index.php/notify_page/index');
	}*/
		//echo json_encode();
		echo "";
	}
	function selectstudent()
	{
		$result =  $this->teacher_dashboard_model->selectstudent();
		echo json_encode($result);
	}

	function selectplace()
	{


		$result = $this->teacher_dashboard_model->selectplace();
		echo json_encode($result);
	}
	function selectvehicles()
	{


		$result = $this->teacher_dashboard_model->selectvehicles();

		echo json_encode($result);
	}
	function selectoffevidence()
	{


		$result = $this->teacher_dashboard_model->selectoffevidence();

		echo json_encode($result);
	}
	function selectoffensecate()
	{


		$result = $this->teacher_dashboard_model->selectoffensecate();

		echo json_encode($result);
	}


	function selectOffenseoffevidence()
	{


		$result = $this->teacher_dashboard_model->selectOffenseoffevidence();
		//print_r($result);
		echo json_encode($result);
	}

	function spc_showoffhead()
	{
		$result = $this->teacher_dashboard_model->spc_showoffhead();
		echo json_encode($result);
	}

	function check_id()
	{
		//เช็คค่า id ที่มากสุด
		$result = $this->teacher_dashboard_model->check_id();
		echo json_encode($result);
		//ยังไม่ได้เขียน model
	}


	function selectplaceall()
	{
		//เช็คค่า id ที่มากสุด
		$result = $this->teacher_dashboard_model->selectplaceall();
		echo json_encode($result);
		//ยังไม่ได้เขียน model
	}
	function selectregist_num()
	{
		$result = $this->teacher_dashboard_model->selectregist_num();
		echo json_encode($result);
	}
	function convert_times()
	{
		//stament
		$time1 = $this->input->post('start_times');
		$time2 = $this->input->post('end_time');

		$startTime = new DateTime($time1);
		$endTime = new DateTime($time2);
		$duration = $startTime->diff($endTime); //$duration is a DateInterval object
		echo $duration->format("%H:%I:%S");
	}

	public function test()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die;
	}
}
