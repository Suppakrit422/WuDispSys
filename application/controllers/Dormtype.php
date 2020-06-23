<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Dormtype extends Admin_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('dormtype_model', 'dormtype_model');
    }
    
    public function index()
    {
        //List แสดงข้อมูลบนหน้าจอ
        $this->checkAutoriry();
        $this->template();
        //++
    }
    

    public function template(){
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/dormtype/showsall');
        //$this->load->view('template/page_type_punish'); /*หน้าเพิ่มหมวดความผิด*/
        /*$this->load->view('template/page_usergroup');*/ /*หน้าเพิ่มประเภทผู้ใช้*/
        /*$this->load->view('template/page_import_data');*/
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
        
    }
    
    //ฟังก์ชันเรียกข้อมูลทั้งหมดจาก table dormtype และแสดงข้อมูลในview
    public function showAll(){
        $result = $this->dormtype_model->showAll();
        echo json_encode($result);
    }
    
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางdormtype
    public function checkkey(){
        $result = $this->dormtype_model->checkkey();
        if($result){
            $msg['success'] = true;
            
            
        }else{
            $msg['success'] = false;
            
        }
        echo json_encode($result);
    }
    
    //ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย 
    public function adddormtype(){
        $result = $this->dormtype_model->adddormtype();
        //$msg['success'] = false;
        //$msg['type'] = 'add';
        $results['success'] = $result;
	
		echo json_encode($results);
	}
    
       
    //ฟังก์ชันแสดงการแก้ไขข้อมูล
    public function editdormtype(){
        
        $result = $this->dormtype_model->editdormtype();
        echo json_encode($result);
    }
    
    //ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
    public function updatedormtype(){
        $result = $this->dormtype_model->updatedormtype();
        $results['success'] = $result;
        // redirect(base_url() . 'index.php/dromtype');

		
		echo json_encode($results);
	}
    //ฟังก์ชั่นการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
    public function deletedormtype(){
        $result = $this->dormtype_model->deletedormtype();
        if($result){
            $msg['success'] = true;
        }else{
            $msg['success'] = false;
            redirect(base_url() . 'index.php/dromtype/index');
        }
        echo json_encode($msg);
    }
    
}
