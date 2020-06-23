<?php

class login_model extends CI_Model {
    public function _construct()
    {
        parent::_construct();
        
    }
    
    
    public function getdata(){
        $this->db->where('flag','0');
        $query = $this->db->get('employee');
        return $query->result();
        
        
    }
    public function insertdata($data){
        $this->db->insert('employee',$data);
        
        
    }
    
    function fetch_single_data($id)
    {
        $this->db->where('E_ID',$id);
        $query = $this->db->get('employee');
        return $query->result();
        //Select * FROM employee where id = '$id'
    }
    function fetch_data()
    {
        //$query = $this->db->get("tbl_user");
        //select * from tbl_user
        //$query = $this->db->query("SELECT * FROM tbl_user ORDER BY id DESC");
        $this->db->select("*");
        $this->db->from("employee");
        $query = $this->db->get();
        return $query;
    }
    public function editdata($id,$data){
        $this->db->where("E_ID",$id);
        $this->db->update("employee",$data);
        //UPDATE tbl_user SET UName = '$username', Pass = '$password' WHERE employee = '$id'
        
        
    }
    
    public function deldata($id,$data){
        $this->db->where("E_ID",$id);
        $this->db->update("employee",$data);
        
        
        
    }
    
    /*  deletedata
     public function truedeldata($id){
     $this->db->where("E_ID",$id);
     $this->db->delete("employee");
     
     
     
     }*/
    
    
    
    
    function can_login($username, $password)
    {
        


        /*
        $this->db->select('username, password');
        $this->db->from('employee');
        $query1 = $this->db->get()->result();
        */
        
        $this->db->select('username, password');
        $this->db->from('student');
        $query2 = $this->db->get()->result();
        
        $this->db->select('username, password');
        $this->db->from('personnel');
        $query3 = $this->db->get()->result();
        
        
        
        
        $query4 = array_merge($query2,$query3);
        //$query4 = array_merge($query1, $query2,$query3);
        
        //var_dump($query4);
       // die();

        foreach ($query4 as $value){
            if($value->username == $username  && $value->password == $password ){
                return true;
                
                
            }
            
            //echo $value->UName."  ";
            // echo $value->Pass;
            // echo "<br>";
            
            
        }
        
        return false;
        
        
        /*
         $this->db->where('UName', $username);
         $this->db->where('Pass', $password);
         $query = $this->db->get('employee');*/
        //SELECT * FROM employee WHERE employee = '$username' AND password = '$password'
        /* if($query->num_rows() > 0)
         {
         return true;
         }
         else
         {
         return false;
         }*/
    }
    
   

function checkusernameadmin($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('usertype_name','ผู้ดูแลระบบ');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
    
    
}


function checkusernamestudent($username)
{
    
    $this->db->select('username');
    $this->db->from('student');
    $query1 = $this->db->get()->result();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
    
    
}





function checkusernameteacher($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','อาจารย์ที่ปรึกษา');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}



function checkusernamediscipline_officer($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','เจ้าหน้าที่วินัยนักศึกษา');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}


function checkusernameheadofstudent_affairs($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','หัวหน้าส่วนกิจการนักศึกษา');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}


function checkusernamedormitory_supervisor($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','หัวหน้างานหอพัก');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}


function checkusernamedormitory_advisor($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','ที่ปรึกษาหอพัก');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}


function checkusernamebranch_head($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','หัวหน้างานสาขา');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}

function checkusernamedean($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','คณบดี');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}



function checkusernamesecurity_guard($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','เจ้าหน้าที่รักษาความปลอดภัย');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}


function checkusernameemployee($username){
    
    $this->db->select('username');
    $this->db->from('personnel p');
    $this->db->join('usertype ut', 'p.usertype_ID=ut.usertype_ID');
    $this->db->where('ut.usertype_name','พนักงาน');
    $query1 = $this->db->get()->result();
    //var_dump($query1);
    //die();
    foreach ($query1 as $value){
        if($value->username == $username){
            return true;
            
            
        }
    }
      
}





}