<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_user_security.css'); ?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_regis_activity_student.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_dean_sctivity.css') ?>">
<center>
    <strong>
        <div class="alert alert-success" role="alert" style="display: none;"></div>
    </strong>
    <strong>
        <div class="alert alert-danger" role="alert" style="display: none;"></div>
    </strong>
    <strong>
        <div class="alert alert-warning" role="alert" style="display: none;"></div>
    </strong>
</center>

<head>
<style type='text/css'>
        .my-legend .legend-title {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 90%;
        }

        .my-legend .legend-scale ul {
            margin: 0;
            margin-bottom: 5px;
            padding: 0;
            float:center;
            list-style: none;
        }

        .my-legend .legend-scale ul li {
            font-size: 80%;
            list-style: none;
            margin-left: 0;
            line-height: 18px;
            margin-bottom: 2px;
        }

        .my-legend ul.legend-labels li span {
            display: block;
          
            height: 14px;
            width: 23px;
            margin-right: 5px;
            margin-left: 1px;
            border: 1px solid #999;
        }

        .my-legend .legend-source {
            font-size: 70%;
            color: #999;
            clear: both;
        }

        .my-legend a {
            color: #777;
        }
    </style>
</head>
<br>

<body>
    <meta charset="UTF-8">
    <div class="page-breadcrumb" id="nav_sty">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!--<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>-->
                <li class="breadcrumb-item active" aria-current="page">หน้าแรก</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="col-lg-4 grid-margin stretch-card">

            <div class="col-lg-12 ">

                <div class="col-lg-12 ">
                    <div class="card shadow mb-4">
                        <div class="card-header" id="card_2">
                            <h6 class="m-0 text-primary"></h6>
                        </div>
                        <div class="card shadow mb-3">
                            <div class="card-body " id="card_1">
                                <center>จำนวนนักศึกษาที่กระทำผิด </center>
                                <br>
                                <center><i class="fas fa-users" id="fasfa-users"></i><br>
                                    <table>
                                        <tr>
                                            <td>
                                                <div id="showscorestudent" name="showscorestudent"></div><br>
                                            </td>
                                            <td></td>
                                            <td>
                                                <h3>คน</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-12 ">
                    <div class="card shadow mb-3">
                        <div class="card shadow mb-4">
                            <div class="card-header" id="card_2">
                                <h6 class="m-0 text-primary"></h6>
                            </div>
                            <div class="card-body " id="card_1">
                                <font size="2">
                                    <center>
                                        <h5>ค้นหาความผิดของนักศึกษารายบุคคล</h5>
                                    </center>
                                </font><br>
                                <center>

                                    <form id="formakk" class="example" style="margin:auto;max-width:300px">
                                        <input type="text" id="studentid" placeholder="กรอกรหัสนักศึกษา" name="search">
                                        <button type="button" id="offense_card"><i class="fa fa-search"></i></button>
                                    </form>



                                </center>

                            </div>

                        </div>
                    </div>
                </div>



            </div>





        </div>


        <div class="col-lg-8 grid-margin stretch-card">

            <div class="col-lg-12 ">
                <div class="card shadow mb-4">
                    <div class="card-header" id="card_2">
                        <h6 class="m-0 text-primary"></h6>
                    </div>
                    <div class="card shadow mb-3">
                        <div class="card-body " id="card_1">
                            <font size="4">
                                <center>จำนวนนักศึกษาที่กระทำผิดแต่ละหมวดของมหาลัยทั้งหมด</center>
                            </font>
                            <a href="http://localhost/itproject_59/index.php/Dean_dashboard" class="btn btn-outline-primary btn-sm">ย้อนกลับ</a>
                            <br>


                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            <script type="text/javascript">
                                window.onload = function() {
                                    $.ajax({
                                        type: 'ajax',
                                        url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/getDashboard',
                                        async: false,
                                        dataType: 'json',
                                        success: function(data) {
                                            console.log(data);



                                            var showdata = [];
                                            
                                            data.forEach((x,index)=>{
                                                showdata.push({
                                                dataPoints: [{"oc_ID":x.oc_ID,"label":x.label,"y":x.y,"x":index}],
                                                showInLegend: true,
                                                    legendText: x.label,
                                                    indexLabel: "{y}",
                                                    indexLabelPlacement: "outside",
                                                    indexLabelOrientation: "horizontal",
                                                    click: onClickgraph,
                                                
                                            })
                                            
                                            })



                                         
                                            var chart = new CanvasJS.Chart("chartContainer", {
                                                height: 350,
                                                width: 850,
                                                animationEnabled: true,
                                                animationDuration: 2000, //change to 1000, 500 etc
                                                title: {
                                                    text: "จำนวน (คน)",
                                                    horizontalAlign: "left",
                                                    fontSize: 17,
                                                    // verticalAlign: "center",
                                                },
                                                
                                                axisX: {
                                                    title: "หมวดความผิด",
                                                    gridThickness: 0,
                                                    tickLength: 0,
                                                    lineThickness: 0,
                                                    labelFormatter: function() {
                                                        return " ";
                                                    }
                                                },
                                                axisY: {
                                                 
                                                    
                                                },

                                                data: showdata,
                                            });
                                            chart.render();
                                        },
                                        error: function() {
                                            alert('ไม่มีข้อมูล');
                                        }
                                    });
                                }


                                function onClickgraph(e) {
                                    var id = e.dataPoint.oc_ID
                                    //alert(id);
                                    var data = {
                                        "oc_ID": id
                                    };
                                    console.log(data);

                                    $.ajax({
                                        type: 'ajax',
                                        url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/getDashboardAll',
                                        data: data,
                                        method: 'get',
                                        async: false,
                                        dataType: 'json',
                                        success: function(data) {
                                            console.log(data);




                                            var showdata = [];
                                            
                                            data.forEach((x,index)=>{
                                                showdata.push({
                                                dataPoints: [{"oc_ID":x.oc_ID,"dept_ID":x.dept_ID,"label":x.label,"y":x.y,"x":index}],
                                                showInLegend: true,
                                                    legendText: x.label,
                                                    indexLabel: "{y}",
                                                    indexLabelPlacement: "outside",
                                                    indexLabelOrientation: "horizontal",
                                                    click: onClickgraph2,
                                                
                                            })
                                            
                                            })


                                            
                                            var chart = new CanvasJS.Chart("chartContainer2", {
                                                width: 900,
                                                height: 350,
                                                animationEnabled: true,
                                                animationDuration: 2000, //change to 1000, 500 etc
                                                title: {
                                                    text: "จำนวน (คน)",
                                                    horizontalAlign: "left",
                                                    fontSize: 17,
                                                    // verticalAlign: "center",
                                                },
                                                
                                                axisX: {
                                                    title: "สำนักวิชา",
                                                   
                                                },
                                                axisY: {
                                                 
                                                    
                                                },

                                                data: showdata,
                                            });


                                            chart.render();
                                            $("#oc_desc2").html(data[0].oc_desc); 
                                            
                                        },
                                        error: function() {
                                            alert('ไม่มีข้อมูล');
                                        }
                                    });

                                }

                                function onClickgraph2(e) {
                                    var id = e.dataPoint.oc_ID
                                    var ide = e.dataPoint.dept_ID
//                                  alert(id);
                                    var data = {
                                        "oc_ID": id,
                                        "dept_ID": ide
                                    };
                                    console.log(data);

                                    $.ajax({
                                        type: 'ajax',
                                        url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/getGraphDataSchool',
                                        data: data,
                                        method: 'get',
                                        async: false,
                                        dataType: 'json',
                                        success: function(data) {
                                            console.log(data);
                                            var showdata = [];


                                            data.forEach((x,index)=>{
                                                showdata.push({
                                                dataPoints: [{"oc_ID":x.oc_ID,"label":x.label,"y":x.y,"x":index}],
                                                showInLegend: true,
                                                    legendText: x.label,
                                                    indexLabel: "{y}",
                                                    indexLabelPlacement: "outside",
                                                    indexLabelOrientation: "horizontal",
                                                    
                                                
                                            })
                                            
                                            })
                                            
                                            var chart = new CanvasJS.Chart("chartContainer3", {
                                                width: 900,
                                                height: 350,
                                                animationEnabled: true,
                                                animationDuration: 2000, //change to 1000, 500 etc
                                                title: {
                                                    text: "จำนวน (คน)",
                                                    horizontalAlign: "left",
                                                    fontSize: 17,
                                                    // verticalAlign: "center",
                                                }, 
                                                
                                                axisX: {
                                                    title: "หลักสูตร",
                                                   
                                                },
                                                axisY: {
                                                 
                                                    
                                                },

                                                data: showdata,
                                            });


                                            chart.render();
                                            $("#oc_desc3").html(data[0].oc_desc); 
                                            $("#dept_name2").html(data[0].dept_name); 
                                        },
                                        error: function() {
                                            alert('ไม่มีข้อมูล');
                                        }
                                    });

                                }
                            </script>
                            <br><br><br><br>
                        </div>
                      

                    </div>
                </div>

                <div class="col-lg-8 ">
                    <div class="card shadow mb-3">
                        <font size="4">
                            <div class="card-header" id="card_2">
                                <h6 class="m-0 text-primary"></h6>
                            </div><br>
                            <center>กิจกรรมเพิ่มเติม</center>
                        </font><br>
                        <table align="left" border="0" hight="70" style="width:360px;">
                            <tr>
                                <td><button type="button" class="lobo btn" id="btnAdd">

                                        <font size="4">
                                            <center>กิจกรรมบำเพ็ญประโยชน์ </center>
                                        </font><br>
                                        <i class="far fa-calendar-check" id="farfa-calendar-check"></i>
                                        <br><br><br>
                                        <p id="showscoreservice" name="showscoreservice">
                                            <h3>กิจกรรม</h3>
                                        </p>
                                    </button></td>
                                <td></td>
                                <td><button class="lobo2 btn " id="training_card">
                                        <font size="4">
                                            <center>กิจกรรมการอบรม</center>
                                        </font><br>
                                        <i class="fas fa-chalkboard-teacher" id="fasfa-chalkboard-teacher"></i>
                                        <br><br><br>
                                        <p id="showscoretraining" name="showscoretraining">
                                            <h3>กิจกรรม</h3>
                                        </p>
                                    </button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 950px!important;" role="document">
            <div class="modal-content">
                <div class="card-header1" id="card_2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×&nbsp;</span>
                    </button>
                    <br>
                    <h2 class="m-0 text-primary" id="exampleModalLongTitle">
                        <font size="5">&nbsp;&nbsp;กิจกรรมบำเพ็ญประโยชน์</font>
                    </h2>
                </div>


                <div class="modal-body">
                    <!--ส่วนฟอร์มกิจกรรมบำเพ็ญ-->
                    <form action="1" id="formadd" method="post" class="needs-validation">
                        <div class="form-group" id="input_group_sty">
                            <div class="input-group">


                                <div class="ShowActivity">


                                </div>

                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="ShowTrain" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 950px!important;" role="document">
            <div class="modal-content">
                <div class="card-header1" id="card_2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×&nbsp;</span>
                    </button>
                    <br>
                    <h2 class="m-0 text-primary" id="exampleModalLongTitle">
                        <font size="5">&nbsp;&nbsp;กิจกรรมอบรม</font>
                    </h2>
                </div>

                <div class="modal-body BodyTrain">

                </div>
            </div>
        </div>
    </div>







    <div class="modal fade" id="Showoffen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 950px!important;" role="document">
            <div class="modal-content">
                <div class="card-header1" id="card_2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×&nbsp;</span>
                    </button>
                    <br>
                    <h2 class="m-0 text-primary" id="exampleModalLongTitle">
                        <font size="5">&nbsp;&nbsp;รายละเอียดการกระทำความผิดของนักศึกษา</font>
                    </h2>

                </div>

                <div class="modal-body offenstudent">
                    <form action="" id="formakk" method="post" class="needs-validation">


                        <div class="modal-body showoffense">
                        </div>

                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="Showdashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 950px!important;" role="document">
            <div class="modal-content">
                <div class="" id="card_2">
                    <button type="button" class="close" style="color:black;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×&nbsp;</span>
                    </button>
                    <br>              
                </div>
              
                    <form action="" id="formakk" method="post" class="needs-validation">

                    <font size="4">
                                <center>จำนวนนักศึกษาที่กระทำผิดหมวด<span id="oc_desc2"></span>ของสำนักวิชาทั้งหมด</center>
                            </font>
                        <div class="modal-body" >
                        
                      <div id="chartContainer2" style="height: 340px; width: 100%;"></div>  

                        </div>
