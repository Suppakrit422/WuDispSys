<?php 

class report_Chart_dormitory_year_header_model extends CI_Model {
    public function _construct()
    {
        parent::__construct();
        
    }
    public function showAll(){

        $this->db->select('c.oc_ID','c.oc_desc') ;
         $this->db->from ('offensecate c', 'left') ;
         $this->db->join ('offense o ',' c.oc_ID = o.oc_ID', 'left');
         $this->db->join (' offensehead h',' o.off_ID = h.off_ID' , 'left');
          $this->db->where ('c.oc_ID',1);
           //var_dump($query->result());
   
           /*
           if($query->num_rows() != 0)
           {
               return $query->result_array();
           }else
           {
               return false;
               }*/
   
   }
   public function chart(){
       
       $query = $this->db->query('SELECT c.oc_ID, c.oc_desc as label ,COUNT(*)  as y  
   FROM offensecate c LEFT JOIN offense o on c.oc_ID = o.oc_ID LEFT JOIN offensehead h on o.off_ID = h.off_ID 
   WHERE 1 GROUP BY c.oc_ID');
      
       if($query !=NULL)
       {
           return $query->result();
       }else
       {
           return false;
       }
       
   }
   
   public function chartdorm(){
       /*
       $query = $this->db->query('SELECT c.oc_ID, c.oc_desc as label ,COUNT(*)  as y  
   FROM offensecate c LEFT JOIN offense o on c.oc_ID = o.oc_ID LEFT JOIN offensehead h on o.off_ID = h.off_ID 
   WHERE 1 GROUP BY c.oc_ID');
   */
       /*$query = $this->db->query('SELECT d.dorm_ID ,d.dname as label,count(otd.S_ID) as y 
       FROM offensestd otd  LEFT JOIN  student s on otd.S_ID=s.S_ID LEFT JOIN dormitory d on s.dorm_ID=d.dorm_ID 
       GROUP by d.dorm_ID');
      
       if($query !=NULL)
       {
           return $query->result();
       }else
       {
           return false;
       }*/

      
       $sel_year= $_GET['sel_year']; 
       $sql = 'SELECT d.dorm_ID ,d.dname as label,
                    count(otd.S_ID) as y 
                FROM 
                    offensehead ofh
                    LEFT JOIN offensestd otd ON ofh.oh_ID = otd.oh_ID
                    LEFT JOIN  student s on otd.S_ID=s.S_ID 
                    LEFT JOIN dormitory d on s.dorm_ID=d.dorm_ID 
               WHERE
                   YEAR(committed_date) = '.($sel_year-543).' 
               GROUP BY
                   d.dorm_ID';

       //echo $sql;
       //die();
       $query = $this->db->query($sql);

       if($query !=NULL)
       {
           return $query->result();
       }else
       {
           return false;
       }
   }   
}