<!doctype html>
<html lang="en">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('re/css/css_dashboard_student.css') ?>">

<center>
	<strong>
		<div class="alert alert-success" role="alert" style="display: none;"></div>
	</strong>
	<strong>
		<div class="alert alert-danger" role="alert" style="display: none;"></div>
	</strong>
	<strong>
		<div class="alert alert-warning" role="alert" style="display: none;"></div>
	</strong>
</center>

<head>
	<title>ระบบวินัยนักศึกษา | มหาวิทยาลัยวลัยลักษณ์</title>
	<style>
		#backButton {
			border-radius: 4px;
			padding: 8px;
			border: none;
			font-size: 16px;
			background-color: #2eacd1;
			color: white;
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
		}

		.invisible {
			display: none;
		}

		.breadcrumb3 {
			font-size: 20px;

			margin: 0 auto;
			width: 800px;

		}

		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}

		.alignleft
		{
			text-align: left;
		}
	</style>
</head>

<body>
	<meta charset="UTF-8">

	<div class="page-breadcrumb" id="nav_sty">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<!--<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">จัดการข้อมูลพื้นฐาน</a></li>-->
				<li class="breadcrumb-item active" aria-current="page">หน้าแรก</li>
			</ol>
		</nav>
	</div>

	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card shadow mb-4">
			<div class="card-header" id="card_2">
				<h6 class="m-0 text-primary"><span><i class="fa fa-home"></i></span>&nbsp; หน้าแรก </h6>
			</div><br>


			<div class="col-sm-12">
				<div class="card comp-card">
					<div class="card-body">
						<div class="breadcrumb">
							<!-- <div class="table-responsive">  -->
							<table class="table table-hover m-b-0">
								<div class="breadcrumb3">
									<center> กราฟแสดงคะแนนความประพฤตินักศึกษา </center>
									<br>
									<br>
									<div id="chartContainer" style="height: 370px; width: 100%;"></div>
									<button class="btn invisible" id="backButton">
										< Back</button> <!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js">
											</script> -->
											<script src="../re/js/canvasjs.min.js"></script>
											<script src="../re/js/jquery.canvasjs.min.js"></script>
							</table>
						</div>

						<center>
						<!--<label>คะแนนของคุณอยู่ใน <b>ระดับ</b> เกณฑ์ :</label>
							<label id="level_behavior"></label>-->
						</center>
						<br>
						<br>
						<div class="container">
							<center>
								<h4><b>รายละเอียดคะแนนความประพฤติของนักศึกษา</b></h4>
							</center>

							<table style="width:100%">
								<tr>
									<th>ลำดับ</th>
									<th>วันที่ทำผิด</th>
									<th>ฐานความผิด</align></th>
									<th>คะแนนที่หัก</th>
									<th>สถานะการกระทำความผิด</th>
								</tr>
								<tbody id="showdata">
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
</body>



