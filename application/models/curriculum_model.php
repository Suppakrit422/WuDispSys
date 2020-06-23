<?php

class curriculum_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
     //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable place โดยเรียงลำดับจาก place_ID
 public function showAll(){
    
    $this->db->select('*');
    $this->db->from('curriculum c');
    $this->db->join('divisions d', 'c.dept_ID=d.dept_ID');
 
   // $this->db->order_by('v_ID', 'ASC');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
        
//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางplace
    public function checkkey(){
        $cur_ID = $this->input->post(' cur_ID');
        $this->db->where(' cur_ID', $cur_ID);
        $query = $this->db->get('curriculum');
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
            ' cur_ID'=>$this->input->post('txtID'),
            'cur_name'=>$this->input->post('txtfname')
      
            
            );
        $this->db->insert('curriculum', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable place
    public function editperson(){
        $id = $this->input->get('id');
        $this->db->where(' cur_ID', $id);
        $query = $this->db->get('curriculum');
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
            'cur_ID'=>$this->input->post('txteditid'),
            'cur_name'=>$this->input->post('txtname')

        );
        $this->db->where(' cur_ID', $id);
        $this->db->update('curriculum', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable place
    function deleteperson(){
         $id = $this->input->post('txtdelID');
      
        $this->db->where(' cur_ID', $id);
        $this->db->delete('curriculum');
        //$this->db->update('place', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
        
    public function import_excelcurriculum(){
        $this->load->view('import_excelcurriculum');
        
        
        
        
    }

    
    
    
}