<!doctype html>
<html lang="en">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <center>
<strong><div  class="alert alert-success" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-danger" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-warning" role="alert" style="display: none;"></div></strong>
</center> 
<head> 

  <title>ฐานความผิด admin</title>

</head>
<body>
  <meta charset="UTF-8">
<div class="page-breadcrumb" id="nav_sty">
          <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>
                        <li class="breadcrumb-item active" aria-current="page">หอพัก</li>
                  </ol>
          </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
					<div class="card-header" id="card_2">
              			<h6 class="m-0 text-primary"><span><i class="fas fa-bed"></i></span>&nbsp;หอพัก</h6>
            		</div>
            		 

				<div class="card-body" id="card_1">
				<button type="button" id="btnAdd" class="btn btn-inverse-primary btn-fw" data-toggle="modal" >
									<span><i class="fas fa-plus" id="btnAdd"></i></span>เพิ่มหอพัก
				</button>
				&nbsp;
				</div>
			 <div id="myModal"  > </div>
					<!-- Modal เพิ่มข้อมูล-->
 
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">เพิ่มหอพัก</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">

		  <!--เพิ่มข้อมูล-->
		  
		  <form action="" id="formadd" method="post"  class="needs-validation" >
		  <center>
		  
		  <div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom01..'">รหัสหอพัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;
						<div class="col-lg-4">
                    <input type="text" name="dormID"  id="dorm_ID"class="form-control"  maxlength="2"  required>
			<div id="msg1"></div>
			<!--   <div id="msg2" style="color:red"></div>-->
			
			
				</div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom02..'">ชื่อหอพัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-9">
                    <input type="text" name="dormname"  class="form-control"  maxlength="20"  required>
			
			
			
	</div></div></div>
	<div class="form-group" id="input_group_sty" >
				<div class="input-group" >
					<label for="validationCustom02..'">ประเภทหอพัก </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					<div class="col-lg-4" >
					<select name="dormtype" id="dormtype" class="form-control"  required >
					<option value =""> เลือกประเภทหอพัก </option>
					</select>

      </div></div></div>
			
			</center>
			 <label for="person_acceept" class="lable">ที่ปรึกษาหอพัก: <span class="fixdata">*</span></label>

                                        <div class="margin-top:0.3rem;">
                                            <select class="form-control" name="person_ID" id="add_persennel" style="margin-left: 7rem;margin-top: -2.5rem;max-width: 250px!important;" required oninvalid="this.setCustomValidity('ระบุผู้รับรองกิจกรรม')" onchange="this.setCustomValidity('')"></select>
                                        </div>
                                        <br>
		  <!------------------>
 </div>
 
 
     
   
      <div class="modal-footer">
      <button  name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      <button  name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            
       
      </div>
 </form>
    </div>
  </div>
</div>


<!--------------------------------->


<!-- Modal แก้ไข edit -->

 <div class="modal fade" id="edit_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
        <div class="modal-header">
    <h2 class="modal-title" id="exampleModalLongTitle"><span><i class="fas fa-edit" style="color:#47307b;"></i></span>แก้ไขข้อมูล</h2>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
               </div>
       <div class="modal-body">

                   <!-- แก้ไข-->
            
                    <form action="" id="formupdate" method="post"  class="needs-validation" >
      <center>
     
                   <div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom01..'">รหัสหอพัก </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;
						<div class="col-lg-4">
                    <input type="text" name="dormeditID" id="dormeditID" readonly class="form-control"  maxlength="2"  required>
			
			
				</div></div></div>
    
				
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom02..'">ชื่อหอพัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-9">
                    <input type="text" name="dormeditname" id="dormeditname" class="form-control"  maxlength="100"  required>
			
	 </div></div></div>
	  <div class="form-group" id="input_group_sty" >
				<div class="input-group" >
				
					<label for="validationCustom02..'">ประเภทหอพัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					<div class="col-lg-4" >
					<select name="dormedittype" id="dormedittype"class="form-control"   >
					<option value =""> เลือกประเภทหอพัก </optio>
					</select>

      </div></div></div>
<!-- 	 <div class="form-group" id="input_group_sty"> -->
<!-- 				<div class="input-group" > -->
				
