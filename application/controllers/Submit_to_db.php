<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submit_to_db extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('csv_import_model');
		$this->load->library('csvimport');
	}

	public function index()
	{
		//List ข้อมูลมาแสดงในหน้าจอ
		$this->load->view('basicdata/submit_data');
	}

	/*ฟังก์ชันแสดงข้อมูล*/
	function showAll()
	{
		$result = $this->csv_import_model->select();
		//print_r ($result);
		echo json_encode($result);
		//echo ("xxx");
	}

	/*ฟังก์ชันนำเข้าไฟล์ csv ลงฐานข้อมูล*/
	function import()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach ($file_data as $row) {
			$data[] = array(
				'first_name'	=>	$row["First Name"],
				'last_name'		=>	$row["Last Name"],
				'phone'			=>	$row["Phone"],
				'email'			=>	$row["Email"]
			);
		}
		$this->csv_import_model->insert($data);
		redirect("Submit_to_db/index");
	}
	function importstatus()
	{
	    $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	    foreach ($file_data as $row) {
	        $data[] = array(
	            'status_ID'	=>	$row["status_ID"],
	            'status_name'		=>	$row["status_name"]
	        );
	    }
	    $this->csv_import_model->insertstatus($data);
	    redirect("Submit_to_db/submit_status");
	}
	
	
	
	
	public function submit_status()
	{
	    //List ข้อมูลมาแสดงในหน้าจอ
	    $this->load->view('basicdata/submit_status');
	}
	function showAllstatus()
	{
	    $result = $this->csv_import_model->selectstatus();
	    //print_r ($result);
	    echo json_encode($result);
	    //echo ("xxx");
	}
	
	
	
	function importcurriculum()
	{
	    $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	    foreach ($file_data as $row) {
	        $data[] = array(
	            'cur_ID'	=>	$row["cur_ID"],
	            'cur_name'		=>	$row["cur_name"],
	            'active_track	'		=>	'0',
	            'dept_ID'		=>	$row["dept_ID"]
	            
	        );
	    }
	    $this->csv_import_model->insertcurriculum($data);
	    redirect("Submit_to_db/submit_curriculum");
	}
	
	public function submit_curriculum()
	{
	    //List ข้อมูลมาแสดงในหน้าจอ
	    $this->load->view('basicdata/submit_curriculum');
	}
	function showAllcurriculum()
	{
	    $result = $this->csv_import_model->selectcurriculum();
	    //print_r ($result);
	    echo json_encode($result);
	    //echo ("xxx");
	}
	
	

	function import_temp_to_db()
	{

		echo "Function import_temp_to_db</br>";

		$result = $this->csv_import_model->select(); //ตาราง temp 

		foreach ($result as $results) { //loop ตาราง temp
			//select by id 
			$temp_a = $this->csv_import_model->select_1($results->id);
			//echo $temp_a;

			if ($temp_a == 1) {
				//อัพเดตข้อมูล
				$data = array(
					//'id' => $results->id,
					'first_name' => $results->first_name,
					'last_name' => $results->last_name,
					'phone' => $results->phone,
					'email' => $results->email
				);
				$this->csv_import_model->update_data($results->id, $data);
			} else {
				//เพิ่มข้อมูล
				$data_a[] = array(
					'id' => 'NULL',
					'first_name' => $results->first_name,
					'last_name' => $results->last_name,
					'phone' => $results->phone,
					'email' => $results->email
				);
				$this->csv_import_model->insert_to_users($data_a);
			}
		}
		redirect("Csv_import");
	}

	function test()
	{

		echo "Function test</br>";

		$result = $this->csv_import_model->select_1();
		//$this->csv_import_model->insert_to_users($result);
		//print_r($result);
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function import_temp_to_dbstatus()
	{
	    
	    echo "Function import_temp_to_db</br>";
	    
	    $result = $this->csv_import_model->selectstatus(); //ตาราง temp
	    
	    foreach ($result as $results) { //loop ตาราง temp
	        //select by id
	        $temp_a = $this->csv_import_model->checkstatus($results->status_ID);
	        //echo $temp_a;
	        
	        if ($temp_a == 1) {
	            //อัพเดตข้อมูล
	            $data = array(
	                //'id' => $results->id,
	                'status_name'		=>	$results->status_name
	            );
	            $this->csv_import_model->update_datastatus($results->status_ID,$data);
	        } else {
	            //เพิ่มข้อมูล
	            $data_a[] = array(
	                'status_ID'	=>	$results->status_ID,
	                'status_name'		=>	$results->status_name
	            );
	            $this->csv_import_model->insert_to_status($data_a);
	        }
	    }
	    redirect("Csv_import");
	}
	

	
	
	
	
	
	
	
	
	
	function import_temp_to_dbcurriculum()
	{
	    
	    echo "Function import_temp_to_db</br>";
	    
	    $result = $this->csv_import_model->selectcurriculum(); //ตาราง temp
	    
	    foreach ($result as $results) { //loop ตาราง temp
	        //select by id
	        $temp_a = $this->csv_import_model->checkcurriculum($results->cur_ID);
	        //echo $temp_a;
	        
	        if ($temp_a == 1) {
	            //อัพเดตข้อมูล
	            $data = array(
	                //'id' => $results->id,
	                'cur_ID'		=>	$results->cur_ID,
	                'cur_name'		=>	$results->cur_name,
	                'active_track'		=>	$results->active_track,
	                'dept_ID'		=>	$results->dept_ID 
	            );
	            $this->csv_import_model->update_datacurriculum($results->cur_ID,$data);
	        } else {
	            //เพิ่มข้อมูล
	            $data_a[] = array(
	                'cur_ID'	=>	$results->cur_ID,
	                'cur_name'		=>	$results->cur_name,
	                'active_track'		=>	$results->active_track,
	                'dept_ID'		=>	$results->dept_ID
	               
	            );
	            $this->csv_import_model->insert_to_curriculum($data_a);
	        }
	    }
	    redirect("Csv_import");
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	public function new()
	{
		//แสดงหน้าจอ form สำหรับบันทึกข้อมูลใหม่
	}

	public function addnew()
	{
		//รับข้อมูลจาก form  insert ลง DB
	}

	public function edit()
	{
		//แสดงหน้าจอ form สำแก้ไขข้อมูลใหม่
	}

	public function update()
	{
		//รับข้อมูลจาก form  update ลง DB
	}
}
