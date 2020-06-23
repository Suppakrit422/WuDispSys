<link rel="stylesheet" href="<?php echo base_url('re/css/css_notify_user_student.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/step_progress.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/inputfile.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_report_offencate.css') ?>">

<head>
    <title>ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>

</head>
<script>
    var datatable = [];
    var datatest = [];
    var months = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน ', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
</script>
<style>
        .select2-container--open .select2-dropdown--below {
            width: 420px !important;
        }

        .selectplace {
            width: 20rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 2;
            font-size: 14px;
            font-family: 'Taviraj', serif;
        }
    </style>

<body>
    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Headofstudent_affairs_dashboard') ?>" class="breadcrumb-link">หน้าแรก</a></li>
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
                    <form action="" method="get" name="serach_form" id="serach_form">

                        <div class="col-lg-5 grid-margin stretch-card">
                            <div>
                                <select name="offid" id="offid"></select>
                            </div>

                            <div class="col-lg-12 grid-margin stretch-card">
                                <label for="committed_date" class="label">ตั้งแต่ </label>

                                &nbsp;&nbsp;<input type="date" name="firstday" id="firstday" class="input data">&nbsp;&nbsp;

                                <label for="committed_date" class="label">ถึง </label>

                                &nbsp;&nbsp;<input type="date" name="lastday" id="lastday" class="input data"> <br>&nbsp;&nbsp;&nbsp;&nbsp;
                                <div>
                                    <button type="button" class="" id="search_data">ค้นหา</button>

                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;</h6>
                </div>

                <div class="card-body">
                    <div class="Print"><img src="<?php echo base_url('re/images/print.png') ?>" type="pdf" class="ImgPrint" style="max-width:45px"></div>
                    <div class="HeaderReport">
                        <div class="part1">
                            <img src="<?php echo base_url('re/images/logo_sys_mini.png') ?>" alt="left" class="logofile" >
                        </div> 
                        <div class="part2">
                        <br /> <br /> 
                            <div> <span class="title1">มหาวิทยาลัยวลัยลักษณ์ | Walailak University </span></div> <br /> 
                            <div> <span class="title2">ระบบวินัยนักศึกษา | หน่วยงานวินัยนักศึกษา</span></div>
                            <br /> 
