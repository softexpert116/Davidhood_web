<!DOCTYPE html>
<html>
	<head>
		<title>Webcam motion detection</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css" media="all">

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Motion Detector</h2>
			<div class="panel panel-default">
				<div class="panel-heading">Camera window</div>
				<div class="panel-body" style="	background: #303030;">
					<div class="row">
						<div id="div_camera" class="video-container col-sm-6">
							<video id="webCamWindow" autoplay ></video>
							<div id="movement"></div>
						</div>
						<div id="div_board" class="col-sm-5" style="height: 200px;">
							<button id="btn_finish" class="btn btn_default" onClick="func_finish()" style="display: none;">Finish</button>
							<h3 style="color: white;">Motion State:</h3>
							<p id="p_motion" style="color: white; text-align: center;">message</p>
							<div style="text-align: center;">
								<img id="img_motion" src="./assets/png/inactive.png" style="width: 50px;"/>
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title pull-left">
						Log Window
					</div>
					<div class="panel-title pull-right">
						<a href="javascript:func_clearLog()" style="color:blue;">Clear History</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body" style="	background: #303030;">
					<div class="row">
						<ul id='ul_log' class="list-unstyled" style="margin-left: 15px;">
							<?php foreach ($data as $video) { ?>
								<li>
									<video controls src="<?php echo $video['path']; ?>" style="width:200px;"></video>
									<p style="color:white;"><?php echo $video['time']; ?></p>
								</li>
							<?php } ?>
						 
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
                                            					
		<script type="text/javascript">
			var upload_url = "<?php echo base_url(); ?>admin/upload_blob"; 
			var clear_url = "<?php echo base_url(); ?>admin/clear_history";
			var finish_url = "<?php echo base_url(); ?>admin/finish";
			var img_active_path = './assets/png/active.png';
			var img_inactive_path = './assets/png/inactive.png';

			function func_clearLog() {
				var formData = new FormData();
				formData.append('clear', 'true');
				$.ajax({
					url: clear_url,
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						if(response == 200) {
							$('#ul_log').empty();
							console.log('clear successful');
						}
					}
				});
			}

			function func_finish() {
				var cnt = document.getElementById("ul_log").getElementsByTagName("li").length;
				var img_motion = document.getElementById("img_motion");
				var p_motion = document.getElementById("p_motion");
				var msg = "No motion was detected";
				if (cnt > 2) {
					img_motion.src = img_active_path;
					var msg = "Motion was detected";
				} else {
					img_motion.src = img_inactive_path;
				}
				p_motion.innerHTML = msg;
			}   
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/global.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/MotionDetector/WebCamCapture.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/MotionDetector/ImageCompare.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/MotionDetector/Core.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
	</body>
</html>