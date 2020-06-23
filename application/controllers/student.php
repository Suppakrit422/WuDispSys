<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends Admin_dashboard {
	function __construct(){
		parent:: __construct();
		$this->load->model('student_model', 'student_model');
	}
	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->checkAutoriry();
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/admin/menu_user_admin');
		$this->load->view('template/template4');
	    $this->load->view('basicdata/student/student');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	
	public function showAll(){
	    $result = $this->student_model->showAll();
	    echo json_encode($result);
	}
	
	

}
