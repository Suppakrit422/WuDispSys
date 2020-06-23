<!-- Navigation Bar-->
<div class="page-breadcrumb" id="nav_sty">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">หน้าแรก</a></li>
      <li class="breadcrumb-item active" aria-current="page">การนำเข้าข้อมูลพื้นฐาน</li>
      <li class="breadcrumb-item active" aria-current="page">นักศึกษา</li>
    </ol>
  </nav>
</div>

<!--import data CSV file to Database-->
<div class="col-lg-12 grid-margin stretch-card">

  <div class="card shadow mb-4">


    <div class="card-header">
      <h6 class="m-0 text-primary"><span ></span>&nbsp;การนำเข้าข้อมูลพื้นฐาน</h6>
    </div>

    <div class="card-body">
           <h3> นักศึกษา</h3><br>
    
      
               <h3> <a class="nav-link" data-toggle="tab" ><span>&nbsp;&nbsp;<i class="fas fa-download"></i></span>&nbsp;&nbsp;&nbsp;นำเข้าข้อมูล</a></h3>
          
			<p style="color:#99A3A4;">**รองรับไฟล์ประเภท .csv ในการนำเข้าข้อมูลเข้าเพื่อลงฐานข้อมูล</p>
      		<p style="color:#99A3A4;">กรุณาเลือกไฟล์ที่ต้องการนำเข้า</p>
                
                

                <!-- ส่งค่าไปยัง Contrller Submit_to_db method:import-->
                <form method="post" action="<?php echo site_url() ?>/import_data/importstudent"  id="#" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="file" name="_fileup" id="_fileup"  required accept=".csv, .xls,.xlsx" />
                  </div>
                  <button type="submit" name="btn_submitstudent" class="btn btn-success btn-fw" id="btn_submitstudent">นำเข้า</button>
                </form>
           
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          
            //Function insert
        

        });
      </script>