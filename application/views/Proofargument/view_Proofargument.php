<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_view_proofargument.css') ?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<head>
  <title>ติดตามผลการยื่นอุธรณ์ความผิด | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
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
  var datastudent = [];
</script>

<body>
  <meta charset="UTF-8">
  <div class="page-breadcrumb" id="nav_sty">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">รายงานตัวผู้กระทำความผิด</a></li>
        <li class="breadcrumb-item active" aria-current="page">ติดตามผลการอุทธรณ์ความผิด</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow mb-4">
      <div class="card-header" id="card_2">
        <h6 class="m-0 text-primary"><span class=""></span>&nbsp;ติดตามผลการอุทธรณ์ความผิด</h6>
      </div>

      <div class="card-body">
        <div class="bootstrap-data-table-panel">
          <div class="table-responsive">
            <table id="style_table" class="table table-hover">
              <thead>
                <tr>
                  <th id="sort">ลำดับที่</th>
                  <th id="date">วันที่บันทึกหลักฐาน</th>
                  <th id="offcate">ฐานความผิด</th>
                  <th id="status">สถานะการแย้ง</th>
                  <th id="detail">รายละเอียด</th>
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


  <div class="modal fade" id="show_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 650px!important;" role="document">
      <div class="modal-content">
      <div class="card-header1" id="card_2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="close1" aria-hidden="true" >×&nbsp;</span>
                    </button>
                    <br>
                    <h4 class="m-0 text-primary" id="exampleModalLongTitle">
                        <font size="5">&nbsp;&nbsp;การอุทธรณ์ความผิด</font>
                    </h4>

                </div>
        <div class="modal-body ">
            <div class="row">
              <div class="col-sm-12">
                  <label for="committed" class="label">วันที่กระทำความผิด: </label><span id="committed_date"></span>
                  <label for="committed_time" class="label">เวลา:</label><span id="committed_time"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="place" class="label">สถานที่: </label><span id="place" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="explanplace" class="label">คำอธิบายบริเวณที่เกิดเหตุ: </label><span id="explan" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="explanplace" class="label">ฐานความผิด: </label><span id="offdes" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="file" class="label">ไฟล์หลักฐานความผิด: </label><span id="file" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="datesubmit" class="label">วันที่บันทึกหลักฐาน: </label><span id="datesubmit" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="explan_student" class="label">คำอธิบายการอุทธรณ์ความผิด: </label><span id="explan_student" class="font"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                  <label for="file_student" class="label">ไฟล์หลักฐานการอุทธรณ์: </label><span id="file_student" class="font"></span>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function() {
        showAll();

      });

      function showAll() {

        var htmlcode = "";

        $.ajax({
          type: 'ajax',
          url: '<?php echo base_url() ?>index.php/Proofargument/selectstudentproofargument',
          async: false,
          dataType: 'json',
          success: function(data) {
            console.log(data);
            var i = 0;
            $.each(data, function(key, value) {
              i++;
              htmlcode += '<tr>';
              htmlcode += '<td class="">' + i + '</td>'
              htmlcode += '<td class="datatime">' + value.proof_date + '</td>';
              htmlcode += '<td class="">' + value.off_desc + '</td>';

              if (value.results == "0") {
                htmlcode += '<td class=""><span class="badge badge-warning status">รอการอนุมัติ</span></td>';
              } else if (value.results == "1") {
                htmlcode += '<td class=""><span class="badge badge-success status">อนุมัติ</span></td>';
              } else if (value.results == "2") {
                htmlcode += '<td class=""><span class="badge badge-danger status">ไม่อนุมัติ</span></td>';
              } else {
                //stament
              }
              htmlcode += '<td class="tddetail"><span class="fileicon" data="' + value.proof_ID + '"><i class="fas fa-file-alt" style="color:rgba(67, 135, 254);font-size:1.5rem;"></i></span></td>';
              htmlcode += '</tr>';

              var time_committed = value.committed_time.substring(0, 5);

              datastudent.push({
                proof_ID: value.proof_ID,
                report_ID: value.report_ID,
                S_ID: value.S_ID,
                person_ID: value.person_ID,
                proof_name: value.proof_name,
                proof_date: value.proof_date,
                Explanation: value.Explanation,
                results: value.results,
                offensestd_ID: value.offensestd_ID,
                report_date: value.report_date,
                report_status: value.report_status,
                reason: value.reason,
                oh_ID: value.oh_ID,
                statusoff: value.statusoff,
                off_ID: value.off_ID,
                informer: value.informer,
                place_ID: value.place_ID,
                committed_date: value.committed_date,
                committed_time: time_committed,
                notifica_date: value.notifica_date,
                explanation: value.explanation,
                OffenseHead_oh_ID: value.OffenseHead_oh_ID,
                flag: value.flag,
                off_desc: value.off_desc,
                oc_ID: value.oc_ID,
                point: value.point,
                resultsname: value.resultsname
              });

            });
            $('#showdata').html(htmlcode);
          },
          error: function() {
            alert('');
          }
        });
      }

      $('#showdata').on('click', '.fileicon', function() {
        $('#show_detail').modal('show');
        var proofid = $(this).attr('data');
        console.log (proofid)
        $.each(datastudent, function(key, value) {

          if (value.proof_ID == proofid){ //offdes proof_date explan_student file_student
            $("#committed_date").text(value.committed_date);
            $("#committed_time").text(value.committed_time);
            $("#place").text(value.place);
            $("#offdes").text(value.off_desc);
            $("#datesubmit").text(value.proof_date);
            $("#datesubmit").text(value.proof_date);
            $("#explan_student").text(value.Explanation);

            var file = '<a href="http://localhost/itproject_59/upload_proofargument/' + value.proof_name + '"><span><i class="far fa-file-alt"></i>'+ value.proof_name +'</span></a>'

            $("#file_student").html(file);

          }

        });


      });
    </script>

</body>

</html>