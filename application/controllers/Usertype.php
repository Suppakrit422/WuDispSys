<?php 
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertype extends Admin_dashboard {
    function __construct(){ 
        parent:: __construct();
        $this->load->model('usertype_model', 'usertype_model');
    }

	public function index()
	{
	    $this->checkAutoriry();
		//List ข้อมูลมาแสดงในหน้าจอ
		$this->load->view('template/template1');
		$this->load->view('template/template2');
		$this->load->view('menu/admin/menu_user_admin');
		$this->load->view('template/template4');
		$this->load->view('basicdata/usertype/usertype'); /*หน้าเพิ่มหมวดความผิด*/
		$this->load->view('template/template5');
		$this->load->view('template/template6');

	}
	public function showAll(){
	    $result = $this->usertype_model->showAll();
	    echo json_encode($result);
	}
	//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
	public function checkkey(){
	    $result = $this->usertype_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	
	//ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย

	public function addusertype(){
	    $result = $this->usertype_model->addusertype();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}
	
	public function editusertype(){
	    
	    $result = $this->usertype_model->editusertype();
	    echo json_encode($result);
	}
	

   
	public function updateusertype(){
	    $result = $this->usertype_model->updateusertype();
	    $msg['success'] = false;
	    $msg['type'] = 'update';
	    if($result){
	        $msg['success'] = true;
	    }else {
	        $msg['success'] = false;
	        redirect(base_url() . 'index.php/usertype/index');
	    }   
	     echo json_encode($msg);
	}
	
	public function deleteusertype(){
	    $result = $this->usertype_model->deleteusertype();
	    
	    $msg['success'] = false;
	    $msg['type'] = 'delete';
	    if($result){
	        $msg['success'] = true;
	    }else{
	        $msg['success'] = false;
	        redirect(base_url() . 'index.php/usertype/index');
	    }
	    echo json_encode($msg);
	}
	
}
