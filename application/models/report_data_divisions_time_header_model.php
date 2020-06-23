
<?php

class report_data_divisions_time_header_model extends CI_Model
{
    public function _construct()
    {
        parent::__construct();
    }


    // public function showAll()
    // {
    //     $this->db->select('*');
    //     // $this->db->select('os.S_ID, s.std_fname,s.std_lname,s.behavior_score,s.cur_ID,s.dorm_ID');
    //     $this->db->from('offensestd os');
    //     $this->db->join('student s ', ' os.S_ID = s.S_ID');
    //     $this->db->join('curriculum c ', ' s.cur_ID = c.cur_ID');
    //     $this->db->join('dormitory d ', ' s.dorm_ID = d.dorm_ID');
    //     $this->db->join('offensehead oh ', ' os.oh_ID = oh.oh_ID');
    //     $this->db->join('offense o ', '  oh.off_ID = o.off_ID ');
    //     $this->db->join('offensecate oc', ' o.oc_ID = oc.oc_ID');

    //     $this->db->where('oh.off_ID', 1);
    //     $query = $this->db->get();

    //     //var_dump($query->result());
    //     //die();
    //     return $query->result();
    // }
    function getDivisions()
    {
        $this->db->select('*');
        $this->db->from('Divisions');
        $this->db->order_by('dept_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function btweendate()
    {
        // สองตัวนี้ไว้รับค่าจากview
        $dept_ID = $this->input->get('deptid');
        $firstday = $this->input->get('firstday');
        $lastday = $this->input->get('lastday');

        //  เปิดค่าตัวนี้ถ้าจะเช็คผ่านUrl 
        // $off_ID = "1";
        // $firstday = "2018-12-13";
        // $lastday = "2020-12-13";


        $this->db->select('oh.committed_date,ostd.S_ID,s.std_fname,s.std_lname,s.behavior_score,c.cur_name,d.dname,o.off_desc');
        $this->db->from('offensehead oh');
        $this->db->join('offensestd ostd', 'oh.oh_ID=ostd.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('offensecate oc', 'o.oc_ID=oc.oc_ID');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions dv', 'c.dept_ID=dv.dept_ID');
        $this->db->join('dormitory d', 's.dorm_ID=d.dorm_ID');
        $this->db->where('dv.dept_ID', $dept_ID);
        $this->db->where('oh.committed_date >=', $firstday);
        $this->db->where('oh.committed_date <=', $lastday);

        
   $query = $this->db->get();
   $data = array();
   $data = $query->result_array();
   $chk_cmd = 0;
   $count = 1;
   $seq_no = 0;
   foreach ($data as $key=>$value){
      
      if ($value['committed_date'] != $chk_cmd){
         $count = 1;
         $chk_cmd = $value['committed_date'];

         
      }
      $data[$key]["seq_no"] = $count;
      $count++;
      //var_dump($key);
      //var_dump($value);

      //echo "======";
   }

  if($data !=NULL){
     return $data;
  }else{
   return false;
 }
 
}
      
}
