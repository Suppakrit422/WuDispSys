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
                        <li class="breadcrumb-item active" aria-current="page">ฐานความผิด</li>
                  </ol>
          </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
					<div class="card-header" id="card_2">
              			<h6 class="m-0 text-primary"><span><i class="fas fa-ban"></i></span>&nbsp;ฐานความผิด</h6>
            		</div>
            		 

				<div class="card-body" id="card_1">
				<button type="button" id="btnAdd" class="btn btn-inverse-primary btn-fw" data-toggle="modal" >
									<span><i class="fas fa-plus" id="btnAdd"></i></span>เพิ่มฐานความผิด
				</button>
				&nbsp;
				</div>
			 <div id="myModal"  > </div>
					<!-- Modal เพิ่มข้อมูล -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 620px!important;" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">เพิ่มฐานความผิด</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">
		  <!--ส่วนฟอร์มเพิ่มข้อมูล--> 
           <form action="" id="formadd" method="post"  class="needs-validation" >
		  <center>
		  <div class="form-group" id="input_group_sty" >
				<div class="input-group" >
				
					<label for="validationCustom02..'">รหัสหมวดความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					<div class="col-lg-9" >
					<select name="txt_oc" id="txt_oc" class="form-control">
                  <option value="">เลือกหมวดความผิด</option>
                  </select>
					
      </div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
						<label for="validationCustom01..'">รหัสฐานความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;
						<div class="col-lg-4">
                    <input type="text" name="txtID"  id="off_ID"class="form-control"  maxlength="3" onkeyup="count_down_id(this);" required>
			<div id="msg1"></div>
                                               
			
			
			
			
				</div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
						<label for="validationCustom02..'">ชื่อฐานความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-9">
                    <input type="text" name="txtname"  class="form-control"  maxlength="100" onkeyup="count_downname(this);" required>
			
		
		   
			
			
				
				</div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
						<label for="validationCustom02..'">คะแนนที่หัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-3">
                    <input type="text" name="txtpoint"  class="form-control"  maxlength="2" onkeyup="count_downpoint(this);" required>

				</div>
				<!-- <div class="form-group sty_a" id="textkey">
                                            <span id="count5">0</span>
                                            <span>/</span>
                                            <span id="count6" style="color:#6699ff;">100</span>
                                        </div>

                                        <!-- Alert for the number of characters
                                        
                                        <script>
                                        function count_downdescription(obj) {
                                            document.getElementById('count5').innerHTML = obj.value.length;
                                            var element = document.getElementById('count6');

                                            element.innerHTML = 100 - obj.value.length;
                                            if (100 - obj.value.length == 0) {
                                                element.style.color = 'red';

                                            } else {
                                                element.style.color = '#6699ff';
                                            }
                                        }
                                        </script>
                                        
                                    </div>
				  -->
			</center>
			 
		  <!------------------>
 </div>
 
 
     
   
      <div class="modal-footer">
      <button  name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      <button  name="btnSave" id="btnSave" type="button" class="btn btn-success">บันทึกข้อมูล</button>
            
       
      </div>
 </form>
    </div>
  </div>
</div>


<!--------------------------------->


