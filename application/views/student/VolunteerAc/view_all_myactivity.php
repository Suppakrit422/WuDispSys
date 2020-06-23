<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_all_my_activity.css') ?>">


<head>
    <title> กิจกรรมทั้งหมดของฉัน | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
</head>

<script>
    var data_student_register = [];
</script>

<body>



    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">กิจกรรมทั้งหมดของฉัน</li>
                </ol>
            </nav>
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;กิจกรรมทั้งหมดของฉัน</h6>
                </div>

                <div class="card-body">
                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th id="detail_activity_regis">ข้อมูลกิจกรรม</th>
                                <th id="person_control">ผู้รับรองกิจกรรม</th>
                                <th id="manage">จัดการกิจกรรม</th>
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

            var htmlcode = '';
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("Volunteer_history/showAll") ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var i = 0;
                    $.each(data, function(key, value) {
                        i++;
                        htmlcode += '<tr>';
                        htmlcode += '<td>' + i + '</td>';
                        htmlcode += '<td>';
                        htmlcode += '<div class="DetailActivity">';
                        htmlcode += '<span id="activity_name">กิจกรรม:' + value.service_name + '</span>';
                        htmlcode += '<span id="date_activity">วันที่จัดกิจกรรม: ' + value.service_date + ' </span>';
                        htmlcode += '<span id="time_activity">เวลาเริ่ม 08.00 ถึง 09.00 ชั่วโมงกิกรรม 1 ชม.</span>';
                        htmlcode += '<span id="type_activity">ประเภทกิจกรรม : กิจกรรมบำเพ็ญประโยชน์</span>';
                        htmlcode += '<span id="place">สถานที่ :' + value.place + '</span>';
                        htmlcode += '</div>';
                        htmlcode += '</td>';
                        htmlcode += '<td id="person_control"> ' + value.person_fname + " " + value.person_lname + '</td>';
                        htmlcode += '<td><button name="btndel" id="btndel" type="button" class="btn btn-danger btn-rounded btn-fw cancleActivity" data="' + value.par_ID + '">ยกเลิกกิจกรรม</button></td>';
                        htmlcode += '</tr>';

                        data_student_register.push({
                            service_ID: value.service_ID,
                            service_name: value.service_name,
                            person_ID: value.person_ID,
                            proposer: value.person_ID,
                            place: value.place,
                            service_date: value.service_date,
                            start_time: value.start_time,
                            end_time: value.end_time,
                            received: value.received,
                            number_of: value.number_of,
                            status: value.status,
                            results: value.results,
                            annotation: value.annotation,
                            explanation: value.explanation,
                            activity_type1: value.activity_type1,
                            prefixID: value.prefixID,
                            person_fname: value.person_fname,
                            person_lname: value.person_lname,
                            position: value.position,
                            sex: value.sex,
                            email: value.email,
                            phone1: value.phone1,
                            phone2: value.phone2,
                            dept_ID: value.dept_ID,
                            cur_ID: value.cur_ID,
                            usertype_ID: value.usertype_ID,
                            username: value.username,
                            password: value.password,
                            flag: value.flag,
                            par_ID: value.par_ID,
                            S_ID: value.S_ID,
                            confirm_name: value.confirm_name,
                            certificat_date: value.certificat_date,
                            activity_time: value.activity_time,
                            document_file: value.document_file,
                            activity_type2: value.activity_type2,
                            statusname: value.statusname,
                        });
                        $('#showdata').html(htmlcode);
                    });

                }
            });
        }

        function calculate_dif_date(date) {

            var dateservice = date;

            var date = new Date();
            var date1 = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            var date2 = dateservice;

            // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
            date1 = date1.split('-');
            date2 = date2.split('-');

            // Now we convert the array to a Date object, which has several helpful methods
            date1 = new Date(date1[0], date1[1], date1[2]);
            date2 = new Date(date2[0], date2[1], date2[2]);

            // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
            date1_unixtime = parseInt(date1.getTime() / 1000);
            date2_unixtime = parseInt(date2.getTime() / 1000);

            // This is the calculated difference in seconds
            var timeDifference = date2_unixtime - date1_unixtime;

            // in Hours
            var timeDifferenceInHours = timeDifference / 60 / 60;

            // and finaly, in days :)
            var timeDifferenceInDays = timeDifferenceInHours / 24;

            return (timeDifferenceInDays);
        }


        function cancle_activity(id) {
            par_id = id;
            console.log (par_id);
            data={
                par_ID:par_id
            }

            $.ajax({
                type: 'GET',
                url: '<?php echo site_url("VolunteerMyActivity/deletemyactivity") ?>',
                async: false,
                data:data,
                dataType: 'json',
                success: function(data) {
                    if (data == true){
                        alert ('ยกเลิกกิจกรรมเรียบร้อย !');
                        location.reload();
                    }else{
                        alert ('ไม่สามารถยกเลิกกิจกรรมดังกล่าวได้ในขณะนี้');
                    }
                }
            });
        }


        $('#showdata').on('click', '.cancleActivity', function() {

            var par_id = $(this).attr('data');
            console.log(par_id);

            if (confirm('ต้องการยกเลิกกิจกรรมลงทะเบียน')) {

                $.each(data_student_register, function(key, value) {

                    if (value.par_ID == par_id) {
                        var dayleft = calculate_dif_date(value.service_date);
                        if (dayleft <= 3) {
                            alert('ไม่สามารถทำการยกเลิกกิจกรรมดังกล่าวได้ กรุณาติดต่อหน่วยงานวินัยนักศึกษา โทร.075-673-392');
                        } else if (dayleft > 3) {
                            cancle_activity(par_id);
                        } else {
                            //stament
                        }
                    }
                });
            } else {
                //stament
            }

        });
    </script>

</body>