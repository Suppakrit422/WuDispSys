<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  <!--<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Richard V.Welsh</p>
                  <div> 
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div> 
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu"> 
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>-->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <!--<img src="<?php echo base_url('re/images/faces/face1.jpg'); ?>" alt="profile image">-->
            </div>
            <div class="text-wrapper">
              <p class="profile-name" id="fullnamestudent"></p>
              <div>
                <small class="designation text-muted">ผู้ดูแลระบบ</small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url("Admin_dashboard") ?>">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">หน้าแรก</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-content-copy"></i>
          <span class="menu-title">การจัดการข้อมูลพื้นฐาน</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("status") ?>">สถานะนักศึกษา</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Usertype") ?>">ประเภทผู้ใช้งาน</a>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("student") ?>">นักศึกษา</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("personnel") ?>">บุคลากร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Offensecate") ?>">หมวดความผิด</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Offense") ?>">ฐานความผิด</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Dormtype") ?>">ประเภทหอพัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("Dormitory") ?>">หอพัก</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("vehiclestype") ?>">ประเภทยานพาหนะ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("vehicles") ?>">ยานพาหนะ</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("holiday1/edit") ?>">วันหยุด</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("place") ?>">สถานที่</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("curriculum") ?>">หลักสูตร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url("divisions") ?>">หน่วยงาน</a>
            </li>


      </li>
    </ul>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-import" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon fas fa-download"></i>
        <span class="menu-title">การนำเข้าข้อมูล</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-import">
        <ul class="nav flex-column sub-menu">
          </a>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagestudent") ?>">นักศึกษา</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagestatus") ?>">สถานะนักศึกษา</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagepersonnel") ?>">บุคลากร</a>
          </li>




          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagevehicles") ?>">ยานพาหนะ</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagedivisions") ?>">หน่วยงาน</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/pagecurriculum") ?>">หลักสูตร</a>
          </li>


    </li>
    </ul>





    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-status" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon fas fa fa-refresh"></i>
        <span class="menu-title">อัพเดตสถานะการนำเข้าข้อมูล</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-status">
        <ul class="nav flex-column sub-menu">
          </a>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportstudent") ?>">นักศึกษา</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportstatus") ?>">สถานะนักศึกษา</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportpersonnel") ?>">บุคลากร</a>
          </li>




          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportvehicles") ?>">ยานพาหนะ</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportdivisions") ?>">หน่วยงาน</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url("Import_data/statusimportcurriculum") ?>">หลักสูตร</a>
          </li>


    </li>
    </ul>
</div>
</li>
</li>
</ul>
</nav>
<!--3-->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <!--
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Like what you see? Check out our premium version for more.</p>
                <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>
        -->
        <script>
    $(document).ready(function() {
    	selectstudentname();
    	 
	 
        //$('[data-toggle="popover"]').popover();
   //	$("#c1").click(function (){
        	//alert("SSS");
     //   	$("#show_left").html("213");
       // });
    

      
  function selectstudentname() {
              $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/Admin_dashboard/selectstudentname',
                    async: false,
                    dataType: 'json',
                    success: function(data) { // console.log(data); 
                     console.log(data);
                      $('#fullnamestudent').html(data[0].person_fname+' '+data[0].person_lname);
                      //$('#lnamestudent').html(data[0].std_lname);
                    
       
              //$('#dataall').html(num-1);//
          },
          error: function() {
              alert('ไม่มีข้อมูล');
          }
              });
  }
      });



      </script>