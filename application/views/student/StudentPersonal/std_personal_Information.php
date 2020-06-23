<!doctype html>
<html lang="en">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

<center>
    <strong>
        <div class="alert alert-success" role="alert" style="display: none;"></div>
    </strong>
    <strong>
        <div class="alert alert-danger" role="alert" style="display: none;"></div>
    </strong>
    <strong>
        <div class="alert alert-warning" role="alert" style="display: none;"></div>
    </strong>
</center>

<head>
    <title>ข้อมูลส่วนตัว</title>

</head>

<body>

<style>

  
    .sty_text{
        padding-left:5rem;
    }
    .sty_text2{
        padding-left:3rem;
    }
    
    .breadcrumb2{
    font-size: 20px;
    font-weight: 600;
    display: flex;
    flex-wrap: wrap;
    padding: 0.56rem 1.13rem;
   <!-- margin-bottom: 1rem; --!>
    list-style: none;
    background-color: transparent;
    border-radius: 0.25rem;
}

    .breadcrumb3{
    
    margin-bottom: 1rem;
  
}
 
</style>
    <meta charset="UTF-8">
    <div class="page-breadcrumb" id="nav_sty">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <p class="breadcrumb-item"> ข้อมูลส่วนตัว  </p>
             <!--  <li class="breadcrumb-item">  --> 
            </ol>  
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow mb-4">
            <div class="card-header" id="card_2">
                <h6 class="m-0 text-primary"><span><i class="fas fa-user"></i></span>&nbsp;ข้อมูลส่วนตัว</h6>
            </div><br>
            
        <div class="breadcrumb2">1.นักศึกษา </div>

     		<div class="row sty_text">
     			<div class="col-sm-2">
     			รหัสนักศึกษา :  <span id="S_ID"></span>
				</div>
				
     			<div class="col-sm-2">
     			ชื่อ :  <span id="std_fname"></span>
     			</div>   

     			<div class="col-sm-6">
     			สกุล :  <span id="std_lname"></span>	
     			</div>
     		
     		</div>  
     	
			<div class="row sty_text">
     			<div class="col-sm-3">
     			หลักสูตร :  <span id="cur_name"></span>
     			</div>
     			<div class="col-sm-3">
     			สำนักวิชา :  <span id="dept_name"></span>
     			</div>    	
     			<div class="col-sm-6">
     			</div> 		
     		</div> 
     		
     		<div class="row sty_text">
     			<div class="col-sm-3">
     			หมายเลขโทรศัพท์ :  <span id="phone"></span>
     			</div>
     			<div class="col-sm-3">
     			อีเมล์ :  <span id="email"></span>
     			</div>
     			<div class="col-sm-6">
     			</div>	
     		
     			
     			
     		</div>
     		
     		 <div class="row sty_text">
     			<div class="col-sm-3">
     			ชื่อหอพัก :  <span id="dname"></span>
     			</div>
     			<div class="col-sm-3">
     			ประเภทหอพัก :  <span id="type_name"></span>
     			</div>	
     			<div class="col-sm-6">
     			
     			</div> 	

     		</div>
     		
     		
     		
     	<div class="breadcrumb2">2.อาจารย์ที่ปรึกษา     </div>

     		<div class="row sty_text">
     			<div class="col-sm-1">
     			
     			ชื่อ :  <span id="person_fname"></span>
     			</div>
     			
     			<div class="col-sm-1">
     			สกุล :  <span id="person_lname"></span>
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-2">
     			ตำแหน่ง :  <span id="position"></span>
     			</div>
     			
     			
     			<div class="col-sm-7">
     			
     			</div>
     			
     			
     		
     		</div>   
     		<div class="row sty_text">
     			<div class="col-sm-3">
     			หน่วยงาน :  <span id="dept_name1"></span>
     			</div>
     			<div class="col-sm-3">
     			หลักสูตร :  <span id="cur_name1"></span>
     			</div>  
     			  	
     			<div class="col-sm-6">
     			
     			</div> 		
     		</div> 
     		
     		<div class="row sty_text">
     			<div class="col-sm-3">
     			หมายเลขโทรศัพท์ :  <span id="phone1"></span>
     			</div>
     			<div class="col-sm-3">
     			อีเมล์ :  <span id="email1"></span>
     			</div>
     			 	
     			<div class="col-sm-6">
     			
     			</div> 	
     			
     			
     		</div>
     		

	<div class="breadcrumb2">3.ยานพาหนะ    </div>
		<div class="row sty_text2">
     			<div class="col-sm-12">
     			
     			3.1 รถจักรยานยนต์ 
     			</div>
     	</div>

     		<div class="row sty_text">
     			<div class="col-sm-3">
     			
     			เลขทะเบียนยานพาหนะ :  <span id="regist_num1"></span>
     			</div>
     			
     			<div class="col-sm-2">
     			จังหวัด :  <span id="province"></span>
     			</div>
     			
     			<div class="col-sm-2">
     			ยี่ห้อ :  <span id="brand"></span>
     			</div>
     			
     			<div class="col-sm-1">
     			สี :  <span id="color"></span>
     			</div>
     			
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     		
     			
     		</div>   
     		<div class="row sty_text">
     			<div class="col-sm-3">
     			วันที่ลงทะเบียนสติ๊กเกอร์ :  <span id="regist_date"></span>
     			</div>
     			<div class="col-sm-3">
     			วันที่หมดอายุสติ๊กเกอร์ :  <span id="expired_date"></span>
     			</div>  
     				
     			<div class="col-sm-6">
     			
     			</div> 		
     		</div> 
  <div class="row sty_text2">
     			<div class="col-sm-12">
     			
     			3.2 รถยนต์ 
     			</div>
     	</div>

     		<div class="row sty_text">
     			<div class="col-sm-3">
     			
     			เลขทะเบียนยานพาหนะ :  <span id="regist_num2"></span>
     			</div>
     			
     			<div class="col-sm-2">
     			จังหวัด :  <span id="province1"></span>
     			</div>
     			
     			<div class="col-sm-1">
     			ยี่ห้อ :  <span id="brand1"></span>
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			สี :  <span id="color1"></span>
     			</div>
     			
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     			<div class="col-sm-1">
     			
     			</div>
     		
     			
     		</div>   
     		<div class="row sty_text">
     			<div class="col-sm-3">
     			วันที่ลงทะเบียนสติ๊กเกอร์ :  <span id="regist_date1"></span>
     			</div>
     			<div class="col-sm-3">
     			วันที่หมดอายุสติ๊กเกอร์ :  <span id="expired_date1"></span>
     			</div>  
     				
     			<div class="col-sm-6">
     			
     			</div> 		
     		</div> 
     		<br><br>
     		<div class="col-sm-12 ">
     		 <!--  <center><button onclick="myFunction() class="btn "><a href="Student_dashboard.html"> ย้อนกลับ</button></center></a>  -->
     		 
     		 
     		 <!-- <button type="button"  onclick="test()">ย้อนกลับ</button> -->
     		 
     		 
     		 <center> <a href=<?php echo base_url() ?>index.php/Student_dashboard><input type="button" value="ย้อนกลับ"></a> </center>
     		 
     		</div> 
        </div>
        
      
      
 			