<!-- Modal ส่วน edit -->


 <div class="modal fade" id="edit_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered"style="max-width: 620px!important;" role="document">
           <div class="modal-content">
        <div class="modal-header">
    <h2 class="modal-title" id="exampleModalLongTitle"><span><i class="fas fa-edit" style="color:#47307b;"></i></span>แก้ไขข้อมูล</h2>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
               </div>
       <div class="modal-body">

                   <!--ส่วนฟอร์มแก้ไขข้อมูล-->
     <form action="" id="formupdate" method="post"  class="needs-validation" >
      <center>
      <div class="form-group" id="input_group_sty" >
				<div class="input-group" >
				
					<label for="validationCustom02..'">รหัสหมวดความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					<div class="col-lg-9" >
					<select name="txteditoc" id="txteditoc" class="form-control">
                  	<option value="">เลือกหมวดความผิด</</option>
                  	</select>
					
                   
      </div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
						<label for="validationCustom01..'">รหัสฐานความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;
						<div class="col-lg-4">
                    <input type="hidden" readonly name="txteditID" id="txteditID"  class="form-control"  maxlength="3" onkeyup="count_down_editid(this);" required>
			
			
			
			
			
				</div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom02..'">ชื่อฐานความผิด  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-9">
                    <input type="text" name="txteditname" id="txteditname"  class="form-control"  maxlength="100" onkeyup="count_downeditname(this);" required>
			
		
		   
			
			
				
				</div></div></div>
				<div class="form-group" id="input_group_sty">
				<div class="input-group" >
				
						<label for="validationCustom02..'">คะแนนที่หัก  </label>
					<p class="text-danger">&nbsp;&nbsp;*</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="col-lg-3">
                    <input type="text" readonly name="txteditpoint" id="txteditpoint"  class="form-control"  maxlength="2" onkeyup="count_downeditpoint(this);" required>
			    </div>
                                        
                                        <!--  
                                        <div class="form-group sty_a">
                                            <span id="count11">0</span>
                                            <span>/</span>
                                            <span id="count12" style="color:#6699ff;">100</span>
                                        </div>

                                        <!-- Alert for the number of characters
                                        <script>
                                        function count_down_editdescription(obj) {

                                            document.getElementById('count11').innerHTML = obj.value.length;
                                            var element = document.getElementById('count12');

                                            element.innerHTML = 100 - obj.value.length;
                                            if (100 - obj.value.length == 0) {
                                                element.style.color = 'red';

                                            } else {
                                                element.style.color = '#6699ff';
                                            }
                                        }
                                        </script>
                                    </div>
                                    -->
		
			
				
				
      </center>
       
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




 <!-- Modal ส่วน del -->
 <div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLongTitle"><span><i class="fa fa-exclamation-triangle" style="color:rgba(235,99,102,1.00)"></i></span>ลบข้อมูล</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--ส่วนฟอร์มลบข้อมูล-->
                        <form action="" id="formdelete" method="post" class="needs-validation">
                            <div class="modal-body" id="showdel">

                                <!--ข้อความยืนยันการลบข้อมูล-->
                                <center>
                                    <div id="showddel"></div>
                                    <input type="hidden" name="txtdelID">
                                </center>
                                <!------------------>
                            </div>

                            <div class="modal-footer">
                                <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button name="btndel" id="btndel" type="button" class="btn btn-danger btn-fw">ลบ</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
                                                 
                                      <!------------------>







 <!-- Modal ส่วน select -->

				<div class="card-body">
			<div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="style_table" class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th>หมวดความผิด</th>
                                                    <th>รหัสฐานความผิด</th>
                                                    <th>ชื่อฐานความผิด</th>
                                                    <th>คะแนนที่หัก</th>
													<th>จัดการ</th>

                                                </tr>
                                            </thead>
                                            <tbody id="showdata">

                                                <tr>

                                                    <td width="10px"></td>
                                                    <td></td>
                                                    <td width="10px">
                                                    
														<!--edit_file  del_file  -->
													<!--	<a href="<?php echo base_url().'index.php/offense/edit?id='.$rec->off_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/offense/edit?id='.$rec->off_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->off_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/offense/edit?id='.$rec->off_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->
			
                                    <!--ส่วนของ madal จะใช้การจัดการด้วย id ส่วนของ data-target กับ id ของ class จะต้องเหมือนกัน -->

                                     <!-- <form action="<?php echo base_url(); ?>index.php/offense/edit" method="post" id="editform"  class="needs-validation" >  -->
                                   
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
 
