<div class="bar">

    <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <a href="<?php echo site_url("Student_dashboard") ?>">
                <li class="menu-icon mdi mdi-television">หน้าแรก</li>
            </a>

            <a href="<?php echo site_url("Std_info") ?>">
                <li class="menu-icon mdi mdi-account">ข้อมูลส่วนตัว</li>
            </a>

            <a href="<?php echo site_url("Notifyoffense") ?>">
                <li class="menu-icon mdi mdi-alert-circle">แจ้งเหตุกระทำความผิด</li>
            </a>


            <a class="" data-toggle="collapse" href="#reportperson" aria-expanded="false" aria-controls="ui-basic">
                <li class="menu-icon mdi mdi-format-list-checks">รายงานตัวผู้กระทำความผิด</li>
            </a>

            <div class="collapse" id="reportperson">
                <ul class="nav flex-column sub-menu">           
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("OffenseHead") ?>">รายงานตัว/ยื่นอุทธรณ์ความผิด</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Proofargument") ?>">ติดตามผลการอุทธรณ์ความผิด</a>
                    </li>
                </ul>
            </div>

            <a class="" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <li class="menu-icon mdi mdi-airballoon">การบำเพ็ญประโยชน์</li>
            </a>



            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("VolunteerMyActivity") ?>">กิจกรรมทั้งหมดของฉัน</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Volunteer_regis") ?>">ลงทะเบียนการบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("FileActivityStudent") ?>">ส่งหลักฐานการบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("VolunteerAc") ?>">เสนอการบำเพ็ญประโยชน์</a>
                    </li>
                    <li class="submenu">
                        <a class="nav-link" href="<?php echo site_url("Volunteer_history") ?>">ประวัติการบำเพ็ญประโยชน์</a>
                    </li>

                </ul>
            </div>
        </ul>
    </div>