<script>
	$(document).ready(function() {
		//let point_cut = 0;
		selectstudentstatus();
		selectstudentpoint();
		// show_all();


		function selectstudentpoint() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>index.php/Student_dashboard/selectstudentpoint',
				async: false,
				dataType: 'json',
				success: function(data) {
					// console.log("p>>>",p); 
					//alert(data[0].behavior_score)
					// console.log("data[0].behavior_score>>",data);
					// console.log("data[0].behavior_score>>",data[0].behavior_score);

					var score = data[0].behavior_score //- point_cut;
					var score2 = score
					var deducted_points = 100 - score;
					var deducted_pointss = deducted_points; // คะแนนที่หัก

					/**
					 * Set level_behavior
					 */
					// if (deducted_pointss <= 10) {
					// 	document.getElementById("level_behavior").innerHTML = " ตักเตือนเป็นลายลักษณ์อักษร";
					// } else if (deducted_pointss <= 30) {
					// 	document.getElementById("level_behavior").innerHTML = " ภาคทัณฑ์ 1 ภาคการศึกษา";
					// } else if (deducted_pointss <= 50) {
					// 	document.getElementById("level_behavior").innerHTML = " ภาคทัณฑ์ 2 ภาคการศึกษา";
					// } else if (deducted_pointss <= 70) {
					// 	document.getElementById("level_behavior").innerHTML = " ภาคทัณฑ์ 3 ภาคการศึกษา";
					// } else if (deducted_pointss <= 80) {
					// 	//document.getElementById("level_behavior").innerHTML = " พักการศึกษา 1 ภาคการศึกษา";
					// 	$('#level_behavior').html("พักการศึกษา 1 ภาคการศึกษา");
					// } else if (deducted_pointss <= 90) {
					// 	document.getElementById("level_behavior").innerHTML = " พักการศึกษา 2 ภาคการศึกษา";
					// } else if (deducted_pointss <= 99) {
					// 	document.getElementById("level_behavior").innerHTML = " พักการศึกษา 3 ภาคการศึกษา";
					// } else {
					// 	document.getElementById("level_behavior").innerHTML = " พ้นสภาพการเป็นนักศึกษา";
					// }
					// document.getElementById("level_behavior").innerHTML = "1234";
					/************/

					var data = [{
							y: deducted_pointss,
							name: "คะแนนที่หัก",
							color: "#FF9966"
						},
						{
							y: score2,
							name: "คะแนนคงเหลือ",
							color: "#66CC66"
						}
					];

					renderGra(data);

				},
				error: function() {
					alert('ไม่มีข้อมูล');
				}
			});
		}

		function selectstudentstatus() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>index.php/Student_dashboard/selectstudentstatus',
				async: false,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					var html = '';
					var n = 1;
					var i;
					for (i = 0; i < data.length; i++) {
						
						if (data[i].statusoff == '6') {
							

						} else {
							html += '<tr>' +
								'<td>' + n + '</td>' +
								'<td>' + data[i].committed_date + '</td>' +
								'<td class="alignleft">' + data[i].off_desc + '</td>' +
								'<td>' + data[i].point + '</td>' +
								
								'<td> ' + data[i].statusoffname + ' </a> </td>' +
								// '<th> <a href="javascript:;"class="show_data" data='+data[i].statusoffname+' > ' + data[i].statusoffname +  ' </a> </th>'+

								'</tr>';
						}
						n ++;
						}
					$('#showdata').html(html);
					//$('#dataall').html(num-1);//
				},
				error: function() {
					//alert('ไม่มีข้อมูล');
				}
			});
		}
	});


	// 	if(data[i].statusoff != '6'){

	// }else{
	// html += '<tr>' +
	// 	'<th>' + n + '</th>' +
	// 	'<th>' + data[i].committed_date + '</th>' +
	// 	'<th>' + data[i].off_desc + '</th>' +
	// 	'<th>' + data[i].point + '</th>' +
	// 	//data[i].statusoffname
	// 	'<th> ' + data[i].statusoffname +  ' </a> </th>'+
	// 	// '<th> <a href="javascript:;"class="show_data" data='+data[i].statusoffname+' > ' + data[i].statusoffname +  ' </a> </th>'+

	// 	'</tr>';
	// }
	// n += 1;
	// }


	/// view_volunteerAc

	// $('#showdata').on('click', '.show_data', function() {

	// 	var id = $(this).attr('data');
	// 	//   console.log(id);

	// 	$('#ShowDta').modal('show');
	// 	html = '';
	// 	i = 0;

	// 	//select show data
	// 	$.ajax({
	// 		type: 'ajax',
	// 		method: 'get',
	// 		url: '<?php echo site_url('Student_dashboard/selectstudentstatus') ?>', // เช็ค select
	// 		data: {
	// 			id: id
	// 		},
	// 		async: false,
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			//console.log(data);
	// 			//alert ('Having data');

	// 			$.each(data, function(key, value) {
	// 				i++;
	// 				// if (i==1) {


	// 				//แก้ให้เป็นการอบรม
	// 				html += '<p class="text_head"> <label for="" class="label_txt">ชื่อการอบรม: </label> ' + value.train_name + ' </p>'
	// 				html += '<p class="text_position"> <label for="" class="label_txt"> หมวดการอบรม:</label> ' + value.person_fname + '&nbsp;&nbsp;' + value.person_lname + ' <label for="" class="label_txt">หมายเลขโทรศัพท์:</label> ' + value.phone1 + '</p>';
	// 				html += '<p class="text_position"> <label for="" class="label_txt">ผู้ควบคุมการอบรม ชื่อ: </label> ' + value.place + ' </p>';
	// 				html += '<p class="text_position"> <label for="" class="label_txt">วันที่อบรม: </label> ' + value.service_date + '&nbsp;&nbsp;' + value.person_lname + ' <label for="" class="label_txt">จำนวนผู้อบรม:</label> ' + value.phone1 + '</p>';
	// 				html += '<p class="text_position"> <label for="" class="label_txt">สถานที่:</label>  ' + value.start_time + "-" + value.end_time + ' </p>';
	// 				html += '<p class="text_position"> <label for="" class="label_txt">จำนวนชั่วโมง: </label> ' + value.received + ' </p>';
	// 				html += '<p class="text_position"> <label for="" class="label_txt">หมายเหตุ: </label> ' + value.explanation + ' </p>';



	// 				//  }



	// 				$('.content').html(html);

	// 			});
	// 		},
	// 		error: function() {
	// 			alert('ไม่สามารถลบข้อมูล');
	// 		}
	// 	});



	// });





	var renderGra = function(dataDB) {
		var totalVisitors = 100;
		var visitorsData = {
			"New vs Returning Visitors": [{
				click: visitorsChartDrilldownHandler,
				cursor: "pointer",
				explodeOnClick: false,
				innerRadius: "75%",
				legendMarkerType: "square",
				name: "New vs Returning Visitors",
				radius: "100%",
				showInLegend: true,
				startAngle: 90,
				type: "doughnut",

				dataPoints: dataDB
			}],


		};

		var newVSReturningVisitorsOptions = {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: ""
			},
			subtitles: [{
				text: "",
				backgroundColor: "#2eacd1",
				fontSize: 16,
				fontColor: "white",
				padding: 5
			}],
			legend: {
				fontFamily: "calibri",
				fontSize: 14,
				itemTextFormatter: function(e) {
					return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100);
				}
			},
			data: []
		};

		/*
		var visitorsDrilldownedChartOptions = {
			animationEnabled: true,
			theme: "light2",
			axisX: {
				labelFontColor: "#717171",
				lineColor: "#a2a2a2",
				tickColor: "#a2a2a2"
			},
			axisY: {
				gridThickness: 0,
				includeZero: false,
				labelFontColor: "#717171",
				lineColor: "#a2a2a2",
				tickColor: "#a2a2a2",
				lineThickness: 1
			},
			data: []
		};
		*/
		var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
		chart.options.data = visitorsData["New vs Returning Visitors"];
		chart.render();

		function visitorsChartDrilldownHandler(e) {
			chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
			chart.options.data = visitorsData[e.dataPoint.name];
			chart.options.title = {
				text: e.dataPoint.name
			}
			chart.render();
			$("#backButton").toggleClass("invisible");
		}
		/*
		$("#backButton").click(function() { 
			$(this).toggleClass("invisible");
			chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
			chart.options.data = visitorsData["New vs Returning Visitors"];
			chart.render();
		});
		*/
	}
</script>

</html>