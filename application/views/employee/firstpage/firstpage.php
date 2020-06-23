<link rel="stylesheet" href="<?php echo base_url('re/css/css_user_security.css'); ?>">

<head>
    <title>หน้าแรก | ระบบวินัยนักศึกษามหาวิทยาลัยวลัยลักษณ์</title>
    <style>

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

        <div class="content">

            <div class="showdata">

                <div class="nodata">
                    <div class="img">
                        <img src="<?php echo base_url('re/images/empty.png')?>" alt="" width="50">
                    </div>
                    <div class="msg">
                        ไม่มีข้อมูลผู้กระทำความผิด
                    </div>
                </div>
                
            </div>

            <div class="search">
                <form action="">
                    <label for="studentid">รหัสนักศึกษา</label>
                    <input type="text" class="form_input" name="" id="" placeholder="กรอกรหัสนักศึกษา">
                    <label for="date">วันที่</label>
                    <div class="date_time">
                        <select class="date_time_input" name="" id="date">
                            <option selected>วันที่</option>
                        </select>
                        <select class="date_time_input" name="" id="datemount2">
                            <option selected>เดือน</option>
                        </select>
                        <select class="date_time_input" name="" id="dateyear">
                            <option selected>ปี</option>
                        </select>
                    </div>
                    <label for="sort">เรียงลำดับ</label>
                    <select class="sort" name="" id="">
                        <option selected>เรียงลำดับ</option>
                    </select>
                </form>
                <div class="btn_search">ค้นหา</div>
            </div>

        </div>




    </div>
</div>

<script>
$(document).ready(function() {

    setday();
    setmount();
    setyear();
    select_data_student_today ();
    //alert("Starting page ..");


});

$(".btn_search").click(function() {
    search();    
});

function search(){

    var day = $('#date').val();
    var mount2 = $('#datemount2').val();
    var year = $('#dateyear').val();
    
    var data = {getday : day,getmonth : mount2,getyear:year};

    $.ajax({
        url: '<?php echo site_url("Security_guard_dashboard/SearchDate") ?>',
        async: false,
        dataType: 'json',
        data: data, 
        success: function(data) {
            console.log(data);

            if (data == false){
                 
            }else{

                htmlweb =''
            $.each(data, function(key, value) { 
                htmlweb += '<div class="persondata">';  
                htmlweb += '<img src="<?php echo base_url('re/images/man.png') ?>" alt="Paris" width="40" height="40">';
                htmlweb += '<div class="data">';
                htmlweb += '<span id="name_student">'+ value.std_fname +" "+ value.std_lname +'</span>';
                htmlweb += '<div> <span id="text1">รหัสนักศึกษา:</span><span id="student_id">'+ value.S_ID +'</span></div>';
                htmlweb += '<div> <span id="text2">ฐานความผิด:</span><span id="offense_name">'+ value.off_desc +'</span></div>';
                htmlweb += '</div>';
                htmlweb += '<div class="progress_bar">';
                htmlweb += '<div class="progress">';
                htmlweb += '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
                htmlweb += '</div>';
                htmlweb += '</div>';
                htmlweb += '</div>';
            });
            $('.showdata').html(htmlweb);

            }


            
           

        
        }
    });


}


function select_data_student_today (){

    var dateObj = new Date();
    var day = dateObj.getDate();
    var month = dateObj.getUTCMonth() + 1;
    var year = dateObj.getUTCFullYear();

    console.log ("day"+day+"month"+month+"year"+year);

    var data = {getday : day,getmonth : month,getyear:year};
    //var data = {getday : 19,getmonth : 09,getyear:2019};

    $.ajax({
        url: '<?php echo site_url("Security_guard_dashboard/SearchDate") ?>',
        async: false,
        dataType: 'json',
        data: data, 
        success: function(data) {
            console.log(data);

            if (data == false){
                 
            }else{

                htmlweb =''
            $.each(data, function(key, value) { 
                htmlweb += '<div class="persondata">';  
                htmlweb += '<img src="<?php echo base_url('re/images/man.png') ?>" alt="Paris" width="40" height="40">';
                htmlweb += '<div class="data">';
                htmlweb += '<span id="name_student">'+ value.std_fname +" "+ value.std_lname +'</span>';
                htmlweb += '<div> <span id="text1">รหัสนักศึกษา:</span><span id="student_id">'+ value.S_ID +'</span></div>';
                htmlweb += '<div> <span id="text2">ฐานความผิด:</span><span id="offense_name">'+ value.off_desc +'</span></div>';
                htmlweb += '</div>';
                htmlweb += '<div class="progress_bar">';
                htmlweb += '<div class="progress">';
                htmlweb += '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
                htmlweb += '</div>';
                htmlweb += '</div>';
                htmlweb += '</div>';
            });
            $('.showdata').html(htmlweb);

            }


            
           

        
        }
    });

    



}




function setday (){
    var html = '';

    for(var i=1;i <= 31; i++){
        html += '<option value="' + i + '"> ' + i + '</option>';
    }
    $('#date').html(html);
}


function setmount() {
    var num=0;
    var html = '';
    var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม",
        "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];
    console.log(monthNames.length);
    for (var i = 0; i < monthNames.length; i++) {
        var num = i + 1;
        html += '<option value="' + num + '"> ' + monthNames[i] + '</option>';
    }
    $('#datemount2').html(html);

}

function setyear() {
    //var min = new Date().getFullYear,max = min+9;
    html = ''
    for (i = new Date().getFullYear(); i > 2015; i--) {
        html += '<option value="' + i + '"> ' + i + '</option>'
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
                html += '<td> <a href="javascript:;" data=' + value.oh_ID +
                    ' class="show_data"><i class="fa fa-file-text" style="color:rgba(67, 135, 254);font-size:1.5rem;"></i></a></td>';
                html += '</tr>';

                $('#showdata').html(html);

            });

        }
    });

}

function searchmounth(data) {
    //stament


}
</script>