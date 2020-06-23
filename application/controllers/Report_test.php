<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_test extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('report1_model', 'r1_model', true);
		$this->load->model('curriculum_model', 'cur_model', true);
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();
	}

	public function print()
	{
		//$this->load->view('template/template2');
		$this->load->view('report/report_1_print');
		//$this->load->view('template/template5');
	}
	
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('template/template3');
	    $this->load->view('report/report_1');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
     public function showAll(){
		$cur_ID = $this->input->post('cur_ID');
		$off_ID =  $this->input->post('off_ID');
		$month =  $this->input->post('month');
		$year =  $this->input->post('year');
		$result = $this->r1_model->showAll($cur_ID, $off_ID, $month, $year);
		if(count($result) > 0){
			echo json_encode($result, JSON_UNESCAPED_UNICODE);
		}
	}

	public function getCurriculum(){
		$result = $this->r1_model->getCurriculum();
		if(count($result) > 0){
			echo json_encode($result, JSON_UNESCAPED_UNICODE);
		}
	}

	public function getOffense(){
		$result = $this->r1_model->getOffense();
		if(count($result) > 0){
			echo json_encode($result, JSON_UNESCAPED_UNICODE);
		}
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

