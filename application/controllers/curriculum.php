<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class curriculum extends Admin_dashboard {
	function __construct(){
		parent:: __construct();
		$this->load->model('curriculum_model', 'curriculum_model');
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
	    $this->load->view('basicdata/curriculum/curriculum');
	    //$this->load->view('template/page_type_punish'); /*หน้าเพิ่มหมวดความผิด*/
	    /*$this->load->view('template/page_usergroup');*/ /*หน้าเพิ่มประเภทผู้ใช้*/
	    /*$this->load->view('template/page_import_data');*/
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table curriculum และแสดงข้อมูลในview
	public function showAll(){
	    $result = $this->curriculum_model->showAll();
		echo json_encode($result);
	}
	
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางcurriculum
	public function checkkey(){
	    $result = $this->curriculum_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
    
	//ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย
	public function addcurriculum(){
	    $result = $this->curriculum_model->addcurriculum();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		
		
		if($result){
		    $msg['success'] = true;
		    
		    
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/curriculum/index');
		}
		echo json_encode($msg);
	}

	//ฟังก์ชันแสดงการแก้ไขข้อมูล
	public function editcurriculum(){
	
	    $result = $this->curriculum_model->editcurriculum();
		echo json_encode($result);
	}
	
	//ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
	public function updatecurriculum(){
	    $result = $this->curriculum_model->updatecurriculum();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
		    $msg['success'] = true;
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/curriculum/index');
		}
		echo json_encode($msg);
	}
    
	//ฟังก์ชันการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
	public function deletecurriculum(){
	    $result = $this->curriculum_model->deletecurriculum();
		if($result){
		    $msg['success'] = true;     
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/curriculum/index');
		}
		echo json_encode($msg);
	}
}
