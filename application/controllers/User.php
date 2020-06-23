<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('place_model', 'model');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
	   // $this->template();
	    $this->load->view('user/page1');

	}
	
	
	public function template(){
	    
	    $this->load->view('template/template1');
	    $this->load->view('template/template2');
	    $this->load->view('template/template3');
	    $this->load->view('place/page_place');
	    //$this->load->view('template/page_type_punish'); /*หน้าเพิ่มหมวดความผิด*/
	    /*$this->load->view('template/page_usergroup');*/ /*หน้าเพิ่มประเภทผู้ใช้*/
	    /*$this->load->view('template/page_import_data');*/
	    $this->load->view('template/template5');
	    $this->load->view('template/template6');
	    
	    
	    
	}

	
	public function showAll(){
		$result = $this->model->showAll();
		echo json_encode($result);
	}

	public function addplace(){
		$result = $this->model->addplace();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
			$this->session->set_flashdata('message', '<br/>เพิ่มข้อมูลเรียบร้อย');
			 redirect(base_url() . 'index.php/place/index');

		}
		echo json_encode($msg);
	}

	public function editplace(){
	
		$result = $this->model->editplace();
		echo json_encode($result);
	}

	public function updateplace(){
		$result = $this->model->updateplace();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
			$this->session->set_flashdata('message', '<br/>แก้ไขข้อมูลเรียบร้อย');
	    redirect(base_url() . 'index.php/place/index');
		}
		redirect(base_url() . 'index.php/place/index');
		//echo json_encode($msg);
	}

	public function deleteplace(){
		$result = $this->model->deleteplace();
		
		$msg['success'] = false;
		$msg['type'] = 'delete';
		if($result){
			$msg['success'] = true;
				$this->session->set_flashdata('message', '<br/>ลบข้อมูลเรียบร้อย');
	    redirect(base_url() . 'index.php/place/index');
		}
		echo json_encode($msg);
	}
}
