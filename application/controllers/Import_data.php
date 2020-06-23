<?php
require_once('Admin_dashboard.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_data extends Admin_dashboard {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('import_data_model');
        $this->load->library('Classes/PHPExcel');
    }
    
    public function index()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/page_import_data');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagestudent()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importstudent');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagepersonnel()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importpersonnel');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagestatus()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importstatus');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagevehicles()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importvehicles');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagedivisions()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importdivisions');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function pagecurriculum()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/importcurriculum');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function statusimportstudent()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportstudent');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function statusimportpersonnel()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportpersonnel');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function statusimportstatus()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportstatus');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function statusimportvehicles()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportvehicles');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function statusimportdivisions()
    {
        $this->checkAutoriry();
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportdivisions');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    public function statusimportcurriculum()
    {
        $this->checkAutoriry();
        
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('template/template1');
        $this->load->view('template/template2');
        $this->load->view('menu/admin/menu_user_admin');
        $this->load->view('template/template4');
        $this->load->view('basicdata/importdata/statusimportcurriculum');
        $this->load->view('template/template5');
        $this->load->view('template/template6');
        
    }
    
    
    
    
    
    function thai_date($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
        $dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
        $monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
        //global $dayTH,$monthTH;
        $thai_date_return = date("j",$time);
        $thai_date_return.=" ".$monthTH[date("n",$time)];
        $thai_date_return.= " ".(date("Y",$time)+543);
        return $thai_date_return;
    }
    
    
    
    
    function thai_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
        $thai_time_return = date("H:i:s");
        // $thai_time_return = (date("H")+5).date(":i:s");
        return $thai_time_return;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importplace()
    {
        
        
        
        if(isset($_POST['btn_submitplace'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"BUILDID",
                        "B"=>"BUILDTHNAME",
                        "C"=> "description"
                        
                    );
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("BUILDID","BUILDTHNAME","description");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_place();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                
                
                $BUILDID = $row['BUILDID'];
                $BUILDTHNAME = $row['BUILDTHNAME'];
                $description = $row['description'];
                $data = array(
                    'place_ID'		=>	$BUILDID,
                    'place_name'			=>	$BUILDTHNAME,
                    'description'			=>	$description
                );
                $this->import_data_model->inserttmp_place($data);
                
            }
            
        }
        
        redirect("import_data/submit_place");
        
        
    }
    
    
    
    
    public  function showAlltmpplace()
    {
        $result = $this->import_data_model->selecttmpplace();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_place()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_place');
    }
    
    
    
    
    
    function import_temp_to_dbplace()
    {
        $inst=0;
        $updt=0;
        $dtnull=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpplace(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkplace($row->place_ID);
            
            
            if($row->place_ID != "" && $row->place_name != "" && $row->description != ""){
                if ($temp_a == 1) {
                    
                    //อัพเดตข้อมูล
                    $data = array(
                        //'id' => $results->id,
                        'place_name' => $row->place_name,
                        'description' => $row->description
                    );
                    $this->import_data_model->update_dataplace($row->place_ID,$data);
                    $updt+=1;
                } else{
                    //เพิ่มข้อมูล
                    $data_a =  array();
                    $data_a['place_ID'] = $row->place_ID;
                    $data_a['place_name'] = $row->place_name;
                    $data_a['description'] = $row->description;
                    $this->import_data_model->insert_to_place($data_a);
                    $inst+=1;
                    
                }
            }else{
                $dtnull+=1;
                
                
            }
            
            
        }
        
        //redirect("Csv_import");
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importdivisions()
    {
        
        
        
        if(isset($_POST['btn_submitdivisions'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"dept_ID",
                        "B"=>"dept_name"
                        
                    );
                    
                    if($row >= $start_row){
                        
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                        
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("dept_ID","dept_name");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_divisions();
            foreach($data_arr as $row){
                // var_dump($data_arr);
                $row = prepare_data($row);
                
                
                $dept_ID = $row['dept_ID'];
                $dept_name = $row['dept_name'];
                
                //var_dump($dept_ID);
                if($dept_ID != 0) {
                    $data_divisions = array();
                    $data_divisions['dept_ID']		=	$dept_ID;
                    $data_divisions['dept_name']	=	$dept_name;
                    $data_divisions['flag']         =   '0';
                    
                    $this->import_data_model->inserttmp_divisions($data_divisions);
                    
                }
            }
            
        }
        
        redirect("import_data/submit_divisions");
        
        
    }
    
    
    
    
    public  function showAlltmpdivisions()
    {
        $result = $this->import_data_model->selecttmpdivisions();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_divisions()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_divisions');
    }
    
    
    
    
    
    function import_temp_to_dbdivisions()
    {
        $instdivisions=0;
        $updtdivisions=0;
        $dtnulldivisions=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpdivisions(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkdivisions($row->dept_ID);
            
            
            if($row->dept_ID != "" && $row->dept_name != ""){
                if ($temp_a == 1) {
                    
                    //อัพเดตข้อมูล
                    $data = array(
                        //'id' => $results->id,
                        'dept_ID' => $row->dept_ID,
                        'dept_name' => $row->dept_name,
                        'flag'        =>   '0'
                    );
                    $this->import_data_model->update_datadivisions($row->dept_ID,$data);
                    $updtdivisions+=1;
                } else{
                    //เพิ่มข้อมูล
                    $data_a =  array();
                    $data_a['dept_ID'] = $row->dept_ID;
                    $data_a['dept_name'] = $row->dept_name;
                    $data_a['flag'] = '0' ;
                    $this->import_data_model->insert_to_divisions($data_a);
                    $instdivisions+=1;
                    
                }
            }else{
                $dtnulldivisions+=1;
                
                
            }
            
            
        }
        
        $checkalldatatmpdivisions = $this->import_data_model->checkalldatatmpdivisions();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmpdivisions as $row){
            $checkalldatatmpdivisions= $row->amm;
            
            
        }
        // echo $checkalldatatmp.amm;
        
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datedivisions = $this->thai_date($dateData);
        $timedivisions = $this->thai_time($dateData);
        
        $session_dataa = array(
            'updtdivisions'     =>     $updtdivisions,
            'instdivisions'     =>     $instdivisions,
            'dtnulldivisions'   =>     $dtnulldivisions,
            'checkalldatatmpdivisions'     =>     $checkalldatatmpdivisions,
            'datedivisions'     =>     $datedivisions,
            'timedivisions'     =>     $timedivisions
            
            
            
        );
        $this->session->set_userdata($session_dataa);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importcurriculum()
    {
        
        
        
        if(isset($_POST['btn_submitcurriculum'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"cur_ID",
                        "B"=>"cur_name",
                        "C"=> "dept_ID"
                        
                    );
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("cur_ID","cur_name","dept_ID");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_curriculum();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                
                
                $cur_ID= $row['cur_ID'];
                $cur_name = $row['cur_name'];
                $dept_ID = $row['dept_ID'];
                if($cur_ID != 0) {
                    $data = array(
                        'cur_ID'		=>	$cur_ID,
                        'cur_name'			=>	$cur_name,
                        'dept_ID'			=>	$dept_ID,
                        'flag'    =>	'0'
                    );
                    $this->import_data_model->inserttmp_curriculum($data);
                }
            }
            
        }
        
        redirect("import_data/submit_curriculum");
        
        
    }
    
    public  function showAlltmpcurriculum()
    {
        $result = $this->import_data_model->selecttmpcurriculum();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_curriculum()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_curriculum');
    }
    
    public function checkalldatatmp()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $result = $this->import_data_model->checkalldatatmp();
    }
    
    
    
    
    
    function import_temp_to_dbcurriculum()
    {
        $instcur=0;
        $updtcur=0;
        $dtnullcur=0;
        $checkimptcur =0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpcurriculum(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkcurriculum($row->cur_ID);
            
            
            if($row->cur_ID != "" && $row->cur_name != "" && $row->dept_ID != ""){
                if ($temp_a == 1) {
                    
                    //อัพเดตข้อมูล
                    $data = array(
                        //'id' => $results->id,
                        'cur_name' => $row->cur_name,
                        'flag' => '0',
                        'dept_ID' => $row->dept_ID
                    );
                    $this->import_data_model->update_datacurriculum($row->cur_ID,$data);
                    $updtcur+=1;
                } else{
                    //เพิ่มข้อมูล
                    $data_a =  array();
                    $data_a['cur_ID'] = $row->cur_ID;
                    $data_a['cur_name'] = $row->cur_name;
                    $data_a['flag'] = '0';
                    $data_a['dept_ID'] = $row->dept_ID;
                    $this->import_data_model->insert_to_curriculum($data_a);
                    $instcur+=1;
                    
                }
            }else{
                $dtnullcur+=1;
                
            }
            
        }
        $checkalldatatmpcur = $this->import_data_model->checkalldatatmpcur();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmpcur as $row){
            $checkalldatatmpcur= $row->amm;
            
            
        }
        // echo $checkalldatatmp.amm;
        
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datecur = $this->thai_date($dateData);
        $timecur = $this->thai_time($dateData);
        
        echo $datecur."<br>";
        echo $timecur;
        /*
         $dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
         $monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
         //$monthTH_brev = [null,'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
         $dateData=time(); // วันเวลาขณะนั้น
         //global $dayTH,$monthTH;
         $thai_date_return = date("j");
         $thai_date_return.=" ".$monthTH[date("n")];
         $thai_date_return.= " ".(date("Y")+543);
         $thai_date_return.= " ".(date("H")+5).date(":i:s");
         //$thai_date_return.= " เวลา ".date("H".+5.":i:s");
         echo $thai_date_return;
         */
        // echo thai_date_and_time($dateData);
        // $strDate = date("d-m-Y");
        // $ddd= DateThai($strDate);
        // echo $ddd;
        
        
        //$this->session->set_flashdata('updt',$updt);
        $session_dataa = array(
            'updtcur'     =>     $updtcur,
            'instcur'     =>     $instcur,
            'dtnullcur'   =>     $dtnullcur,
            'checkalldatatmpcur'     =>     $checkalldatatmpcur,
            'datecur'     =>     $datecur,
            'timecur'     =>     $timecur
            
            
            
        );
        $this->session->set_userdata($session_dataa);
        
        
        //$this->load->view('basicdata/importdata/page_import_data',$data);
        //redirect('import_data/index',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importstatus()
    {
        
        
        
        if(isset($_POST['btn_submitstatus'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"status_ID",
                        "B"=>"status_name"
                        
                    );
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("status_ID","status_name");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_status();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                
                
                
                
                $status_ID= $row['status_ID'];
                $status_name = $row['status_name'];
                if($status_ID != 0){
                    $data = array(
                        'status_ID'		=>	$status_ID,
                        'status_name'			=>	$status_name
                    );
                    $this->import_data_model->inserttmp_status($data);
                }
            }
            
        }
        
        redirect("import_data/submit_status");
        
        
    }
    
    
    
    
    public  function showAlltmpstatus()
    {
        $result = $this->import_data_model->selecttmpstatus();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_status()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_status');
    }
    
    
    
    
    
    function import_temp_to_dbstatus()
    {
        $inststatus=0;
        $updtstatus=0;
        $dtnullstatus=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpstatus(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkstatus($row->status_ID);
            
            
            if($row->status_ID != "" && $row->status_name != ""){
                if ($temp_a == 1) {
                    
                    //อัพเดตข้อมูล
                    $data = array(
                        //'id' => $results->id,
                        'cur_name' => $row->cur_name,
                        'status_name' => $row->status_name
                    );
                    $this->import_data_model->update_datastatus($row->status_ID,$data);
                    $updtstatus+=1;
                } else{
                    //เพิ่มข้อมูล
                    $data_a =  array();
                    $data_a['status_ID'] = $row->status_ID;
                    $data_a['status_name'] = $row->status_name;
                    $this->import_data_model->insert_to_status($data_a);
                    $inststatus+=1;
                    
                }
            }else{
                $dtnullstatus+=1;
                
                
            }
            
            
        }
        $checkalldatatmpstatus = $this->import_data_model->checkalldatatmpstatus();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmpstatus as $row){
            $checkalldatatmpstatus= $row->amm;
            
            
        }
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datestatus = $this->thai_date($dateData);
        $timestatus = $this->thai_time($dateData);
        
        $session_dataa = array(
            'updtstatus'     =>     $updtstatus,
            'inststatus'     =>     $inststatus,
            'dtnullstatus'   =>     $dtnullstatus,
            'checkalldatatmpstatus'     =>     $checkalldatatmpstatus,
            'datestatus'     =>     $datestatus,
            'timestatus'     =>     $timestatus
            
            
            
        );
        $this->session->set_userdata($session_dataa);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importvehicles()
    {
        
        
        
        if(isset($_POST['btn_submitvehicles'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"v_ID",
                        "B"=>"regist_num",
                        "C"=>"province",
                        "D"=> "brand",
                        "E"=> "color",
                        "F"=> "vetype_ID",
                        "G"=> "regist_date",
                        "H"=> "expired_date",
                        "I"=> "S_ID",
                        
                    );
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("v_ID","regist_num","province","brand","color","vetype_ID","regist_date","expired_date","S_ID");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_vehicles();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                
                $v_ID = $row['v_ID'];
                $regist_num = $row['regist_num'];
                $province = $row['province'];
                $brand = $row['brand'];
                $color = $row['color'];
                $vetype_ID = $row['vetype_ID'];
                $regist_date = $row['regist_date'];
                $expired_date = $row['expired_date'];
                $S_ID = $row['S_ID'];
                
                $data = array(
                    'v_ID'			=>	$v_ID,
                    'regist_num'			=>	$regist_num,
                    'province'			=>	$province,
                    'brand'			=>	$brand,
                    'color'			=>	$color,
                    'vetype_ID'			=>	$vetype_ID,
                    'regist_date'			=>	"2019-08-08",
                    'expired_date'			=>	"2020-08-08",
                    'S_ID'			=>	$S_ID
                );
                $this->import_data_model->inserttmp_vehicles($data);
                
            }
            
        }
        
        redirect("import_data/submit_vehicles");
        
        
    }
    
    
    
    
    public  function showAlltmpvehicles()
    {
        $result = $this->import_data_model->selecttmpvehicles();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_vehicles()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_vehicles');
    }
    
    
    
    
    
    function import_temp_to_dbvehicles()
    {
        $instvehicles=0;
        $updtvehicles=0;
        $dtnullvehicles=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpvehicles(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkvehicles($row->S_ID);
            
            
            if($row->regist_num != "" && $row->province != "" && $row->brand != "" && $row->color != "" && $row->vetype_ID != "" && $row->regist_date != "" && $row->expired_date != "" && $row->S_ID != ""){
                if ($temp_a == 1) {
                    
                    //อัพเดตข้อมูล
                    $data = array(
                        //'id' => $results->id,
                        'regist_num' => $row->regist_num,
                        'province' => $row->province,
                        'brand' => $row->brand,
                        'color' => $row->color,
                        'vetype_ID' => $row->vetype_ID,
                        'regist_date' => $row->regist_date,
                        'expired_date' => $row->expired_date,
                        'S_ID' => $row->S_ID,
                    );
                    $this->import_data_model->update_datavehicles($row->S_ID,$data);
                    $updtvehicles+=1;
                } else{
                    //เพิ่มข้อมูล
                    $data_a =  array();
                    $data_a['regist_num'] = $row->regist_num;
                    $data_a['province'] = $row->province;
                    $data_a['brand'] = $row->brand;
                    $data_a['color'] = $row->color;
                    $data_a['vetype_ID'] = $row->vetype_ID;
                    $data_a['regist_date'] = $row->regist_date;
                    $data_a['expired_date'] = $row->expired_date;
                    $data_a['S_ID'] = $row->S_ID;
                    $this->import_data_model->insert_to_vehicles($data_a);
                    $instvehicles+=1;
                    
                }
            }else{
                $dtnullvehicles+=1;
                
                
            }
            
            
        }
        
        $checkalldatatmpvehicles = $this->import_data_model->checkalldatatmpvehicles();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmpvehicles as $row){
            $checkalldatatmpvehicles= $row->amm;
            
            
        }
        // echo $checkalldatatmp.amm;
        
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datevehicles = $this->thai_date($dateData);
        $timevehicles = $this->thai_time($dateData);
        
        $session_dataa = array(
            'updtvehicles'     =>     $updtvehicles,
            'instvehicles'     =>     $instvehicles,
            'dtnullvehicles'   =>     $dtnullvehicles,
            'checkalldatatmpvehicles'     =>     $checkalldatatmpvehicles,
            'datevehicles'     =>     $datevehicles,
            'timevehicles'     =>     $timevehicles
            
            
            
        );
        $this->session->set_userdata($session_dataa);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importpersonnel()
    {
        
        
        
        if(isset($_POST['btn_submitpersonnel'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            //$this->import_data_model->clearvalue();
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // เก็บชื่อไฟล์
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            /*  print_r($info);         // ข้อมูลไฟล์
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // อ่านไฟล์จาก path temp ชั่วคราวที่เราอัพโหลด
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ดึงข้อมูลของแต่ละเซลในตารางมาไว้ใช้งานในรูปแบบตัวแปร array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // วนลูปแสดงข้อมูล
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ค่าสำหรับดูว่าเป็นคอลัมน์ไหน เช่น A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // คำสำหรับดูว่าเป็นแถวที่เท่าไหร่ เช่น 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ค่าของข้อมูลในเซลล์นั้นๆ เช่น A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // เริ่มขึ้นตอนจัดเตรียมข้อมูล
                    // เริ่มเก็บข้อมูลบรรทัดที่ 2 เป็นต้นไป
                    $start_row = 2;
                    // กำหนดชื่อ column ที่ต้องการไปเรียกใช้งาน
                    $col_name = array(
                        "A"=>"person_ID",
                        "B"=>"prefixID",
                        "C"=>"person_fname",
                        "D"=> "person_lname",
                        "E"=> "position",
                        "F"=> "sex",
                        "G"=> "email",
                        "H"=> "phone1",
                        "I"=> "phone2",
                        "J"=> "dept_ID",
                        "K"=> "cur_ID",
                        "L"=> "usertype_ID",
                        "M"=> "username",
                        "N"=> "password",
                        "O"=> "flag"
                        
                        
                        
                    );
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // สร้างฟังก์ชั่นสำหรับจัดการกับข้อมุลที่เป็นค่าว่าง หรือไม่มีข้อมูลน้้น
        function prepare_data($data){
            // กำหนดชื่อ filed ให้ตรงกับ $col_name ด้านบน
            $arr_field = array("person_ID","prefixID","person_fname","person_lname","position","sex","email","phone1","phone2","dept_ID","cur_ID","usertype_ID","username","password","flag");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        // นำข้อมูลที่ดึงจาก excel หรือ csv ไฟล์ มาวนลูปแสดง
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_personnel();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                

                $data_personnel =  array();
                $data_personnel['person_ID'] = $row['person_ID'];
                $data_personnel['prefixID'] = $row['prefixID'];
                $data_personnel['person_fname'] = $row['person_fname'];
                $data_personnel['person_lname'] = $row['person_lname'];
                $data_personnel['position'] = $row['position'];
                $data_personnel['sex'] = $row['sex'];
                $data_personnel['email'] = $row['email'];
                $data_personnel['phone1'] = $row['phone1'];
                $data_personnel['phone2'] = $row['phone2'];
                $data_personnel['dept_ID'] = $row['dept_ID'];
                $data_personnel['cur_ID'] = $row['cur_ID'];
                $data_personnel['usertype_ID'] = $row['usertype_ID'];
                $data_personnel['username'] = $row['username'];
                $data_personnel['password'] = $row['password'];
                $data_personnel['flag'] = $row['flag'];
                
                
                
                $this->import_data_model->inserttmp_personnel($data_personnel);
                
            }
            
        }
        
        redirect("import_data/submit_personnel");
        
    }
    
    
    
    public  function showAlltmppersonnel()
    {
        $result = $this->import_data_model->selecttmppersonnel();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_personnel()
    {
        //List ข้อมูลมาแสดงในหน้าจอ
        $this->load->view('basicdata/importdata/submit_personnel');
    }
    
    
    
    
    
    function import_temp_to_dbpersonnel()
    {
        $instpersonnel=0;
        $updtpersonnel=0;
        $dtnullpersonnel=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmppersonnel(); //ตาราง temp
        
        foreach ($result as $row) { //loop ตาราง temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkpersonnel($row->person_ID);
            
       
            
            if($row->person_fname != "" && $row->person_lname != "" && $row->position != "" && $row->sex != "" && $row->email != "" && $row->phone1 != ""
                && $row->phone2 != "" && $row->dept_ID != "" && $row->cur_ID != "" && $row->usertype_ID != "" && $row->username != "" && $row->password != ""){
                    
                    if ($temp_a == 1) {
                        
                        $data_personnel =  array();
                        $data_personnel['prefixID'] = $row->prefixID;
                        $data_personnel['person_fname'] = $row->person_fname;
                        $data_personnel['person_lname'] = $row->person_lname;
                        $data_personnel['position'] = $row->position;
                        $data_personnel['sex']  = $row->sex;
                        $data_personnel['email'] = $row->email;
                        $data_personnel['phone1'] =$row->phone1;
                        $data_personnel['phone2'] = $row->phone2;
                        $data_personnel['dept_ID'] = $row->dept_ID;
                        $data_personnel['cur_ID'] = $row->cur_ID;
                        $data_personnel['usertype_ID'] = $row->usertype_ID;
                        $data_personnel['username'] = $row->username;
                        $data_personnel['password'] = $row->password;
                        $data_personnel['flag'] = $row->flag;
                        $this->import_data_model->update_datapersonnel($row->person_ID,$data_personnel);
                        $updtpersonnel+=1;
                    } else{
                        //เพิ่มข้อมูล
                        $data_a =  array();
                        $data_a['person_ID'] = $row->person_ID;
                        $data_a['prefixID'] = $row->prefixID;
                        $data_a['person_fname'] = $row->person_fname;
                        $data_a['person_lname'] = $row->person_lname;
                        $data_a['position'] = $row->position;
                        $data_a['sex']  = $row->sex;
                        $data_a['email'] = $row->email;
                        $data_a['phone1'] =$row->phone1;
                        $data_a['phone2'] = $row->phone2;
                        $data_a['dept_ID'] = $row->dept_ID;
                        $data_a['cur_ID'] = $row->cur_ID;
                        $data_a['usertype_ID'] = $row->usertype_ID;
                        $data_a['username'] = $row->username;
                        $data_a['password'] = $row->password;
                        $data_a['flag'] = $row->flag;
                        $this->import_data_model->insert_to_personnel($data_a);
                        $instpersonnel+=1;
                        
                    }
            }else{
                $dtnullpersonnel+=1;
                
                
            }
            
            
            
            
        }
        
        $checkalldatatmppersonnel = $this->import_data_model->checkalldatatmppersonnel();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmppersonnel as $row){
            $checkalldatatmppersonnel= $row->amm;
            
            
        }
        // echo $checkalldatatmp.amm;
        
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datepersonnel = $this->thai_date($dateData);
        $timepersonnel = $this->thai_time($dateData);
        
        $session_dataa = array(
            'updtpersonnel'     =>     $updtpersonnel,
            'instpersonnel'     =>     $instpersonnel,
            'dtnullpersonnel'   =>     $dtnullpersonnel,
            'checkalldatatmppersonnel'     =>     $checkalldatatmppersonnel,
            'datepersonnel'     =>     $datepersonnel,
            'timepersonnel'     =>     $timepersonnel
            
            
            
        );
        $this->session->set_userdata($session_dataa);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public  function importstudent()
    {
        
        
        
        if(isset($_POST['btn_submitstudent'])  && isset($_FILES['_fileup']['name']) && $_FILES['_fileup']['name']!=""){
            
            
            $tmpFile = $_FILES['_fileup']['tmp_name'];
            $fileName = $_FILES['_fileup']['name'];  // à¡çºª×èÍä¿Åì
            $_fileup = $_FILES['_fileup'];
            $info = pathinfo($fileName);
            $allow_file = array("csv","xls","xlsx");
            
            /*  print_r($info);         // ¢éÍÁÙÅä¿Åì
             print_r($_fileup);*/
            if($fileName!="" && in_array($info['extension'],$allow_file)){
                // ÍèÒ¹ä¿Åì¨Ò¡ path temp ªÑèÇ¤ÃÒÇ·ÕèàÃÒÍÑ¾âËÅ´
                $objPHPExcel = PHPExcel_IOFactory::load($tmpFile);
                
                
                // ´Ö§¢éÍÁÙÅ¢Í§áµèÅÐà«Åã¹µÒÃÒ§ÁÒäÇéãªé§Ò¹ã¹ÃÙ»áººµÑÇá»Ã array
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                
                // Ç¹ÅÙ»áÊ´§¢éÍÁÙÅ
                $data_arr=array();
                foreach ($cell_collection as $cell) {
                    // ¤èÒÊÓËÃÑº´ÙÇèÒà»ç¹¤ÍÅÑÁ¹ìäË¹ àªè¹ A B C ....
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    // ¤ÓÊÓËÃÑº´ÙÇèÒà»ç¹á¶Ç·Õèà·èÒäËÃè àªè¹ 1 2 3 .....
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    // ¤èÒ¢Í§¢éÍÁÙÅã¹à«ÅÅì¹Ñé¹æ àªè¹ A1 B1 C1 ....
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                    
                    // àÃÔèÁ¢Öé¹µÍ¹¨Ñ´àµÃÕÂÁ¢éÍÁÙÅ
                    // àÃÔèÁà¡çº¢éÍÁÙÅºÃÃ·Ñ´·Õè 2 à»ç¹µé¹ä»
                    $start_row = 2;
                    // ¡ÓË¹´ª×èÍ column ·ÕèµéÍ§¡ÒÃä»àÃÕÂ¡ãªé§Ò¹
                    $col_name = array(
                        "A"=>"S_ID",
                        "B"=>"prefixID",
                        "C"=>"std_fname",
                        "D"=> "std_lname",
                        "E"=> "sex",
                        "F"=> "email",
                        "G"=> "phone",
                        "H"=> "image ",
                        "I"=> "behavior_score",
                        "J"=> "cur_ID",
                        "K"=> "dorm_ID",
                        "L"=> "person_ID",
                        "M"=> "status_ID",
                        "N"=> "usertype_ID",
                        "O"=> "username",
                        "P"=> "password"
                    );
                    
                    
                    
                    if($row >= $start_row){
                        $data_arr[$row-$start_row][$col_name[$column]] = $data_value;
                    }
                }
                //print_r($data_arr);
            }
        }
        
        // ÊÃéÒ§¿Ñ§¡ìªÑè¹ÊÓËÃÑº¨Ñ´¡ÒÃ¡Ñº¢éÍÁØÅ·Õèà»ç¹¤èÒÇèÒ§ ËÃ×ÍäÁèÁÕ¢éÍÁÙÅ¹éé¹
        function prepare_data($data){
            // ¡ÓË¹´ª×èÍ filed ãËéµÃ§¡Ñº $col_name ´éÒ¹º¹
            $arr_field = array("S_ID","prefixID","std_fname","std_lname","sex","email","phone","image","behavior_score","cur_ID","person_ID","status_ID","usertype_ID","username","password");
            if(is_array($data)){
                foreach($arr_field as $v){
                    if(!isset($data[$v])){
                        $data[$v]="";
                    }
                    
                    
                }
            }
            return $data;
        }
        
        
        
        // ¹Ó¢éÍÁÙÅ·Õè´Ö§¨Ò¡ excel ËÃ×Í csv ä¿Åì ÁÒÇ¹ÅÙ»áÊ´§
        if(isset($data_arr) && count($data_arr)>0){
            $this->import_data_model->empty_tmp_student();
            foreach($data_arr as $row){
                $row = prepare_data($row);
                
                
                
                $data_student =  array();
                $data_student['S_ID'] = $row['S_ID'];
                $data_student['prefixID'] = $row['prefixID'];
                $data_student['std_fname'] = $row['std_fname'];
                $data_student['std_lname'] = $row['std_lname'];
                $data_student['sex'] = $row['sex'];
                $data_student['email'] = $row['email'];
                $data_student['phone'] = $row['phone'];
                $data_student['image'] = $row['image'];
                $data_student['behavior_score'] = $row['behavior_score'];
                $data_student['cur_ID'] = $row['cur_ID'];
                $data_student['dorm_ID'] = $row['dorm_ID'];
                $data_student['person_ID'] = $row['person_ID'];
                $data_student['status_ID'] = $row['status_ID'];
                $data_student['usertype_ID'] = $row['usertype_ID'];
                $data_student['username'] = $row['username'];
                $data_student['password'] = $row['password'];
                
                if($row['S_ID'] != 0){
                    
                    
                    $this->import_data_model->inserttmp_student($data_student);
                }
            }
            
        }
        
        redirect("import_data/submit_student");
        
    }
    
    public  function showAlltmpstudent()
    {
        $result = $this->import_data_model->selecttmpstudent();
        //print_r ($result);
        echo json_encode($result);
        
        
    }
    
    public function submit_student()
    {
        //List ¢éÍÁÙÅÁÒáÊ´§ã¹Ë¹éÒ¨Í
        $this->load->view('basicdata/importdata/submit_student');
    }
    function import_temp_to_dbstudent()
    {
        $inststudent=0;
        $updtstudent=0;
        $dtnullstudent=0;
        echo "Function import_temp_to_db</br>";
        
        $result = $this->import_data_model->selecttmpstudent(); //µÒÃÒ§ temp
        
        foreach ($result as $row) { //loop µÒÃÒ§ temp
            //select by id
            
            
            $temp_a = $this->import_data_model->checkstudent($row->S_ID);
            
            //&& $row->image != ""
            
            if($row->S_ID != ""&& $row->prefixID != "" && $row->std_fname != "" && $row->std_lname != ""&& $row->sex != "" && $row->email != "" && $row->phone != ""
                && $row->behavior_score != "" && $row->cur_ID != "" && $row->person_ID != ""
                && $row->status_ID != "" && $row->usertype_ID != "" && $row->username != "" && $row->password != ""){
                    if ($temp_a == 1) {
                        
                
                        $data_u =  array();
                        $data_u['prefixID'] = $row->prefixID;
                        $data_u['std_fname'] = $row->std_fname;
                        $data_u['std_lname'] = $row->std_lname;
                        $data_u['sex'] = $row->sex;
                        $data_u['email'] = $row->email;
                        $data_u['phone'] = $row->phone;
                        $data_u['image'] = $row->image;
                        $data_u['cur_ID'] = $row->cur_ID;
                        $data_u['dorm_ID'] = $row->dorm_ID;
                        $data_u['person_ID'] = $row->person_ID;
                        $data_u['status_ID'] = $row->status_ID;
                        $data_u['usertype_ID'] = $row->usertype_ID;
                        $data_u['username'] = $row->username;
                        $data_u['password'] = $row->password;
                        $this->import_data_model->update_datastudent($row->S_ID,$data_u);
                        $updtstudent+=1;
                    } else{
                        //à¾ÔèÁ¢éÍÁÙÅ
                        $data_a =  array();
                        $data_a['S_ID'] = $row->S_ID;
                        $data_a['prefixID'] = $row->prefixID;
                        $data_a['std_fname'] = $row->std_fname;
                        $data_a['std_lname'] = $row->std_lname;
                        $data_a['sex'] = $row->sex;
                        $data_a['email'] = $row->email;
                        $data_a['phone'] = $row->phone;
                        $data_a['image'] = $row->image;
                        $data_a['behavior_score'] = $row->behavior_score;
                        $data_a['cur_ID'] = $row->cur_ID;
                        $data_a['dorm_ID'] = $row-> dorm_ID;
                        $data_a['person_ID'] = $row-> person_ID;
                        $data_a['status_ID'] = $row->status_ID;
                        $data_a['usertype_ID'] = $row->usertype_ID;
                        $data_a['username'] = $row->username;
                        $data_a['password'] = $row->password;
                        
                        $this->import_data_model->insert_to_student($data_a);
                        $inststudent+=1;
                        
                    }
            }else{
                $dtnullstudent+=1;
                
            }
            
            
        }
        
        $checkalldatatmpstudent = $this->import_data_model->checkalldatatmpstudent();
        //var_dump($checkalldatatmp);
        // var_dump($checkalldatatmp);
        foreach ($checkalldatatmpstudent as $row){
            $checkalldatatmpstudent= $row->amm;
            
            
        }
        // echo $checkalldatatmp.amm;
        
        date_default_timezone_set('Asia/Bangkok');
        $dateData=time();
        
        $datestudent = $this->thai_date($dateData);
        $timestudent = $this->thai_time($dateData);
        
        $session_dataa = array(
            'updtstudent'     =>     $updtstudent,
            'inststudent'     =>     $inststudent,
            'dtnullstudent'   =>     $dtnullstudent,
            'checkalldatatmpstudent'     =>     $checkalldatatmpstudent,
            'datestudent'     =>     $datestudent,
            'timestudent'     =>     $timestudent
            
            
            
        );
        $this->session->set_userdata($session_dataa);
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
