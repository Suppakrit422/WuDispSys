<?php

class student_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
    
    
    
      
    
    function selectstudent(){
        $student = $this->session->userdata('student');
   
        $this->db->select('*');
        $this->db->from('student s');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions dvs', 'c.dept_ID=dvs.dept_ID');
        $this->db->join('dormitory d', 's.dorm_ID=d.dorm_ID');
        $this->db->join('dormtype dt', 'd.dormtype_ID=dt.dormtype_ID');
         $this->db->where('S_ID',$student);
        $query = $this->db->get();
        //var_dump($query->result());
  
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    
    function selectpersonnel($person_ID){
        //$id = $this->input->post('txtdelID');
        //echo $person_ID;
        // $student = $this->session->userdata('student');
        $this->db->select('*');
        $this->db->from('personnel p');
        $this->db->join('curriculum c', 'p.cur_ID=c.cur_ID');
        $this->db->join('divisions dvs', 'c.dept_ID=dvs.dept_ID');
        $this->db->where('person_ID', $person_ID);
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }
    
    
    //$this->session->mark_as_temp('student',10);

    function selectvehiclescar(){
        $car ="รถยนต์";
         $student = $this->session->userdata('student');
        
         //echo $student;

         $this->db->select('*');
         $this->db->from('vehicles v');
         $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
         //$this->db->where('vetype_name','รถยนต์ ');
         $this->db->where('S_ID', $student);
         $this->db->where('vetype_name', $car);
         $query = $this->db->get();
       // var_dump($query->result());
        
       
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
       
    }
    
    
    function selectvehiclesmotorcycle(){
        $motorcycle = "รถจักรยานยนต์";
        $student = $this->session->userdata('student');
        $this->db->select('*');
        $this->db->from('vehicles v');
        $this->db->join('vehiclestype vt', 'v.vetype_ID=vt.vetype_ID');
        //$this->db->where('vetype_name','รถยนต์ ');
        $this->db->where('S_ID', $student);
        $this->db->where('vetype_name', $motorcycle);
        $query = $this->db->get();
        //var_dump($query->result());
        
        
         if($query->num_rows() > 0){
         return $query->result();
         }else{
         return false;
         }
        
    }
    
    
    //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable student โดยเรียงลำดับจาก student_ID
    public function showAll(){
        $this->db->order_by('S_ID', 'ASC');
        $query = $this->db->get('student');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางstudent
    public function checkkey(){
        $S_ID = $this->input->post('S_ID');
        $this->db->where('S_ID', $S_ID);
        $query = $this->db->get('student');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
        
    //ฟังก์ชันเพิ่มข้อมูล ลงในtable student
    public function addstudent(){
        $field = array(
            'S_ID'=>$this->input->post('txtID'),
            'student_name'=>$this->input->post('txtname'),
            'description'=>$this->input->post('txtdescription')
            
        );
        $this->db->insert('student', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable student
    public function editstudent(){
        $id = $this->input->get('id');
        $this->db->where('S_ID', $id);
        $query = $this->db->get('student');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันอัพเดตข้อมูลในtable student
    public function updatestudent(){
        $id = $this->input->post('txteditID');
        $field = array(
            'student_name'=>$this->input->post('txteditname'),
            'description'=>$this->input->post('txteditdescription')
            
        );
        $this->db->where('S_ID', $id);
        $this->db->update('student', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable student
    function deletestudent(){
        $id = $this->input->post('txtdelID');
        
        $this->db->where('S_ID', $id);
        $this->db->delete('student');
        //$this->db->update('student', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    public function import_excelstudent(){
        $this->load->view('import_excelstudent');
        
        
        
        
    }
    
    
    
    
}
