<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<center>
<strong><div  class="alert alert-success" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-danger" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-warning" role="alert" style="display: none;"></div></strong>
</center>
<head>
 
 
  <title>รายงานกระทำความผิด</title>
<style> 
        input.largerCheckbox { 
            width: 20px; 
            height: 20px; 
        } 
         .content {
            font-family: 'Sarabun', sans-serif;
        }
        .text_position {
            padding-left: 0.9rem;
            font-size: 0.9rem;
        }
        label.label_txt {
            padding: inherit;
            font-weight: 900;
        }
    </style> 
</head>
<body>
  <meta charset="UTF-8">
  <div class="page-breadcrumb" id="nav_sty">
          <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item">รายงานกระทำความผิด</li>
                      
                  </ol>
          </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
          <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span  class=""></span>&nbsp;รายงานกระทำความผิด</h6>
                </div>              

           <!-- Modal เพิ่มข้อมูล -->
           
           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered"style="max-width: 650px!important;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                            <h4 class="modal-title" id="exampleModalLongTitle">การอุทธรณ์ความผิด</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                           <form action="" id="formadd" name="formadd" method="post" >  
                           <center>
                           <div class="row">
                           <div class="col-sm-12">
                            <div class="input-group">
                          <label class="label_txt">วันที่บันทึกหลักฐาน.  :&nbsp; </label>
                         <input type="text" style="background-color:transparent;border:0px;"  name="proof_date" id="proof_date" value="<?php echo date('Y-m-d')?>">
                            <input type="hidden" name="report_ID" > 
                              <input type="hidden" name="S_ID" > 
                                <input type="hidden" name="person_ID" > 
                              </div>
                                   <br>
                          <div class="row">
                           <div class="col-sm-12">
                           <div class="input-group">
                           <label class="label_txt">คำอธิบายการอุทธรณ์ความผิด  <label class="text-danger">*</label>:&nbsp; </label>
                           <textarea name="Explanation" id="Explanation" rows="5" class="form-control" maxlength="100"></textarea>
                        
                           </div></div>
                          </div><br>
                          <div class="row">
                           <div class="col-sm-12">
                           <div class="input-group">
                           <label class="label_txt">แนบไฟล์หลักฐานการอุทธรณ์ความผิด :&nbsp; </label> 
                           <input type="file" name="proof_name" id="proof_name">
                          
                         
                          </div></div>
                           
                           
                           </center>
                     
                        </div>
         <div class="modal-footer">
                            <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        </div>
						</form> 
                                                        </div>
                                                      </div>
                                                    </div>

<!-- Modal ส่วน edit -->

<!--------------------------------->

