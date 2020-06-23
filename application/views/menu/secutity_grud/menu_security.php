<div class="container-fluid page-body-wrapper">


  <!--3-->
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">


      <script>
        $(document).ready(function() {
          selectstudentname();



          function selectstudentname() {
            $.ajax({
              type: 'ajax',
              url: '<?php echo base_url() ?>index.php/Student_dashboard/selectstudentname',
              async: false,
              dataType: 'json',
              success: function(data) { // console.log(data); 
                // alert(data[0])
                $('#fullnamestudent').html(data[0].std_fname + ' ' + data[0].std_lname);
                //$('#lnamestudent').html(data[0].std_lname);


                //$('#dataall').html(num-1);//
              },
              error: function() {
                alert('ไม่มีข้อมูล');
              }
            });
          }
        });
      </script>