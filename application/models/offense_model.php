<?php
class offense_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
 public function showAll(){
    $flag=1;
        // $this->db->join('offensecate d', 'c.oc_ID=d.oc_ID');
        $this->db->select('*');
        $this->db->from('offensecate c');
       $this->db->join('offense d', 'c.oc_ID=d.oc_ID');
       //$this->db->order_by('off_ID', 'ASC');
        $this->db->where('flagg', $flag);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    public function checkkey(){
        $off_ID = $this->input->post('off_ID');
        $this->db->where('off_ID', $off_ID);
        $query = $this->db->get('offense');
        if($query->num_rows($query) == 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function checknameoffense($nameoffense){
        $this->db->where('off_desc',$nameoffense);
        $query = $this->db->get('offense');
        
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }
    
    public function addoffense(){
        $off_desc = $this->input->post('txtname');
        $off_desc = trim($off_desc);
        $checkname = $this->checknameoffense($off_desc);
        if($checkname == true){
            return "falsename";
            
            
        }else{
        $field = array(
            'off_ID'=>$this->input->post('txtID'),
            'off_desc'=>$off_desc,
            'point'=>$this->input->post('txtpoint'),
            'oc_ID'=>$this->input->post('txt_oc'),
            'flagg'=>'1',
            
           
            
            );
        $this->db->insert('offense', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
 
public function editoffense(){
    $id = $this->input->get('id');
    $this->db->where('off_ID', $id);
    $query = $this->db->get('offense');
    if($query->num_rows() > 0){
        return $query->row();
    }else{
        return false;
    }
}

public function updateoffense(){
    $txteditID = $this->input->post('txteditID');

    $editoffensename = $this->input->post('txteditname');
    $editoffensename = trim($editoffensename);
     $checkname = $this->checknameoffense($editoffensename);
     if($checkname == true){
         return "falsename";
        }else{

    $field = array(
    'off_desc'=>$editoffensename,
    'point'=>$this->input->post('txteditpoint'),
    'oc_ID'=>$this->input->post('txteditoc'),


    );
    $this->db->where('off_ID', $txteditID);
    $this->db->update('offense', $field);
    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
}

    function deleteoffense(){
         $id = $this->input->post('txtdelID');
        
        $field = array(
        'flagg'=> '0'
        );
         
        $this->db->where('off_ID', $id);
        $this->db->update('offense', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    function selectoffensecate()
    {
        $this->db->order_by('oc_ID','ASC');
        $query = $this->db->get('offensecate');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function import_exceloffense(){
        $this->load->view('import_exceloffense');
        
        
        
        
    }   
}