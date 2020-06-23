<?php 

class report1_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    public function showAll($cur_ID, $off_ID, $month, $year)
    {
        $this->db->select('*');      
        $this->db->distinct('*');
        $this->db->from('OffenseCate ofc');
        $this->db->join('Offense off', 'ofc.oc_ID = off.oc_ID', 'left');
        $this->db->join('OffenseHead ofg', 'off.off_ID = ofg.off_ID', 'left');
        $this->db->join('OffenseStd ofs', 'ofg.oh_ID = ofs.oh_ID', 'left');
        $this->db->join('Student stu', 'ofs.S_ID = stu.S_ID', 'left');
        $this->db->join('Curriculum ccl', 'stu.cur_ID = ccl.cur_ID', 'left');
        $this->db->join('Dormitory dom', 'stu.dorm_ID=dom.dorm_ID', 'left');
        $this->db->join('Offcategory ocg', 'ofs.S_ID=ocg.S_ID', 'left');
        $this->db->where('stu.cur_ID', $cur_ID);
        $this->db->where('ofg.off_ID', $off_ID);
        $this->db->where('MONTH(ofg.committed_date)', $month);
        $this->db->where('YEAR(ofg.committed_date)', $year);
        $query = $this->db->get();
        return $query->result();

        

    }

    function getCurriculum(){
        $this->db->select('*');      
        $this->db->from('curriculum');
        $this->db->order_by('cur_ID', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

     function getOffense(){
        $this->db->select('*');      
        $this->db->from('offense');
        $this->db->order_by('off_ID', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }
   
    //ฟังก์ชันตรวจสอบ id ซ้ำกัน ตารางplace
    public function checkkey(){
        $cur_ID = $this->input->post('cur_ID');
        $this->db->where('cur_ID', $cur_ID);
        $query = $this->db->get('curriculum');
        if($query->num_rows($query) == 0){
            return  true;
        }
        else{
            return false;
        }
        
    }
   
}