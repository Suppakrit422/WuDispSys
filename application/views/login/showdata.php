<!doctype html>
<html lang="en">

<head>

  <title>แสดงข้อมูล admin</title>

</head>
<body>
  <meta charset="UTF-8">
  <?php 
  echo '<label><a href="'.base_url().'index.php/loginuser/enter">กลับ</a></label>  <br>'; 


echo '<label><a href="'.base_url().'index.php/loginuser/add">เพิ่มข้อมูล</a></label><br>';
?>
<table border="1" width="80%" cellpadding="0">
    <thead>
    <tr>
      <th>id</th>
       <th>username</th>
        <th>password</th>
        <th>edit</th>
        <th>del</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach($records as $rec){ ?>
   <!--test select data in DB
   echo $rec->E_ID."      ".$rec->UName."     ".$rec->Pass."<br/>"; -->
   <input type="hidden" name="id" value="<?php echo $rec->E_ID; ?>"  >
    <tr>
            <td><?php echo $rec->E_ID; ?></td>
             <td><?php echo $rec->UName; ?></td>
              <td><?php echo $rec->Pass; ?></td>
              <td><a href="<?php echo base_url().'index.php/loginuser/edit?id='.$rec->E_ID;?>"> แก้ไขข้อมูล </a><br></td>
              <td><a href="<?php echo base_url().'index.php/loginuser/del?id='.$rec->E_ID;?>"> ลบข้อมูล </a><br></td>
          </tr>
          <?php } ?>
    </tbody>

  </table>




</body>

</html>
