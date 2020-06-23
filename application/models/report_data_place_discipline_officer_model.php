<?php

class report_data_place_discipline_officer_model extends CI_Model {
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
   $this->db->join('place  p','oh.place_ID=p.place_ID'); 
   $this->db->where('MONTH(oh.committed_date)',$mcurrent); 
   $this->db->where('YEAR(oh.committed_date)',$ycurrent);
   $this->db->order_by('p.place_ID');
   $this->db->order_by('std.S_ID');
  

   $query = $this->db->get();
   $data = array();
   $data = $query->result_array();
   $chk_offID = 0;
   $count = 1;
   $seq_no = 0;
   foreach ($data as $key=>$value){
      
      if ($value['place_ID'] != $chk_offID){
         $count = 1;
         $chk_offID = $value['place_ID'];

         
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
      
        
     function getOffenseCate(){
        $this->db->select('*');      
        $this->db->from('OffenseCate');
        $this->db->order_by('oc_ID', 'ASC');
        $query = $this->db->get();
        return $query->result();
     }

//      public function getOC_ID(){
//   //  ค่ามาหมดเเล้วเหลือแต่ส่งoc_IDมาจากหน้าviewรับในตัวแปลที่ชื่อoc_ID
//       $oc_ID = $this->input->get('oc_ID'); 
//       // $oc_ID=8;
//       // นี้คือฟังชั่นที่เราทำใช่ไหมเราเปิดฟิกค่ามาก่อนก็คืออันบนที่เราปิดคอมเม้นไว้


//       $this->db->select('*');   
//       $this->db->from('offensestd ostd ');
//       $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
//       $this->db->join('offense o','oh.off_ID=o.off_ID'); 
//       $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID');
//       $this->db->join('student std','ostd.S_ID=std.S_ID');
//       $this->db->join('curriculum c','std.cur_ID=c.cur_ID');
//       $this->db->join('divisions d','c.dept_ID=d.dept_ID'); 
//       $this->db->join('dormitory dm','std.dorm_ID=dm.dorm_ID'); 
//       $this->db->where('oc.oc_ID',$oc_ID);
//       $this->db->order_by('oh.off_ID');
//       $this->db->order_by('std.S_ID');

//       $query = $this->db->get();
//       $data = array();
//       $data = $query->result_array();
//       $chk_offID = 0;
//       $count = 1;
//       $seq_no = 0;
//       foreach ($data as $key=>$value){
         
//          if ($value['off_ID'] != $chk_offID){
//             $count = 1;
//             $chk_offID = $value['off_ID'];

            
//          }
//          $data[$key]["seq_no"] = $count;
//          $count++;
//          //var_dump($key);
//          //var_dump($value);
   
//          //echo "======";
//       }
   
//      if($data !=NULL){
//         return $data;
//      }else{
//       return false;
//     }
    
//   }

  public function showdata(){
   // $oc_ID = $this->input->get('oc_ID'); 
    $this->db->select('*');   
    $this->db->from('student std ');
    $this->db->join('offensestd ostd ','std.S_ID = ostd.S_ID');
    $this->db->join('offensehead oh','ostd.oh_ID=oh.oh_ID');
    $this->db->join('offense o','oh.off_ID=o.off_ID'); 
    $this->db->join('offensecate oc','o.oc_ID=oc.oc_ID');
    $this->db->join('curriculum c','std.cur_ID=c.cur_ID');
    $this->db->join('divisions d','c.dept_ID=d.dept_ID'); 
    $this->db->join('dormitory dm','std.dorm_ID=dm.dorm_ID'); 
    //$this->db->where('oc.oc_ID',$oc_ID);
    $this->db->group_by('o.off_ID','ASC' );
    $query = $this->db->get();
    $data = array();
    $data = $query->result_array();
   if($data !=NULL){
      return $data;
   }else{
    return false;
  }
  }
  
   
    }


    
       
    
