<?php
require_once('Student_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Std_info extends Student_dashboard {
    function __construct(){
        parent:: __construct();
        $this->load->model('student_model', 'student_model');
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
        $this->load->view('menu/student/menu_user_student'); //ส่วนเมนู
        $this->load->view('template/template4');
        $this->load->view('student/StudentPersonal/std_personal_information');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
    }
    
    
          
    
    
    function selectstudent(){
        $result =  $this->student_model->selectstudent();
        echo json_encode($result);
    }
    
    function selectpersonnel(){
        $result =  $this->student_model->selectstudent();
        foreach ($result as $row){
            $person_ID = $row->person_ID;
 
        }
        
        $results =  $this->student_model->selectpersonnel($person_ID);
        echo json_encode($results);
    }
    
    function selectvehiclescar(){
       
        $result = $this->student_model->selectvehiclescar();
        echo json_encode($result);
    }
    
    function selectvehiclesmotorcycle(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->student_model->selectvehiclesmotorcycle();
         echo json_encode($result);
    }
    
}