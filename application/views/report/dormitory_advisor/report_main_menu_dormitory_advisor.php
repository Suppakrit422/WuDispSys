<link rel="stylesheet" href="<?php echo base_url('re/css/scss_main_menu.scss') ?>">
<link rel="stylesheet" href="<?php echo base_url('re/css/css_report_offencate.css') ?>">

<head>
    <title> ออกรายงาน | ระบบวินัยนักศึกษา</title>
</head>

<body>

    <div class="container-fluid">
        </br>

        <div class="row col-lg-">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header" id="card_4">
                        <h1 class="m-0 text-primary"><span><i class="fa fa-table"></i></span>&nbsp;&nbsp;รายงาน</h1>
                    </div>
                    </br>

                    &nbsp;&nbsp;รายเดือน
                    <a href="<?php echo site_url('ReportDataDormitoryDormitoryAdvisor') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษากระทำความผิดของหอพัก</a>
                  
                    </br>
                    &nbsp;&nbsp;ตามช่วงเวลา
                    <a href="<?php echo site_url('ReportDataDormitoryPeriodTimeDormitoryAdvisor') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษากระทำความผิดของหอพัก</a>
                    
                    <!-- <div class="card-body">

                        
                    </div> -->
                </div>

            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card shadow mb-4">
                    <div class="card-header" id="card_4">
                        <h6 class="m-0 text-primary"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;กราฟ</h6>
                    </div>
                    </br>
                    &nbsp;&nbsp;รายเดือน
                   
                    <a href="<?php echo site_url('ReportChartdormitorycompareHeader   ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก </a>
                   
                    </br>
                    &nbsp;&nbsp;รายปี
                    <a href="<?php echo site_url('ReportChartdormitoryyearHeader    ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>
                    </br>
                    &nbsp;&nbsp;เปรียบเทียบ
                    </br>
                    <a href="<?php echo site_url('ReportChartdormitorycompareHeader   ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>
                    

                </div>
            </div>

        </div>
    </div>