<!-- 						<label for="validationCustom02..'">ปรึกษาหอพัก  </label> -->
<!-- 					<p class="text-danger">&nbsp;&nbsp;*</p> -->
<!-- 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- 					<div class="col-lg-4"> -->
<!--                     <input type="text" name="dormedittxt" id="dormedittxt" class="form-control"  maxlength="10"  required> -->
<!--                                         </div> -->
                              
			
		 <div class="form-group" id="input_group_sty" >
				<div class="input-group" >
				
					<label for="validationCustom02..'">ประเภทหอพัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					<div class="col-lg-4" >
					   <select class="form-control" name="dormedittxt" id="dormedittxt" style="width: 240px;" required oninvalid="this.setCustomValidity('ระบุผู้รับรองกิจกรรม')" onchange="this.setCustomValidity('')"></select>

      </div></div></div>		
				
				
      

      <!------------------>
 </div>
     
     
   
      <div class="modal-footer">
      <button  name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
     <button  name="btnedit" type="button" id="btnedit"class="btn btn-success">บันทึกข้อมูล</button>
            
       
      </div>
 </form>
                                                        </div>
                                                      </div>
                                                    </div>







 

<!--------------------------------->




 <!-- Modal ลบ del -->
                             
                                    
                                    <div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h2 class="modal-title" id="exampleModalLongTitle"><span><i class="fa fa-exclamation-triangle" style="color:rgba(235,99,102,1.00)"></i></span>ลบข้อมูล</h2>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <!--ลบ-->
                                                          <form action="" id="formdelete" method="post"  class="needs-validation" >
                                                          <div class="modal-body" id="showdel">

                                                          <!--ลบ-->
                                                          
      <center >
          <div id="showddel"></div>
        <input  type="hidden" name="dormdelID" > 
        
      </center>
       
      <!------------------>
 </div>
     
   
      <div class="modal-footer">
      <button  name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      <button  name="btndel" type="button" id="btndel" class="btn btn-danger btn-fw">ลบ</button>
            
       
      </div>
 </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                 
                                      <!------------------>

 <!-- Modal ???? select -->

				<div class="card-body">
			<div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="style_table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>รหัสหอพัก</th>
                                                    <th>ชื่อหอพัก</th>
                                                    <th>ประเภทหอพัก</th>        
                                                    <th>ที่ปรึกษาหอพัก</th>                                   
													<th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody id="showdata">

                                                <tr>

                                                    <td width="10px"></td>
                                                    <td></td>
                                                    <td width="10px">
                                                    
														<!--edit_file  del_file  -->
													<!--	<a href="<?php echo base_url().'index.php/dormitory/edit?id='.$rec->dorm_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/dormitory/edit?id='.$rec->dorm_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->dorm_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/dormitory/edit?id='.$rec->dorm_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->
			
                                  

                           
                                     <!-- <form action="<?php echo base_url(); ?>index.php/dormitory/edit" method="post" id="editform"  class="needs-validation" >  -->
                                   
                                      <!------------------>
								   					                        </td>

                                                </tr>
                                             
							
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>

			</div>




	  		</div>



		  </div>
<script>
$(document).ready(function() {
    select_user_accept();
    show_all();
    $("#add_persennel").select2({
        placeholder: "ค้นหาผู้รับรองกิจกรรม",
        allowClear: true,
    });
});
function select_user_accept() {
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url("Dormitory/selectperson") ?>',
        async: false,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var html = '';
            html += '<option selected>เลือกผู้รับรอง</option>';
            $.each(data, function(key, value) {
                html += '<option value="' + value.person_ID + '">' + value.person_fname + " " + value.person_lname + '</option>';
                $('#add_persennel').html(html);
            });
        }
    });
}
// $(document).ready(function() {
//     select_user_accept2();
//     show_all();
//     $("#dormedittxt").select2({
//         placeholder: "ค้นหาผู้รับรองกิจกรรม",
//         allowClear: true,
//     });
// });
// function select_user_accept2() {
//     $.ajax({
//         type: 'POST',
        url: '<?php echo site_url("Dormitory/selectperson") ?>',
