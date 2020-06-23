<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dean_g extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('dean_g_model', 'dean_g_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('template/template3');
	    $this->load->view('dean_g');
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}
	public function chart(){
	    $result = $this->dean_g_model->chart();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartdorm(){
	    $result = $this->dean_g_model->chartdorm();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	public function chartcur(){
	    $result = $this->dean_g_model->chartcur();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartOffense(){
	    $result = $this->dean_g_model->chartOffense();
	    echo json_encode($result, JSON_NUMERIC_CHECK);
    }
    public function chartdivi(){
	    $result = $this->dean_g_model->chartdivi();
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


