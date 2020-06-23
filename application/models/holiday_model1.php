<?php

class holiday_model1 extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
     
    
    public function showAll(){
        $this->db->order_by('hh_ID', 'desc');
        $this->db->where('active_track', '0');
        $query = $this->db->get('holiday1');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function checkname($name){
        $this->db->where('h_year',$name);
        $query = $this->db->get('holiday1');
        
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function addholiday(){
           //str_replace(' ', '-', trim($placename)); 
           $namedesc = $this->input->post('txtname');
           $namedesc = trim($namedesc);
            $checkname = $this->checkname($namedesc);
            if($checkname == true){
                return "falsename";


            }else{
        $field = array(
            'hh_ID'=>$this->input->post('txtid'),
            'h_year'=>$this->input->post('txtname'),
            
            
            
        );
        $this->db->insert('holiday1', $field);
        if($this->db->affected_rows() > 0){
            $gg = ($this->input->post('txtname') - 543)-2019;
            $this->db->query("INSERT INTO holiday(h_date,description,h_type,flag) 
                            SELECT DATE_ADD(h_date, INTERVAL '".$gg."' YEAR),description,h_type,flag 
                            FROM holiday WHERE year(h_date)=2019 AND h_type = 'วันหยุดประจำปี' ");
            return true;
        }else{
            return false;
        }
    }
}
    
    public function editholiday(){
        $id = $this->input->get('id');
        $this->db->where('hh_ID', $id);
        $query = $this->db->get('holiday1');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
     function updateholiday(){
        $id = $this->input->post('id');
        $field = array(
            'hh_ID'=>$this->input->post('id'),
            'h_year'=>$this->input->post('name'),
            
            
        );
        $this->db->where('hh_ID', $id);
        $this->db->update('holiday1', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    function deleteholiday(){
        $id = $this->input->post('txtdelID');
        
        $field = array(
            'active_track'=> '1'
            
        );
        $this->db->where('hh_ID', $id);
        $this->db->update('holiday1', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

