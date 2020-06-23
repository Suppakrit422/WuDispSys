<?php
class Loginuser extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
        
    }
    public function index(){
        
        $this->load->view('login/login');
    }
    
    public function login(){
        //$this->load->model('login_model');
        //$data['records'] = $this->login_model->getdata();
        $this->load->view('login/login');
    }
    
    
    
    public function login_validation(){
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            //true
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //model function
            $this->load->model('login_model');
            if($this->login_model->can_login($username, $password))
            {
                $session_data = array(
                    'username'     =>     $username,
                    'login'     =>     true
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'index.php/loginuser/enter');
            }
            else
            {
                $this->session->set_flashdata('error', '<br/>ชื่อผู้ใช้งานและรหัสผ่านไม่ถูกต้อง');
                redirect(base_url() . 'index.php/loginuser/login');
            }
        }
        else
        {
            //false
            $this->login();
        }
    }
    function enter(){
        $username=$this->session->userdata('username');
        $this->load->model('login_model');
        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernameadmin($username))
        {
            $admin=$this->session->userdata('username');
            $session_admin = array(
                'admin'     =>     $admin,
                'autority' => 'admin' 
            );
            
            $this->session->set_userdata($session_admin);
     
            redirect(base_url() . 'index.php/Admin_dashboard',$session_admin);
    
        }
     
        
        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamestudent($username))
        {
            
            $student=$this->session->userdata('username');
            $session_student = array(
                'student'     =>     $student,
                'autority' => 'student'
                
            );
            
            $this->session->set_userdata($session_student);
            
            redirect(base_url() . 'index.php/Student_dashboard');
   
        }
        
        
        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernameteacher($username))
        {
            
            $teacher=$this->session->userdata('username');
            $session_teacher = array(
                'teacher'     =>     $teacher,
                'autority' => 'teacher'
                
            );
            
            $this->session->set_userdata($session_teacher);
            
            redirect(base_url() . 'index.php/Teacher_dashboard');

        }


        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamediscipline_officer($username))
        {
            
            $discipline_officer=$this->session->userdata('username');
            $session_discipline_officer = array(
                'discipline_officer'     =>     $discipline_officer,
                'autority' => 'discipline_officer'
                
            );
            
            $this->session->set_userdata($session_discipline_officer);
            
            redirect(base_url() . 'index.php/Discipline_officer_dashboard');

        }



        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernameheadofstudent_affairs($username))
        {
            
            $headofstudent_affairs=$this->session->userdata('username');
            $session_headofstudent_affairs = array(
                'headofstudent_affairs'     =>     $headofstudent_affairs,
                'autority' => 'headofstudent_affairs'
                
            );
            
            $this->session->set_userdata($session_headofstudent_affairs);
            
            redirect(base_url() . 'index.php/Headofstudent_affairs_dashboard');

        }





        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamedormitory_supervisor($username))
        {
            
            $dormitory_supervisor=$this->session->userdata('username');
            $session_dormitory_supervisor = array(
                'dormitory_supervisor'     =>     $dormitory_supervisor,
                'autority' => 'dormitory_supervisor'
                
            );
            
            $this->session->set_userdata($session_dormitory_supervisor);
            
            redirect(base_url() . 'index.php/Dormitory_supervisor_dashboard');

        }

        


        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamedormitory_advisor($username))
        {
            
            $dormitory_advisor=$this->session->userdata('username');
            $session_dormitory_advisor = array(
                'dormitory_advisor'     =>     $dormitory_advisor,
                'autority' => 'dormitory_advisor'
                
            );
            
            $this->session->set_userdata($session_dormitory_advisor);
            
            redirect(base_url() . 'index.php/Dormitory_advisor_dashboard');

        }




        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamebranch_head($username))
        {
            
            $branch_head=$this->session->userdata('username');
            $session_branch_head = array(
                'branch_head'     =>     $branch_head,
                'autority' => 'branch_head'
                
            );
            
            $this->session->set_userdata($session_branch_head);
            
            redirect(base_url() . 'index.php/Branch_head_dashboard');

        }



        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamedean($username))
        {
            
            $dean=$this->session->userdata('username');
            $session_dean = array(
                'dean'     =>     $dean,
                'autority' => 'dean'
                
            );
            
            $this->session->set_userdata($session_dean);
            
            redirect(base_url() . 'index.php/Dean_dashboard');

        }

        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernamesecurity_guard($username))
        {
            
            $security_guard=$this->session->userdata('username');
            $session_security_guard = array(
                'security_guard'     =>     $security_guard,
                'autority' => 'security_guard'
                
            );
            
            $this->session->set_userdata($session_security_guard);
            
            redirect(base_url() . 'index.php/Security_guard_dashboard');

        }



        if($this->session->userdata('username') != ''  && $this->session->userdata('username') == $this->login_model->checkusernameemployee($username))
        {
            
            $employee=$this->session->userdata('username');
            $session_employee = array(
                'employee'     =>     $employee,
                'autority' => 'employee'
                
            );
            
            $this->session->set_userdata($session_employee);
            
            redirect(base_url() . 'index.php/Employee_dashboard');

        }


        
        else
        {
            $this->session->set_flashdata('error', '<br/>ชื่อผู้ใช้งานและรหัสผ่านไม่ถูกต้อง');
            redirect(base_url() . 'index.php/loginuser/login');
        }
    }
    
    
    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('student');
        $this->session->unset_userdata('teacher');      
        $this->session->unset_userdata('discipline_officer');
        $this->session->unset_userdata('headofstudent_affairs');
        $this->session->unset_userdata('dormitory_supervisor');
        $this->session->unset_userdata('dormitory_advisor');
        $this->session->unset_userdata('branch_head');
        $this->session->unset_userdata('dean');
        $this->session->unset_userdata('security_guard');
        $this->session->unset_userdata('employee');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('autority');
        redirect(base_url() . 'index.php/loginuser');
    }
    
    
    function select()
    {
        $this->load->model('login_model');
        $data['records'] = $this->login_model->getdata();
        $this->load->view('login/showdata',$data);
    }
    
    function edit()
    {
        $id = $this->input->get('id');
        print_r($id);
        $this->load->model('login_model');
        $data['user_data'] = $this->login_model->fetch_single_data($id);
        //Check data from fetch_single_data model
        //var_dump($data['user_data']);
        //$data["fetch_data"] = $this->login_model->fetch_data();
        $this->load->view('login/editdata',$data);
    }
    
    function editdata(){
        $id = $this->input->get('id');
        $this->load->model("login_model");
        $data = array(
            'UName'     =>     $this->input->post("username"),
            'Pass'     =>     $this->input->post("password"));
        $this->login_model->editdata($id,$data);
        redirect(base_url() . 'index.php/loginuser/select');
        
    }
    
    function del()
    {
        $id = $this->input->get('id');
        print_r($id);
        $this->load->model('login_model');
        $data['user_data'] = $this->login_model->fetch_single_data($id);

        $this->load->view('login/deldata',$data);
    }
    
    function deldata()
    {
        $id = $this->input->get('id');
        print_r($id);
        $this->load->model('login_model');
        $data = array(
            'flag'     =>    '1');
        $this->login_model->deldata($id,$data);
        redirect(base_url() . 'index.php/loginuser/select');
    }
    
    
    function truedeldata()
    {
        $id = $this->input->get('id');
        print_r($id);
        $this->load->model('login_model');
        $this->login_model->truedeldata($id);
        redirect(base_url() . 'index.php/loginuser/select');
    }
    
    
    
    
    
    function add()
    {
        $this->load->view('login/adddata');
    }
    
    
    
    
    function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run())
        {
            
            $this->load->model('login_model');
            $data = array(
                'UName'     =>     $this->input->post("username"),
                'Pass'     =>     $this->input->post("password"));
            $this->login_model->insertdata($data);
            redirect(base_url() . 'index.php/loginuser/select');
        }
        
    }
    
    public function excel(){
        //$this->load->view('login/excel_import');
        
        
        
        
    }
    
    
}
