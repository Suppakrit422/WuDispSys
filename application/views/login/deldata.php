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

  <H1>ลบข้อมูล </H1><br>
  
            <br>
            Username : <?php echo $user_data[0]->UName; ?><br><br>
            Password : <?php echo $user_data[0]->Pass; ?>
            <br><br>
           
            <?php 
           echo '<label><a href="'.base_url().'index.php/loginuser/deldata?id='.$user_data[0]->E_ID.'">[ลบข้อมูล]</a></label>'; 
           ?>        
           <?php 
           echo '<label><a href="'.base_url().'index.php/loginuser/select">[ยกเลิก]</a></label>'; 
           ?>
           





</body>

</html>
