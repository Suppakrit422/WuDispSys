<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>re/vendors/iconfonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url('re/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('re/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('re/css/custom_2.css'); ?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!--โหลด CSS มาเก็บในโฟลเดอร์-->


    <title>Import File CSV</title>


</head>

<body>
    <!--
	<div class="alert alert-danger">
	    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
	</div>

    <div class="alert alert-success">
        <strong>Success!</strong> This alert box could indicate a successful or positive action.
    </div>-->


    <div id="container">
        <h1>Import csv file to database</h1>

        <div id="body">
            <div class="form-inline">
                <label>ชื่อไฟล์:</label>&nbsp;
                <div class="rectangle">Table_usergroup.csv</div>
                <label>Upload to table:</label>
                <div class="rectangle">Usertype</div>
            </div>
            <div class="form-inline" id="f_inline">
                <label>Database:</label>
                <div class="rectangle">wu_student_discipline</div>
                <label>วันที่:</label>
                <div class="rectangle">05/02/2562</div>
            </div>
            <p></p>
            <p><strong>รายละเอียดการอัพโหลดข้อมูล</strong></p>

            <div class="form-inline" id="f_inline">

                <label>อัพโหลด:</label>
                <a href="#" data-toggle="collapse" data-target="#demo"><span class="badge badge-success" id="myBtn">แสดง</span></a>

            </div>


        </div>

        <p class="footer" id="footer_imp"><a href="#"><i class="badge badge-secondary">ยกเลิก</i></a> &nbsp;&nbsp;<a href="javascript:;" id="Save_btn"><i class="badge badge-success">บันทึกข้อมูล</i></a></p>
    </div>

    <div id="demo" class="collapse">

        <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>place_ID</th>
                    <th>place_name</th>
                    <th>description</th>

                </tr>
            </thead>
            <tbody>
                <!-- Display content-->
            </tbody>
            <tfoot>
                <tr>
                    <th>place_ID</th>
                    <th>place_name</th>
                    <th>description</th>
					

                </tr>
            </tfoot>
        </table>

    </div>
    <div id="imported_csv_data"></div>

    <div id="test1"></div>

    <!--JavaScript ส่วน Collapsible-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!--โหลด JavaScript มาเก็บในโฟลเดอร์-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!--โหลด JavaScript มาเก็บในโฟลเดอร์-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--โหลด JavaScript มาเก็บในโฟลเดอร์-->

    <!--JavaScript ส่วน DataTable-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
    <!--โหลด JavaScript มาเก็บในโฟลเดอร์-->
    <script src="	https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <!--โหลด JavaScript มาเก็บในโฟลเดอร์-->

    <script>
        $(document).ready(function() {
            //$('#example').DataTable();

            showAll();

            function showAll() {

                $.ajax({
                    type: 'ajax',
                    url: '<?php echo site_url("import_data/showAlltmpplace") ?>',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        //alert(data);
                        var html = ''; //สำหรับเก็บค่า html
                        var i; //ประกาศตัวแปรเพื่อวนลูป
                        for (i = 0; i < data.length; i++) {
                            // html += data[i].id + "&nbsp;" + data[i].first_name + "&nbsp;" + data[i].last_name + "&nbsp;" + data[i].phone + "&nbsp;" + data[i].email +"</br>";
                            html += "<tr>" +
                                "<td>" + data[i].place_ID + "</td>" +
                                "<td>" + data[i].place_name + "</td>" +
                                "<td>" + data[i].description + "</td>" +
                                "</tr>";

                        }
                        $('tbody').html(html);
                    },
                    error: function() {
                        alert('ไม่มีข้อมูล');
                    }
                });


            }
        });

        $("#Save_btn").click(function() {

            //alert ("Save");

            $.get({
                url: '<?php echo site_url("import_data/import_temp_to_dbplace") ?>',
                success: function() {
                    alert("Sucess!!")
                    window.location.href = "<?php echo site_url('Csv_import');?>";
                },
                error: function() {
                    alert('Error');
                }
            });

        });
    </script>
</body>

</html>