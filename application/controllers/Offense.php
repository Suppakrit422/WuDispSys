<?php

require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Offense extends Admin_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('offense_model', 'offense_model');
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
		  $this->load->view('basicdata/offense/page_offense'); 
		  $this->load->view('template/template5');
		  $this->load->view('template/template6');

	}

	public function showAll(){
	    $result = $this->offense_model->showAll();
	    echo json_encode($result);
	}
	
	public function checkkey(){
	    $result = $this->offense_model->checkkey();
	    if($result){
	        $msg['success'] = true;
	        
	        
	    }else{
	        $msg['success'] = false;
	        
	    }
	    echo json_encode($result);
	}
	
	public function addoffense(){
	    $result = $this->offense_model->addoffense();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}
	
	public function editoffense(){
	    
	    $result = $this->offense_model->editoffense();
	    echo json_encode($result);
	}	
	
	public function updateoffense(){
	    $result = $this->offense_model->updateoffense();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}
	
	
	
	public function deleteoffense(){
	    $result = $this->offense_model->deleteoffense();
	    if($result){
	        $msg['success'] = true;
	    }else{
	        $msg['success'] = false;
	        redirect(base_url() . 'index.php/offense/index');
	    }
	    echo json_encode($msg);
	} 
	
	
	function selectoffensecate(){
	    $result = $this->offense_model->selectoffensecate();
	    echo json_encode($result);
	}
}
