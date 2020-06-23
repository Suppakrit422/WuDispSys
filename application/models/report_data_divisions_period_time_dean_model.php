<?php

class report_data_divisions_period_time_dean_model extends CI_Model
{
    public function _construct()
    {
        parent::__construct();
    }


    

    public function btweendate()
    {
        // สองตัวนี้ไว้รับค่าจากview
        // $dept_ID = $this->input->get('deptid');
        $firstday = $this->input->get('firstday');
        $lastday = $this->input->get('lastday');

        //  เปิดค่าตัวนี้ถ้าจะเช็คผ่านUrl 
        // $off_ID = "1";
        // $firstday = "2018-12-13";
        // $lastday = "2020-12-13";


        $this->db->select('*');
        $this->db->from('offensehead oh');
        $this->db->join('offensestd ostd', 'oh.oh_ID=ostd.oh_ID');
        $this->db->join('offense o', 'oh.off_ID=o.off_ID');
        $this->db->join('offensecate oc', 'o.oc_ID=oc.oc_ID');
        $this->db->join('student s', 'ostd.S_ID=s.S_ID');
        $this->db->join('curriculum c', 's.cur_ID=c.cur_ID');
        $this->db->join('divisions dv', 'c.dept_ID=dv.dept_ID');
        $this->db->join('dormitory d', 's.dorm_ID=d.dorm_ID');
        $this->db->where('dv.dept_ID', 22);
        $this->db->where('oh.committed_date >=', $firstday);
        $this->db->where('oh.committed_date <=', $lastday);
        $this->db->order_by('oh.committed_date ');

        
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
