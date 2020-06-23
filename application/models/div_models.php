<?php 

class div_models extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
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

public function chartdiv(){
    /*
    $query = $this->db->query('SELECT c.oc_ID, c.oc_desc as label ,COUNT(*)  as y  
FROM offensecate c LEFT JOIN offense o on c.oc_ID = o.oc_ID LEFT JOIN offensehead h on o.off_ID = h.off_ID 
WHERE 1 GROUP BY c.oc_ID');
*/
    $query = $this->db->query('SELECT d.dept_ID ,d.dept_name as label,count(otd.S_ID) as y 
    FROM offensestd otd  LEFT JOIN  student s on otd.S_ID=s.S_ID LEFT JOIN curriculum c  on s.cur_ID=c.cur_ID LEFT JOIN divisions d on c.dept_ID=d.dept_ID
    GROUP by d.dept_name');
   
    if($query !=NULL)
    {
        return $query->result();
    }else
    {
        return false;
    }
    
}
}



   