$(document).ready(function(){
    showAll();
    
    $("#off_ID").blur(function(){
        var flag;
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/offense/checkkey",
            data: "off_ID=" + $("#off_ID").val(),
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
					$("#off_ID").focus();
					
				}
            },
            error: function(xhr, status, exception) { alert(status); }
        });
        return flag;
    });
	

    //เพิ่มข้อมูล

    $('#btnAdd').click(function(){
      $('#formadd')[0].reset();
      $("#msg1").empty();
      $('#exampleModalCenter').modal('show');
      $('#formadd').attr('action', '<?php echo base_url(); ?>index.php/offense/addoffense');
    });


    $('#btnSave').click(function(){
      var url = $('#formadd').attr('action');
      var data = $('#formadd').serialize();
      //validate form
        var off_ID = $('input[name=txtID]');
		var off_desc = $('input[name=txtname]');
		var point = $('input[name=txtpoint]');
		var oc_ID = $('select[name=txt_oc]');
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

    //แก้ไขข้อมูล
    $('#showdata').on('click', '.edit_data', function(){
        var id = $(this).attr('data');
      var popup = document.getElementById("editimage");
      $('#edit_file').modal('show');
      $('#formupdate').attr('action', '<?php echo base_url() ?>index.php/offense/updateoffense');
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/offense/editoffense',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
          $('input[name=txteditID]').val(data.off_ID);
          $('input[name=txteditname]').val(data.off_desc);
          $('input[name=txteditpoint]').val(data.point);
          $('select[name=txteditoc]').val(data.oc_ID);

        },
        error: function(){
          alert('ไม่สามารถแก้ไขข้อมูล');
        }
      });
    });
 
        $('#btnedit').click(function(){
     var url = $('#formupdate').attr('action');
     var data = $('#formupdate').serialize();
     //validate form
        var off_ID = $('input[name=txteditID]');
		var off_desc = $('input[name=txteditname]');
		var point = $('input[name=txteditpoint]');
		var oc_ID = $('select[name=txteditoc]');
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


   

    //ลบข้อมูล
    $('#showdata').on('click', '.del_data', function(){
      var id = $(this).attr('data');
      $('#del_file').modal('show');
      //prevent previous handler - unbind()
       $('#formdelete').attr('action', '<?php echo base_url() ?>index.php/offense/deleteoffense');
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/offense/editoffense',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
            $('#showddel').html('ต้องการลบฐานความผิด   "'+data.off_desc+'"');  
            $('input[name=txtdelID]').val(data.off_ID);
        },
          error: function(){
            alert('ไม่สามารถลบข้อมูล');
          }
        });
      });
    
    $('#btndel').click(function(){
		var url = $('#formdelete').attr('action');
		var data = $('#formdelete').serialize();
		var off_ID = $('input[name=txtdelID]');
		var result = '';
		

		if(result==''){
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
        url: '<?php echo site_url("Offense/selectoffensecate") ?>',
        dataType: 'json',
        success: function(data) {
            //alert(data[0].oc_ID);
            for (i = 0; i < data.length; i++) {
                //alert(data[i].oc_ID+data[i].oc_desc);
                
                $('#txt_oc').append('<option value="' + data[i].oc_ID + '">' + data[i].oc_desc + '</option>');
                $('#txteditoc').append('<option value="' + data[i].oc_ID + '">' + data[i].oc_desc + '</option>');
            }
        }
    });
 


    //แสดงข้อมูล
    function showAll(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/offense/showAll',
        async: false,
        dataType: 'json',
        success: function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html +='<tr>'+
            	  '<td>'+data[i].oc_desc+'</td>'+
                  '<td>'+data[i].off_ID+'</td>'+
                  '<td>'+data[i].off_desc+'</td>'+
                  '<td>'+data[i].point+'</td>'+
                  
                

                  '<td> <button type="button" class="btn btn-inverse-secondary btn-rounded btn-fw edit_data" data='+ data[i].off_ID +'>แก้ไขข้อมูล</button> <button type="button" class="btn btn-danger btn-rounded btn-fw del_data" data='+ data[i].off_ID +'>ลบข้อมูล</button></td>'
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