<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportOffenceYearHeaderActivityStudent extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('offcg_year_model', 'offcg_year_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/training/menu_training'); //ส่วนเมนู
		$this->load->view('template/template4');
		$this->load->view('report/header_activity_student/report_chart_offc_year_header_activity_student');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function chart(){
	    $result = $this->offcg_year_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->offcg_year_model->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartcur(){
	    $result = $this->offcg_year_model->chartcur();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartOffense(){
	    $result = $this->offcg_year_model->chartOffense();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartOff_year(){
	    $result = $this->offcg_year_model->chartOff_year();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->offcg_year_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}


