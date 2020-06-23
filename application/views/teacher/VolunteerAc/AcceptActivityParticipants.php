<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_show_activity_.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/normalize.min.css') ?>">

<head>
    <title> รับรองกิจกรรมบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษา</title>
</head>
<script>
    var dataset = [];
    var dataservices = [];
</script>

<body>



    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Teacher_dashboard') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">รับรองกิจกรรมบำเพ็ญประโยชน์</li>
                </ol>
            </nav>
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;รับรองกิจกรรมบำเพ็ญประโยชน์</h6>
                </div>

                <div class="card-body">
                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th id="detail_activity_regis">ข้อมูลกิจกรรม</th>
                                <th id="person_control">ผู้รับรองกิจกรรม</th>
                                <th id="manage">รายชื่อผู้เข้าร่วมกิจกรรม</th>
                            </tr>
                        </thead>

                        <tbody id="showdata">

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg" id="show_participants" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="TitleActivity">รับรองกิจกรรมบำเพ็ญประโยชน์</div>
                    <div class="Print"><img src="<?php echo base_url('re/images/print.png') ?>" alt="" class="ImgPrint"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="HeaderData">
                        <div class="DetailData">
                            <span id="activity_name_modal"></span>
                            <span id="date_activity_modal"></span>
                            <span id="time_activity_modal"></span>
                            <span id="place_modal"></span>
                        </div>
                    </div>
                    <div class="ShowDataParticipants" id="data">

                        <form action="#" id="formaccept" name="formaccept" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="service_ID" id="service_ID" value="">
                            <input type="hidden" name="date_current" id="date_current">

                            <table id="data_activity_participants" class="table table-striped table-bordered nowrap" style="width:100%">
                            </table>

                    </div>



                    <div class="modal-footer">
                        <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <div class="PrintDataTableReport" id="data_table">
        <div class="HeaderReport">
            <div class="part1">
                <img src="<?php echo base_url('re/images/logo_sys_mini.png') ?>" alt="" class="logofile">
            </div>
            <div class="part2">
                <span class="title1">มหาวิทยาลัยวลัยลักษณ์ | Walailak University</span>
                <span class="title2">ระบบวินัยนักศึกษา | หน่วยงานวินัยนักศึกษา</span>
                <span class="title3">กิจกรรมบำเพ็ญประโยชน์</span>
            </div>
        </div>
        <div class="DetailActivity">
            <div class="part3">
                <span id="title4">1.ข้อมูลกิจกรรมบำเพ็ญประโยชน์</span>
                <div style="display:grid;margin-left: 2%;">
                    <span id="title5">ชื่อกิจกรรม: แจกถุงยังชีพสำหรับผู้ประสบภัยน้ำท่วม</span>
                    <span id="title6">วันที่จัดกิจกรรม: 12 ธันวาคม 2563</span>
                    <span id="title7">เวลาจัดกิจกรรม 13:00 ถึง 14:00 ชั่วโมงกิจกรรม 1 ชม.</span>
                    <span id="title8">สถานที่จัดกิจกรรม: เทศบาลตำบลสถาน ต.สถาน อ.เชียงของ จ.เขียงราย โทร. 053-791607</span>
                </div>
            </div>
            <div class="part4">
                <span id="title9">2.รายชื่อผู้เข้าร่วมกิจกรรมบำเพ็ญประโยชน์</span>
                <div style="display:grid;margin-left: 5%;">
                    <span id="title10">ผู้สมัครเข้าร่วมกิจกรรมทั้งหมด 100 คน</span>
                </div>
            </div>
            <div class="part5">
                <table id="" class="display" style="width:100%;margin-left:8%;font-family: 'TH SarabunPSK', sans-serif;font-size:22px;">
                    <thead>
                        <tr>
                            <th id="th1">ลำดับ</th>
                            <th id="th2">รหัสนักศึกษา</th>
                            <th id="th3">ชื่อ-นามสกุล</th>
                            <th id="th6">หอพัก</th>
                            <th id="th5">หมายเลขโทรศัพท์</th>
                        </tr>
                    </thead>

                    <tbody id="show_data_table">

                    </tbody>

                </table>
            </div>

        </div>

    </div>


    <script type="text/javascript">
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

            html = '';
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("Participants_Teacher/selectActivity") ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var date = new Date();
                    var date_current = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
                    $('#date_current').val(date_current);
                    var html = '';
                    var i = 0;

                    console.log(data);

                    $.each(data, function(key, value) {

                        var temp_1 = value.start_time;
                        var temp_2 = value.end_time;
                        var show_start_time = temp_1.substring(0, 5);
                        var show_end_times = temp_2.substring(0, 5);
                        var start_times = parseFloat(temp_1.substring(0, 5));
                        var end_times = parseFloat(temp_2.substring(0, 5));
                        var counthour = Math.abs(end_times - start_times);

                        dataservices.push({
                            service_id: value.service_ID,
                            service_name: value.service_name,
                            date: value.service_date,
                            time: [show_start_time, show_end_times, counthour],
                            place: value.place
                        });

                        i++;
                        html += '<tr>';
                        html += '<td id="sort_number">' + i + '</td>';
                        html += '<td id="detail_activity">';
                        html += '<div class="DetailActivity">';
                        html += '<span id="activity_name">กิจกรรม: ' + value.service_name + '</span>';
                        html += '<span id="date_activity">วันที่จัดกิจกรรม ' + value.service_date + '</span>';
                        html += '<span id="time_activity">เวลาเริ่ม ' + show_start_time + ' ถึง ' + show_end_times + ' ชั่วโมงกิกรรม ' + counthour + ' ชม.</span>';
                        html += '<span id="place">' + value.place + '</span>';
                        html += '</div>';
                        html += '</td>';
                        html += '<td id="person_control">'+ value.person_fname + '  ' + value.person_lname +'</td>';
                        html += '<td id="file"><span id="open_name_participants" data=' + value.service_ID + '><i class="fa fa-folder-open"></i></span></td>';
                        html += '</tr>';

                    });
                    $('#showdata').html(html);
                }
            });
        }

        $("#formaccept").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("formaccept"));
            //console.log(formData);

            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Teacher_dashboard/Updatestatusparticipationactivities',
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                type: "POST",
                success: function(data) {
                    console.log(data);
                    if (data == 'true') {
                        alert('ดำเนินการรับรองกิจกรรมบำเพ็ญประโยชน์เรียบร้อย !')
                        location.reload();
                    } else if (data == 'false') {
                        alert ('ไม่สามารถรับรองกิจกรรมบำเพ็ญประโยชน์ได้');
                        location.reload();
                    } else {
                        //stament
                    }

                }
            });


        });



        $('.Print').click(function() {
            $('#data_table').print()
        });

        $("#PrintDataTableReport").find('.ImgPrint').on('click', function() {
            //Print ele2 with default options
            $("#PrintDataTableReport").print({
                mediaPrint: true,
                stylesheet: "https:fonts.googleapis.com/css?family=Sarabun&display=swap"
            });
        });



        $('#showdata').on('click', '#open_name_participants', function() {
            $('#show_participants').modal('show');
            var serviceid = $(this).attr('data');
            var data = {
                id: serviceid
            }
            var html = '';
            var dataset = [];

            console.log(dataservices);

            $.each(dataservices, function(key, value) {
                if (serviceid == value.service_id) {
                    $('#service_ID').val(value.service_id); //service_ID
                    $('#activity_name_modal').text('กิจกรรม:' + value.service_name);
                    $('#title5').text('กิจกรรม:' + value.service_name);
                    $('#date_activity_modal').text('วันที่จัดกิจกรรม: ' + value.date);
                    $('#title6').text('วันที่จัดกิจกรรม: ' + value.date);
                    if (value.time) {
                        var temp = value.time;
                        console.log(temp[0]);
                        $('#date_activity_modal').text('เวลาเริ่ม ' + temp[0] + ' ถึง ' + temp[1] + ' ชั่วโมงกิกรรม ' + temp[2] + ' ชม.');
                        $('#title7').text('เวลาจัดกิจกรรม' + temp[0] + ' ถึง ' + temp[1] + ' ชั่วโมงกิกรรม ' + temp[2] + ' ชม.');
                    }
                    $('#place_modal').text(value.place);
                    $('#title8').text('สถานที่จัดกิจกรรม: ' + value.place);
                }
            });

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("Teacher_dashboard/studentinactivity") ?>',
                async: false,
                data: data,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var htmlcode = '';
                    var i = 0;
                    $.each(data, function(key, value) {


                        if (value.results == 1) {
                            //stament
                            i++;
                            htmlcode += '<tr>';
                            htmlcode += '<td>' + i + '</td>';
                            htmlcode += '<td>' + value.S_ID + '</td>';
                            htmlcode += '<td>' + value.std_fname + " " + value.std_lname + '</td>';
                            htmlcode += '<td>' + value.dname + '</td>';
                     //       htmlcode += '<td>' + value.email + '</td>';
                            htmlcode += '<td>' + value.phone + '</td>';
                            htmlcode += '</tr>';
                            var name = value.std_fname + " " + value.std_lname;
                            var urlfile = value.document_file;

                            if (urlfile == ""){
                                var url = '<span id="no_file">ไม่มีการแนบหลักฐาน</span>'
                            } else if (urlfile != ""){
                                var url = '<a href="http://localhost/itproject_59/uploads_pdffile/'+urlfile+'">'+ urlfile +'</a>'
                            }
                            else{

                            }

                            dataset.push(new Array(i, value.S_ID, name, value.phone,url, '<input type="checkbox" class="AcceptStudent" name="S_ID[]" value="' + value.S_ID + '">'));
                        }


                    });
                    $('#show_data_table').html(htmlcode);
                }
            });

            $('#data_activity_participants').DataTable({
                "bDestroy": true,
                "data": dataset,
                "columns": [{
                        title: "ลำดับ"
                    },
                    {
                        title: "รหัสนักศึกษา"
                    },
                    {
                        title: "ชื่อ-นามสกุล"
                    },
                 //   {
                //        title: "email"
                //    },
                    {
                        title: "หมายเลขโทรศัพท์"
                    },
                    {
                        title: "ไฟล์เอกสารร่วมกิจกรรม"
                    },
                    {
                        title: "รับรองกิจกรรม"
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [2, 3, 4]
                }]
            });



        });

        $(function() {


        });
    </script>


</body>