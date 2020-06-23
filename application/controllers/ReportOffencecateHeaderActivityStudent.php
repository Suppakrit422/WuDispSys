<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportOffencecateHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('offCate_model', 'offCate_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/Discipline_officer/menu_Discipline_officer');
		$this->load->view('template/template4');
	    $this->load->view('report/discipline_officer/report_chart_discipline_officer_offencate');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	}
	public function chart(){
	    $result = $this->offCate_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->offCate_model->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartcur(){
	    $result = $this->offCate_model->chartcur();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartOffense(){
	    $result = $this->offCate_model->chartOffense();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->offCate_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}


