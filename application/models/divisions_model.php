<?php

class divisions_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
     //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable divisions โดยเรียงลำดับจาก dept_ID
 public function showAll(){
       $this->db->order_by('dept_ID', 'ASC');
        $query = $this->db->get('divisions');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางdivisions
    public function checkkey(){
        $dept_ID = $this->input->post('dept_ID');
        $this->db->where('dept_ID', $dept_ID);
        $query = $this->db->get('divisions');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    
    
    //ฟังก์ชันเพิ่มข้อมูล ลงในtable divisions
    public function adddivisions(){
        $field = array(
            'dept_ID'=>$this->input->post('txtID'),
            'divisions_name'=>$this->input->post('txtname'),
            'description'=>$this->input->post('txtdescription')
            
            );
        $this->db->insert('divisions', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable divisions
    public function editdivisions(){
        $id = $this->input->get('id');
        $this->db->where('dept_ID', $id);
        $query = $this->db->get('divisions');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันอัพเดตข้อมูลในtable divisions
    public function updatedivisions(){
        $id = $this->input->post('txteditID');
        $field = array(
        'divisions_name'=>$this->input->post('txteditname'),
        'description'=>$this->input->post('txteditdescription')

        );
        $this->db->where('dept_ID', $id);
        $this->db->update('divisions', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable divisions
    function deletedivisions(){
         $id = $this->input->post('txtdelID');
      
        $this->db->where('dept_ID', $id);
        $this->db->delete('divisions');
        //$this->db->update('divisions', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    public function import_exceldivisions(){
        $this->load->view('import_exceldivisions');
        
        
        
        
    }
    
    
    
    
}