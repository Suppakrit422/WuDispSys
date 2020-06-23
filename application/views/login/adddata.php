<!doctype html>
<html lang="en">

<head>

  <title>แก้ไขข้อมูล admin</title>

</head>
<body>
  <meta charset="UTF-8">
  <?php 
  echo '<label><a href="'.base_url().'index.php/loginuser/select">กลับ</a></label>'; 

  ?>
<br>
<H1>เพิ่มข้อมูล </H1><br>
  
<form method="post" action="<?php echo base_url(); ?>index.php/loginuser/insert">
            <br>
            username :<input type="text" name="username"   placeholder="ชื่อผู้ใช้งาน" required><br><br>
            password :<input type="password"  name="password"   placeholder="รหัสผ่าน" required>
            <br><br>
            <button  name="insert" type="submit">ยืนยัน</button>
            <button  name="insert" type="reset">ยกเลิก</button>
 
			</form>





</body>

</html>
