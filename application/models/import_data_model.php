<?php
class import_data_model extends CI_Model
{
    // select from place
	function selectplace()
	{
		$this->db->order_by('place_ID','ASC');
		$query = $this->db->get('place');
		return $query->result();
	}
	function selecttmpplace()
	{
	    $this->db->order_by('place_ID','ASC');
	    $query = $this->db->get('tmp_place');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	function inserttmp_place($data)
	{
	    $this->db->insert('tmp_place',$data);
	}
	
    //insert place
	function insertplace($data)
	{
	    
		$this->db->insert('place',$data);
	}
	
	
	
	
	
	function checkplace($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM place WHERE place_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }

	}
	
	function empty_tmp_place()
	{
	    $this->db->empty_table('tmp_place');
	    $this->db->query("TRUNCATE TABLE tmp_place");
	   //$this->db->insert_batch('place',$data);
	}
	
	function insert_to_place($data)
	{
	   
	    $this->db->insert('place',$data);
	}
	
	function update_dataplace($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('place_ID',$id);
	    $this->db->update('place',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function empty_tmp_divisions()
	{
	    $this->db->empty_table('tmp_divisions');
	    $this->db->query("TRUNCATE TABLE tmp_divisions");
	    //$this->db->insert_batch('place',$data);
	}
	
	function inserttmp_divisions($data)
	{
	    $this->db->insert('tmp_divisions',$data);
	}
	
	function selecttmpdivisions()
	{
	    $this->db->order_by('dept_ID','ASC');
	    $query = $this->db->get('tmp_divisions');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	

	
	function checkdivisions($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM divisions WHERE dept_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    
	}
	
	function insert_to_divisions($data)
	{
	    
	    $this->db->insert('divisions',$data);
	}
	
	function update_datadivisions($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('dept_ID',$id);
	    $this->db->update('divisions',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	function checkalldatatmpdivisions()
	{
	    $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_divisions");
	    // $this->db->order_by('cur_ID','ASC');
	    //$query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	







	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function empty_tmp_curriculum()
	{
	    $this->db->empty_table('tmp_curriculum');
	    $this->db->query("TRUNCATE TABLE tmp_curriculum");
	    //$this->db->insert_batch('place',$data);
	}
	
	function inserttmp_curriculum($data)
	{
	    $this->db->insert('tmp_curriculum',$data);
	}
	
	function selecttmpcurriculum()
	{
	    $this->db->order_by('cur_ID','ASC');
	    $query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	
	
	function checkcurriculum($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM curriculum WHERE cur_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    
	}
	
	function insert_to_curriculum($data)
	{
	    
	    $this->db->insert('curriculum',$data);
	}
	
	function update_datacurriculum($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('cur_ID',$id);
	    $this->db->update('curriculum',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	function checkalldatatmpcur()
	{
	 $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_curriculum");
	   // $this->db->order_by('cur_ID','ASC');
	    //$query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	
	
	
	
	
	
	
	
	
	
	

	function empty_tmp_status() 
	{
	    $this->db->empty_table('tmp_status');
	    $this->db->query("TRUNCATE TABLE tmp_status");
	    //$this->db->insert_batch('place',$data);
	}
	
	function inserttmp_status($data)
	{
	    $this->db->insert('tmp_status',$data);
	}
	
	function selecttmpstatus()
	{
	    $this->db->order_by('status_ID','ASC');
	    $query = $this->db->get('tmp_status');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	
	
	function checkstatus($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM status WHERE status_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    
	}
	
	function insert_to_status($data)
	{
	    
	    $this->db->insert('status',$data);
	}
	
	function update_datastatus($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('status_ID',$id);
	    $this->db->update('status',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	function checkalldatatmpstatus()
	{
	    $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_status");
	    // $this->db->order_by('cur_ID','ASC');
	    //$query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}



	
	
	
	
	
	
	


	function empty_tmp_personnel()
	{
	    $this->db->empty_table('tmp_personnel');
	    $this->db->query("TRUNCATE TABLE tmp_personnel");
	    //$this->db->insert_batch('place',$data);
	}
	
	function inserttmp_personnel($data)
	{
	    $this->db->insert('tmp_personnel',$data);
	}
	
	function selecttmppersonnel()
	{
	    $this->db->order_by('person_ID','ASC');
	    $query = $this->db->get('tmp_personnel');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	

	
	function checkpersonnel($id)
	{
	   // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM personnel WHERE person_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE; 
	    }
	    
	}
	
	function insert_to_personnel($data)
	{
	    
	    $this->db->insert('personnel',$data);
	}
	
	function update_datapersonnel($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('person_ID',$id);
	    $this->db->update('personnel',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function checkalldatatmppersonnel()
	{
	    $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_personnel");
	    // $this->db->order_by('cur_ID','ASC');
	    //$query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	
	
	
	
	
	
	
	
	function empty_tmp_vehicles()
	{
	    $this->db->empty_table('tmp_vehicles');
	    $this->db->query("TRUNCATE TABLE tmp_vehicles");
	    //$this->db->insert_batch('place',$data);
	}
	
	function inserttmp_vehicles($data)
	{
	    $this->db->insert('tmp_vehicles',$data);
	}
	
	function selecttmpvehicles()
	{
	    $this->db->order_by('v_ID','ASC');
	    $query = $this->db->get('tmp_vehicles');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	
	
	function checkvehicles($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT *FROM vehicles WHERE S_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    
	}
	
	function insert_to_vehicles($data)
	{
	    
	    $this->db->insert('vehicles',$data);
	}
	
	function update_datavehicles($id,$data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('S_ID',$id);
	    $this->db->update('vehicles',$data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	
	function checkalldatatmpvehicles()
	{
	    $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_vehicles");
	    // $this->db->order_by('cur_ID','ASC');
	    //$query = $this->db->get('tmp_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
















	function empty_tmp_student()
    {
        $this->db->empty_table('tmp_student');
        $this->db->query("TRUNCATE TABLE tmp_student");
        //$this->db->insert_batch('place',$data);
    }
    
    function inserttmp_student($data)
    {
        $this->db->insert('tmp_student',$data);
    }
    
    function selecttmpstudent()
    {
        $this->db->order_by('S_ID','ASC');
        $query = $this->db->get('tmp_student');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    
    
    function checkstudent($id)
    {
        // select ของตารางจริงในตาราง users
        $query = $this->db->query("SELECT *FROM student WHERE S_ID = $id");
        $row = $query->row();
        
        if ($row != NULL){
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }  
    
    function insert_to_student($data)
    {
        
        $this->db->insert('student',$data);
    }
    
    function update_datastudent($id,$data)
    {
        //อัพเดตเมื่อมี id ซ้ำกัน
        $this->db->where('S_ID',$id);
        $this->db->update('student',$data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function checkalldatatmpstudent()
    {
        $query = $this->db->query("SELECT COUNT(*) as amm FROM tmp_student");
        // $this->db->order_by('cur_ID','ASC');
        //$query = $this->db->get('tmp_curriculum');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function checkimport($BUILDID)
	{
	    $BUILDID = $this->input->get($BUILDID);
	    $this->db->where('place_ID', $BUILDID);
	    $query = $this->db->get('place');
	    if($query->num_rows() == 0){
	        return true;
	    }else{
	        return false;
	    }
	    
	}
	
	public function updateplace($data)
	{
	    $BUILDID = $data->$BUILDID;
	    $BUILDTHNAME=$data->$BUILDTHNAME;
	    $this->db->where('place_ID', $BUILDID);
	    $this->db->update('place', $BUILDTHNAME);
	    if($this->db->affected_rows() > 0){
	        return true;
	    }else{
	        return false;
	    }
	    
	}
	
	
	
	
	
	
	
	
	
	
	function insertdormtype($data)
	{
	    
	    $this->db->insert('dormtype',$data);
	}
	
	function insertusertype($data)
	{
	    
	    $this->db->insert('usertype',$data);
	}
	
	function insertoffense($data)
	{
	    
	    $this->db->insert('offense',$data);
	}
	function insertoffensecate($data)
	{
	    
	    $this->db->insert('offensecate',$data);
	}
	function insertholiday($data)
	{
	    
	    $this->db->insert('holiday',$data);
	}
	
	
	
	function clearvalue()
	{
	    $this->db->truncate('tmp_place');
	  
	}
	
	
	
}
