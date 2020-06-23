<?php

class service_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
   
    /*
    function selectstudent(){
        $username = $this->session->userdata('username');
   
        $this->db->select('*');
        $this->db->from('student s');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions dvs', 'c.dept_ID=dvs.dept_ID');
        $this->db->join('dormitory d', 's.dorm_ID=d.dorm_ID');
        $this->db->join('dormtype dt', 'd.dormtype_ID=dt.dormtype_ID');
         $this->db->where('S_ID',$username);
        $query = $this->db->get();
        //var_dump($query->result());
  
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    */
    
    function selectservice($sevice_ID){
        $service_ID= $this->input->post('txtdelID');
        //echo $person_ID;
        // $username = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('service sv');
        $this->db->join('student s', 's.S_ID=sv.S_ID');
        $this->db->join('personnel p', 'sv.person_ID=p.dept_ID');
        $this->db->where('service_ID', $service_ID);
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }
    

    
    //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable student โดยเรียงลำดับจาก student_ID
    public function showAll(){
        $this->db->order_by('service_ID', 'ASC');
        $query = $this->db->get('service');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางstudent
    public function checkkey(){
        $service_ID = $this->input->post('service_ID');
        $this->db->where('service_ID', $service_ID);
        $query = $this->db->get('service');
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
            
        );
        $this->db->insert('service', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable student
    public function editstudent(){
        $id = $this->input->get('id');
        $this->db->where('service_ID', $id);
        $query = $this->db->get('service');
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
           
        );
        $this->db->where('service_ID', $id);
        $this->db->update('service', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable student
    function deletestudent(){
        $id = $this->input->post('txtdelID');
        
        $this->db->where('service_ID', $id);
        $this->db->delete('service');
        //$this->db->update('student', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}