//         async: false,
//         dataType: 'json',
//         success: function(data) {
//             console.log(data);
//             var html = '';
//             html += '<option selected>เลือกผู้รับรอง</option>';
//             $.each(data, function(key, value) {
//                 html += '<option value="' + value.person_ID + '">' + value.person_fname + " " + value.person_lname + '</option>';
//                 $('#dormedittxt').html(html);
//             });
//         }
//     });
// }
$(document).ready(function(){
    showAll();
    
    $("#dorm_ID").blur(function(){
        var flag;
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/dormitory/checkkey",
            data: "dorm_ID=" + $("#dorm_ID").val(),
            type: 'ajax',
            method: 'post',
            async:false,
            dataType: 'json',
            success: function(data) { 
            	$("#msg1").empty();
                //alert(data)
            	if(data == true){
                     $("#msg1").html('<div style="color:green">สามารถใช้งานได้</div>'); 
				}else{
					$("#msg1").html('<div style="color:red">ไม่สามารถใช้งานได้</div>');
					$("#dorm_ID").focus();
					
				}
            },
            error: function(xhr, status, exception) { alert(status); }
        });
        return flag;
    });
	

    //เพิ่ม

    $('#btnAdd').click(function(){
      $('#formadd')[0].reset();
      $("#msg1").empty();
      $('#exampleModalCenter').modal('show');
      $('#formadd').attr('action', '<?php echo base_url(); ?>index.php/dormitory/adddormitory');
    });
  

    $('#btnSave').click(function(){
      var url = $('#formadd').attr('action');
      var data = $('#formadd').serialize();
      //validate form
        var dorm_ID = $('input[name=dormID]');
		var dname = $('input[name=dormname]');
		var dormtype_ID = $('textarea[name=dormtype]');
		var person_ID = $('input[name=dormtxt]');
		var result = '';
		 
    if(result==''){
        $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: url,
                        data: data,
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                $('#exampleModalCenter').modal('hide');
                                //$(this).find('#formadd')[0].reset();

                                $('#formadd')[0].reset();
                                $('.alert-success').html('บันทึกข้อมูลเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
                                $('#msg1').empty();
                                showAll();
                            }
                            else if (response.success == "falsename") {
                                $('#exampleModalCenter').modal('hide');
                                //$(this).find('#formadd')[0].reset();

                                $('#formadd')[0].reset();
                                $('.alert-warning').html('มีชื่อนี้ในระบบแล้ว').fadeIn().delay(2000).fadeOut('slow');
                                $('#msg1').empty();
                                showAll();
                            } else {
                                alert('Error');
                            }
                        },
                        error: function() {
                            alert('id นี้ถูกใช้งานแล้ว');
                            $('#exampleModalCenter').modal('hide');
                            $('#formadd')[0].reset();
                            //$('#nav_sty')[0].reset();		
                            $('.alert-danger').html('id นี้ถูกใช้งานแล้ว').fadeIn().delay(2000).fadeOut('slow');
                            $('#msg1').empty();
                            showAll();
                        }
                    });
                }
            });

    //แก้ไข.
  $('#showdata').on('click', '.edit_data', function() {
            var id = $(this).attr('data');
            var popup = document.getElementById("editimage");
            $('#edit_file').modal('show');
            $('#formupdate').attr('action',
    	      '<?php echo base_url() ?>index.php/dormitory/updatedormitory');
            $.ajax({
                type: 'ajax', 
                method: 'get',
                url: '<?php echo base_url() ?>index.php/dormitory/editdormitory',
                data: {id: id },
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=dormeditID]').val(data.dorm_ID);
          $('input[name=dormeditname]').val(data.dname);
          $('input[name=dormedittype]').val(data.dormtype_ID);
          $('input[name=dormedittxt]').val(data.person_ID);

        },
        error: function(){
          alert('ไม่สามารถแก้ไขข้อมูล');
        }
      });
    }); 
 
  $('#btnedit').click(function(){
  	var url = $('#formupdate').attr('action');
		var data = $('#formupdate').serialize();
    var x = document.forms["formupdate"]["dormeditID"].value;
    var w = document.forms["formupdate"]["dormeditname"].value;
    var e = document.forms["formupdate"]["dormedittype"].value;
    var r = document.forms["formupdate"]["dormedittxt"].value;
                 console.log(x)
                 console.log(w)
                 console.log(e)
                 console.log(r)
		//validate form
    var dorm_ID = $('input[name=dormeditID]');
		var dname = $('input[name=dormeditname]');
		var dormtype_ID = $('textarea[name=dormedittype]');
		var person_ID = $('input[name=dormedittxt]');
		var result = '';
    if(result==''){
        $.ajax({
   
                        type: 'ajax',
                        method: 'post',
                        url: url,
                        data: data,
                        async: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                $('#edit_file').modal('hide');
                                $('#formupdate')[0].reset();
                                $('.alert-warning').html('แก้ไขข้อมูลเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
                                showAll();

                            }  else if(response.success == "falsename") {
                                $('#edit_file').modal('hide');
                                $('#formupdate')[0].reset();
                                $('.alert-warning').html('มีชื่อนี้ในระบบแล้ว').fadeIn().delay(2000).fadeOut('slow');
                                $('#msg1').empty();
                                showAll();
                                
                            } else {
                                alert('Error');
                            }
                        },

                        error: function() {
                            //alert('id นี้ถูกใช้งานแล้ว');
                            $('#edit_file').modal('hide');
                            $('#formupdate')[0].reset();
                            $('.alert-danger').html('ไม่สามารถแก้ไขได้').fadeIn().delay(2000).fadeOut('slow');
                            showAll();
                        }
                    });
                }
            });




    //ลบ
    $('#showdata').on('click', '.del_data', function(){
      var id = $(this).attr('data');
      $('#del_file').modal('show');
      //prevent previous handler - unbind()
       $('#formdelete').attr('action', '<?php echo base_url() ?>index.php/dormitory/deletedormitory');
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/dormitory/editdormitory',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data) {
            $('#showddel').html('ต้องการลบหอพัก   "'+data.dname+'"');  
            $('input[name=dormdelID]').val(data.dorm_ID);
        },
          error: function(){
            alert('ไม่สามารถลบข้อมูล');
          }
        });
      }); 
    
    $('#btndel').click(function(){
		var url = $('#formdelete').attr('action');
		var data = $('#formdelete').serialize();
		var dorm_ID = $('input[name=dormdelID]');
		var result = '';
		
		if(dorm_ID.val()==''){
			dorm_ID.parent().parent().addClass('has-error');
		}else{
			dorm_ID.parent().parent().removeClass('has-error');
			result +='1';
		}
		if(result=='1'){
			$.ajax({
				type: 'ajax',
				method: 'post',
				url: url,
				data: data,
				async: false,
				dataType: 'json',
				success: function(response){
					if(response.success){
						$('#del_file').modal('hide');
						$('#formdelete')[0].reset();		
						$('.alert-danger').html('ลบข้อมูลเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
						//$('#formdelete').empty();
						showAll();
					}else{
						alert('Error');
					}
				},
				
				error: function(){
					//alert('id นี้ถูกใช้งานแล้ว');
					$('#del_file').modal('hide');
					$('#formdelete')[0].reset();		
					$('.alert-danger').html('แก้ไขเรียบร้อย').fadeIn().delay(5000).fadeOut('slow');
					showAll();
				}
			});
		}
	});
    $.ajax({
        type: 'ajax',
        url: '<?php echo site_url("dormitory/selectdormitory") ?>',
        dataType: 'json',
        success: function(data) {
         
            for (i = 0; i < data.length; i++) {
               
                
                $('#dormtype').append('<option value="' + data[i].dormtype_ID + '">' + data[i].type_name + '</option>');
                $('#dormedittype').append('<option value="' + data[i].dormtype_ID + '">' + data[i].type_name + '</option>');
            }
        }
    });

 



    //แสดง
    
    function showAll(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/dormitory/showAll',
        async: false,
        dataType: 'json',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html +='<tr>'+
            	  '<td>'+data[i].dorm_ID+'</td>'+
                  '<td>'+data[i].dname+'</td>'+
                  '<td>'+data[i].dormtype_ID+'</td>'+
                  '<td>'+data[i].person_fname+" "+data[i].person_lname+'</td>'+
                  
                  

                  '<td> <button type="button" class="btn btn-inverse-secondary btn-rounded btn-fw edit_data" data='+ data[i].dorm_ID +'>แก้ไขข้อมูล</button> <button type="button" class="btn btn-danger btn-rounded btn-fw del_data" data='+ data[i].dorm_ID +'>ลบข้อมูล</button></td>'
                  + 
                  '</tr>';
          }
          $('#showdata').html(html);
        },
        error: function(){
          alert('ไม่มีข้อมูล');
        }
      });
    }
  });
</script>


</body>

</html>