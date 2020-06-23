<?php

class vehicles_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
     //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable vehicles โดยเรียงลำดับจาก v_ID
     public function showAll(){

        $this->db->select('*');
        $this->db->from('vehiclestype v');
        $this->db->join('vehicles vt', 'v.vetype_ID=vt.vetype_ID');
       // $this->db->order_by('v_ID', 'ASC');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        }
//ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางvehicles
    public function checkkey(){
        $v_ID = $this->input->post('v_ID');
        $this->db->where('v_ID', $v_ID);
        $query = $this->db->get('vehicles');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    
    
    //ฟังก์ชันเพิ่มข้อมูล ลงในtable vehicles
    public function addvehicles(){
        $field = array(
            'v_ID'=>$this->input->post('txtID'),
            'vehicles_name'=>$this->input->post('txtname'),
            'description'=>$this->input->post('txtdescription')
            
            );
        $this->db->insert('vehicles', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable vehicles
    public function editvehicles(){
        $id = $this->input->get('id');
        $this->db->where('v_ID', $id);
        $query = $this->db->get('vehicles');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
    //ฟังก์ชันอัพเดตข้อมูลในtable vehicles
    public function updatevehicles(){
        $id = $this->input->post('txteditID');
        $field = array(
        'vehicles_name'=>$this->input->post('txteditname'),
        'description'=>$this->input->post('txteditdescription')

        );
        $this->db->where('v_ID', $id);
        $this->db->update('vehicles', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable vehicles
    function deletevehicles(){
         $id = $this->input->post('txtdelID');
      
        $this->db->where('v_ID', $id);
        $this->db->delete('vehicles');
        //$this->db->update('vehicles', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    public function import_excelvehicles(){
        $this->load->view('import_excelvehicles');
        
        
        
        
    }
    
    
    
    
}