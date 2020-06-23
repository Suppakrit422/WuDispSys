<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_OffenseHead.css') ?>">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<head>
  <title>รายงานตัว/ยื่นหลักฐานอุทธรณ์การกระทำความผิด | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
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
    .card-header1{
    color: #FFF;
	background: rgb(74, 35, 90);
	border-radius: 3px;
	height: 90px;
}
.close1{
    color: #FFF;

}
  </style>
</head>
<script>
  var dataoff = [];
</script>

<body>
  <meta charset="UTF-8">
  <div class="page-breadcrumb" id="nav_sty">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url("Student_dashboard") ?>" class="breadcrumb-link">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">รายงานตัวยื่นหลักฐานอุทธรณ์ความผิด</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
      <div class="card-header" id="card_2">
        <h6 class="m-0 text-primary"><span class=""></span>&nbsp;รายงานตัว/ยื่นหลักฐานอุทธรณ์ความผิด</h6>
      </div>

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
                  <th>รายงานตัว</th>
                  <th>ส่งหลักฐานอุทธรณ์</th>
                </tr>
              </thead>
              <tbody id="showdata">


              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="show_detail_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 650px!important;" role="document">
      <div class="modal-content">
      <div class="card-header1" id="card_2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close1" aria-hidden="true" >×&nbsp;</span>
                    </button>
                    <br>
                    <h4 class="m-0 text-primary" id="exampleModalLongTitle">
                        <font size="5">&nbsp;&nbsp;ใบสั่งการกระทำความผิด</font>
                    </h4>

                </div>
                
        <div class="modal-body content">
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group">
                <label class="label_txt">วันที่กระทำผิด:&nbsp;</label>
                <span class="text_position" id="committed_date"></span>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="input-group">
                <label class="label_txt">เวลา:&nbsp;</label>
                <span class="text_position" id="committed_time"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group">
                <label class="label_txt">สถานที่:&nbsp;</label>
                <span class="text_position" id="place_name"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group">
                <label class="label_txt">คำอธิบายบริเวณที่เกิดเหตุ:&nbsp;</label>
                <span class="text_position" id="explanation"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group">
                <label class="label_txt">ฐานความผิด:&nbsp;</label>
                <span class="text_position" id="off_desc"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="input-group">
                <label class="label_txt">ไฟล์หลักฐาน :&nbsp;</label>
                <span class="text_position" id="evidenre_name"></span>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>



  <div class="modal fade" id="file_offhead" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 650px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">การอุทธรณ์ความผิด</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="#" id="form-file" name="form-file" method="post" enctype="multipart/form-data">
          <input type="hidden" name="report_ID" id="report_ID">
          <!-- <input type="hidden" name="S_ID" id="S_ID"> 
            <input type="hidden" name="person_ID" id="person_ID">  
            <input type="hidden" name="offensestd_ID" id="offensestd_ID"> -->
          <input type="hidden" name="proof_date" id="proof_date">
          <div class="modal-body ">
            <div class="row">
              <div class="col-sm-12">
                <label for="datasubmit" class="label">วันที่บันทึกหลักฐาน:</label><span class="datasubmit"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <label for="explanfile" class="label">คำอธิบายการอุทธรณ์ความผิด:<span class="fixdata">*</span></label>
                <textarea class="form-control" name="Explanation" id="Explanation" cols="30" rows="5" required></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <label for="explanfile" class="label">แนบไฟล์หลักฐาน:<span class="fixdata">*</span></label>
                <input type="file" name="myFile" id="myFile" class="InputFile" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12" style="text-align: right;">
                <span class="title2"><i class="fas fa-exclamation-circle"></i>แนะนำวิธีใช้: รองรับการอัพโหลดไฟล์ประเภท pdf เท่านั้น</span>
              </div>
            </div>


            <div class="modal-footer">
              <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
              <button name="btnedit" id="btnedit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>


  <script>
    $(document).ready(function() {
      showAll();
      var file = document.getElementById('myFile');
      file.onchange = function(e) {
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
          case 'pdf':
            break;
          default:
            alert('ระบบรองรับเฉพาะไฟล์ประเภท pdf ไฟล์เท่านั้น');
            this.value = '';
        }
      };
    });

    function check_data_offenstd(data) {
      $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url() ?>index.php/OffenseHead/selectoffenseforinsert',
        data: {
          id: data
        },
        async: false,
        dataType: 'json',
        success: function(data) {
          console.log(data);
          $('#report_ID').val(data.report_ID);
          // $('#S_ID').val(data.S_ID);
          // $('#person_ID').val(data.person_ID);
        }
      });
    }

    function showAll() {
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>index.php/OffenseHead/selectstudentoffensehead',
        async: false,
        dataType: 'json',
        success: function(data) {
          console.log(data);
          var html = '';
          var i = 0;
          $.each(data, function(key, value) {
            i++
            html += '<tr>';
            html += '<td>' + i + '</td>'
            html += '<td>' + value.committed_date + '</td>';
            html += '<td>' + value.off_desc + '</td>';
            html += '<td class="tddetail"><span class="fileicon " data="' + value.offensestd_ID + '"><i class="fas fa-file-alt"style="color:rgba(67, 135, 254);font-size:1.5rem;"></i></span></td>';
            html += '<td><button class="btn btn-outline-success AcceptOffender" data="' + value.offensestd_ID + '">ยืนยัน</button></td>'
            html += '<td class="filetd"><img src="<?php echo base_url('re/images/folder.png') ?>" alt="" class="ImgFolder" data="' + value.offensestd_ID + '"></td>';
            html += '</tr>';

            var time_committed = value.committed_time.substring(0, 5);

            dataoff.push({
              offensestd_ID: value.offensestd_ID,
              committed_date: value.committed_date,
              committed_time: time_committed,
              place_name: value.place_name,
              description: value.description,
              off_desc: value.off_desc,
              file: value.evidenre_name
            });

          });
          $('#showdata').html(html);
        },
        error: function() {
          alert('');
        }
      });
    }

    $("#form-file").on("submit", function(e) {
      e.preventDefault();
      var formData = new FormData(document.getElementById("form-file"));
      $.ajax({
        url: '<?php echo base_url(); ?>index.php/OffenseHead/insertproofargument',
        cache: false,
        data: formData,
        processData: false,
        contentType: false,
        type: "POST",
        success: function(data) {
          console.log(data);
          if (data == 'true') {
            alert('ดำเนินการยื่นเรื่องการอุทธรณ์เสร็จสิ้น โปรดติดตามผลการอุทธรณ์');
            window.location.href = "<?php echo site_url("Proofargument") ?>";
          } else if (data == 'false') {
            alert('ไม่สามารถดำเนินการยื่นอุทธรณ์โปรดตรวจสอบความถูกต้องของข้อมูล !');
          } else {
            //stament
          }
        }
      });
    });

    $('#showdata').on('click', '.fileicon', function() {
      $('#show_detail_file').modal('show');
      var id = $(this).attr('data');

      console.log(dataoff);

      $.each(dataoff, function(key, value) {

        if (id == value.offensestd_ID) {
          //stament committed_time place_name explanation value.description off_desc  evidenre_name
          $("#committed_date").text(value.committed_date);
          $("#committed_time").text(value.committed_time);
          $("#place_name").text(value.place_name);

          if (value.description == "") {
            $("#explanation").text('ไม่มีคำอธิบาย');
          } else if (value.description != "") {
            $("#explanation").text(value.description);
          } else {
            //stament
          }
          $("#off_desc").text(value.off_desc);
          var file = '<a href="http://localhost/itproject_59/uploads/' + value.file + '"><span><i class="fas fa-image"></i></span></a>'

          $("#evidenre_name").html(file);
        }
      });
    });


    $('#showdata').on('click', '.ImgFolder', function() {
      var offstd = $(this).attr('data');
      $('#file_offhead').modal('show');
      var date = new Date();
      var data_submit_file = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
      var date_sumit = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
      $('.datasubmit').text(" " + data_submit_file);
      $('#proof_date').val(date_sumit);
      $('#offensestd_ID').val(offstd);
      check_data_offenstd(offstd);
    });


    $('#showdata').on('click', '.AcceptOffender', function() {
            var id = $(this).attr('data');
            //console.log(id);
            data={offensestd_ID: id}
            if (confirm('ยืนยันการกระทำความผิด')) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("OffenseHead/updatestatusoffAdmitwrongoffensestd  ") ?>',
                    async: false,
                    data:data,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data == true){
                            alert ('ทำรายการเสร็จสิ้น');
                            location.reload();
                        }else if (data == false) {
                            alert ('ไม่สามารถทำการรายการได้ กรุณาตรวจสอบข้อมูล');
                        }else{

                        }

                    }
                });
            }else{
                //stament
            }
        });
  </script>