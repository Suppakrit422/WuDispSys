<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Offensecate extends Admin_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('offensecate_model', 'offensecate_model');
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
        $this->load->view('basicdata/offensecate/page_offensecate'); 
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
        
    }
    
    
    public function showAll(){
        $result = $this->offensecate_model->showAll();
        echo json_encode($result);
    }
    
    public function checkkey(){
        $result = $this->offensecate_model->checkkey();
        if($result){
            $msg['success'] = true;
            
            
        }else{
            $msg['success'] = false;
            
        }
        echo json_encode($result);
    }
   
    public function addoffensecate(){
        $result = $this->offensecate_model->addoffensecate();
        //$msg['success'] = false;
        //$msg['type'] = 'add';
        $results['success'] = $result;
        
        echo json_encode($results);
    }
    
    public function editoffensecate(){
        
        $result = $this->offensecate_model->editoffensecate();
        echo json_encode($result);
    }
    
   
    public function updateoffensecate(){
        $result = $this->offensecate_model->updateoffensecate();
        $results['success'] = $result;
        
        echo json_encode($results);
    }
    public function deleteoffensecate(){
        $result = $this->offensecate_model->deleteoffensecate();
        $results['success'] = $result;
        
        echo json_encode($results);
    }
}
