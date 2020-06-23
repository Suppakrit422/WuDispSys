<link rel="stylesheet" href="<?php echo base_url('re/css/css_notify_user_student.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/step_progress.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/inputfile.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_report_offencase.css') ?>">

<head>
    <title>ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
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
</head>
<script>
    var datatable = [];
    var datatest = [];
</script>

<body>
    <div class="container-fluid">

        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('#') ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ออกรายงาน</li>
                </ol>
            </nav>
        </div>

        <form action="" method="get" name="serach_form" id="serach_form">
            <div class="col-lg-2 grid-margin stretch-card">
                <div>
                    <select name="deptid" id="deptid">

                    </select>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-10 grid-margin stretch-card">
                    <label for="committed_date" class="lablel"><span><i class="far fa-calendar-alt iconlabel"></i></span>ตั้งแต่วันที่ :
                    </label>
                    <input type="date" name="firstday" id="firstday" class="input data">

                    <label for="committed_date" class="lablel"><span><i class="far fa-calendar-alt iconlabel"></i></span>ถึงวันที่ :
                    </label>
                    <input type="date" name="lastday" id="lastday" class="input data">

        </form>

        <button type="button" class="" id="search_data">ค้นหา</button>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;รายงานนักศึกษาที่กระทำความผิดแยกตามฐานความผิด - ตามช่วงเวลา</h6>
                </div>

                <div class="card-body">
                    <table id="style_table" class="display" style="width:100%">
                        <!-- <thead>
                            <tr>
                                <th id="idsort">ลำดับ</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ-สกุล</th>
                                <th>คะแนนที่เหลือ</th>
                                <th>หลักสูตร</th>
                                <th>หอพัก</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">

                        </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        getDivisionsSetInDropdownlists();


        var example = $('#style_table').DataTable({
            "data": datatest,
            columns: [{
                        data: 'no',
                        title: "ลำดับ"
                    },
                    {
                        data: 'S_ID',
                        title: "รหัสนักศึกษา"
                    },
                    {
                        data: 'committed_date',
                        title: "วันที่"
                    },
                    {
                        data: 'std_flname',
                        title: "ชื่อ-นามสกุล"
                    },
                    {
                        data: 'behavior_score',
                        title: "คะแนนคงเหลือ"
                    },
                    {
                        data: 'cur_name',
                        title: "หลักสูตร"
                    },
                    {
                        data: 'off_desc',
                        title: "ความผิด"
                    }

            ]
        });



        function showDataSet(dataSet) {
            var groupColumn = 2;
            console.log("1");

            if ($.fn.dataTable.isDataTable('#style_table')) {
                example.destroy();
                $('#style_table').empty();
            }
            console.log("2");

            example = $('#style_table').DataTable({
                "data": dataSet,
                columns: [{
                        data: 'no',
                        title: "ลำดับ"
                    },
                    {
                        data: 'S_ID',
                        title: "รหัสนักศึกษา"
                    },
                    {
                        data: 'committed_date',
                        title: "วันที่"
                    },
                    {
                        data: 'std_flname',
                        title: "ชื่อ-นามสกุล"
                    },
                    {
                        data: 'behavior_score',
                        title: "คะแนน"
                    },
                    {
                        data: 'cur_name',
                        title: "หลักสูตร"
                    },
                    {
                        data: 'off_desc',
                        title: "ความผิด"
                    }
                    
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [2, 3, 4],
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
                "displayLength": 5,
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
                            $(rows).eq(i).before('<tr class="group HeaderGroup"><td colspan="8">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
        }

        $('#search_data').click(function() {
            
            var datatest2 = [];
            var data = $('#serach_form').serialize();
            $.ajax({
                method: 'GET',
                url: '<?php echo site_url('ReportDataDivisionsTimeHeader/time_report_divisions') ?>',
                async: false,
                dataType: 'json',
                data: data,
                success: function(data) {
                    console.log(data);                    
                    $.each(data, function(key, value) {
                        const months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
                        let current_datetime = new Date(value.committed_date)
                        var bt_year =current_datetime.getFullYear()
                        var convert_year = bt_year+543;
                        console.log(bt_year);
                        let formatted_date = current_datetime.getDate() + " " + months[current_datetime.getMonth()] + " " + convert_year;
                        console.log(formatted_date)

                        datatest2.push({
                            no:value.seq_no,
                            S_ID: value.S_ID,
                            committed_date:formatted_date,
                            std_flname: value.std_fname +  " " + value.std_lname,
                            behavior_score: value.behavior_score,
                            cur_name: value.cur_name,
                            off_desc: value.off_desc
                        });
                    });


                }
            });
            showDataSet(datatest2);
        });


    });

    function getDivisionsSetInDropdownlists() {
        var htmlcode = '';
        $.ajax({
            url: '<?php echo site_url('getOffenseCate/selectDivisions') ?>',
            type: 'get',
            async: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                htmlcode += '<option>เลือกสำนักวิชา</option>'
                $.each(data, function(key, value) {
                    htmlcode += '<option value="' + value.dept_ID + '">' + value.dept_name + '</option>'
                })
                $('#deptid').html(htmlcode);
            },
            error: function() {
                alert('ไม่มีข้อมูล');
            }
        });
    }




    /* $('#search_data').click(function() {
         var datatest2 = [];
         datatest2.push({
             a1: "5",
             a2: "6",
             a3: "7",
             a4: "8"
         });

         showDataSet(datatest2);


         var data = $('#serach_form').serialize();
         $.ajax({
             method: 'GET',
             url: '<?php echo site_url('ReportDataOffenceTimeHeader/time_report_offence') ?>',
             async: false,
             dataType: 'json',
             data: data,
             success: function(data) {

                 $.each(data, function(key, value) {
                     datatable.push({
                         committed_date: value.committed_date,
                         S_ID: value.S_ID,
                         std_flname: value.std_fname + value.std_lname,
                         behavior_score: value.behavior_score,
                         cur_name: value.cur_name,
                         dname: value.dname
                     });
                 });


             }
         });

     });*/
</script>

</html>

</body>