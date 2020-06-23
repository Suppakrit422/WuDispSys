<?php 
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Dormitory extends Admin_dashboard  { 
    function __construct(){
        parent:: __construct();
        $this->load->model('dormitory_model', 'dormitory_model');
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
        /*$this->load->view('template/page_type_punish');
         */$this->load->view('basicdata/dormitry/viewdormitory');
         
        /*$this->load->view('template/page_import_data');*/
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    
    public function showAll(){
        $result = $this->dormitory_model->showAll();
        echo json_encode($result);
    }
    public function checkkey(){
        $result = $this->dormitory_model->checkkey();
        if($result){
            $msg['success'] = true;
            
            
        }else{
            $msg['success'] = false;
            
        }
        echo json_encode($result);
    }
    public function adddormitory(){
	    $result = $this->dormitory_model->adddormitory();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}
	
	public function editdormitory(){
	    
	    $result = $this->dormitory_model->editdormitory();
	    echo json_encode($result);
	}	
	
	public function updatedormitory(){
	    $result = $this->dormitory_model->updatedormitory();
		//$msg['success'] = false;
		//$msg['type'] = 'add';
		$results['success'] = $result;
	
		echo json_encode($results);
	}
	
    
    public function deletedormitory(){
        $result = $this->dormitory_model->deletedormitory();
        if($result){
            $msg['success'] = true;
        }else{
            $msg['success'] = false;
            redirect(base_url() . 'index.php/dormitory/index');
        }
        echo json_encode($msg);
    }
    function selectdormitory(){
        $result = $this->dormitory_model->selectdormitory();
        echo json_encode($result);
    }
    
    function selectperson()
    {
        $result = $this->dormitory_model->selectperson();
        echo json_encode($result);
    }
}