<div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 650px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><span><i style="color:rgba(235,99,102,1.00)"></i></span>ใบสั่งการกระทำความผิด</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <div class="modal-body content">

                            <!--ส่วนฟอร์มแก้ไขข้อมูล-->
                            <form action="" id="formdelete" method="get" class="needs-validation">
                            
                                <center>
                                    <div class="row">
                                    <div class="col-sm-4">
                                     <div class="input-group">
                                    <label class="label_txt">วันที่กระทำผิด:&nbsp;</label>
                                    <p class="text_position" id="committed_date"></p></div></div>
                                    <div class="col-sm-8">
                                     <div class="input-group">
                                    <label class="label_txt">เวลา:&nbsp;</label>
                                    <p class="text_position" id="committed_time"></p>
                                      </div></div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                     <label class="label_txt">สถานที่:&nbsp;</label>
                                     <p class="text_position" id="place_name"></p>
                                      </div></div>  
                                    </div>
                                     <div class="row">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                      <label class="label_txt">คำอธิบายบริเวณที่เกิดเหตุ:&nbsp;</label>
                                      <p class="text_position" id="explanation"></p>
                                      </div></div>  
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                      <label class="label_txt">ฐานความผิด:&nbsp;</label>
                                      <p class="text_position" id="off_desc"></p>
                                         </div></div>  
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <div class="input-group">
                                      <label class="label_txt">ไฟล์หลักฐาน :&nbsp;</label>
                                       <p class="text_position" id="evidenre_name"></p>
                                         </div></div>  
                                    </div>
                                   
                                </center>
                               </form>
                        </div>
      

      <!--ข้อความยืนยันการลบข้อมูล-->
      <form action="" id="formdelete" method="post"  class="needs-validation" >
        <div class="modal-body" id="showdel">
        <center >
          <label id="showddel"></label>
        <input type="hidden" name="txtdelID" > 
        
      </center>
       
      <!------------------>
 </div>

 </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                               
 <!-- Modal ส่วน select -->

        <div class="card-body">
      <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="style_table" class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th>ลำดับที่</th>
                                                    <th>วันที่กระทำความผิด</th>
                                                    <th>ฐานความผิด</th>
                                                    <th>รายละเอียด</th>
                                                      <th>ยืนยันการกระทำผิด</th>
                                                        <th>ส่งหลักฐานอุทธรณ์</th>
                                                       
                                                  

                                                </tr>
                                            </thead>
                                            <tbody id="showdata">

                                                <tr>

                                                    <td width="10px"></td>
                                                    <td></td>
                                                    <td width="10px">
                             <!--edit_file  del_file  -->
                                        <!--	<a href="<?php echo base_url().'index.php/offensecate/edit?id='.$rec->oc_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/offensecate/edit?id='.$rec->oc_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->oc_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/offensecate/edit?id='.$rec->oc_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->

                                        <!--ส่วนของ madal จะใช้การจัดการด้วย id ส่วนของ data-target กับ id ของ class จะต้องเหมือนกัน -->
                                        <!-- <form action="<?php echo base_url(); ?>index.php/offensecate/edit" method="post" id="editform"  class="needs-validation" >  -->
                                          <!------------------>
                                                    </td>
                                               

                                                </tr>
                                             
              
                                            </tbody>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                            <td></td>
                                                      <td>
                                     <div class="card-body " id="card_1">
        							 <button type="button" id="text1" style="display:none" class="btn btn-success btn-fw" data-toggle="modal" >
                  					 <i"></i>ยืนยัน </button>
       								 </div></td>
           
                                                         
                                        </table>
                                       
                                    </div>
                                </div>

      </div>
      </div>
</div>


<script>
  /*
    $(document).ready(function(){
$("#edit_file").modal("show");

    });*/
    $(function(){

  
showAll();
$('#text1').click(function() {
  alert(cars)

 });

$('#showdata').on('click', '.btnbutton', function() {
    var id = $(this).attr('data');
    console.log(id);
   // alert(id)
    $('#exampleModalCenter').modal('show');
    $('#formadd').attr('action',  '<?php echo base_url() ?>index.php/OffenseHead/insertproofargument');
    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/OffenseHead/selectoffenseforinsert',
        data: {
            id: id
        },
        async: false,
        dataType: 'json',
        success: function(data) {
          console.log (data)
          $('input[name=report_ID]').val(data.report_ID);
            $('input[name=S_ID]').val(data.S_ID);
            $('input[name=person_ID]').val(data.person_ID);
     
        
        },
        error: function() {
            alert('ไม่สามารถแก้ไขข้อมูล');
        }
    });
});


$('#btnSave').click(function() {
    var url = $('#formadd').attr('action');
    var data = $('#formadd').serialize();

   // var result = '';


        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(response) {
               if (response.success) {
                    $('#exampleModalCenter').modal('hide');
                    $('#formadd')[0].reset();
                    $('.alert-success').html('ยื่นอุธรณ์เรียบร้อย').fadeIn().delay(2000).fadeOut('slow');
                   showAll();
                } else {
                  //  alert('Error');
                }
            },

            error: function() {
                //alert('id นี้ถูกใช้งานแล้ว');
                $('#edit_file').modal('hide');
                $('#formadd')[0].reset();
                $('.alert-danger').html('ไม่สามารถแก้ไขได้').fadeIn().delay(2000).fadeOut('slow');
                showAll();
            }
        });
    
});






$('#showdata').on('click', '.btnSave', function() {
    var id = $(this).attr('data');
    $('#exampleModalCenter').modal('show');
    //prevent previous handler - unbind()
    $('#formadd').attr('action',
        '<?php echo base_url() ?>index.php/OffenseHead/insertproofargument');
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/OffenseHead/selectoffenseforinsert',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data) {
        	 // alert(data);
        	 console.log(data)
           // $('#showddel').html('ต้องการลบหมวดความผิด   "' + data.oc_desc + '"');
        	 $("#report_ID").html(data.report_ID);
              $("#S_ID").html(data.S_ID);
              $('#person_ID').html(data.person_ID);
    
             
        },
        error: function() {
            alert('ไม่สามารถลบข้อมูล');
        }
    });
});




