<?php
require_once('Security_guard_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class VolunteerAc_security extends Security_guard_dashboard
{
    function __construct()
    {
        parent:: __construct(); 
        $this->load->model('VolunteerAc_model', 'VolunteerAc_model');
    }
    public function index()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->checkAutoriry(); 
        $this->template();
        
    }
    
    
    public function template(){
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/secutity_grud/menu_user_security');
        $this->load->view('template/template4');
        $this->load->view('student/VolunteerAc/view_VolunteerAc');//ส่วนเนื้อหาs
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
        
        
    }
    

    public function showAll(){
		$result = $this->VolunteerAc_model->showAll();
		echo json_encode($result);
    }

    public function addVolunteerAc(){
		$result = $this->VolunteerAc_model->addVolunteerAc();
		echo json_encode($result);
    }

    
    public function editVolunteerAc(){
		$result = $this->VolunteerAc_model->editVolunteerAc();
		echo json_encode($result);
    }
    public function delete(){
        $result = $this->VolunteerAc_model->delete();
        echo json_encode($result);
    }
  

    public function deleteVolunteerAc(){
	    $result = $this->VolunteerAc_model->deleteVolunteerAc();
		if($result){
        $msg['success'] = true;     
        //redirect(base_url() . 'index.php/VolunteerAc');
		}else{
		    $msg['success'] = false;
		    //redirect(base_url() . 'index.php/VolunteerAc');
		}
		echo json_encode($msg);
	}


  function updateVolunteerAc(){
    $result = $this->VolunteerAc_model->updateVolunteerAc();
		if($result){
        true;     
        redirect(base_url() . 'index.php/VolunteerAc');
		}else{
		    false;
		    redirect(base_url() . 'index.php/VolunteerAc');
		}
		echo json_encode($result);
	}
  
  function selectplace(){
    $result = $this->VolunteerAc_model->selectplace();
    echo json_encode($result);
  }



	  function selectservice(){
      $result = $this->VolunteerAc_model->selectservice();
      echo json_encode($result);
    }


    function selectapersennel(){
      $result = $this->VolunteerAc_model->selectapersennel();
      echo json_encode($result);
    }  
    
    
    function showdetail(){
      $result = $this->VolunteerAc_model->showdetail();
      echo json_encode($result);
    }  
    
    
    
    function check_id(){
      $result = $this->VolunteerAc_model->check_id();
      echo json_encode($result);
    }

    
    function selectperson(){
      $result = $this->VolunteerAc_model->selectperson();
      echo json_encode($result);
    }


}