<br>
               
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="Showdashboard2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 950px!important;" role="document">
            <div class="modal-content">
                <div class="" id="card_2">
                    <button type="button" class="close" style="color:black;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×&nbsp;</span>
                    </button>
                    <br>              
                </div>
              
                    <form action="" id="formakk" method="post" class="needs-validation">

                    <font size="4">
                                <center>จำนวนนักศึกษาที่กระทำผิดหมวด<span id="oc_desc3"></span>ของสำนักวิชา<span id="dept_name2"></span></center>
                            </font>
                        <div class="modal-body" >
                        
                      <div id="chartContainer3" style="height: 340px; width: 100%;"></div>  

                        </div>
<br>
               
            </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            selectscorestudent();
            selectscoreservice();
            selectscoretraining();

            function selectscorestudent() {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/selectscorestudent',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        // alert(data)
                        $('#showscorestudent').html(data.numberstudent);

                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });
            }

            function selectscoreservice() {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/selectscoreservice',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        // alert(data)
                        $('#showscoreservice').html(data.numberservice);


                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });
            }


            function selectscoretraining() {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/Discipline_officer_dashboard/selectscoretraining',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        // alert(data)
                        $('#showscoretraining').html(data.numbertraining);


                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });
            }

            //โชว์กิจกรรมข้อมูล

            $('#btnAdd').click(function() {
                $('#exampleModalCenter').modal('show');
                show_all();
            });

            $('#training_card').click(function() {
                $('#ShowTrain').modal('show');
                show_ell();

            });
            $('#offense_card').click(function() {
                $('#Showoffen').modal('show');
                search();

            });
            $('#chartContainer').click(function() {
                $('#Showdashboard').modal('show');
                onClickgraph(e);

            });
            $('#chartContainer2').click(function() {
                $('#Showdashboard2').modal('show');
                onClickgraph2(e);

            });


            function show_all() {

                html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("Discipline_officer_dashboard/showAlll") ?>',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {

                            var temp_1 = value.start_time;
                            var temp_2 = value.end_time;
                            var start_times = parseFloat(temp_1.substring(0, 5));
                            var end_times = parseFloat(temp_2.substring(0, 5));
                            var counthour = Math.abs(end_times - start_times);

                            //console.log(counthour);

                            html += '<div class="Data">';
                            html += '<div class="Main4">';
                            html += '<span id="title1">กิจกรรม : ' + value.service_name + '</span>';
                            html += '<span id="title6"> <span><i class="far fa-calendar-alt iconlabel"></i></span> วันที่จัดกิจกรรม : ' + value.service_date + ' </span>';
                            html += '<span id="title6"> <span><i class="fas fa-clock iconlabel"></i></span> เวลาเริ่ม ' + start_times + ' ถึง ' + end_times + ' ชั่วโมงกิกรรม ' + counthour + ' ชม.</span>';
                            html += '<span id="title6"> <span><i class="fas fa-user iconlabel"></i></span>ผู้รับรองกิจกรม: ' + value.person_fname + " " + value.person_lname + '</span>';
                            html += '</div>';
                            html += '<div class="Main5">';
                            html += '<div class="CountStudent">จำนวนผู้เข้าร่วม</div>';
                            html += '<div><span id="last_count_student">' + value.number_of + '</span>/' + value.received + '</div>';
                            html += '</div>';
                            html += '<div class="Main3">';
                            html += '</div>';
                            html += '</div>';


                        });
                        $('.ShowActivity').html(html);
                    }
                });
            }


            function show_ell() {

                html = '';
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("Discipline_officer_dashboard/showactity") ?>',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            var temp_1 = value.start_time;
                            var temp_2 = value.end_time;
                            var start_times = parseFloat(temp_1.substring(0, 5));
                            var end_times = parseFloat(temp_2.substring(0, 5));
                            var counthour = Math.abs(end_times - start_times);

                            html += '<div class="Data">';
                            html += '<div class="Main4">';
                            html += '<span id="title1">กิจกรรม : ' + value.service_name + '</span>';
                            html += '<span id="title6"> <span><i class="far fa-calendar-alt iconlabel"></i></span> วันที่จัดกิจกรรม : ' + value.service_date + ' </span>';
                            html += '<span id="title6"> <span><i class="fas fa-clock iconlabel"></i></span> เวลาเริ่ม ' + start_times + ' ถึง ' + end_times + ' ชั่วโมงกิกรรม ' + counthour + ' ชม.</span>';
                            html += '<span id="title6"> <span><i class="fas fa-user iconlabel"></i></span>ผู้รับรองกิจกรม: ' + value.person_fname + " " + value.person_lname + '</span>';
                            html += '</div>';
                            html += '<div class="Main5">';
                            html += '<div class="CountStudent">จำนวนผู้เข้าร่วม</div>';
                            html += '<div><span id="last_count_student">' + value.number_of + '</span>/' + value.received + '</div>';
                            html += '</div>';
                            html += '<div class="Main3">';
                            html += '</div>';
                            html += '</div>';



                        });
                        $('.BodyTrain').html(html);
                    }
                });
            }

            function search() {

                var studentid = $('#studentid').val();
                //var day = $('#date').val();
                //var mount2 = $('#datemount2').val();
                //var year = $('#dateyear').val();


                var data = {
                    getstdID: studentid
                };

                $.ajax({
                    url: '<?php echo site_url("Discipline_officer_dashboard/searchoffensestudent") ?>',
                    async: false,
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);

                        if (data == false) {
                            alert('ไม่พบข้อมูลดังกล่าว');
                        } else {

                            // html = '<h4>รหัสนักศึกษา: ' + " " + data[0].S_ID  + " " +'ชื่อ : '+ data[0].prefix_name + data[0].std_fname + " " + data[0].std_lname +'</h4>';
                            html = '<h4>รหัสนักศึกษา: ' + " &ensp;" + data[0].S_ID + " &ensp;" + 'ชื่อ : ' + data[0].prefix_name + data[0].std_fname + " " + data[0].std_lname +
                                "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; " + " " + 'คะแนนคงเหลือ : <span id="last_count_student">' + "&ensp;" + data[0].behavior_score +
                                '</h4>' + '<hr width=100% size=5 color="#5B2C6F">';


                            $.each(data, function(key, value) {
                                //htmlweb += '<div class="persondata">';  
                                html += '<div class="Data">';
                                html += '<div class="Main4">';
                                // html += '<span id="title7">รหัสนักศึกษา: ' + value.S_ID + "    " + 'ชื่อ : ' + value.std_fname + " " + value.std_lname + '</span>' + '</span>';
                                html += '<span id="title6">วันที่กระทำผิด:  ' + value.committed_date + '</span>';
                                html += '<span id="title6">ฐานความผิด: ' + value.off_desc + '</span>';
                                html += '<span id="title6">สถานะการกระทำความผิด:  ' + value.statusoffname + '</span>';
                                html += '</div>';
                                html += '<div class="Main5">';
                                html += '<div class="CountStudent">คะแนนที่หัก</div>';
                                html += '<div><span id="last_count_student2">' + '&ensp;' + value.point + '</div>';
                                html += '</div>';
                                html += '</div>';
                                // htmlweb += '<div class="progress_bar">';
                                //  htmlweb += '<div class="progress">';
                                //  htmlweb += '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
                                //  htmlweb += '</div>';
                                // htmlweb += '</div>';
                                // htmlweb += '</div>';
                            });

                            $('.showoffense').html(html);
                        }



                    }

                });


            }







        });
    </script>
</body>

</html>