<head>
    <title>หน้าแรก</title>
    <style>
        #dateday {
            width: 7rem;
            height: 1rem;
            font-size: 10px;
            border-radius: 0.5em;
            padding: 0;
        }

        .datemount {
            width: 7rem;
            height: 1rem;
            font-size: 10px;
            border-radius: 0.5em;
            
        }
        #icon_home{
            margin-right: 0.3rem;
        }
    </style>
</head>







<!-- Used CSS custom3.css -->
<div class="page-breadcrumb" id="nav_sty">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">หน้าแรก</li>
        </ol>
    </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">

    <div class="card shadow mb-4">
        <div class="card-header" id="card_2">
            <h6 class="m-0 text-primary"><span id="icon_home"><i class="fa fa-home"></i></span>หน้าแรก</h6>
        </div>

        <div class="row">
            <!-- function select -->
            <div class="col-sm-2 mainfuction">
                <div class="row">
                    <div class="col-sm-12 header1">
                        การแจ้งเหตุ
                    </div>
                </div>

                <form action="" id="serachdata">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="function1 grid">
                                <label class="form-check-label"><input type="radio" name="option1" value="1" class="" id="option1day">ประจำวัน</label>
                                <input type="date" class="form-control" name="dateday" id="dateday">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="function2 grid">
                                <label class="form-check-label"><input type="radio" name="option1" value="2" class="" id="option2mount">ประจำเดือน</label>
                                <select name="" id="datemount" class="datemount">
                                    <option value="" selected>เดือน</option>
                                </select>

                                <select name="" id="dateyear" class="datemount">
                                    <option value="" selected>ปี พ.ศ.</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="function3 grid">
                                <label class="form-check-label"><input type="radio" name="option1" value="3" class="" id="option3year">ประจำปี</label>
                                <select name="" id="dateyear2" class="datemount">
                                    <option value="" selected>ปี พ.ศ.</option>
                                </select>
                            </div>
                        </div>
                    </div>



                </form>
                <button class="submit">ค้นหา</button>

            </div>

            <div class="col-sm-10 maintable">

                <div class="row">
                    <div class="col-sm-12 header1">
                        ตารางการแจ้งเหตุประจำปี ...
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="style_table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่ทกระทำผิด</th>
                                            <th>เวลาที่กระทำผิด</th>
                                            <th>รหัสนักศึกษา</th>
                                            <th>ชื่อ-นามสกุล นักศึกษา</th>
                                            <th>ฐานความผิด</th>
                                            <th>ดูรายละเอียด</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        setmount();
        setyear();
        //alert("Starting page ..");


    });

    function setmount(){
        var html = '';
        var monthNames = [ "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" ];
        console.log(monthNames.length);
        for (var i=0; i < monthNames.length; i++){
            var num= num+1;
            html += '<option value="'+num+'"> '+ monthNames[i] +'</option>';
        }
        $('#datemount').html(html);

    }

    function setyear(){
        //var min = new Date().getFullYear,max = min+9;
        html = ''
        for (i = new Date().getFullYear(); i > 2015; i--){
            html += '<option value="'+i+'"> '+ i +'</option>'
        }
        $('#dateyear').html(html);
        $('#dateyear2').html(html);
        

    }

    $(".submit").click(function() {

        var data = $('#serachdata').serialize();
        var option = $("input[name='option1']:checked").val();

        if (option == "1") {
            searchday(data);
        } else if (option == "2") {
            //startment
        } else if (option == "3") {
            //stament
        } else {
            //stament
        }
    });

    $("#option1day").click(function() {
        //alert("XXXX")
        $("#dateday").prop("disabled", false);
        $("#datemount").prop("disabled", true);
        $("#dateyear").prop("disabled", true);
        $("#dateyear2").prop("disabled", true);
    });


    $("#option2mount").click(function() {
        $("#datemount").prop("disabled", false);
        $("#dateyear").prop("disabled", false);
        $("#dateday").prop("disabled", true);
        $("#dateyear2").prop("disabled", true);
    });

    $("#option3year").click(function() {
        $("#dateyear2").prop("disabled", false);

        $("#dateday").prop("disabled", true); //option1
        $("#datemount").prop("disabled", true); //option2
        $("#dateyear").prop("disabled", true); //option2   
    });

    function searchday(data) {
        $.ajax({
            url: '<?php echo site_url("Security_guard_dashboard/getDashboardday") ?>',
            async: false,
            dataType: 'json',
            data: data, //ห้ามลืม
            success: function(data) {
                console.log(data);

                var html = '';
                var i = 0;
                $.each(data, function(key, value) {

                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>' + value.committed_date + '</td>';
                    html += '<td>' + value.committed_time + '</td>';
                    html += '<td>' + value.S_ID + '</td>';
                    html += '<td>' + value.std_fname + ' ' + value.std_lname + '</td>';
                    html += '<td>' + value.off_desc + '</td>';
                    html += '<td> <a href="javascript:;" data=' + value.oh_ID + ' class="show_data"><i class="fa fa-file-text" style="color:rgba(67, 135, 254);font-size:1.5rem;"></i></a></td>';
                    html += '</tr>';

                    $('#showdata').html(html);

                });

            }
        });

    }

    function searchmounth (data){
        //stament


    }
</script>