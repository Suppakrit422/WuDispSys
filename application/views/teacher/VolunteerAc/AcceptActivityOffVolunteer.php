<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_accept_activity_off_.css') ?>">

<head>
    <title> อนุมัติกิจกรรมบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
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
                    <li class="breadcrumb-item active" aria-current="page">อนุมัติกิจกรรมบำเพ็ญประโยชน์</li>
                </ol>
            </nav>
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;อนุมัติกิจกรรมการบำเพ็ญประโยชน์</h6>
                </div>

                <div class="card-body">
                    <table id="style_table" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th id="detail_activity_regis">ข้อมูลกิจกรรม</th>
                                <th id="status">สถานะ</th>
                                <th id="person_control">ผู้เสนอกิจกรรม</th>
                                <th id="manage">จัดการกิจกรรม</th>
                            </tr>
                        </thead>

                        <tbody id="showdata">
                            <!-- <tr>
                                <td>1</td>
                                <td>
                                    <div class="DetailActivity">
                                        <span id="activity_name">กิจกรรม: รณรงค์ขัยขี่ปลอดภัย</span>
                                        <span id="date_activity">วันที่จัดกิจกรรม : 12 ธันวาคม 2563</span>
                                        <span id="time_activity">เวลาเริ่ม 21.30 ถึง 22.00 ชั่วโมงกิกรรม 30 นาที</span>
                                        <span id="place">สถานที่: xxxx</span>
                                    </div>
                                </td>
                                <td id="person_control"> สินทัน ชูทอง </td>
                                <td id="btn_accept_td"> <span class="accept_activity">อนุมัติกิจกรรม</span> </td>
                            </tr>
                             -->
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accept_activity_modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:850px!important;" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title">อนุมัติกิจกรรมบำเพ็ญประโยชน์</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="DetailActivity_modal">
                        <div class="part1">
                            <span class="title">ข้อมูลกิจกรรม</span>
                            <div class="Data">
                                <span class="title ActivityName"></span>
                                <span class="title DateActivity"></span>
                                <span class="title PaticipantCount"></span>
                                <span class="title PersonAccept"></span>
                                <span class="title Place">สถานที่จัดกิจกรรม:</span>
                                <span class="title DetailActivity_modal_1">รายละเอียดกิจกรรม:</span><br>
                                <span class="title PersonOfferActivity">ผู้เสนอกิจกรรม: นายเทียนพอ พอเพียง ตำแหน่ง นักศึกษา</span>
                                <form action="" method="post" name="form-accept" id="form-accept">
                                    <input type="hidden" name="service_ID" id="service_ID">
                                    <div class="ChoiceAccept">
                                        <span class="title acceptperson">อนุมัติการเป็นผู้รับรองกิจกรรม</span>
                                        <div>
                                            <label class="radio-inline label"><input type="radio" name="status" class="AcceptActivity" value="1" checked>รับรอง</label>
                                            <label class="radio-inline label"><input type="radio" name="status" class="UnAcceptActivity" value="0">ไม่รับรอง</label>
                                        </div>
                                    </div>
                                    <div class="ResonNotAccept">
                                        <span class="title">หมายเหตุ: </span>
                                        <textarea class="form-control" name="explanation" id="reson_not_accept" cols="30" rows="10" placeholder="เหตุผลที่ไม่อนุมัติกิจกรรม"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="part2">
                            <img src="<?php echo base_url('re/images/help.png') ?>" alt="" srcset="" class="Imglogo">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                </div>

            </div>
        </div>
    </div>




