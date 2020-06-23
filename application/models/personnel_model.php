<?php

class personnel_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    //ฟังก์ชันแสดงข้อมูลทั้งหมด จากtable place โดยเรียงลำดับจาก place_ID
    public function showAll(){

        $this->db->select('*');
        $this->db->from('personnel p');
        $this->db->join('usertype u', 'p.usertype_ID=u.usertype_ID');
        $this->db->join('curriculum c', 'p.cur_ID=c.cur_ID');
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
        $person_ID = $this->input->post('person_ID');
        $this->db->where('person_ID', $person_ID);
        $query = $this->db->get('personnel');
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
            'person_ID'=>$this->input->post('txtID'),
            'person_fname'=>$this->input->post('txtfname'),
            'person_lname'=>$this->input->post('txtlname'),
            'position'=>$this->input->post('txtpos'),
            'role'=>$this->input->post('txtrole'),
            'email'=>$this->input->post('txtemail'),
            'phone1 '=>$this->input->post('txtphone1'),
            'phone2'=>$this->input->post('txtphone2'),
            'dept_ID'=>$this->input->post('txtdept'),
            'cur_ID'=>$this->input->post('txtcur'),
            'usertype_ID'=>$this->input->post('txtusertype'),
            'username'=>$this->input->post('txtusername'),
            'password'=>$this->input->post('txtpass'),
            'status'=>$this->input->post('txtstatus')
            
            );
        $this->db->insert('personnel', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //ฟังก์ชันแสดงข้อมูลการแก้ไข จากtable place
    public function editperson(){
        $id = $this->input->get('id');
        $this->db->where('person_ID', $id);
        $query = $this->db->get('personnel');
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
            'person_fname'=>$this->input->post('txtfname'),
            'person_lname'=>$this->input->post('txtlname'),
            'position'=>$this->input->post('txtpos'),
            'role'=>$this->input->post('txtrole'),
            'email'=>$this->input->post('txtemail'),
            'phone1 '=>$this->input->post('txtphone1'),
            'phone2'=>$this->input->post('txtphone2'),
            'dept_ID'=>$this->input->post('txtdept'),
            'cur_ID'=>$this->input->post('txtcur'),
            'usertype_ID'=>$this->input->post('txtusertype'),
            'username'=>$this->input->post('txtusername'),
            'password'=>$this->input->post('txtpass'),
            'status'=>$this->input->post('txtstatus')

        );
        $this->db->where('person_ID', $id);
        $this->db->update('personnel', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    //ฟังก์ชันลบข้อมูลในtable place
    function deleteperson(){
         $id = $this->input->post('txtdelID');
      
        $this->db->where('person_ID', $id);
        $this->db->delete('personnel');
        //$this->db->update('place', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
        
    public function import_excelperson(){
        $this->load->view('import_excelperson');
        
        
        
        
    }

    
    
    
}