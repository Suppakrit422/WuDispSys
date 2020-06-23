<!doctype html>
<html lang="en">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<center>
<strong><div  class="alert alert-success" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-danger" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-warning" role="alert" style="display: none;"></div></strong>
</center>
<head>
 
  <title>วันหยุด admin</title>

</head>
<body>
  <meta charset="UTF-8">
  <div class="page-breadcrumb" id="nav_sty">
          <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>
                        <li class="breadcrumb-item active" aria-current="page">วันหยุด</li>
                  </ol>
          </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
          <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span  class="	fas fa-calendar-alt"></span>&nbsp;วันหยุด</h6>
                </div>
                <?php  
echo '<center><label class="text-danger">'.$this->session->flashdata
("message").'</label></center>';  

            ?>
              
        <div class="card-body " id="card_1">
        
        <button type="button" id="btnAdd" class="btn btn-inverse-primary btn-fw" data-toggle="modal" >
                  <i class="fas fa-plus"></i>เพิ่มพุทธศักราช
        </button>
        &nbsp;


        </div> 
           <!-- Modal เพิ่มข้อมูล -->
 
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">เพิ่มพุทธศักราช</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      
      <div class="modal-body">

      <!--ส่วนฟอร์มเพิ่มข้อมูล--> 
          
                  <form action="" id="formadd" method="post"  class="needs-validation" >
      <center>

      
  
        <div class="form-group" id="input_group_sty">
        <div class="input-group" >
          <label  class="col-sm-4"  for="validationCustom02">พุทธศักราช</label>&nbsp;
                    <input type="text" name="txtname"  class="form-control col-sm-7" maxlength="4" onkeyup="count_down(this);" required>
           </div><div>
       
</div>
</div>
          
      </center>
       
      <!------------------>
 </div>
     
  
      <div class="modal-footer ">
      <button  name="insert" type="reset" class="btn btn-secondary " data-dismiss="modal">ยกเลิก</button>
      <button name="btnSave" id="btnSave" type="button" class="btn btn-success">บันทึกข้อมูล</button>
            
       
      </div>
 </form>
    </div>
  </div>
</div>

<!--------------------------------->

<!-- Modal ส่วน edit -->
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

     
   
      
 <!-- Modal ส่วน select -->

        <div class="card-body">
      <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="style_table" class="table table-hover">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>ปี</th>
                                                    <th>จัดการ</th>
                                                  

                                                </tr>
                                            </thead>
                                            <tbody id="showdata">

                                                <tr>

                                                    <td width="10px"></td>
                                                    <td></td>
                                                    <td width="10px">
                                                    
                            <!--edit_file  del_file  -->
                          <!--  <a href="<?php echo base_url().'index.php/holiday1/edit?id='.$rec->hh_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/holiday1/edit?id='.$rec->hh_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->holiday_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/holiday1/edit?id='.$rec->hh_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->
      
                                    <!--ส่วนของ madal จะใช้การจัดการด้วย id ส่วนของ data-target กับ id ของ class จะต้องเหมือนกัน -->

                                   

                                      

 
 

  
        
      
                
                                     <!-- <form action="<?php echo base_url(); ?>index.php/holiday1/edit" method="post" id="editform"  class="needs-validation" >  -->
                                   
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
  /*
    $(document).ready(function(){
$("#edit_file").modal("show");

    });*/
    $(function(){

  
showAll();
$("#h_ID").change(function(){
        var active_track;
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/holiday/edit/checkkey",
            data: "h_ID=" + $("#h_ID").val(),
            type: "POST",
            async:false,
            success: function(data, status) { 
               var result = data.split(",");
               active_track = result[0];
               var msg = result[1];
              // alert(msg)
               $("#msg1").html(msg);                                                                               

            },
            error: function(xhr, status, exception) { alert(status); }
        });
        return active_track;
    });
//Add New

$('#btnAdd').click(function() {
        $('#exampleModalCenter').modal('show');
        $('#formadd').attr('action', '<?php echo base_url(); ?>index.php/holiday1/addholiday');
    });

    $('#btnSave').click(function(){
  var url = $('#formadd').attr('action');
  var data = $('#formadd').serialize();
  //validate form
  var id = $('input[name=txtid]');
  var name = $('input[name=txtname]');
  var result = '';
  
  if(id.val()==''){
    id.parent().parent().addClass('has-error');
  }else{
    id.parent().parent().removeClass('has-error');
    result +='1';
  }
  if(name.val()==''){
    name.parent().parent().addClass('has-error');
  }else{
    name.parent().parent().removeClass('has-error');
    result +='2';
  }

  if(result=='12'){
    $.ajax({
      type: 'ajax',
      method: 'post',
      url: url,
      data: data,
      async: false,
      dataType: 'json',
      success: function(response){
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
                                $('#exampleModalCenter').modal('hide');
                                //$(this).find('#formadd')[0].reset();

                                $('#formadd')[0].reset();
                                $('.alert-danger').html('id นี้ถูกใช้งานแล้ว').fadeIn().delay(2000).fadeOut('slow');
                                $('#msg1').empty();
                                showAll();
                               // alert('Error');
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
                  

           //ลบข้อมูล
           $('#showdata').on('click', '.del_data', function() {
                var id = $(this).attr('data');
                $('#del_file').modal('show');
                //prevent previous handler - unbind()
                $('#formdelete').attr('action', '<?php echo base_url() ?>index.php/holiday1/deleteholiday');
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url() ?>index.php/holiday1/editholiday',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        $('#showddel').html('ต้องการลบ พ.ศ.   "' + data.h_year + '"');
                        $('input[name=txtdelID]').val(data.hh_ID);
                    },
                    error: function() {
                        alert('ไม่สามารถลบข้อมูล');
                    }
                });
            });

      $('#btndel').click(function(){
      var url = $('#formdelete').attr('action');
      var data = $('#formdelete').serialize();
      var h_ID = $('input[name=txtdelID]');
      var result = '';
      
      if(h_ID.val()==''){
        h_ID.parent().parent().addClass('has-error');
      }else{
        h_ID.parent().parent().removeClass('has-error');
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
            $('.alert-danger').html('ลบข้อมูลเรียบร้อย').fadeIn().delay(5000).fadeOut('slow');
            showAll();
          }
        });
      }
    });
        
     //function
    function showAll(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/holiday1/showAll',
        async: false,
        dataType: 'json',
        success: function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html +='<tr>'+
                  '<td>'+(i+1)+'</td>'+
                  '<td>'
                  +'<a href="<?php echo base_url() ?>index.php/holiday1/findHolidayByYear?year='+data[i].h_year+'">'
                  +data[i].h_year+'</td>'+
                  '<td> <button type="button" class="btn btn-danger btn-rounded btn-fw del_data" data=' + data[i].hh_ID + '>ลบข้อมูล</button></td>' +                  '</tr>';
          }
          $('#showdata').html(html);
        },
        error: function(){
          alert('Could not get Data from Database');
        }
      });
    }
  });
</script>

</body>
</html>
