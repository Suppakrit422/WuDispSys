<?php 

class usertype_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
 public function showAll(){
     $flag=0;
        $this->db->order_by('usertype_ID', 'desc');
        $this->db->where('flag',$flag);
        $query = $this->db->get('usertype');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
        
    }
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางplace
    public function checkkey(){
        $usertype_ID = $this->input->post('usertype_ID');
        $this->db->where('usertype_ID', $usertype_ID);
        $query = $this->db->get('usertype');
        if($query->num_rows($query) == 0){
            return  true;
        }
        else{
            return false;
        }
        
    }
        
    public function checknameplace($nameplace){
        $this->db->where('usertype_name',$nameplace);
        $query = $this->db->get('usertype');
        
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    

    public function addusertype(){

        $placename = $this->input->post('username');
        $placename = trim($placename);
         $checkname = $this->checknameplace($placename);
         if($checkname == true){
             return "falsename";


         }else{
        $field = array(
            // 'usertype_ID'=>$this->input->post('userID'),
            'usertype_name'=>$placename,
            'flag'=>'0'
            );
        $this->db->insert('usertype', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

     function editusertype(){
        $id = $this->input->get('id');
        $this->db->where('usertype_ID', $id);
        $query = $this->db->get('usertype');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false; 
        }
    }

     function updateusertype(){
        $id = $this->input->post('typeeditID');
        $field = array(

        'usertype_name	'=>$this->input->post('typeeditname')
    

        );
        $this->db->where('usertype_ID', $id);
        $this->db->update('usertype', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    function deleteusertype(){
            $id = $this->input->post('usertypedelID');
            
             $field = array(
             'flag'=> '1'
             
             );
            $this->db->where('usertype_ID', $id);
            $this->db->update('usertype',$field);
            //$this->db->update('offensecate', $field);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
         function import_excelusertype(){
            $this->load->view('import_excelusertype');
                 
            
        }
        
    
}