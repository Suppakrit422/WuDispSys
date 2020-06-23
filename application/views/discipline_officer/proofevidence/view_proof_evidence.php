<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_proof_evidence.css') ?>">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<head>
    <title> ตรวจสอบการยื่นอุทธรณ์ของนักศึกษา | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
</head>
<script>
    datastudent = [];
</script>

<body>

    <meta charset="UTF-8">

    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('#') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ตรวจสอบการยื่นอุทธรณ์ของนักศึกษา </li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;ตรวจสอบการยื่นอุทธรณ์ของนักศึกษา</h6>
                </div>



                <div class="card-body">

                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table id="style_table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th id="idsort">ลำดับ</th>
                                        <th id="datetime">วันที่ส่งหลักฐาน</th>
                                        <th id="studentid">รหัสนักศึกษา</th>
                                        <th id="lfname">ชื่อ-นามสกุล</th>
                                        <th id="school">สำนักวิชา</th>
                                        <th id="check">ตรวจสอบ</th>
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
    </div>


    <div class="modal fade" id="Aceeptdatastudent" role="dialog">
        <div class="modal-dialog" style="max-width:900px!important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายการอุทธรณ์ความผิด</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body content">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="datecomitted" class="label">วันที่กระทำความผิด: </label><span id="committed_date" class="title"></span>
                            <label for="committed_time" class="label">เวลา: <span id="committed_time" class="title"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="place" class="label">สถานที่: </label><span id="place" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="explanplace" class="label">คำอธิบายสถานที่เกิดเหตุ: </label><span id="explanplace" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="offdesc" class="label">ฐานความผิด: </label><span id="offdesc" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="file" class="label">ไฟล์หลักฐาน: </label><span id="fileimg" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="datesubmit" class="label">วันที่บันทึกหลักฐาน: </label><span id="datesubmit" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="explanoff" class="label">คำอธิบายการอุทธรณ์ความความผิด: </label><span id="explan_student_reason" class="title"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="file2" class="label">ไฟล์หลักฐานประกอบการอุทธรณ์: </label><span id="file2" class="title"></span>
                        </div>
                    </div>

                    <form action="#" method="post" name="formaccept" id="formaccept" enctype="multipart/form-data">
                        <input type="hidden" name="proof_ID" id="proof_ID">
                        <input type="hidden" name="S_ID" id="S_ID">
                        <input type="hidden" name="date_current" id="date_current">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="" class="label">ผลการพิจรณา: </label><span id="reason" class="title"></span>
                                <label class="radio-inline title2"><input type="radio" name="status" class="AcceptActivity" value="1" checked>เห็นชอบตามอุทธรณ์ความผิด</label>
                                <label class="radio-inline title2"><input type="radio" name="status" class="UnAcceptActivity" value="0">ยืนยันตามความผิดเดิม</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="explanation" id="reson_not_accept" cols="30" rows="5" placeholder="ผลการพิจรณาการอุทธรณ์"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            show_all();
            disabled_sort();

            function disabled_sort() {
                $('#style_table').DataTable({
                    columnDefs: [{
                        orderable: false,
                        targets: [1, 2]
                    }]
                });
            }
        });


        function show_all() {
            var htmlcode = '';
            var i = 0;
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("Proofargumentfor_discipline_officer/selectproofargument") ?>',
                async: false, //ห้ามลืม
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var date = new Date();
        var date_current = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        $('#date_current').val(date_current);
                    var htmlcode = '';
                    var i = 0;
                    $.each(data, function(key, value) {
                        i++;
                        htmlcode += '<tr>';
                        htmlcode += '<td>' + i + '</td>';
                        htmlcode += '<td>' + value.proof_date + '</td>';
                        htmlcode += '<td>' + value.S_ID + '</td>';
                        htmlcode += '<td>' + value.std_fname + " " + value.std_lname + '</td>';
                        htmlcode += '<td>' + value.dept_name + '</td>'; //
                        htmlcode += '<td><a href="javascript:;" id="checkstudent" data="' + value.proof_ID + '"><span id="file"><i class="menu-icon mdi mdi-attachment"></i></span>ตรวจสอบหลักฐาน</a></td>';
                        htmlcode += '</tr>';

                        var time_committed = value.committed_time.substring(0, 5);
                        var temp_img = value.image;
                        var img=[];

                        $.each(temp_img, function(key, value) {
                            img.push(value.evidenre_name)
                        });
                        
                        datastudent.push({
                            proof_ID: value.proof_ID,
                            report_ID: value.report_ID,
                            S_ID: value.S_ID,
                            person_ID: value.person_ID,
                            proof_name: value.proof_name,
                            proof_date: value.proof_date,
                            Explanation_Student_reason: value.Explanation,
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
                            place_name: value.place_name,
                            committed_date: value.committed_date,
                            committed_time: time_committed,
                            notifica_date: value.notifica_date,
                            explanation: value.explanation,
                            OffenseHead_oh_ID: value.OffenseHead_oh_ID,
                            flag: value.flag,
                            off_desc: value.off_desc,
                            oc_ID: value.oc_ID,
                            point: value.point,
                            resultsname: value.resultsname,
                            fileimg:img
                        });

                    });
                    $('#showdata').html(htmlcode);
                }
            });
        }

        

        $('#showdata').on('click', '#checkstudent', function() {
                $('#Aceeptdatastudent').modal('show');
                $('#formaccept')[0].reset();
                var proofid = $(this).attr('data');

                console.log (datastudent);


                $.each(datastudent, function(key, value) {

                    if (proofid == value.proof_ID) {
                        $('#proof_ID').val(value.proof_ID);
                        $('#committed_date').text(value.committed_date);
                        $('#committed_time').text(value.committed_time);
                        $('#place').text(value.place_name);
                        $('#explanplace').text(value.explanation);
                        $('#offdesc').text(value.off_desc);
                        $('#datesubmit').text(value.proof_date);
                        $('#datesubmit').text(value.proof_date);
                        $('#explan_student_reason').text(value.Explanation_Student_reason);
                        $('#S_ID').val(value.S_ID);
                        var imgarray = value.fileimg;
                        console.log(imgarray[0]);
                        if (imgarray.length == 0){
                            //console.log (555);
                            var url_file_img = '<span id="no_file">ไม่พบไฟล์รูปภาพ</span>';
                        }else if (imgarray.length != 0){
                            var url_file_img =  '<a href="http://localhost/itproject_59/uploads/' + imgarray[0] + '"><span id="img_notify"><i class="menu-icon mdi mdi-image-area"></i></span></a>';
                        }else{
                            //stament
                        }
                        var file = '<a href="http://localhost/itproject_59/upload_proofargument/' + value.proof_name + '"><span><i class="menu-icon mdi mdi-attachment"></i>ดาวโหลดไฟล์ : ' + value.proof_name + '</span></a>';
                        $('#file2').html(file);
                        $('#fileimg').html(url_file_img);
                    }

                });

            });

        $("#formaccept").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("formaccept"));
            // console.log(formData);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Proofargumentfor_discipline_officer/Updatestatusproofargument',
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(data) {
                    if (data == 'true') {
                        alert('ดำเนินการอนุมัติคำร้องอุทธรณ์เรียบร้อย !');
                        location.reload();
                    } else if (data == 'false') {
                        alert('ไม่สามารถดำเนินการอนุมัติคำร้องอุทธรณ์ได้ กรุณาตรวจสอบข้อมูล !')
                    } else {
                        //stament
                    }
                }
            });
        });
    </script>
</body>

</html>