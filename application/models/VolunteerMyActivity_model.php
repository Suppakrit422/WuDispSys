<?php

class VolunteerMyActivity_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    function deletemyactivity(){
        $par_ID = $this->input->get('par_ID');
        // $par_ID = 4;

        $this->db->select('*');
        $this->db->from('Service sv');
        $this->db->join('participationactivities p', 'sv.service_ID=p.service_ID');
        $this->db->where('par_ID', $par_ID);
        $query = $this->db->get();
        $data = $query->result();
        // var_dump($data);
        // //die();
        foreach ($query->result() as $row) {
                $sum = $row->number_of-1;
                $service =$row->service_ID;
                $query = $this->db->query('UPDATE service 
                                            SET number_of = '.$sum.' WHERE service_ID = '.$service.'');
        
            if($this->db->affected_rows() > 0){

                $this->db->where('par_ID', $par_ID);
                $this->db->delete('participationactivities');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
        
}
}
}