<?php

class holiday_model extends CI_Model {
    public function _construct() 
    {
        parent::_construct();
        
    }
 
    public function findByYear($year){
        $this->db->select('*');
        $this->db->from('holiday');
        $this->db->where('YEAR(h_date)',$year);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }



        
    
    
 public function showAll($year){
    $this->db->select('DATE_ADD(h_date, INTERVAL 543 YEAR) AS dd, h_ID, description, h_type, flag`');
    $this->db->where('flag', '0');
    $this->db->where('Year(h_date)', $year-543);
    $this->db->order_by('h_ID', 'ASC');
            $query = $this->db->get('holiday');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function checkname($name){
        $this->db->where('description',$name);
        $query = $this->db->get('holiday');
        
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function addholiday(){
           //str_replace(' ', '-', trim($placename)); 
            $year = $this ->input->get("year");
            $namedesc = $this->input->post('txtdescrip');
            $namedesc = trim($namedesc);
            $checkname = $this->checkname($namedesc);
            $datatime = $this->input->post('txtdate');
            if($checkname == true){
                return "falsename";
            }else{
                
                $datetime_arr = explode("-",$datatime);
                // var_dump($datetime_arr[0]);
                // var_dump($year);
                if($year == $datetime_arr[0]+543) {              
                    $field = array(
                        //'h_ID'=>$this->input->post('txtID'),
                        'h_date'=> $datatime,
                        'description'=>$namedesc,
                        'h_type'=>$this->input->post('addtype'),
                        'flag'=>0,
                    ); 
                } 
        $this->db->insert('holiday', $field);
        if($this->db->affected_rows() > 0){
            return  "name";
        }else{
            return "year";
        }
    } 
}


    public function editholiday(){
        $id = $this->input->get('id');
        $this->db->where('h_ID', $id);
        $query = $this->db->get('holiday');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function updateholiday(){
        $id = $this->input->post('txteditID');
        $namedesc = $this->input->post('txteditname');
        $namedesc = trim($namedesc);
         $checkname = $this->checkname($namedesc);
         if($checkname == true){
             return "falsename";


         }else{
        $field = array(
        
        'h_date'=>$this->input->post('txtdate'),
        'description'=>$this->input->post('txteditname'),
        'h_type'=>$this->input->post('edittype'),

        );
        $this->db->where('h_ID', $id);
        $this->db->update('holiday', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

    function deleteholiday(){
         $id = $this->input->post('txtdelID');
         
        $field = array(
        'flag'=> '1'

        );
        $this->db->where('h_ID', $id);
        $this->db->update('holiday', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    

    }