<p class="line">________________________________________________________________________________________________________________________________________________________________________________________________</p>
                           
                        </div>
                    </div>
                    <br>
                    <h3>
                        <center>รายงานนักศึกษาที่กระทำความผิด <br> ฐานความผิด<span class="OffenceName"></span> </center>
                    </h3>  <br>
                    <h4>
                        <center>ตั้งแต่วันที่ <span class="DateFromTo"></span></center>
                    </h4>

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
                                <th style="text-align:center">วันที่กระทำความผิด</th>
                                <th style="text-align:center">ชื่อ-นามสกุล</th>
                                <th style="text-align:center">คะแนนคงเหลือ</th>
                                <th style="text-align:center">หลักสูตร</th>
                                <th style="text-align:center">หอพัก</th>
                                <th style="text-align:center">ฐานความผิด</th>

                            </tr>
                        </thead>
                    
                    <br>
                    <footer> 
                            <div class="date_print">วันที่พิมพ์ <span class="DateCur"></div></span> 
                            <div class="page-number" ></div>
                        </footer>
                </div>

                </table>
            </div>
        </div>

    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        getOffenseSetInDropdownlists();


        var example = $('#data_activity_participants').DataTable({
            "language": {
                "paginate": {
                    "previous": "ก่อนหน้า",
                    "next": "ถัดไป"
                }
            },
            "lengthChange": false,
            "searching": false,
            "lengthChange": false,
            "bDestroy": true,
            "data": datatest,
            columns: [{
                    data: 'no',
                    class: 'text-center',
                    title: "ลำดับ"
                },
                {
                    data: 'S_ID',
                    class: 'text-center',
                    title: "รหัสนักศึกษา"
                },
                {
                    data: 'committed_date',
                    title: "วันที่"
                },
                {
                    data: 'std_flname',
                    class: 'text-left',
                    title: "ชื่อ-นามสกุล"
                },
                {
                    data: 'behavior_score',
                    class: 'text-center',
                    title: "คะแนนคงเหลือ"
                },
                {
                    data: 'dname',
                    class: 'text-center',
                    title: "หอพัก"
                },
                {
                    data: 'cur_name',
                    class: 'text-center',
                    title: "หลักสูตร"
                },
                {
                    data: 'off_desc',
                    class: 'text-center',
                    title: "ความผิด"

                }
            ]
        });

        $('.Print').click(function() {
            $('.card-body').print();



        });

        function showDataSet(dataSet) {
            var groupColumn = 2;
            console.log("1");

            if ($.fn.dataTable.isDataTable('#data_activity_participants')) {
                example.destroy();
                $('#data_activity_participants').empty();
            }
            console.log("2");

            example = $('#data_activity_participants').DataTable({
                "lengthChange": false,
                "searching": false,
                "data": dataSet,
                columns: [{
                        data: 'no',
                        class: 'text-center',
                        title: "ลำดับ"
                    },
                    {
                        data: 'S_ID',
                        class: 'text-center',
                        title: "รหัสนักศึกษา"
                    },
                    {
                        data: 'committed_date',
                        title: "วันที่"
                    },
                    {
                        data: 'std_flname',
                        class: 'text-left',
                        title: "ชื่อ-นามสกุล"
                    },
                    {
                        data: 'behavior_score',
                        class: 'text-center',
                        title: "คะแนนคงเหลือ"
                    },
                    {
                        data: 'dname',
                        class: 'text-center',
                        title: "หอพัก"
                    },
                    {
                        data: 'cur_name',
                        class: 'text-center',
                        title: "หลักสูตร"
                    },
                    {
                        data: 'off_desc',
                        class: 'text-center',
                        title: "ความผิด"

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
                    dataSrc: 'committed_date',
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
                            $(rows).eq(i).before('<tr class="group HeaderGroup"><td colspan="7">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
        }

        function monthNumToName(monthnum) {
            return months[monthnum - 1] || '';
        }
        $('#search_data').click(function() {
            const months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
            var OffenceName = $("#offid option:selected").text();

            //Convert DateFrom
            var DateTo = $("#lastday").val();
            var DateTo = new Date(DateTo);
            var day_temp2 = DateTo.getDate();
            var month_temp2 = months[DateTo.getMonth()];
            var year_temp2 = DateTo.getFullYear();
            var convert_year2 = year_temp2 + 543;

            // alert(day_temp2 + "" + month_temp2 + "" + convert_year2);
            var Date2 = day_temp2 + "" + month_temp2 + "" + convert_year2;


            //Convert DateFrom
            var Datefrom = $("#firstday").val();
            var Datefrom = new Date(Datefrom);
            var day_temp = Datefrom.getDate();
            var month_temp = months[Datefrom.getMonth()];
            var year_temp = Datefrom.getFullYear();
            var convert_year = year_temp + 543;

            // alert(day_temp + "" + month_temp + "" + convert_year);
            var Date1 = day_temp + "" + month_temp + "" + convert_year;

            $('.DateFromTo').text(Date1 + " ถึง " + Date2);







            $('.OffenceName').text(OffenceName);
            $('.Datefrom').text(Datefrom);
            $('.DateTo').text(DateTo);

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



            var datatest2 = [];
            var data = $('#serach_form').serialize();
            $.ajax({
                method: 'GET',
                url: '<?php echo site_url('ReportDataOffencePeriodTimeHeader/time_report_offence') ?>',
                async: false,
                dataType: 'json',
                data: data,
                success: function(data) {

                    $.each(data, function(key, value) {

                        const months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
                        let current_datetime = new Date(value.committed_date)
                        var bt_year = current_datetime.getFullYear()
                        var convert_year = bt_year + 543;
                        console.log(bt_year);
                        let formatted_date = current_datetime.getDate() + " " + months[current_datetime.getMonth()] + " " + convert_year;
                        console.log(formatted_date)
                        statusName = '';

                        if (value.statusoff == '0') {
                            statusName = 'รอการรายงานตัว';
                        } else if (value.statusoff == '1') {
                            statusName = 'รอการอนุมัติหลักฐาน';
                        } else if (value.statusoff == '2') {
                            statusName = 'หมดเขตการรายงานตัว';
                        } else if (value.statusoff == '3') {
                            statusName = 'รอการอบรมและการบำเพ็ญประโยชน์';
                        } else if (value.statusoff == '4') {
                            statusName = 'รอการรับรองกิจกรรม';
                        } else if (value.statusoff == '5') {
                            statusName = 'เกินระยะเวลาการอบรมและการบำเพ็ญประโยชน์';
                        } else if (value.statusoff == '6') {
                            statusName = 'คืนคะแนนความประพฤติ';
                        } else {}

                        datatest2.push({
                            no: value.seq_no,
                            S_ID: value.S_ID,
                            committed_date: formatted_date,
                            std_flname: value.std_fname + " " + value.std_lname,
                            behavior_score: value.behavior_score,
                            cur_name: value.cur_name,
                            dname: value.dorm_ID,
                            off_desc: value.off_desc
                        });
                    });


                }
            });
            showDataSet(datatest2);
        });


    });


    function getOffenseSetInDropdownlists() {
        var htmlcode = '';
        $.ajax({
            url: '<?php echo site_url('getOffenseCate/selectOffense') ?>',
            type: 'get',
            async: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                htmlcode += '<option>เลือกฐานความผิด</option>'
                $.each(data, function(key, value) {
                    htmlcode += '<option value="' + value.off_ID + '">' + value.off_desc + '</option>'
                })
                $('#offid').html(htmlcode);
            },
            error: function() {
                alert('ไม่มีข้อมูล');
            }
        });
    }
</script>

</html>

</body>