<div class="bar">

    <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <a href="<?php echo site_url("Headofstudent_affairs_dashboard") ?>">
                <li class="menu-icon mdi mdi-television">หน้าแรก</li>
            </a>

            <a href="<?php echo site_url("Notifyoffense_affairs") ?>">
                <li class="">แจ้งเหตุกระทำความผิด</li>
            </a>
           <a class="" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <li class="menu-icon mdi mdi-airballoon">การบำเพ็ญประโยชน์</li>
            </a>

            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("VolunteerAc_affairs") ?>">เสนอกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Participants_affairs") ?>">รับรองกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Activityoff_affairs") ?>">อนุมัติกิจกรรมบำเพ็ญประโยชน์</a>
                    </li>

                </ul>
            </div>
            <a href="<?php echo site_url("ReportMenuHeader") ?>">
                <li class="menu-icon mdi mdi-chart-bar"> &nbsp;ออกรายงาน</li>
            </a>
        </ul>
    </div>

    