/*
//เพิ่มข้อมูล
 $('#btnbutton').click(function() {    
        $('#exampleModalCenter').modal('show');
        var id = $(this).attr('data');
        alert(id)
       
    });
*/

// $('#btnSave').click(function() {

 //    var form_data = $('#formadd').serialize();
 //    console.log(form_data);
     
 //    $.ajax({
  //       type: 'ajax',
  //       method: 'post',
   //      url: '<?php echo site_url("OffenseHead/insertproofargument") ?>',
  //       data: form_data,
  //       async: false,
         /*dataType: 'json',*/
  //       success: function(data) {
  //         alert(data);
          
             //alert("Sucess updata !!")
   //          location.reload();
 //        }
//
 //    });

// });
 
    //delete- 
    $('#showdata').on('click', '.del_data', function(){
      var id = $(this).attr('data');
    //  alert(id)
      $('#del_file').modal('show');
      //prevent previous handler - unbind()
       //$('#formdelete').attr('action', '<?php echo base_url() ?>index.php/holiday1/deleteholiday');
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/OffenseHead/selectoffenseorder',
        data: {id: id},
        async: false,
        dataType: 'json',
        success: function(data){
           //console.log(data);
           //$('#showddel').html('"'+data.offensestd_ID+'"');
          // $("#std_fname").html("Hello");
           $("#std_fname").html(data.std_fname);
           $("#std_lname").html(data.std_lname);
           $('#committed_date').html(data.committed_date);
           $('#committed_time').html(data.committed_time);
           $('#explanation').html(data.explanation);
           $('#off_desc').html(data.off_desc);
           $('#place_name').html(data.place_name);
           $('#evidenre_name').html(data.evidenre_name);

     
    
           $('.content').html(html);
           //$("#std_fname").html(data.oh_ID); 
           // $('input[name=txtdelID]').val(data.hh_ID);
            
        },
          error: function(){
            alert('ไม่สามารถลบข้อมูล');
          }
        });
      });

    
   

      function showAll(){
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/OffenseHead/selectstudentoffensehead',
            async: false,
            dataType: 'json',
            success: function(data){
              console.log(data);
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html +='<tr>'+
                      '<td>'+(i+1)+'</td>'+
                      '<td>'+ data[i].committed_date +'</td>'+
                      '<td>'+ data[i].off_desc +'</td>'+
                      '<td align="center"> <i style="color:rgba(67, 135, 254);font-size:1.5rem;" class="fa fa-file-text btn-fw del_data" data=' + data[i].offensestd_ID  + '></i></td>' +
                      '<td align="center"><input type="checkbox"  id="chkCon"   value="'+data[i].offensestd_ID+'" name="chkCon" onclick="show_text(this);check(this);"  class="largerCheckbox" data='+ data[i].offensestd_ID + '></td>'+
                      '<td align="center"><i  style="color:rgba(67, 135, 254);font-size:1.5rem;" name="btnbutton" id="btnbutton" value="button"  class="far fa-file-archive btn-inverse-secondary btn-fw btnbutton" data=' + data[i].offensestd_ID  + '></i></td>' +
                      '</tr>';
              }
              $('#showdata').html(html);
            },
            error: function(){
              alert('Could not get Data from Database');
            }
          });
        }
    });

    var countforbtn = 0;
    var cars = [];
   
   function show_text(obj){
      if(obj.checked){
        cars.push(obj.value);
        countforbtn +=1;
        if(countforbtn > 0){
      document.getElementById("text1").style.display="";
        }
       }else {
        //cars.remove(obj.value);
        var index = cars.indexOf(obj.value);
      if (index > -1) {
        cars.splice(index, 1);
      }
        countforbtn -=1;
        if(countforbtn == 0){
      document.getElementById("text1").style.display="none";
        }
      }
      console.log(cars)
      console.log(countforbtn)
 }
 

   function check(e){
	   if(e.checked == true) {
      
       
	   document.getElementById('btnbutton').disabled=true;
       
	   } else {
      
     
	   document.getElementById('btnbutton').disabled=false;
      
	   }
	   }

</script>

</body>
</html>
