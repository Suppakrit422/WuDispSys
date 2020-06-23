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

<!--foreach($user_data as $row){ -->

  <H1>แก้ไขข้อมูล </H1><br>
  <form method="post" action="<?php echo base_url().'index.php/loginuser/editdata?id='.$user_data[0]->E_ID;?>">
            <br>
            username :<input type="text" name="username" value="<?php echo $user_data[0]->UName; ?>"  required><br><br>
            password :<input type="text"  name="password" value="<?php echo $user_data[0]->Pass; ?>"  required>
            <br><br>
            <button  name="insert" type="submit">ยืนยัน</button>
            <button  name="insert" type="reset">ยกเลิก</button>
 
			</form>




</body>

</html>
