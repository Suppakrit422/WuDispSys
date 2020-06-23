<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_user_student_history_activity.css') ?>">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<head>
    <title> ประวัติการบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
</head>

<body>

    <meta charset="UTF-8">

    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Student_dashboard') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ประวัติการบำเพ็ญประโยชน์</li>
                </ol>
            </nav>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;ประวัติการบำเพ็ญประโยชน์</h6>
                </div>



                <div class="card-body">


                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th id="detail_activity_regis">ข้อมูลกิจกรรม</th>
                                <th id="status_activity">สถานะกิจกรรม</th>
                                <th id="person_control">ผู้ควบคุม</th>
                            </tr>
                        </thead>

                        <tbody id="showdata">


                        </tbody>

                    </table>




                    <!-- Modal detail-->
                    <div class="modal fade" id="ShowDta" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">รายละเอียดการแจ้งเหตุ</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body content">




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                url: '<?php echo site_url("Volunteer_history/showAll") ?>',
                async: false, //ห้ามลืม
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

                        if (value.results == 0) {
                            htmlcode += '<td><span class="badge badge-success">ผ่านการเข้าร่วม</span></td>'
                        } else if (value.results == 1) {
                            htmlcode += '<td><span class="badge badge-danger">ไม่ผ่านการเข้าร่วม</span></td>'
                        } else {

                        }

                        htmlcode += '<td id="person_control">' + value.person_fname + " " + value.person_lname + '</td>';
                        //htmlcode += '<td><button name="btndel" id="btndel" type="button" class="btn btn-danger btn-rounded btn-fw cancleActivity" data="' + value.service_ID + '">ยกเลิกกิจกรรม</button></td>';
                        htmlcode += '</tr>';

                    });
                    $('#showdata').html(htmlcode);
                }
            });
        }
    </script>





</body>

</html>