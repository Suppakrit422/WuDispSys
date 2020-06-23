<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Place extends Admin_dashboard {
	function __construct(){
		parent:: __construct();
		$this->load->model('place_model', 'place_model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	    $this->checkAutoriry();
	    $this->template();

	}
	
	
	public function template(){
		
		  //List ข้อมูลมาแสดงในหน้าจอ
		  $this->load->view('template/template1');
		  $this->load->view('template/template2');
		  $this->load->view('menu/admin/menu_user_admin');
		  $this->load->view('template/template4');
		  $this->load->view('basicdata/place/page_place');
		  $this->load->view('template/template5');
		  $this->load->view('template/template6');
	    
	    
	    
	}

	//ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table place และแสดงข้อมูลในview
	public function showAll(){
	    $result = $this->place_model->showAll();
		echo json_encode($result);
	}
	
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางplace
	public function checkkey(){
	    $result = $this->place_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
    
	//ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย
	public function addplace(){
	    $result = $this->place_model->addplace();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}

	//ฟังก์ชันแสดงการแก้ไขข้อมูล
	public function editplace(){
	
	    $result = $this->place_model->editplace();
		echo json_encode($result);
	}
	
	//ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
	public function updateplace(){
		$result = $this->place_model->updateplace();
		$results['success'] = $result;
		
		echo json_encode($results);
	}
    
	//ฟังก์ชันการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
	public function deleteplace(){
	    $result = $this->place_model->deleteplace();
		if($result){
		    $msg['success'] = true;     
		}else{
		    $msg['success'] = false;
		    redirect(base_url() . 'index.php/place/index');
		}
		echo json_encode($msg);
	}
}
