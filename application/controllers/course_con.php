<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class course_models extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('course_models', 'model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();
	}

	public function print()
	{
		//$this->load->view('template/template2');
		//$this->load->view('report/report_1_print');
		//$this->load->view('template/template5');
	}
	
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('template/template3');
	    $this->load->view('course/course_view');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function showAll(){
	    $result = $this->model->showAll();
	   echo json_encode($result);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	
	





}

