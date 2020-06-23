<!doctype html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('re/css/load_style.css') ?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<head>

    <title>แจ้งเหตุกระทำความผิด | ระบบวินัยนักศึกษา</title>
    <style>
        label {
            padding: 0.4rem;
            font-family: 'Sarabun', sans-serif;
        }

        label.label_txt {
            padding: inherit;
            font-weight: 900;
        }


        #oh_ID {
            width: 50%;
        }

        .padding_b {
            padding-bottom: 0.9rem;
        }

        #add_place {
            width: 100%;
        }

        .impt_sym {
            color: rgb(247, 50, 26);
        }

        .text_position {
            padding-left: 0.9rem;
            font-size: 0.9rem;
        }

        .text_head {
            font-size: 0.9rem;
            font-weight: 900;
        }

        .content {
            font-family: 'Sarabun', sans-serif;

        }

        #icon_src {
            padding-left: 0.5rem;
            font-size: 1.5rem;
        }

        .select2-dropdown {
            top: 22px !important;
            left: 8px !important;

        }

        .selectplace {
            width: 60rem;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 2.2rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 2;
        }

        .modal-content {
            overflow-y: scroll;
            position: relative;
            height: 600px;
        }
    </style>

    <script>
        var off_per = 1;

        function student_change(id) {

        }

        function click_btnre(id) {
            //alert(id.value);
            $('#student' + id).html('');

        }


        //clear value on text
        function clear_value(valueid) {
            $('#std_name' + valueid + '').val("");
            $('#std_lname' + valueid + '').val("");
            $('#dept_name' + valueid + '').val("");
            $('#cur_name' + valueid + '').val("");
            $('#regis_num' + valueid + '').val("");
            $('#province_bic' + valueid + '').val("");
            $('#regis_car' + valueid + '').val("");
            $('#provin_car' + valueid + '').val("");
        }

        //Search student data in form
        function Search_data(id, value_t) {

            var idstd = id.value;
            console.log(idstd);
            //console.log(b);
            alert("กำลังค้นหา");
            clear_value(value_t); //clear value on textbox
            //alert(idstd);


            if (idstd) {
                //alert ("GGG");

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url("Notifyoffense/selectstudent") ?>',
                    data: 'S_ID=' + idstd,
                    dataType: 'json',
                    success: function(data) {
                        //alert("Having Data...");

                        $.each(data, function(key, value) {

                            var temp = value;

                            if (key == 0) {
                                //alert("Array student");
                                $('#std_name' + value_t + '').val(value.std_fname);
                                $('#std_lname' + value_t + '').val(value.std_lname);
                                $('#dept_name' + value_t + '').val(value.dept_name);
                                $('#cur_name' + value_t + '').val(value.cur_name);


                                //alert(key);

                            } else if (key == "verhicles") {
                                //alert("SEE verhicles");
                                var verhicle = value;

                                $.each(verhicle, function(key, value) {
                                    //alert(key);


                                    //check type vehicle
                                    if (value.vetype_ID == 1) {
                                        //alert ("Motorcycles TYPE");
                                        $('#regis_num' + value_t + '').val(value.regist_num);
                                        $('#province_bic' + value_t + '').val(value.province);
                                    } else if (value.vetype_ID == 2) {
                                        //alert("CAR TYPE");
                                        $('#regis_car' + value_t + '').val(value.regist_num);
                                        $('#provin_car' + value_t + '').val(value.province);

                                    } else {

                                    }
                                    //alert(value.regist_num);
                                });

                            }

                            //console.log(data.verhicles);

                        });

                        //console.log(data);

                    }

                });
            } else {
                alert("Not see");
            }
        }
    </script>


</head>

