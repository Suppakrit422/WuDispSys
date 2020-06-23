<div class="bar">

    <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <a href="<?php echo site_url("Teacher_dashboard") ?>">
                <li class="menu-icon mdi mdi-television">หน้าแรก</li>
            </a>

            <a href="<?php echo site_url("Notifyoffense_teacher") ?>">
                <li class="menu-icon mdi mdi-alert-circle">แจ้งเหตุกระทำความผิด</li>
            </a>

            <a class="" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <li class="menu-icon mdi mdi-airballoon">การบำเพ็ญประโยชน์</li>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("VolunteerAc_teacher") ?>">เสนอกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Participants_Teacher") ?>">รับรองกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Activityoff_Teacher") ?>">อนุมัติกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>

                </ul>
            </div>
            <a class="" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <li class="menu-icon mdi mdi-airballoon">ออกรายงาน</li>
            </a>

            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                   
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("ReportDataTeacher") ?>">รายชื่อนักศึกษาที่กระทำความผิด</a>
                    </li>
                   
                    
                </ul>
            </div>
        </ul>
    </div>