<?php

defined('BASEPATH') or exit('No direct script access allowed');

class getOffenseCate extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('getOffenseCate_model', 'getOffenseCate_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->template();

	}



	public function template()
	{
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/student/menu_user_student');
		$this->load->view('template/template4');
        // $this->load->view('Offc_view');
        // $this->load->view('Offe_view');
        // $this->load->view('dv_view');
        // $this->load->view('Curri_view');
        // $this->load->view('dmt_view');
        // $this->load->view('Offd_view');
        // $this->load->view('R_place');
        // $this->load->view('cur');
		$this->load->view('template/template5');
		$this->load->view('template/template6');
	}

	public function checkkey(){
	    $result = $this->getOffenseCate_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
    }
    
    public function selectOffenseCate(){
         $result = $this->getOffenseCate_model->getOffenseCate();
         echo json_encode($result);
       // echo (4444)
    }
    public function selectOffense(){
        $result = $this->getOffenseCate_model->getOffense();
        echo json_encode($result);
    }
     public function selectDivisions(){
        $result = $this->getOffenseCate_model->getDivisions();
        echo json_encode($result);
    }
    public function selectCurriculum(){
        $result = $this->getOffenseCate_model->getCurriculum();
        echo json_encode($result);
    }
    public function selectDormitory(){
        $result = $this->getOffenseCate_model->getDormitory();
        echo json_encode($result);
    }
    public function selectPlace(){
        $result = $this->getOffenseCate_model->getPlace();
        echo json_encode($result);
    }
    public function selecgetCurriculum_info(){
        $result = $this->getOffenseCate_model->getCurriculum_info();
        echo json_encode($result);
    }
    // select ข้อมูลจากตารางที่ต้องการ
}
