<!doctype html>
<html lang="en">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<center>
<strong><div  class="alert alert-success" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-danger" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-warning" role="alert" style="display: none;"></div></strong>
</center>
<head>

    <title>ยานพาหนะ admin</title>

</head>

<body> 
    <meta charset="UTF-8">
    <div class="page-breadcrumb" id="nav_sty">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>
                <li class="breadcrumb-item active" aria-current="page">ยานพาหนะ</li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow mb-4">
            <div class="card-header" id="card_2">
                <h6 class="m-0 text-primary"><span><i class="fas fa-car-side"></i></span>&nbsp;ยานพาหนะ</h6>
            </div>
          
           
           

            <!--------------------------------->
            <!-- Modal ส่วน del -->

            <div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLongTitle"><span><i
                                        class="fa fa-exclamation-triangle"
                                        style="color:rgba(235,99,102,1.00)"></i></span>ลบข้อมูล</h2>
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
                                <button name="insert" type="reset" class="btn btn-secondary"
                                    data-dismiss="modal">ยกเลิก</button>
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
                                    <th>รหัสนักศึกษา</th>
                                    <th>รหัสยานพาหนะ</th>
                                    <th>เลขทะเบียนยานพาหนะ</th>
                                    <th>จังหวัด</th>
                                    <th>ยี่ห้อยานพาหนะ</th>
                                    <th>สียานพาหนะ</th>
                                    <th>ประเภทยานพาหนะ</th>
                                    <th>วันลงทะเบียนสติ๊กเกอร์</th>
                                    <th>วันหมดอายุสติ๊กเกอร์</th>
                                    

                                </tr>
                            </thead>
                            <tbody id="showdata">
                                <tr>
                                    <td width="10px"></td>
                                    <td></td>
                                    <td width="10px">
                                        <!--edit_file  del_file  -->
                                        <!--	<a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->v_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->

                                        <!--ส่วนของ madal จะใช้การจัดการด้วย id ส่วนของ data-target กับ id ของ class จะต้องเหมือนกัน -->

                                        <!-- <form action="<?php echo base_url(); ?>index.php/vehicles/edit" method="post" id="editform"  class="needs-validation" >  -->
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

        $("#v_ID").blur(function(){
            var flag;
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/vehicles/checkkey",
                data: "v_ID=" + $("#v_ID").val(),
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
						$("#v_ID").focus();
						
					}
                },
                error: function(xhr, status, exception) { alert(status); }
            });
            return flag;
        });
    	

        
        

        //เพิ่มข้อมูล
        
        $('#btnAdd').click(function() {
        	$('#formadd')[0].reset();
        	$("#msg1").empty();
            $('#exampleModalCenter').modal('show');
            $('#formadd').attr('action', '<?php echo base_url(); ?>index.php/vehicles/addvehicles');
        });

        $('#btnSave').click(function(){
			var url = $('#formadd').attr('action');
			var data = $('#formadd').serialize();
			//validate form
			var person_ID = $('input[name=txtID]');
			var person_fname = $('input[name=txtfname]');
			var person_lname = $('input[name=txtlname]');
            var position = $('input[name=txtpos]');
            var role = $('input[name=txtrole]');
            var email = $('input[name=txtemail]');
            var phone1 = $('input[name=txtphone1]');
            var phone2 = $('input[name=txtphone2]');
            var dept_ID = $('input[name=txtdept]');
            var cur_ID = $('input[name=txtcur]');
            var usertype_ID = $('input[name=txtusertype]');
            var username = $('input[name=txtusername]');
            var password = $('input[name=txtpass]');
            var status = $('input[name=txtstatus]');

			var result = '';
			
			if(person_ID.val()==''){
				person_ID.parent().parent().addClass('has-error');
			}else{
				person_ID.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(person_fname.val()==''){
				person_fname.parent().parent().addClass('has-error');
			}else{
				person_fname.parent().parent().removeClass('has-error');
				result +='2';
			}
			if(person_lname.val()==''){
				person_lname.parent().parent().addClass('has-error');
			}else{
				person_lname.parent().parent().removeClass('has-error');
				result +='3';
			}
            if(position.val()==''){
				position.parent().parent().addClass('has-error');
			}else{
				position.parent().parent().removeClass('has-error');
				result +='4';
			}

            if(role.val()==''){
				role.parent().parent().addClass('has-error');
			}else{
				role.parent().parent().removeClass('has-error');
				result +='5';
			}

            if(email.val()==''){
				email.parent().parent().addClass('has-error');
			}else{
				email.parent().parent().removeClass('has-error');
				result +='6';
			}

            if(phone1.val()==''){
				phone1.parent().parent().addClass('has-error');
			}else{
				phone1.parent().parent().removeClass('has-error');
				result +='7';
			}

            if(phone2.val()==''){
				phone2.parent().parent().addClass('has-error');
			}else{
				phone2.parent().parent().removeClass('has-error');
				result +='8';
			}

            if(dept_ID.val()==''){
				dept_ID.parent().parent().addClass('has-error');
			}else{
				dept_ID.parent().parent().removeClass('has-error');
				result +='9';
			}

            if(cur_ID.val()==''){
				cur_ID.parent().parent().addClass('has-error');
			}else{
				cur_ID.parent().parent().removeClass('has-error');
				result +='10';
			}

            if(usertype_ID.val()==''){
				usertype_ID.parent().parent().addClass('has-error');
			}else{
				usertype_ID.parent().parent().removeClass('has-error');
				result +='11';
			}

            if(username.val()==''){
				username.parent().parent().addClass('has-error');
			}else{
				username.parent().parent().removeClass('has-error');
				result +='12';
			}
            if(password.val()==''){
				password.parent().parent().addClass('has-error');
			}else{
				password.parent().parent().removeClass('has-error');
				result +='13';
			}
            if(status.val()==''){
				status.parent().parent().addClass('has-error');
			}else{
				status.parent().parent().removeClass('has-error');
				result +='14';
			}



			if(result=='12345678910111213'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#exampleModalCenter').modal('hide');
							 //$(this).find('#formadd')[0].reset();
							 
							$('#formadd')[0].reset();		
							$('.alert-success').html('บันทึกข้อมูลเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
							$('#textkey').empty();			
							$('#msg1').empty();
							showAll();
						}else{
							alert('Error');
						}
					},
					error: function(){
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
        $('#showdata').on('click', '.fa-edit', function() {
            var id = $(this).attr('data');
            var popup = document.getElementById("editimage");
            $('#edit_file').modal('show');
            $('#formupdate').attr('action', '<?php echo base_url() ?>index.php/vehicles/updatevehicles');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/vehicles/editvehicles',
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=txteditID]').val(data.place_ID);
                    $('input[name=txteditname]').val(data.place_name);
                    $('textarea[name=txteditdescription]').val(data.description);
                },
                error: function() {
                    alert('ไม่สามารถแก้ไขข้อมูล');
                }
            });
        });






        $('#btnedit').click(function(){
			var url = $('#formupdate').attr('action');
			var data = $('#formupdate').serialize();
			//validate form
			var place_ID = $('input[name=txteditID]');
			var place_name = $('input[name=txteditname]');
			var description = $('textarea[name=txteditdescription]');
			var result = '';
			
			if(place_ID.val()==''){
				place_ID.parent().parent().addClass('has-error');
			}else{
				place_ID.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(place_name.val()==''){
				place_name.parent().parent().addClass('has-error');
			}else{
				place_name.parent().parent().removeClass('has-error');
				result +='2';
			}
			if(description.val()==''){
				description.parent().parent().addClass('has-error');
			}else{
				description.parent().parent().removeClass('has-error');
				result +='3';
			}


			
			if(result=='123'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#edit_file').modal('hide');
							$('#formupdate')[0].reset();		
							$('.alert-warning').html('แก้ไขข้อมูลเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
							showAll();
						}else{
							alert('Error');
						}
					},
					
					error: function(){
						//alert('id นี้ถูกใช้งานแล้ว');
						$('#edit_file').modal('hide');
						$('#formupdate')[0].reset();		
						$('.alert-danger').html('แก้ไขเรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
						showAll();
					}
				});
			}
		});















        












        
        //ลบข้อมูล
        $('#showdata').on('click', '.fa-trash-alt', function() {
            var id = $(this).attr('data');
            $('#del_file').modal('show');
            //prevent previous handler - unbind()
            $('#formdelete').attr('action', '<?php echo base_url() ?>index.php/vehicles/deletevehicles');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/vehicles/editvehicles',
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#showddel').html('ต้องการลบสถานที่   "' + data.person_fname + '"');
                    $('input[name=txtdelID]').val(data.person_ID);
                },
                error: function() {
                    alert('ไม่สามารถลบข้อมูล');
                }
            });
        });






        $('#btndel').click(function(){
			var url = $('#formdelete').attr('action');
			var data = $('#formdelete').serialize();
			var place_ID = $('input[name=txtdelID]');
			var result = '';
			
			if(place_ID.val()==''){
				place_ID.parent().parent().addClass('has-error');
			}else{
				place_ID.parent().parent().removeClass('has-error');
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
        































        

        //แสดงข้อมูล
        function showAll() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/vehicles/showAll',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                        '<td>' + data[i].S_ID + '</td>' +
                            '<td>' + data[i].v_ID + '</td>' +
                            '<td>' + data[i].regist_num + '</td>' +
                            '<td>' + data[i].province + '</td>' +
                            '<td>' + data[i].brand + '</td>' +
                            '<td>' + data[i].color + '</td>' +
                            '<td>' + data[i].vetype_name + '</td>' +
                            '<td>' + data[i].regist_date + '</td>' +
                            '<td>' + data[i].expired_date + '</td>' +
                            //'<td>' + data[i].behavior_score + '</td>' +
                            // '<td>' + data[i].S_ID + '</td>' +
                            
                            


                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function() {
                    alert('ไม่มีข้อมูล');
                }
            });
        }
    });
    </script>
</body>
</html>