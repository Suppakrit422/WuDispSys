<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportChartAdvisorDorm extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dormsup_g_model', 'dormsup_g_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
		$this->load->view('menu/Dormitory_advisor/menu_user_dormitory_advisor');
		$this->load->view('template/template4');
	    $this->load->view('report/advisor_dormitory/report_graph_data_dormitory');
	    $this->load->view('template/template5');
		$this->load->view('template/template6');
	}
	public function chart(){
	    $result = $this->dormsup_g_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->dormsup_g_model->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartdorm15(){
	    $result = $this->dormsup_g_model->chartdorm15();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->dormsup_g_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
}

