<!doctype html>
<html lang="en">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<center>
<strong><div  class="alert alert-success" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-danger" role="alert" style="display: none;"></div></strong>
<strong><div  class="alert alert-warning" role="alert" style="display: none;"></div></strong>
</center>
<head>

    <title>ยานพาหนะ admin</title>

</head>

<body> 
    <meta charset="UTF-8">
    <div class="page-breadcrumb" id="nav_sty">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>
                <li class="breadcrumb-item active" aria-current="page">ยานพาหนะ</li>
            </ol>
        </nav>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow mb-4">
            <div class="card-header" id="card_2">
                <h6 class="m-0 text-primary"><span><i class="fas fa-car-side"></i></span>&nbsp;ยานพาหนะ</h6>
            </div>
          
           
           

            <!--------------------------------->
            <!-- Modal ส่วน del -->

            <div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLongTitle"><span><i
                                        class="fa fa-exclamation-triangle"
                                        style="color:rgba(235,99,102,1.00)"></i></span>ลบข้อมูล</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--ส่วนฟอร์มลบข้อมูล-->
                        <form action="" id="formdelete" method="post" class="needs-validation">
                            <div class="modal-body" id="showdel">

                                <!--ข้อความยืนยันการลบข้อมูล-->
                                <center>
                                    <div id="showddel"></div>
                                    <input type="hidden" name="txtdelID">
                                </center>
                                <!------------------>
                            </div>

                            <div class="modal-footer">
                                <button name="insert" type="reset" class="btn btn-secondary"
                                    data-dismiss="modal">ยกเลิก</button>
                                <button name="btndel" id="btndel" type="button" class="btn btn-danger btn-fw">ลบ</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!------------------>
            <!-- Modal ส่วน select -->

            <div class="card-body">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="style_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>รหัสประเภทยานพาหนะ</th>
                                    <th>ประเภทยานพาหนะ</th>
                                   
                                   

                                </tr>
                            </thead>
                            <tbody id="showdata">
                                <tr>
                                    <td width="10px"></td>
                                    <td></td>
                                    <td width="10px">
                                        <!--edit_file  del_file  -->
                                        <!--	<a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-target="#edit_file"><i class="fas fa-edit" style="color:#47307b;"></i></a>
                                                    <a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-toggle="modal" data-target="#edit_file" id="<?php echo $rec->v_ID; ?>"><i class="fas fa-edit" style="color:#47307b;">แก้ไข</i></a>&nbsp;
                                                    <a href="<?php echo base_url().'index.php/vehicles/edit?id='.$rec->v_ID;?>" data-toggle="modal" data-target="#"><i class="fas fa-trash-alt" style="color:rgba(235,99,102,1.00)">ลบ</i></a>-->

                                        <!--ส่วนของ madal จะใช้การจัดการด้วย id ส่วนของ data-target กับ id ของ class จะต้องเหมือนกัน -->

                                        <!-- <form action="<?php echo base_url(); ?>index.php/vehicles/edit" method="post" id="editform"  class="needs-validation" >  -->
                                        <!------------------>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        showAll();

        //แสดงข้อมูล
        function showAll() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/vehiclestype/showAll',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].vetype_ID + '</td>' +
                            '<td>' + data[i].vetype_name + '</td>' +
                        


                      
                            '</tr>';
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
</body>
</html>