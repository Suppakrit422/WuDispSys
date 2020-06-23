<head>
    <title>testfile</title>
    <style>
        .select2-container--open .select2-dropdown--below {
            width: 420px !important;
        }

        .selectplace {
            width: 20rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 2;
            font-size: 14px;
            font-family: 'Taviraj', serif;
        }
    </style>
</head>

<body>

    <form action="#" id="msform" name="msform" method="post" enctype="multipart/form-data">

        <!-- <input type="checkbox" name="student[]" value="5"> -->
        <input type="hidden" name="service_ID" value="5">
        <div class="showdata" id="showdata">

        </div>
        <input type="submit" value="save">
    </form>


</body>
<script>
    $(document).ready(function() {
        //alert (555);

        var html = '';
        for (var i = 0; i < 5; i++) {
            html += '<input type="checkbox" name="student[]" value="5912080' + i + '">';
        }
        $('#showdata').html(html);

    });

    $("#msform").on("submit",function(e){
        e.preventDefault(); 

        
        var formData = new FormData(document.getElementById("msform"));
        console.log(formData);

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Teacher_dashboard/test',
            cache: false,
            data: formData,
            processData: false,
            contentType: false,
            type: "POST",
            success: function(data) {
                console.log(data);

          
            }
        });





    });


    // $('.next3').click(function() {

    //     var formData = new FormData(document.getElementById("msform"));
    //     console.log(formData);

    //     $.ajax({
    //         url: '<?php echo base_url(); ?>index.php/Notifyoffense/addnotify',
    //         cache: false,
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         type: "POST",
    //         success: function(data) {
    //             console.log(data);

    //             if (data == 'null') {

    //             }
    //         }
    //     });
    // });
</script>