<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script> src="js/bootstrap.js"</script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js">    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"> </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
   <!--<link rel="stylesheet" href="css/custom.css">-->
 <link ref="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link ref="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
   


</head>
<body>
    <div class="container">
    <div class="test">
                    <center/>   รายชื่อนักศึกษาที่กระทำผิดทั้งหมดของหลักสูตร <br>
        เดือน พฤษภาคม 2562
    </div>
    
</td>
  </tr>

<div class="card-body">
    <div class="bootstrap-data-table-panel">
        <div class="table-responsive">
        <table id="style_table" class="table table-hover display" style="width: 100%" >
                            <thead>
                               
                <th colspan="9" class="text-dark" >หมวด 6 ความผิดเกี่ยวกับการเสพสุราหรือของมึนเมา</th><
                </tr>
                <tr>
                <th colspan="9" class="bg-light text-dark">601 : นำสุรา เครื่องดื่มที่มีแอลกอฮอล์ หรือของมึนเมา เข้ามาในพื้นที่มหาวิทยาลัย</th>
                </tr>
                <tr>
               
                </tr>
                    <th><center>ลำดับ</center></th>
                    <th><center>รหัสนักศึกษา</center></th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th><align=right>คะแนนที่เหลือ</align=right></th>
                    <th><center>คะแนนที่หัก</center></th>
                    <th><center>จำนวนครั้ง</center></th>
                    <th><center>หลักสูตร</center></th>
                    <th><center>หอ</center></th>
                                </tr>
                            </thead>
                            <tbody id="showdata">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<script> 

$(document).ready(function(){
	 $('#tblName').DataTable();
     autoFill: true
     
	showAll();

    $('#style_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    
function showAll() {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/course_con/showAll',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var point=100;
                var html = '';
                var n=1;
                for (i = 0; i < data.length; i++) {
                            html += '<tr>' +

                            '<td> <center>' + n + ' </center></td>' +
                        '<td> <center>' + data[i].S_ID + '</center></td>' +
                        '<td> ' + data[i].std_fname +'</td>' +
                        '<td> ' + data[i].std_lname + '</td>' +
                        '<td  align="right">' + data[i].behavior_score + '</right></td>' +
                        '<td align="right">' + data[i].point + '</right></td>' +
                        '<td align="right">' + data[i].num_off + '</td>' +
                        '<td> <left>' + data[i].cur_name + '</left></td>' +
                        '<td> <left>' + data[i].dname + '</left></td>' +
                                '</tr>';
                                n+=1;
                        }
                        $('#showdata').html(html);
                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });
            }

});

</script>
</html>
</body>