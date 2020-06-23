<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_show_activity_.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/normalize.min.css') ?>">
<!-- <link rel="stylesheet" href="<?php echo base_url('re/css/css_report_offencase.css') ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('re/css/css_report_offencate.css') ?>">


<head>
    <!-- <title> รับรองกิจกรรมบำเพ็ญประโยชน์ | ระบบวินัยนักศึกษา</title> -->
</head>
<script>
    var dataset = [];
    var dataservices = [];
    var months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน ', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
</script>

<body>



    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Dean_dashboard') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ออกรายงาน</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header" id="card_2">
                        <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;</h6>
                    </div>
                    <div class="card-body">
                    <div class="Print" ><img src="<?php echo base_url('re/images/print.png') ?>"  class="ImgPrint"  style="max-width:45px" ></div>

                    <div class="HeaderReport">
                            <div class="part1">
                                <img src="<?php echo base_url('re/images/logo_sys_mini.png') ?>" alt="" class="logofile" width="90px">
                            </div>
                            <div class="part2">
                                <span class="title1">มหาวิทยาลัยวลัยลักษณ์ | Walailak University</span>
                                <span class="title2">ระบบวินัยนักศึกษา | หน่วยงานวินัยนักศึกษา</span>

                            </div>
                        </div>
                        <br>
                        <h2>
                            <center>รายงานนักศึกษาที่กระทำความผิดสำนักวิชาสารสนเทศศาสตร์ ประจำเดือน <span class="MontsNameYear"></span>
                        </h2>
                        </center>
                        <table id="data_activity_participants" class="table table-striped table-bordered" style="width:100%">
                            <colgroup>
                                <col width="0.5%">
                                <col width="10%">
                                <col width="18%">
                                <col width="10%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead class="table-active">
                                <tr>
                                    <th style="text-align:center">ลำดับ</th>
                                    <th style="text-align:center">รหัสนักศึกษา</th>
                                    <th style="text-align:center">ชื่อ-นามสกุล</th>
                                    <th style="text-align:center">คะแนนคงเหลือ</th>
                                    <th style="text-align:center">หลักสูตร</th>
                                    <th style="text-align:center">หอพัก</th>
                                    <th style="text-align:center">ฐานความผิด</th>
                                    <th style="text-align:center">สถานะการกระทำผิด</th>


                                </tr>
                            </thead>
                        </table>
                        <br>
                        <footer> 
                            <div class="date_print">วันที่พิมพ์ <span class="DateCur"></div></span> 
                            <div class="page-number" ></div>
                        </footer>
                    </div>
                </div>
                <div class="col-lg-2 grid-margin stretch-card">

                </div>
            </div>



        </div>



        <script type="text/javascript">
            $(document).ready(function() {
                showall();
                var date = new Date();
                var month = (date.getMonth() + 1);
                var years = date.getFullYear();
                var convertYears = years + 543;
                monthName = monthNumToName(month);

                var d = date.getDate();
                var day = date.getDay();
                var days = new Array('อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์');
                $('.MontsNameYear').text(monthName + 'พ.ศ. ' + convertYears);
                $('.DateCur').text(d + " " + monthName + " " + 'พ.ศ.' + " " + convertYears);





                $('.Print').click(function() {
                    $('.card-body').print();



                });


                var groupColumn = 4;
                $('#data_activity_participants').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "ก่อนหน้า",
                            "next": "ถัดไป"
                        }
                    },
                    "lengthChange": false,
                    "bDestroy": true,
                    "data": dataset,
                    columns: [{
                            data: 'no',
                            class: 'text-center'
                        },
                        {
                            data: 'S_ID',
                            class: 'text-center'
                        },
                        {
                            data: 'name',
                            class: 'text-left'
                        },
                        {
                            data: 'score',
                            class: 'text-center'
                        },
                        {
                            data: 'cur_name'
                        },
                        {
                            data: 'dname',
                            class: 'text-center'
                        },
                        {
                            data: 'off_desc'
                        },
                        {
                            data: 'status',
                            class: 'text-center'
                        }
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 2, 3, 4, 5, 6, 7],
                    }, {
                        "visible": false,
                        "targets": groupColumn
                    }],
                    "order": [
                        [groupColumn, 'asc']
                    ],
                    rowGroup: {
                        dataSrc: 'dept_name',
                        startRender: null,
                        endRender: function(rows, group) {
                            return group + ' (' + rows.count() + ')';
                        },

                    },
                    "displayLength": 15,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;

                        api.column(groupColumn, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                console.log(group);
                                $(rows).eq(i).before('<tr class="group HeaderGroup"><td colspan="7">' + 'หลักสูตร' + group + '</td></tr>');
                                last = group;
                            }
                        });


                    }
                });


            });

            function monthNumToName(monthnum) {
                return months[monthnum - 1] || '';
            }


            function showall() {
                var i = 0;
                var date = new Date();
                var date_current = (date.getMonth() + 1);
                var years = date.getFullYear();
                data = {
                    date_current: date_current,
                    year_current: years
                }

                $.ajax({
                    url: '<?php echo site_url('ReportDataDivisionsDean/showall') ?>',
                    type: 'GET',
                    async: false,
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);

                        $.each(data, function(key, value) {
                            statusName = '';

                            if (value.statusoff == '0'){
                                statusName = 'รอการรายงานตัว';
                            }else if (value.statusoff == '1'){
                                statusName = 'รอการอนุมัติหลักฐาน';
                            }else if (value.statusoff == '2'){
                                statusName = 'หมดเขตการรายงานตัว';
                            }else if (value.statusoff == '3'){
                                statusName = 'รอการอบรมและการบำเพ็ญประโยชน์';
                            }else if (value.statusoff == '4'){
                                statusName = 'รอการรับรองกิจกรรม';
                            }else if (value.statusoff == '5'){
                                statusName = 'เกินระยะเวลาการอบรมและการบำเพ็ญประโยชน์';
                            }else if (value.statusoff == '6'){
                                statusName = 'คืนคะแนนความประพฤติ';
                            }else{}

                            dataset.push({
                                no: value.seq_no,
                                S_ID: value.S_ID,
                                name: value.std_fname + " " + value.std_lname,
                                score: value.behavior_score,
                                cur_name: value.cur_name,
                                dname: value.dname,
                                off_desc: value.off_desc,
                                status: statusName

                            })
                        });
                        console.log(dataset);
                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });
            }
            $(function() {


            });
        </script>


</body>