<body>
    <meta charset="UTF-8">


    <div class="container-fluid">



        <div class="page-breadcrumb" id="nav_sty">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url("Student_dashboard") ?>" class="breadcrumb-link">หน้าแรก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แจ้งเหตุการกระทำความผิด</li>
                </ol>
            </nav>
        </div>

        <!--<input type="text" name="" id="test223">-->

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow mb-4">
                <div class="card-header" id="card_2">
                    <h6 class="m-0 text-primary"><span><i class="#"></i></span>&nbsp;รายการแจ้งเหตุการกระทำความผิด</h6>
                </div>

                <div class="card-body" id="card_1">
                    <button type="button" id="btnAdd" class="btn btn-inverse-primary btn-fw" data-toggle="modal">
                        <span><i class="fas fa-bullhorn" id="btnAdd"></i></span>แจ้งเหตุการกระทำความผิด
                    </button>
                    &nbsp;
                </div>

                <!--Modal add notification -->
                <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:1200px!important;" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle">แจ้งเหตุการกระทำความผิด</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!--  CONTENT -->

                                <form action="" id="formadd" name="formadd" method="post">


                                    <input type="hidden" name="oh_ID" id="oh_ID" class="form-control style_input">
                                    <!--Auto id-->

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class=""><span><i class="far fa-calendar-alt"></i></span><label for="" class="">วันที่แจ้งเหตุ <span class="impt_sym">*</span> :</label> <input type="text" name="notifica_show" id="notifica_show" class="form-control " disabled></div>
                                            <input type="hidden" name="notifica_date" id="notifica_date">
                                            <!-- textbox hiddent -->
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=""><span><i class="far fa-calendar-alt"></i></span><label for="">วันที่กระทำความผิด <span class="impt_sym">*</span> :</label> <input type="date" name="committed_date" id="committed_date" class="form-control " required oninvalid="this.setCustomValidity('โปรดระบุวันที่กระทำความผิด')" onchange="this.setCustomValidity('')"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class=""><span><i class="fas fa-clock "></i></span><label for="">เวลา<span class="impt_sym">*</span> :</label> <input type="time" name="committed_time" id="committed_time" class="form-control " required oninvalid="this.setCustomValidity('โปรดระบุเวลาเกิดเหตุ')" onchange="this.setCustomValidity('')"></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-inline">
                                                <span><i class="far fa-building"></i></span>
                                                <label for="">สถานที่<span class="impt_sym">*</span> :</label>
                                                <!-- <input type="text" name="add_place" id="add_place" class="form-control" autocomplete="off" placeholder="ค้นหาสถานที่" required oninvalid="this.setCustomValidity('โปรดระบุสถานที่เกิดเหตุ')" onchange="this.setCustomValidity('')">
                                                <input type="hidden" name="place_ID" id="place_ID"> -->

                                                <select class="selectplace" name="place_ID" id="place_ID">



                                                </select>


                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="">คำอธิบายบริเวณที่เกิดเหตุ<span class="impt_sym">*</span> :</label>
                                                <textarea class="form-control" rows="5" id="explanation" name="explanation" required oninvalid="this.setCustomValidity('โปรดกรอกคำอธิบาย')" onchange="this.setCustomValidity('')"></textarea>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">หมวดความผิด<span class="impt_sym">*</span> :</label>
                                            <select name="txt_oc" id="txt_oc" class="form-control" required oninvalid="this.setCustomValidity('ระบุหมวดความผิด')" onchange="this.setCustomValidity('')">

                                                <option value="">เลือกหมวดความผิด</option>


                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">ฐานความผิด<span class="impt_sym">*</span> :</label>
                                            <select name="txt_off" id="txt_off" class="form-control">
                                                <option value="">เลือกฐานความผิด</option>

                                            </select>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12"><label for="">การกระทำความผิด</label></div>
                                        <label for="">ผู้กระทำความผิด:</label> <a href="javascript:;" id="add"><span class="badge badge-pill badge-primary"> + เพิ่มผู้กระทำผิด</span></a>



                                        <input type="text" name="" id="" placeholder="กรอกรหัสนักศึกษา">
                                        <input type="text" name="" id="" placeholder="หมายเลขป้ายทะเบียนรถจักรยานยนตร์">

                                    </div>


                                    <div>
                                        <div class="add_person">



                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">แนบไฟล์หลักฐาน</label>
                                                <input type="file" id="" name="img[]" class="form-control-file border" multiple>



                                                <input type="hidden" name="evidenre_name" id="evidenre_name">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">คำอธิบายหลักฐาน:</label><textarea class="form-control" rows="5" id="explanoff" name="explanoff"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="evidenre_date" id="evidenre_date">


                            </div>

                            <div class="modal-footer">
                                <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button name="btnSave" id="btnSave" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>


                <!--Modal del  -->

                <div class="modal fade" id="del_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle"><span><i class="fa fa-exclamation-triangle" style="color:rgba(235,99,102,1.00)"></i></span>ลบข้อมูล</h2>
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
                                        <input type="hidden" name="delID">
                                    </center>
                                    <!------------------>
                                </div>

                                <div class="modal-footer">
                                    <button name="insert" type="reset" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                    <button name="btndel" id="btndel" type="button" class="btn btn-danger btn-fw">ลบ</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                <!-- Modal detail-->
                <div class="modal fade" id="ShowDta" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">รายละเอียดการแจ้งเหตุ</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body content">




                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table id="style_table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>วันที่แจ้งเหตุ</th>
                                        <th>ฐานความผิด</th>
                                        <th>สถานที่</th>
                                        <th>รายละเอียด</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody id="showdata">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>










        <script>
            $(document).ready(function() {

                check_id();
                show_all();
                disabled_sort(); //disabled sort colum
                load_json_data('txt_oc');
                selectplace();


                $("#place_ID").select2({
                    placeholder: "เลือกสถานที่",
                    allowClear: true,
                });


                //select all place
                function selectplace() {

                    $.ajax({

                        type: 'POST',
                        url: '<?php echo site_url("Notifyoffense/selectplaceall") ?>',
                        async: false, //ห้ามลืม
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            // //alert("Having Data...");
                            var html = '';
                            $.each(data, function(key, value) {


                                html += '<option value="' + value.place_ID + '">' + value.place_name + '</option>';
                                $('#place_ID').html(html);

                            });

                        }


                    });






                }

                function disabled_sort() {
                    $('#style_table').DataTable({
                        columnDefs: [{
                            orderable: false,
                            targets: [4, 5]
                        }]
                    });
                }


                function load_json_data(id, parent_id) {
                    var html_code = '';

                    $.getJSON('<?php echo site_url('Notifyoffense/selectoffensecate') ?>', function(data) {



                        html_code += '<option value=""> เลือกหมวดความผิด </option>';
                        $.each(data, function(key, value) {


                            html_code += '<option value="' + value.oc_ID + '">' + value.oc_desc + '</option>';


                        });
                        $('#' + id).html(html_code);
                    });

                } //End function load_json_data




                function show_all() {

                    $.ajax({

                        type: 'POST',
                        url: '<?php echo site_url("Notifyoffense/showAll") ?>',
                        async: false, //ห้ามลืม
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i = 0;

                            $.each(data, function(key, value) {


                                i++;
                                html += '<tr>';
                                html += '<td>' + i + '</td>';
                                html += '<td>' + value.notifica_date + '</td>';
                                html += '<td>' + value.off_desc + '</td>';
                                html += '<td>' + value.place_name + '</td>';
                                html += '<td>' + value.explanation + '</td>';
                                html += '<td> <a href="javascript:;" data=' + value.oh_ID + ' class="show_data"><i class="fa fa-file-text" style="color:rgba(67, 135, 254);font-size:1.5rem;"></i></a></td>';
                                html += '</tr>';

                                $('#showdata').html(html);

                            });

                        }


                    });
                }


                //check id and create auto id
                function check_id() {

                    title = 'L';
                    var date = new Date();
                    date_t = date.getFullYear();
                    B_E = date_t + 543; //แปลง ค.ศ. => พ.ศ.
                    convert_be = B_E.toString(); //convert to string
                    BE = convert_be.substring(2);

                    //console.log(BE);
                    //console.log(typeof convert_be);
                    //console.log(typeof B_E);

                    //Runnning_num = 0000;
                    var str = '';
                    var tempid_substr = '';
                    var auto_id = 0;
                    var integer = '';




                    $.ajax({

                        type: 'POST',
                        url: '<?php echo site_url("Notifyoffense/check_id") ?>',
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            str = data[0].oh_ID;
                            tempid_substr = str.substring(3);
                            integer = parseInt(tempid_substr); //convert string to int
                            auto_id = integer + 1;

                            $('#oh_ID').val(title + BE + auto_id); // Create auto id
                            //alert(sum);
                            //alert (integer);
                            //sum= tempid_substr+1;
                        },
                        error: function() {
                            alert("Can't create auto id");
                        }


                    });

                }
            }); //End Ready function


            //show more detail notify
            $('#showdata').on('click', '.show_data', function() {

                var id = $(this).attr('data');
                //console.log(id);
                $('#ShowDta').modal('show');
                html = '';
                i = 0;


                //select show data
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo site_url('Notifyoffense/spc_showoffhead') ?>',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        //alert ('Having data');

                        $.each(data, function(key, value) {
                            i++;

                            var data_vehi = value.verhicles;
                            //console.log(data_vehi);

                            //print 1 ครั้ง
                            if (i == 1) {
                                html += '<p class="text_head">การกระทำความผิด</p>';
                                html += '<p class="text_position"> <label for="" class="label_txt"> วันที่แจ้งเหตุ:</label> ' + value.notifica_date + ' <label for="" class="label_txt">วันที่กระทำความผิด:</label> ' + value.committed_date + '</p>';
                                html += '<p class="text_position"> <label for="" class="label_txt">สถานที่: </label> ' + value.place_name + ' </p>';
                                html += '<p class="text_position"> <label for="" class="label_txt">อธิบายบริเวณที่เกิดเหตุ: </label> ' + value.description + ' </p>';
                                html += '<p class="text_position"> <label for="" class="label_txt">หมวดความผิด:</label>  ' + value.oc_desc + ' <label for="" class="label_txt"> ฐานความผิด:</label>  ' + value.off_desc + '</p>';
                                html += '<p class="text_head">ผู้กระทำความผิด</p>';
                            }

                            html += '<p class="text_position"> <label for="" class="label_txt">รหัสนักศึกษา: </label> ' + value.S_ID + '<label for="" class="label_txt"> ชื่อ: </label> ' + value.std_fname + '<label for="" class="label_txt"> นามสกุล:</label>  ' + value.std_lname + ' </p>';
                            html += '<p class="text_position"> <label for="" class="label_txt">สำนักวิชา: </label>  ' + value.dept_name + '<label for="" class="label_txt"> หลักสูตร: </label>  ' + value.cur_name + ' </p>';

                            //loop vehicle 
                            $.each(data_vehi, function(key, value) {
                                //console.log(value.regist_num);

                                //check type vehicle
                                if (value.vetype_ID == 1) {
                                    html += '<p class="text_position"> <label for="" class="label_txt">เลขทะเบียนรถจักรยานยนต์: </label>  ' + value.regist_num + '<label for="" class="label_txt">  จังหวัด: </label>  ' + value.province + '  </p>';
                                } else if (value.vetype_ID == 2) {
                                    html += '<p class="text_position"> <label for="" class="label_txt">เลขทะเบียนรถยนต์: </label>  ' + value.regist_num + '<label for="" class="label_txt">  จังหวัด: </label>  ' + value.province + '  </p>';
                                }
                            });





                            $('.content').html(html);
                        });
                    },
                    error: function() {
                        alert('ไม่สามารถลบข้อมูล');
                    }
                });



            });

            $('#btndel').click(function() {
                //alert("ลบ");
                var url = $('#formdelete').attr('action');
                var data = $('#formdelete').serialize();
                //console.log(url);
                //console.log(data);


                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    //dataType: 'json',
                    success: function(response) {
                        //alert(response);
                        $('#del_file').modal('hide');
                        location.reload("<?php echo site_url('Notifyoffense') ?>"); //Reload page
                    }
                });


            });











            $('#txt_oc').on('change', function() {
                //alert("mmmm");
                var html_code = '';
                var ocID = $(this).val();
                //alert(oc_ID);

                if (ocID) {

                    //alert("mmmm");

                    $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("Notifyoffense/selectOffenseoffevidence") ?>',
                        data: 'oc_ID=' + ocID,
                        dataType: 'json',
                        success: function(data) {

                            //alert(data[1].off_ID);

                            for (i = 0; i < data.length; i++) {

                                html_code += '<option value="' + data[i].off_ID + '">' + data[i].off_desc + '</option>';

                            }
                            $('#txt_off').html(html_code);

                        }

                    });




                }

            });



            $('#add_place').typeahead({


                source: function(query, result) {
                    $.ajax({
                        url: "<?php echo site_url('Notifyoffense/selectplace') ?>",
                        method: "POST",
                        data: {
                            query: query
                        },
                        dataType: "json",
                        success: function(data) {
                            //alert(data[0].place_ID+data[0].description);
                            result($.map(data, function(item) {
                                //alert(item.place_ID);
                                $('#place_ID').val(item.place_ID);
                                return item.place_name; //return value place_name
                            }));
                        }
                    })
                }


            });



            $('#btnAdd').click(function() {
                $("#formadd")[0].reset(); //clear value on form
                var date = new Date();
                //date_off = (date.getMonth() + 1) + '/' + date.getDate() + '/' + date.getFullYear();
                date_off = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
                $('#exampleModalCenter').modal('show');
                $('#notifica_date').val(date_off); //set of date in input:hidden
                $('#notifica_show').val(date_off); //set of date in input:disable
                $('#evidenre_date').val(date_off); //set of date in form

            });



            //get file name
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $('#evidenre_name').val(fileName);
                //alert('The file "' + fileName +  '" has been selected.');
            });


            //submit form
            $('#btnSave').click(function() {

                var form_data = $('#formadd').serialize();
                console.log(form_data);

                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo site_url("Notifyoffense/addnotify") ?>',
                    data: form_data,
                    async: false,
                    /*dataType: 'json',*/
                    success: function(data) {
                        //alert(data);
                        //alert("Sucess updata !!")
                        //location.reload();
                    }

                });









            });






            $('#add').click(function() {
                var html = '';

                html += '<div id="student' + off_per + '">';

                html += '<div class="row">';
                html += '<div class="col-sm-4"> <label for="">รหัสนักศึกษา<span class="impt_sym">*</span> :</label> <input type="text"  name="std_id[]" id="std_id' + off_per + '" style="width: 8rem;" >  <a href="javascript:;" id="" onclick="Search_data(std_id' + off_per + ',temp=' + off_per + ')"><span class="fa fa-search" id="icon_src"></span></a></div>';
                html += '<div class="col-sm-4"> <label for="">ชื่อ:</label> <input type="text" name="" id="std_name' + off_per + '" disabled>   </div>';
                html += '<div class="col-sm-4"> <label for="">นามสกุล:</label> <input type="text" name="" id="std_lname' + off_per + '" disabled>  </div>';
                html += '</div>';

                html += '<div class="row">';
                html += '<div class="col-sm-6"> <label for="">สำนักวิชา:</label> <input type="text" name="" id="dept_name' + off_per + '" disabled>  </div>';
                html += '<div class="col-sm-6"> <label for="">หลักสูตร:</label> <input type="text" name="" id="cur_name' + off_per + '" disabled>   </div>';
                html += '</div>';

                html += '<div class="row">';
                html += '<div class="col-sm-6"> <label for="">รถจักรยานยนตร์:</label> <input type="text" name="" id="regis_num' + off_per + '" disabled>  </div>';
                html += '<div class="col-sm-6"> <label for="">จังหวัด:</label> <input type="text" name="" id="province_bic' + off_per + '" disabled>   </div>';
                html += '</div>';

                html += '<div class="row">';
                html += '<div class="col-sm-6"> <label for="">รถยนตร์:</label> <input type="text" name="" id="regis_car' + off_per + '" disabled>  </div>';
                html += '<div class="col-sm-6"> <label for="">จังหวัด:</label> <input type="text" name="" id="provin_car' + off_per + '" disabled>   </div>';
                html += '</div>';

                html += '<div class="row">';
                html += '<div class="col-sm-12" style="text-align: right;">  <a href="javascript:;" id="" onclick="click_btnre(' + off_per + ')"><span class="fa fa-trash" style="font-size: 1.5rem;"></span>  </div>';
                html += '</div>';

                html += '</div>';


                off_per++;
                $('.add_person').append(html);
            });
        </script>



</body>

</html>