</body>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('Ready Webpage');
        show_all();
    });

    function show_all() {

        html = '';
        i = 0;
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("Teacher_dashboard/selectservice") ?>',
            dataType: 'json',
            async: false,
            success: function(data) {
                console.log(data);
                $.each(data, function(key, value) {

                    var spendtimes_temp = convert_time_(value.start_time, value.end_time);
                    var spendtimes = spendtimes_temp.substring(0, 5);

                    if (spendtimes.substring(0, 2) == "00") {
                        //console.log ('xxxx');
                        var string_times = 'นาที';
                    } else {
                        var string_times = 'ชั่วโมง';
                    }
                    var temp_1 = value.start_time;
                    var temp_2 = value.end_time;
                    var show_start_time = temp_1.substring(0, 5);
                    var show_end_times = temp_2.substring(0, 5);

                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>';
                    html += '<div class="DetailActivity">';
                    html += '<span id="activity_name">กิจกรรม: ' + value.service_name + '</span>';
                    html += '<span id="date_activity">วันที่จัดกิจกรรม : ' + value.service_date + '</span>';
                    html += '<span id="time_activity">เวลาเริ่ม ' + show_start_time + ' ถึง ' + show_end_times + ' ชั่วโมงกิกรรม ' + spendtimes + " " + string_times + '</span>';
                    html += '<span id="place">สถานที่: ' + value.place + '</span>';
                    html += '</div>';
                    html += '</td>';

                    if (value.status == 0) {
                        html += '<td class="StatusActivity"><span class="badge badge-primary status">รอบุคลากรอนุมัติ</span></td>';
                    } else if (value.status == 1) {
                        console.log(555);
                        html += '<td class="StatusActivity"><span class="badge badge-secondary status">รอเจ้าหน้าที่วินัยอนุมัติ</span></td>';
                    } else if (value.status == 2) {
                        html += '<td class="StatusActivity"><span class="badge badge-success status">อนุมัติกิจกรรม</span></td>';
                    } else if (value.status == 3) {
                        html += '<td class="StatusActivity"><span class="badge badge-danger status">บุคลากรไม่อนุมัติกิจกรรม</span></td>';
                    } else if (value.status == 4) {
                        html += '<td class="StatusActivity"><span class="badge badge-danger status">เจ้าหน้าที่วินัยไม่อนุมัติกิจกรรม</span></td>';
                    } else {
                        //stament
                    }
                    html += '<td id="person_control"> ' + value.proposer_fname + " " + value.proposer_lname + ' </td>';
                    if (value.status == 0){
                        html += '<td id="btn_accept_td"><button class="btn btn-success btn-rounded btn-fw accept" data="' + value.service_ID + '" >อนุมัติกิจกรรม</button></td>';
                    } else if (value.status != 0){
                        html += '<td id="btn_accept_td"><span class="TitleSucessMeassage">ทำรายการเรียบร้อย</span></td>';
                    } else{
                        //stament
                    }
                    html += '</tr>';

                    
                    dataservices.push({
                        service_id: value.service_ID,
                        service_name: value.service_name,
                        date: value.service_date,
                        place: value.place,
                        getperson: value.received,
                        detailactivity: value.explanation,
                        proposer:value.proposer_fname + " " + value.proposer_lname,
                        acceptperson: value.person_fname +" "+ value.person_lname,
                        position: 'A',
                        start_time: show_start_time,
                        end_time: show_end_times,
                        spendtimes: spendtimes,
                        unittimes: string_times
                    });

                    $('#showdata').html(html);
                });
            }
        });
    }

    function convert_time_(start_times, end_times) {
        var spendtimes;
        data = {
            start_times: start_times,
            end_time: end_times
        }

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("Teacher_dashboard/convert_times") ?>',
            data: data,
            async: false,
            success: function(data) {
                spendtimes = data;
                //console.log(spendtimes);
            },
            error: function(data) {
                alert(data);
            }
        });
        return spendtimes;
    }



    $('#showdata').on('click', '.accept', function() {
        $('#accept_activity_modal').modal('show');
        var serviceid = $(this).attr('data');

        $.each(dataservices, function(key, value) {
            //console.log(value.service_id);
            if (value.service_id == serviceid) {
                $('#service_ID').val(value.service_id);
                $('.ActivityName').text("ชื่อกิจกรรม: " + value.service_name);
                $('.DateActivity').text("วันที่จัดกิจกรรม: " + value.date);
                $('.PaticipantCount').text("จำนวนรับสมัคร: " + value.getperson);
               // $('.PersonAccept').text("ผู้รับรองกิจกรรม:" + value.acceptperson);
                $('.Place').text("สถานที่จัดกิจกรรม:  " + value.place);
                $('.DetailActivity_modal_1').text("รายละเอียดกิจกรรม:  " + value.detailactivity);
                $('.PersonOfferActivity').text('ผู้เสนอกิจกรรม: ' + value.proposer + ' ตำแหน่ง ' + value.position + '');
            }
        });
    });

    $('#btnSave').click(function() {
        console.log(555);
        var data = $('#form-accept').serialize();
        console.log(data);
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("Teacher_dashboard/Updateactivityforperson") ?>',
            data: data,
            dataType: 'json',
            async: false,
            success: function(data) {
                console.log(data)
                if (data == true) {
                    alert('ดำเนินการส่งกิจกรรมให้เจ้าหน้าวินัยทำการอนุมัติเรียบร้อย !');
                    $('#accept_activity_modal').modal('hide');
                    location.reload();
                }
            }
        });
    });

    $('.UnAcceptActivity').click(function() {
        $('.ResonNotAccept').show();
    });

    $('.AcceptActivity').click(function() {
        $('.ResonNotAccept').hide();
    });
</script>