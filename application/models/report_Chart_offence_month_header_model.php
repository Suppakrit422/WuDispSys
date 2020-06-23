<?php 

class report_Chart_offence_month_header_model extends CI_Model {
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

        
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }else
        {
            return false;
            }

}





public function chart(){
    $sel_month = $_GET['sel_month'];
    $sel_year= $_GET['sel_year']; 

    $query = $this->db->query('
    SELECT
        o.off_ID,
        o.off_desc AS label,
        COUNT(otd.S_ID) AS y
    FROM
        offensehead ofh
    JOIN offensestd otd ON
        ofh.oh_ID = otd.oh_ID
    LEFT JOIN student s ON
        otd.S_ID = s.S_ID
    LEFT JOIN offense o ON
        ofh.off_ID = o.off_ID
    WHERE
        year(committed_date) = '.($sel_year-543).' and month(committed_date) = '.$sel_month.'
    GROUP BY
        o.off_ID
    ');

   
    
    if($query !=NULL)
    {
        return $query->result();
    }else
    {
        return false;
    }
    
}
}
 



   
