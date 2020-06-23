<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_cur extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('report1_model', 'model');
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
        $this->load->view('report/report_cur_page');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
        
    }
    public function showAll(){
        $result = $this->model->showAll();
        echo json_encode($result);
    }
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตาราง Usertype
    public function checkkey(){
        $result = $this->model->checkkey();
        if($result){
            $msg['success'] = true;
            
            
        }else{
            $msg['success'] = false;
            
        }
        echo json_encode($result);
    }
    public function showAll2(){
        $result = $this->model->showAll2();
        echo json_encode($result);
    }
    
    public function showAll3(){
        $result = $this->model->showAll3();
        echo json_encode($result);
    }
    
    
    
    
    
    
}