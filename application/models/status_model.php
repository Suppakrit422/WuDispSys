<?php

class status_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
     //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable place โดยเรียงลำดับจาก place_ID
 public function showAll(){
       $this->db->order_by('status_ID', 'ASC');
        $query = $this->db->get('status');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางplace
    public function checkkey(){
        $status_ID = $this->input->post('status_ID');
        $this->db->where('status_ID', $status_ID);
        $query = $this->db->get('status');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    
    
    //ฟังก์ชันเพิ่มข้อมูล ลงในtable place
    public function addperson(){
        $field = array(
            'status_ID'=>$this->input->post('txtID'),
            'status_name'=>$this->input->post('txtfname')
      
            
            );
        $this->db->insert('status', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable place
    public function editperson(){
        $id = $this->input->get('id');
        $this->db->where('status_ID', $id);
        $query = $this->db->get('status');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันอัพเดตข้อมูลในtable place
    public function updateperson(){
        $id = $this->input->post('txteditID');
        $field = array(
            'person_name'=>$this->input->post('txteditname'),
            'person_fname'=>$this->input->post('txtfname')

        );
        $this->db->where('status_ID', $id);
        $this->db->update('status', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable place
    function deleteperson(){
         $id = $this->input->post('txtdelID');
      
        $this->db->where('status_ID', $id);
        $this->db->delete('status');
        //$this->db->update('place', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
        
    public function import_excelstatus(){
        $this->load->view('import_excelstatus');
        
        
        
        
    }

    
    
    
}