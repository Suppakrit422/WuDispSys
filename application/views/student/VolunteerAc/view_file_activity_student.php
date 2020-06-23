<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_user_student_history_activity.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_file_activity_student.css') ?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<head>
    <title> ส่งหลักฐานการบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
</head>

<body>

    <meta charset="UTF-8">

    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Student_dashboard') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">หลักฐานการบำเพ็ญประโยชน์</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;ส่งหลักฐานการบำเพ็ญประโยชน์</h6>
                </div>



                <div class="card-body">


                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th id="detail_activity_regis">ข้อมูลกิจกรรม</th>
                                <th id="person_control">ผู้ควบคุม</th>
                                <th id="manage">ส่งหลักฐาน</th>
                            </tr>
                        </thead>

                        <tbody id="showdata">

                        </tbody>

                    </table>




                    <!-- Modal detail-->
                    <div class="modal fade" id="file_activity_student" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">แนบไฟล์หลักฐานกิจกรรม</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body content">
                                    <span class="title1"><i class="fas fa-exclamation-circle"></i>คำแนะนำ:รองรับไฟล์ pdf เท่านั้น</span>
                                    <form action="#" id="form_file_activity" name="form_file_activity" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="par_ID" id="par_ID">
                                        <input type="file" name="myFile" id="myFile">
                                </div>
                                <div class="modal-footer">
                                    <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>





            </div>

        </div>





    </div>

    <script>
        $(document).ready(function() {

            show_all();
            disabled_sort();

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
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("FileActivityStudent/selectparticipationactivities") ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var htmlcode = '';
                    var i = 0;
                    $.each(data, function(key, value) {

                        var temp_1 = value.start_time;
                        var temp_2 = value.end_time;
                        var show_start_time = temp_1.substring(0, 5);
                        var show_end_times = temp_2.substring(0, 5);
                        var start_times = parseFloat(temp_1.substring(0, 5));
                        var end_times = parseFloat(temp_2.substring(0, 5));
                        var counthour = Math.abs(end_times - start_times);

                        i++;
                        htmlcode += '<tr>';
                        htmlcode += '<td>' + i + '</td>'
                        htmlcode += '<td>';
                        htmlcode += '<div class="DetailActivity">';
                        htmlcode += '<span id="activity_name">กิจกรรม:' + value.service_name + '</span>';
                        htmlcode += '<span id="date_activity">วันที่จัดกิจกรรม : ' + value.service_date + '</span>';
                        htmlcode += '<span id="time_activity">เวลาเริ่ม ' + show_start_time + ' ถึง ' + show_end_times + ' ชั่วโมงกิกรรม ' + counthour + ' ชม.</span>';
                        htmlcode += '<span id="place">' + value.place + '</span>';
                        htmlcode += '</div>';
                        htmlcode += '</td>';
                        htmlcode += '<td id="person_control">' + value.person_fname + " " + value.person_lname + '</td>';
                        htmlcode += '<td class="filetd"><img src="<?php echo base_url('re/images/folder.png') ?>" alt="" class="ImgFolder" data="' + value.par_ID + '"></td>'
                        htmlcode += '</tr>';
                    });
                    $('#showdata').html(htmlcode);
                }
            });
        }

        //ImgFolder
        $('#showdata').on('click', '.ImgFolder', function() {
            $('#file_activity_student').modal('show');
            var par_ID = $(this).attr('data');
            $('#par_ID').val(par_ID);
            $('#form_file_activity')[0].reset();
        });


        $("#form_file_activity").on("submit", function(e) {
            e.preventDefault();

            var formData = new FormData(document.getElementById("form_file_activity"));

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/FileActivityStudent/Updatefileparticipationactivities',
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(data) {
                    if (data == 'true'){
                        alert ('อัพโหลดไฟล์หลักฐานกิจกรรมเรียบร้อย');
                        location.reload();

                    }else if (data == 'flase'){
                        alert ('การอัพโหลดไฟล์หลักฐานล้มเหลว');
                    }else{
                        //stament
                    }
                }
            });





        });
    </script>
</body>

</html>