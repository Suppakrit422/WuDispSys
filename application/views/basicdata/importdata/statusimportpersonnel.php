<!-- Navigation Bar-->
<div class="page-breadcrumb" id="nav_sty">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">หน้าแรก</a></li>
      <li class="breadcrumb-item active" aria-current="page">การนำเข้าข้อมูลบุคลากร</li>
    </ol>
  </nav>
</div>

<!--import data CSV file to Database-->
<div class="col-lg-12 grid-margin stretch-card">

  <div class="card shadow mb-4">


    <div class="card-header">
      <h6 class="m-0 text-primary"><span class="fas fa-download"></span>&nbsp;การนำเข้าข้อมูลบุคลากร</h6>
    </div>

    <div class="card-body">

      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home"><span><i class="fa fa-exclamation-circle"></i></span>&nbsp;สถานะการอัพเดตข้อมูล</a>
              </li>
             
              
              
              
              
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <h3> <span><i class="	fa fa-check-circle" style="color:#58D68D;font-size:28px;"></i></span>&nbsp;อัพเดตข้อมูลล่าสุด</h3>
                <p>ชื่อไฟล์:&nbsp;&nbsp;Table_usergroup.csv &nbsp;&nbsp;ตาราง:&nbsp;&nbsp;usertype</p>
                <p>การอัพเดตล่าสุด:&nbsp;&nbsp; <?php echo '<label class="text-danger">'.$this->session->userdata('datepersonnel').'</label>';?></p>
                <p>เวลา:&nbsp;&nbsp;<?php echo '<label class="text-danger">'.$this->session->userdata('timepersonnel').'</label>';?>  น. </p>
                <p>จำนวนข้อมูลที่อัพเดท:&nbsp;&nbsp; <?php echo '<label class="text-danger">'.$this->session->userdata('updtpersonnel').'</label>';?>ระเบียน </p>
 <p>จำนวนข้อมูลที่เพิ่ม:&nbsp;&nbsp;<?php echo '<label class="text-danger">'.$this->session->userdata("instpersonnel").'</label>';?>  ระเบียน</p>
 <p>จำนวนข้อมูลว่าง:&nbsp;&nbsp; <?php echo '<label class="text-danger">'.$this->session->userdata("dtnullpersonnel").'</label>';?>  ระเบียน</p>
                <p>จำนวนข้อมูลทั้งหมด:&nbsp;&nbsp; <?php echo '<label class="text-danger">'.$this->session->userdata("checkalldatatmppersonnel").'</label>';?> ระเบียน</p>
              </div>

              
              
              
              
              
              

            </div>
          </div>

        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          
            //Function insert
        

        });
      </script>