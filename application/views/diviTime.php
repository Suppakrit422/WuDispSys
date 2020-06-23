<link rel="stylesheet" href="<?php echo base_url('re/css/css_notify_user_student.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/step_progress.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/inputfile.css') ?>">




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
        <form action="" name="searchform" method="post" id="searchform">
            <div class="col-lg-2 grid-margin stretch-card">
                <div>
                    <select name="off_ID" id="off_ID">
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

                    <button type="button" class="" name="search_data" id="search_data">ค้นหา</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-20 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header" id="card_2">
                        <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;รายงานนักศึกษาที่กระทำความผิดแยกตามฐานความผิด - ตามช่วงเวลา</h6>
                    </div>

                    <div class="card-body">
                        <table id="style_table" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th id="idsort">ลำดับ</th>
                                    <th>วันที่กระทำผิด</th> 
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>สกุล</th>
                                    <th>คะแนนที่เหลือ</th>
                                    <th>หลักสูตร</th>
                                    <th>หอพัก</th>
                                    <!-- <th>ฐานความผิด</th> -->

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
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {

        showAll();
        getDivisionsSetInDropdownlists();
         $('#tblName').DataTable();
         autoFill: true

        function showAll() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/diviTime/showAll',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var point = 100;
                    var html = '';
                    var n = 1;

                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +

                            '<td> <center>' + n + ' </center></td>' +
                            
                             '<td> <center>' + data[i].committed_date + '</center></td>' +
                            '<td> <center>' + data[i].S_ID + '</center></td>' +
                            '<td> ' + data[i].std_fname + '</td>' +
                            '<td> ' + data[i].std_lname + '</td>' +
                            '<td  align="right">' + data[i].behavior_score + '</right></td>' +
                           
                             
                            '<td> <left>' + data[i].cur_name + '</left></td>' +
                            '<td> <left>' + data[i].dname + '</left></td>' +
                            // '<td> <left>' + data[i].off_desc + '</left></td>' +



                            '</tr>';
                        n += 1;
                    }
                    $('#tdata').empty();
                    $('#showdata').html(html);

                    //$('#dataall').html(num-1);
                },
                error: function() {
                    alert('ไม่มีข้อมูล');
                }
            });
        }

        function getDivisionsSetInDropdownlists() {
            var htmlcode = '';
            $.ajax({
                url: '<?php echo site_url('getOffenseCate/selectDivisions') ?>',
                type: 'GET',
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    htmlcode += '<option>เลือกสำนักวิชา</option>'
                    $.each(data, function(key, value) {
                        htmlcode += '<option value="' + value.dept_ID + '">' + value.dept_name + '</option>'
                    })
                    $('#dept_ID').html(htmlcode);
                },
                error: function() {
                    alert('ไม่มีข้อมูล');
                }
            });
        }

    });

    $('#search_data').click(function(data) {
       
        var data = $('#searchform').serialize();
        // console.log(data);

        $.ajax({
        
            url: '<?php echo site_url('diviTime/datebetween') ?>',
            type: 'post',
                async: false,
                dataType: 'json',
                data:$('#searchform').serialize(),
            success: function(data) {
                console.log(data);
                var htmlcode= '';
               // var i;
                $.each(data, function(key, value) {
                   i++
                        htmlcode += '<tr>';
                        htmlcode += '<td>'+i+'</td>';
                        htmlcode += '<td>'+ value.committed_date +'</td>';
                        htmlcode += '<td>'+ value.S_ID +'</td>';
                        htmlcode += '<td>'+ value.std_fname +'</td>';
                        htmlcode += '<td>'+ value.std_lname +'</td>';
                        htmlcode += '<td>'+ value.behavior_score +'</td>';
                        htmlcode += '<td>'+ value.cur_name +'</td>';
                        htmlcode += '<td>'+ value.dname +'</td>';
                        // htmlcode += '<td>'+ value.off_desc +'</td>';
                    })
                    
                    $('#showdata').html(htmlcode);
                },
                error: function() {
                    alert('ไม่มีข้อมูล');
                }
            });




        });

        $('.Print').click(function() {
            $('#tdata').print()
        });

        $(".test").find('.ImgPrint').on('click', function() {
            //Print ele2 with default options
            $(".test").print({
                mediaPrint: true,
                stylesheet: "https:fonts.googleapis.com/css?family=Sarabun&display=swap"
            });
        });
    
</script>

</html>

</body>