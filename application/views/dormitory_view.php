<!DOCTYPE HTML>
<html>
<head>
	<script src="<?php echo base_url('re/js/canvasjs.js') ?>"> </script>
	<style>
.square1 {
  height: 15px;
  width: 15px;
  background-color:purple;
}
.square2 {
  height: 15px;
  width: 15px;
  background-color:blue;
}
</style>
</head>
<body>

<div class="card-body">
	<div id="chartContainer" style="height: 400px; width: 100%;">

</div>
<div class="square1"></div>หอพักนักศึกษาหญิง
<div class="square2"></div>หอพักนักศึกษาชาย
</div>
</body>

<script type="text/javascript">
window.onload = function () {
	
var html = [];
	
	   $.ajax({
           type: 'ajax',
           url: '<?php echo base_url() ?>index.php/dormitory_contro/chartdorm',
           async: false,
           dataType: 'json',
           success: function(data) {
               
               console.log(data);
               var i;
               for (i = 0; i < data.length; i++) {
				if(data[i].dorm_ID==5 || data[i].dorm_ID==7 || data[i].dorm_ID ==17){
					html.push({
                       label: data[i].label, 
					   y:data[i].y,
					   color:"blue"	
					});
				  
				}else{
					html.push({
						label: data[i].label, 
					   	y:data[i].y,
					   	color:"purple"
					});	
				}
               }
            	var interval = 5;

               console.log(html);
               
               var chart = new CanvasJS.Chart("chartContainer", {
            		theme: "light1", // "light2", "dark1", "dark2"
					animationEnabled: false, // change to true	
            		title:{
            			text: "จำนวนนักศึกษาที่กระทำผิดของหอพักทั้งหมด"
            		},
            		axisY:{
						interval:interval
					
                		},
            		data: [
            		
            		{
            			// Change type to "bar", "area", "spline", "pie",etc.
						type: "column",
				

            			
            			dataPoints: html
            				/*
            				{ label: "หมวด 6 ความผิดเกี่ยวกับการเสพสุราหรือของมึนเมา",  y: 60  },
            				{ label: "หมวด 8 ความผิดเกี่ยวกับวินัยจราจร", y: 15  },
            				{ label: "หมวด 9 ความผิดเกี่ยวกับความประพฤติ  ศีลธรรม และวัฒนธรรมอันดีงาม", y: 25  },
            				{ label: "หมวด 11 ความผิดเกี่ยวกับความสะอาดเรียบร้อย",  y: 60  },
            		*/
            				
            			
            		}]
            	});
           	

               chart.render();
           },
           error: function() {
               alert('ไม่มีข้อมูล');
           }
	   });     

}
</script>
</html>