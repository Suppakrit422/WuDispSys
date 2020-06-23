<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Branch_head_dashboard extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('branch_head_dashboard_model', 'branch_head_dashboard_model');
        $this->load->model('SettimeSession','SettimeSession');
    }
    
    public function index()
    {
        $this->checkAutoriry();
        $this->template();
        
    }
    
    public function template()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/branch_head/menu_branch_head');
        $this->load->view('template/template4');
        $this->load->view('branch_head/firstpage/firstpage');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    function getDashboard(){
        $result = $this->branch_head_dashboard_model->getDashboard();
        echo json_encode($result,JSON_NUMERIC_CHECK);
    }
    
    public function getAllSTD(){
        
        $result = $this->branch_head_dashboard_model->getAllSTD();
        echo json_encode($result,JSON_NUMERIC_CHECK);
        
    }
    public function getGraphDataSchool(){
        $result = $this->branch_head_dashboard_model->getGraphDataSchool();
        echo json_encode($result,JSON_NUMERIC_CHECK);
        
    }
    function searchoffensestudent(){
        $result = $this->branch_head_dashboard_model->searchoffensestudent();
        echo json_encode($result);
    }
    
    function checkAutoriry() {
        //$admin = $this->session->userdata('admin');
        // $student = $this->session->userdata('student');
        //echo $username;
        // die();
        
        //$this->session->mark_as_temp('login',1800);
        $this->SettimeSession->SetTime();
        if($this->session->userdata('login') == true){
            
            
            if($this->session->userdata('autority') == "student"){
                redirect(base_url() . 'index.php/Student_dashboard');
            }
            
            if($this->session->userdata('autority') == "teacher"){
                redirect(base_url() . 'index.php/Teacher_dashboard');
            }
            if($this->session->userdata('autority') == "discipline_officer"){
                redirect(base_url() . 'index.php/Discipline_officer_dashboard');
            }
            if($this->session->userdata('autority') == "headofstudent_affairs"){
                redirect(base_url() . 'index.php/Headofstudent_affairs_dashboard');
            }
            
            if($this->session->userdata('autority') == "dormitory_supervisor"){
                redirect(base_url() . 'index.php/Dormitory_supervisor_dashboard');
            }
            
            if($this->session->userdata('autority') == "dormitory_advisor"){
                redirect(base_url() . 'index.php/Dormitory_advisor_dashboard');
            }
            
            if($this->session->userdata('autority') == "admin"){
                redirect(base_url() . 'index.php/Admin_dashboard');
            }
            
            if($this->session->userdata('autority') == "dean"){
                redirect(base_url() . 'index.php/Dean_dashboard');
            }
            
            if($this->session->userdata('autority') == "security_guard"){
                redirect(base_url() . 'index.php/Security_guard_dashboard');
            }
            
            if($this->session->userdata('autority') == "employee"){
                redirect(base_url() . 'index.php/Employee_dashboard');
            }
            if($this->session->userdata('autority') == "Branchhead"){
                redirect(base_url() . 'index.php/Branch_head_dashboard');
            }
            
        }else{
            redirect(base_url() . 'index.php/Loginuser');
            
            
        }
        
        
        
    }
    
    public function new()
    {
        //แสดงหน้าจอ form สำหรับบันทึกข้อมูลใหม่
    }
    
    public function addnew()
    {
        //รับข้อมูลจาก form  insert ลง DB
    }
    
    public function edit()
    {
        //แสดงหน้าจอ form สำแก้ไขข้อมูลใหม่
    }
    
    public function update()
    {
        //รับข้อมูลจาก form  update ลง DB
    }
    
    // =====================================
    public function showAll(){
        $result = $this->branch_head_dashboard_model->showAll();
        echo json_encode($result);
    }
    
    public function showAlll(){
        $result = $this->branch_head_dashboard_model->showAlll();
        echo json_encode($result);
    }
    public function showactity(){
        $result = $this->branch_head_dashboard_model->showactity();
        echo json_encode($result);
    }
    
    //ฟังก์ชันเพิ่มข้อมูล เมื่อเพิ่มข้อมูลเสร็จสิ้นจะแสดงข้อความ เพิ่มข้อมูลเรียบร้อย
    public function addnotify(){
        $result = $this->branch_head_dashboard_model->addnotify();
        //$msg['success'] = false;
        //$msg['type'] = 'add';
        /*
        
        if($result){
        $msg['success'] = true;
        
        
        }else{
        $msg['success'] = false;
        redirect(base_url() . 'index.php/notify_page/index');
        }*/
        echo json_encode($result);
    }
    
    //ฟังก์ชันแสดงการแก้ไขข้อมูล
    public function editnotify(){
        
        $result = $this->branch_head_dashboard_model->editnotify();
        echo json_encode($result);
    }
    
    //ฟังก์ชันการอัพเดตข้อมูล เมื่ออัพเดตข้อมูลเสร็จสิ้นจะแสดงข้อความ แก้ไขข้อมูลเรียบร้อย
    public function updatenotify(){
        $result = $this->branch_head_dashboard_model->updatenotify();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }else{
            $msg['success'] = false;
            redirect(base_url() . 'index.php/notify_page/index');
        }
        echo json_encode($msg);
    }
    
    //ฟังก์ชันการลบข้อมูล เมื่อลบข้อมูลเสร็จสิ้นจะแสดงข้อความ ลบข้อมูลเรียบร้อย
    public function deletenotify(){
        $result = $this->branch_head_dashboard_model->deletenotify();
        /*
         if($result){
         $msg['success'] = true;
         }else{
         $msg['success'] = false;
         redirect(base_url() . 'index.php/notify_page/index');
         }*/
        //echo json_encode();
        echo "";
    }
    function selectstudent(){
        $result =  $this->branch_head_dashboard_model->selectstudent();
        echo json_encode($result);
    }
    
    function selectplace(){
        
        
        $result = $this->branch_head_dashboard_model->selectplace();
        echo json_encode($result);
    }
    function selectvehicles(){
        
        
        $result = $this->branch_head_dashboard_model->selectvehicles();
        
        echo json_encode($result);
        
        
    }
    function selectoffevidence(){
        
        
        $result = $this->branch_head_dashboard_model->selectoffevidence();
        
        echo json_encode($result);
    }
    function selectoffensecate(){
        
        
        $result = $this->branch_head_dashboard_model->selectoffensecate();
        
        echo json_encode($result);
    }
    
    
    function selectOffenseoffevidence(){
        
        
        $result = $this->branch_head_dashboard_model->selectOffenseoffevidence();
        //print_r($result);
        echo json_encode($result);
    }
    
    function spc_showoffhead(){
        $result = $this->branch_head_dashboard_model->spc_showoffhead();
        echo json_encode($result);
    }
    
    function check_id (){
        //เช็คค่า id ที่มากสุด
        $result = $this->branch_head_dashboard_model->check_id();
        echo json_encode($result);
        //ยังไม่ได้เขียน model
    }
    
    
    function selectplaceall (){
        //เช็คค่า id ที่มากสุด
        $result = $this->branch_head_dashboard_model->selectplaceall();
        echo json_encode($result);
        //ยังไม่ได้เขียน model
    }
    function selectregist_num (){
        $result = $this->branch_head_dashboard_model->selectregist_num();
        echo json_encode($result);
    }
    
    function selectscorestudent(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->branch_head_dashboard_model->selectscorestudent();
        echo json_encode($result);
    }
    
    
    function selectstudentall(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->branch_head_dashboard_model->selectstudentall();
        echo json_encode($result);
    }
    
    
    function selectstudentscore(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->branch_head_dashboard_model->selectstudentscore();
        echo json_encode($result);
    }
    
    function selectscoreservice(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->branch_head_dashboard_model->selectscoreservice();
        echo json_encode($result);
    }
    
    
    function selectscoretraining(){
        //  $username = $this->session->userdata('username');
        
        $result = $this->branch_head_dashboard_model->selectscoretraining();
        echo json_encode($result);
    }
    
    
    
}
