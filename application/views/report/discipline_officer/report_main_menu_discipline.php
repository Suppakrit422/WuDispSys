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
                    <a href="<?php echo site_url('ReportDataOffencecateDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามหมวดความผิด</a>
                    <a href="<?php echo site_url('ReportDataOffenceDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามฐานความผิด</a>
                    <a href="<?php echo site_url('ReportDataDivisionsDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามสำนักวิชา</a>
                    <a href="<?php echo site_url('ReportDataCurriculumDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามหลักสูตร</a>
                    <a href="<?php echo site_url('ReportDataDormitoryDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>
                    <a href="<?php echo site_url('ReportDataPlaceDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามสถานที่</a>

                    </br>
                    &nbsp;&nbsp;ตามช่วงเวลา
                    <a href="<?php echo site_url('ReportDataOffencePeriodTimeDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามฐานความผิด</a>
                    <a href="<?php echo site_url('ReportDataDivisionsPeriodTimeDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามสำนักวิชา</a>
                    <a href="<?php echo site_url('ReportDataCurriculumPeriodTimeDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามหลักสูตร</a>
                    <a href="<?php echo site_url('ReportDataDormitoryPeriodTimeDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>
                    <a href="<?php echo site_url('ReportDataPlacePeriodTimeDisciplineOfficer') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i> รายงานนักศึกษาที่กระทำความผิดจำแนกตามสถานที่</a>

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
                    <a href="<?php echo site_url('ReportChartOffencecatemonthHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหมวดความผิด </a>
                    <a href="<?php echo site_url('ReportChartOffencemonthHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามฐานความผิด </a>
                    <a href="<?php echo site_url('ReportChartdivisionsmonthHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามสำนักวิชา</a>
                    <a href="<?php echo site_url('ReportChartcurriculummonthHeader ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหลักสูตร</a>
                    <a href="<?php echo site_url('ReportChartdormitorymonthHeader ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>

                    </br>
                    &nbsp;&nbsp;รายปี
                    <a href="<?php echo site_url('ReportChartOffencecatemonthHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหมวดความผิด </a>
                    <a href="<?php echo site_url('ReportChartdivisionsyearHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามสำนักวิชา</a>
                    <a href="<?php echo site_url('ReportChartcurriculumyearHeader  ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหลักสูตร</a>
                    <a href="<?php echo site_url('ReportChartdormitoryyearHeader ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟแสดงสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก</a>
                    </br>
                    &nbsp;&nbsp;เปรียบเทียบ
                    <a href="<?php echo site_url('ReportChartOffencecatecompareHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามหมวดความผิด </a>
                    <a href="<?php echo site_url('ReportChartOffencecompareHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามฐานความผิด </a>
                    <a href="<?php echo site_url('ReportChartdivisionscompareHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามสำนักวิชา </a>
                    <a href="<?php echo site_url('ReportChartcurriculumcompareHeader ') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามหลักสูตร </a>
                    <a href="<?php echo site_url('ReportChartdormitorycompareHeader') ?>"> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bar-chart"></i> กราฟเปรียบเทียบสถิตินักศึกษาที่กระทำความผิดจำแนกตามหอพัก </a>

                </div>
            </div>

        </div>
    </div>