
<?php

class report_data_teacher_model extends CI_Model {
    public function _construct()
    {
        parent:: __construct();
          
        
    }
    

 public function showAll(){
    $mcurrent = $this->input->get('date_current'); 
    $ycurrent = $this->input->get('year_current'); 
   $this->db->select('*');   
   $this->db->from('offensestd ostd ');
   $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
   $this->db->join('offense o','oh.off_ID=o.off_ID'); 
   $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID');
   $this->db->join('student std','ostd.S_ID=std.S_ID');
   $this->db->join('curriculum c','std.cur_ID=c.cur_ID');
   $this->db->join('divisions d','c.dept_ID=d.dept_ID'); 
   $this->db->join('dormitory dm','std.dorm_ID=dm.dorm_ID'); 
   $this->db->join('personnel p','std.person_ID=p.person_ID'); 
   $this->db->where('p.person_ID',6010201001);
   $this->db->where('MONTH(oh.committed_date)',$mcurrent); 
   $this->db->where('YEAR(oh.committed_date)',$ycurrent);
   $this->db->order_by('o.off_ID');
   $this->db->order_by('std.S_ID');
   

   $query = $this->db->get();
   $data = array();
   $data = $query->result_array();
   $chk_ocID = 0;
   $count = 1;
   $seq_no = 0;
   foreach ($data as $key=>$value){
      
      if ($value['off_ID'] != $chk_ocID){
         $count = 1;
         $chk_ocID = $value['off_ID'];

         
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


    
       
    
