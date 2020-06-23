<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_regis_activity_student.css') ?>">


<head>
    <title> ลงทะเบียนกิจกรรมบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษา</title>
</head>

<body>



    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ลงทะเบียนกิจกรรมบำเพ็ญประโยชน์</li>
                </ol>
            </nav>
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;การบำเพ็ญประโยชน์</h6>
                </div>

                <div class="card-body">
                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort"></th>
                            </tr>
                        </thead>

                        <tbody id="showdata">


                        </tbody>

                    </table>

                </div>
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
                        targets: 1
                    }]
                });
            }
        });


        function show_all() {
            html = '';
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("Volunteer_regis/showAll") ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(key, value) {

                        console.log (value.number_of +'<'+ value.received)

                        var get_now_person = parseInt(value.number_of);
                        var person_group = parseInt(value.received);
                        
                        if (get_now_person < person_group) {
                            var temp_1 = value.start_time;
                            var temp_2 = value.end_time;
                            var show_start_time = temp_1.substring(0, 5);
                            var show_end_times = temp_2.substring(0, 5);
                            var start_times = parseFloat(temp_1.substring(0, 5));
                            var end_times = parseFloat(temp_2.substring(0, 5));
                            var counthour = Math.abs(end_times - start_times);

                            html += '<tr>';
                            html += '<td>';
                            html += '<div class="Data">';
                            html += '<div class="Main1">';
                            html += '<span id="title1">กิจกรรม : ' + value.service_name + '</span>';
                            html += '<span id="title2"> <span><i class="far fa-calendar-alt iconlabel"></i></span> วันที่จัดกิจกรรม : ' + value.service_date + ' </span>';
                            html += '<span id="title3"> <span><i class="fas fa-clock iconlabel"></i></span> เวลาเริ่ม ' + show_start_time + ' ถึง ' + show_end_times + ' ชั่วโมงกิกรรม ' + counthour + ' ชม.</span>';
                            html += '<span id="title4"> <span><i class="fas fa-user iconlabel"></i></span>ผู้รับรองกิจกรม: ' + value.person_fname + " " + value.person_lname + '</span>';
                            html += '<span id="title5"> <span><i class="fas fa-torii-gate iconlabel"></i></span>สถานที่จัดกิจกรรม: ' + value.place + '</span>';
                            html += '</div>';
                            html += '<div class="Main2">';
                            html += '<div class="CountStudent">จำนวนผู้เข้าร่วม</div>';
                            html += '<div><span id="last_count_student">' + value.number_of + '</span>/' + value.received + '</div>';
                            html += '</div>';
                            html += '<div class="Main3">';
                            html += '<button type="submit" class="RegisActivity" id="servicebtn' + value.service_ID + '" data="' + value.service_ID + '">สมัครกิจกรรม</button><button type="submit" class="CancelActivity" id="CancelActivity' + value.service_ID + '">ยกเลิก</button>';
                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';
                            $('#showdata').html(html);
                        }

                    });
                    
                }
            });
        }



        function check_activity_regis(id) {
            var booleen = 0;
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo site_url('Volunteer_regis/wherecheck') ?>',
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    if (data === false) {
                        booleen = 1;
                    }
                },
                error: function() {
                    alert('Eror');
                }
            });
            return booleen;
        }


        $('#showdata').on('click', '.RegisActivity', function() {

            var serviceid = $(this).attr('data');
            data = {
                id: serviceid
            }

            if (confirm('ยืนยันการสมัครกิจกรรม')) {

                var temp = check_activity_regis(serviceid);
                console.log(temp);

                if (temp == 0) {
                    alert('ไม่สามารถทำการลงทะเบียนซ้ำได้');
                } else if (temp == 1) {
                    $.ajax({
                        type: 'ajax',
                        method: 'get',
                        url: '<?php echo site_url('Volunteer_regis/regisnotify') ?>',
                        data: data,
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            show_all();
                        },
                        error: function() {
                            alert('Eror');
                        }
                    });
                } else {

                }

            } else {

            }

        });

        //show more detail
        $('.show_data').on('click', '.sh_modal', function() {
            var id = $(this).attr('data');

            html = '';

            $('#ShowDta').modal('show');

            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo site_url('Volunteer_regis/show_whereid') ?>',
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    //alert('Sucess');

                    $.each(data, function(key, value) {


                        var sum = 0;

                        var temp_1 = value.start_time; //รับค่าเวลาเริ่มต้น
                        var temp_2 = temp_1.substring(0, 5); //ตัดค่าจาก  hh:mm:ss => hh:mm
                        var temp_3 = temp_2.replace(":", "."); //แปลง format จาก : => .
                        var start_time = parseFloat(temp_3); //แปลง str => Float

                        var temp_4 = value.end_time; //รับค่าเวลาเริ่มต้น
                        var temp_5 = temp_4.substring(0, 5); //ตัดค่าจาก  hh:mm:ss => hh:mm
                        var temp_6 = temp_5.replace(":", "."); //แปลง format จาก : => .
                        var end_time = parseFloat(temp_6); //แปลง str => Float

                        var sum = end_time - start_time; //คำนวณจำนวน ชม ทั้งหมด

                        $('.modal-title').text(value.service_name); //set name header

                        html += '<p>ผู้รับรองกิจกรรม ชื่อ: ' + value.person_fname + ' นามสกุล: ' + value.person_lname + ' หมายเลขโทรศัพท์ ' + value.phone1 + ' </p>';
                        html += '<p>สถานที่จัดกิจกรรม: ' + value.place + ' </p>';
                        html += '<p>วันที่กำหนด: ' + value.service_date + '  เวลา: ' + value.start_time + '-' + value.end_time + ' ชั่วโมงกิจกรรม: ' + sum + ' ชั่วโมง</p>';
                        html += '<p>จำนวนที่รับสมัคร: ' + value.received + '</p>';
                        html += '<p>รายละเอียดกิจกรรม: ' + value.explanation + ' </p>';
                        $('.content').html(html);
                    });

                },
                error: function() {
                    alert('Error');
                }
            });
        });
    </script>

</body>