</div>




    
    
    
   
   
   
</body>

</html>
<script>
    $(document).ready(function() {
    	 showAll();
    	 selectpersonnel();
    	 selectvehiclesmotorcycle();
    	 selectvehiclescar();
    	 //test();
        //$('[data-toggle="popover"]').popover();

        
    /* function test(){
     //alert("XXXX");
        $(location).attr('href','<?php echo base_url() ?>index.php/Student_dashboard');   
        }
    	*/
        
        
    function showAll() {
        
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/Std_info/selectstudent',
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                    	$("#S_ID").html(data[0].S_ID);
                    	$("#std_fname").html(data[0].std_fname);
                    	$("#std_lname").html(data[0].std_lname);
                    	$("#cur_name").html(data[0].cur_name);
                    	$("#dept_name").html(data[0].dept_name);
                    	$("#phone").html(data[0].phone);
                    	$("#email").html(data[0].email);    
                    	$("#dname").html(data[0].dname);
                    	$("#type_name").html(data[0].type_name);  

                    	
                    	
                    	
                    	//$("#email1").html(data[0].email);    	
                    },
                    error: function() {
                        alert('ไม่มีข้อมูล'); 
                    }
                });
            }

    function selectpersonnel() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/Std_info/selectpersonnel',
            async: false,
            dataType: 'json',
            success: function(data) {
            	$("#person_fname").html(data[0].person_fname);
            	$("#person_lname").html(data[0].person_lname);      
            	$("#position").html(data[0].position);       
            	$("#dept_name1").html(data[0].dept_name); 
               $("#cur_name1").html(data[0].cur_name); 
            	$("#phone1").html(data[0].phone1);
            	$("#email1").html(data[0].email);
            	

            },
            error: function() {
                alert('ไม่มีข้อมูล');
            }
        });
    }



    
    function selectvehiclesmotorcycle() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/Std_info/selectvehiclesmotorcycle',
            async: false,
            dataType: 'json',
            success: function(data) {
            	if(data == false){
            		$("#regist_num1").html('-');
                	$("#province").html('-');
                	$("#brand").html('-');
                	$("#color").html('-');
                	$("#regist_date").html('-');
                	$("#expired_date").html('-');

            	}else{
                	
                
     
            	$("#regist_num1").html(data[0].regist_num);
            	$("#province").html(data[0].province);
            	$("#brand").html(data[0].brand);
            	$("#color").html(data[0].color);
            	$("#regist_date").html(data[0].regist_date);
            	$("#expired_date").html(data[0].expired_date);
            	}
            
            }, 
            error: function() {
            	
                alert('ไม่มีข้อมูล');
            }
        }); 
    }
    function selectvehiclescar() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/Std_info/selectvehiclescar',
            async: false,
            dataType: 'json',
            success: function(data) {
     			if(data == false){
     				$("#regist_num2").html('-');
                	$("#province1").html('-');
                	$("#brand1").html('-');
                	$("#color1").html('-');
                	$("#regist_date1").html('-');
                	$("#expired_date1").html('-');



     			}else{
          
            	$("#regist_num2").html(data[0].regist_num);
            	$("#province1").html(data[0].province);
            	$("#brand1").html(data[0].brand);
            	$("#color1").html(data[0].color);
            	$("#regist_date1").html(data[0].regist_date);
            	$("#expired_date1").html(data[0].expired_date);
     			}
            	

            },
            error: function() {
                alert('ไม่มีข้อมูล');
            }
        }); 
    }
    });
</script>