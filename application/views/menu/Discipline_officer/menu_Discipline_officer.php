<div class="bar">

    <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <a href="<?php echo site_url("Discipline_officer_dashboard") ?>">
                <li class="menu-icon mdi mdi-television">หน้าแรก</li>
            </a>

            <a href="<?php echo site_url("Notifyoffense_discipline") ?>">
                <li class="menu-icon mdi mdi-alert-circle">แจ้งเหตุกระทำความผิด</li>
            </a>
            
            <a href="<?php echo site_url("Proofargumentfor_discipline_officer") ?>">
                <li class="menu-icon mdi mdi-account-check">ตรวจสอบการยื่นอุทธรณ์นักศึกษา</li>
            </a>

            <a class="" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <li class="menu-icon mdi mdi-airballoon">การบำเพ็ญประโยชน์</li>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("VolunteerAc_discipline") ?>">เสนอกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Participants_discipline") ?>">รับรองกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Activityoff_discipline") ?>">อนุมัติกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>

                </ul>
            </div>
            <a href="<?php echo site_url("ReportMenuDiscipline") ?>">
                <li class="menu-icon mdi mdi-chart-bar"> &nbsp;ออกรายงาน</li>
            </a>
        </ul>
    </div>