<?php
class Csv_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('tbl_user');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function selectstatus()
	{
	    $this->db->order_by('status_ID', 'ASC');
	    $query = $this->db->get('tbl_status');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	function checkstatus($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT * FROM status WHERE status_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    //print_r ($row);
	    /*
	     if (isset($row)) {
	     echo $row->id;
	     echo $row->first_name;
	     echo $row->last_name;
	     }
	     */
	}
	





	function selectpersonnel()
	{
	    $this->db->order_by('person_ID', 'ASC');
	    $query = $this->db->get('tbl_personnel');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	
	function checkpersonnel($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT * FROM status WHERE person_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    //print_r ($row);
	    /*
	     if (isset($row)) {
	     echo $row->id;
	     echo $row->first_name;
	     echo $row->last_name;
	     }
	     */
	}
	function checkcurriculum($id)
	{
	    // select ของตารางจริงในตาราง users
	    $query = $this->db->query("SELECT * FROM curriculum WHERE cur_ID = $id");
	    $row = $query->row();
	    
	    if ($row != NULL){
	        return TRUE;
	    }
	    else {
	        return FALSE;
	    }
	    //print_r ($row);
	    /*
	     if (isset($row)) {
	     echo $row->id;
	     echo $row->first_name;
	     echo $row->last_name;
	     }
	     */
	}
	
	
	
	
	
	function selectcurriculum()
	{
	    $this->db->order_by('cur_ID','ASC');
	    $query = $this->db->get('tbl_curriculum');
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}

	function select_1($id)
	{
		// select ของตารางจริงในตาราง users
		$query = $this->db->query("SELECT * FROM users WHERE id = $id");
		$row = $query->row();

		if ($row != NULL){
			return TRUE;
		}
		else {
			return FALSE;
		}
		//print_r ($row);
		/*
		if (isset($row)) {
			echo $row->id;
			echo $row->first_name;
			echo $row->last_name;
		}
		*/
	}


	function insert($data)
	{
		//cr table temp 
		$this->db->insert_batch('tbl_user', $data);
	}
	
	function insertstatus($data)
	{
	    //cr table temp
	    $this->db->insert_batch('tbl_status', $data);
	}
	
	function insertcurriculum($data)
	{
	    //cr table temp
	    $this->db->insert_batch('tbl_curriculum', $data);
	}
	function insertpersonnel($data)
	{
	    //cr table temp
	    $this->db->insert_batch('tbl_personnel', $data);
	}
	
	
	
	
	
	

	function insert_to_users($data)
	{
		$this->db->empty_table('tbl_user');
		$this->db->query("TRUNCATE TABLE tbl_user");
		$this->db->insert_batch('users', $data);
	}

	function update_data($id, $data)
	{
		//อัพเดตเมื่อมี id ซ้ำกัน
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	
	
	
	
	
	
	
	
	
	function insert_to_status($data)
	{
	    $this->db->empty_table('tbl_status');
	    $this->db->query("TRUNCATE TABLE tbl_status");
	    $this->db->insert_batch('status', $data);
	}
	
	function update_datastatus($id, $data)
	{
	    //อัพเดตเมื่อมี id ซ้ำกัน
	    $this->db->where('status_ID', $id);
	    $this->db->update('status', $data);
	    if ($this->db->affected_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	
	
	
	
	
	
	function insert_to_curriculum($data)
	{
	    $this->db->empty_table('tbl_curriculum');
	    $this->db->query("TRUNCATE TABLE tbl_curriculum");
	    $this->db->insert_batch('curriculum',$data);
	}
	
	function update_datacurriculum($id, $data)
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
	



	
	function insert_to_personnel($data)
	{
	    $this->db->empty_table('tbl_personnel');
	    $this->db->query("TRUNCATE TABLE tbl_personnel");
	    $this->db->insert_batch('personnel',$data);
	}
	
	function update_datapersonnel($id, $data)
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
	
	
	
	
	
	
	
	
	
	
	
	
}
