<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends Admin_dashboard {
	function __construct(){
		parent:: __construct();
		$this->load->model('holiday_model', 'holiday_model');
	}
 
	public function index()
	{
		//List  ข้อมูลมาแสดงในหน้าจอ
	    $this->checkAutoriry();
		$this->template();
		
	} 
	
	
	public function template(){
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
	    $this->load->view('basicdata/holiday/holiday');
	    //$this->load->view('template/page_type_punish'); /*หน้าเพิ่มหมวดความผิด*/
	    /*$this->load->view('template/page_usergroup');*/ /*หน้าเพิ่มประเภทผู้ใช้*/
	    /*$this->load->view('template/page_import_data');*/
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	
	}



	
	public function edit(){
		$this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
		$this->load->view('basicdata/holiday/holiday');
		$this->load->view('template/template5');
	    $this->load->view('template/template6');
	}

	public function showAll(){
		$year = $_GET['year'];
		$result = $this->holiday_model->showAll($year);
		echo json_encode($result);
	}
	public function checkkey(){
	    $result = $this->holiday_model->checkkey();
	    echo json_encode($result);
	}
    


	public function addholiday(){
	    $result = $this->holiday_model->addholiday();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}


	public function editholiday(){
	
	    $result = $this->holiday_model->editholiday();
		echo json_encode($result);
	}

	public function updateholiday(){
	    $result = $this->holiday_model->updateholiday();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}


	public function deleteholiday(){
	    $result = $this->holiday_model->deleteholiday();
		if($result){
		    $msg['success'] = true;     
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/holiday/index');
		}
		echo json_encode($msg);
	}
}