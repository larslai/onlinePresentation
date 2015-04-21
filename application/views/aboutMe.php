<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $this->description;?>">
		<meta name="author" content="<?php echo $this->author;?>">
		<meta name="keyword" content="<?php echo $this->keyword;?>">

		<title>Olá</title>

		<!-- Bootstrap core CSS -->
		<link href="<?=base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
		<!--external css-->
		<link href="<?=base_url('assets/css/font-awesome/css/font-awesome.css');?>" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/gritter/css/jquery.gritter.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/lineicons/style.css');?>">

		<!-- Custom styles for this template -->
		<link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/style-responsive.css');?>" rel="stylesheet">


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

	<section id="container" >

	<?php $this->load->view('share/menu.php');?>

		 <!--main content start-->
			<section id="main-content">
					<section class="wrapper">

							<div class="row">
								<div class="col-lg-12 main-chart">
									<div class="row mt">
										<div class="col-md-12 mb">
											<!-- WHITE PANEL - TOP USER -->
											<div class="white-panel pn need-pull">
												<div class="white-header">
													<h3>This is Me</h3>
												</div>
												<p><img src="<?=base_url('assets/img/ui-zac.jpg');?>" class="img-circle" width="80"></p>
												<p><b><?php echo $name['ch'];?>/<?php echo $name['en'];?></b></p>
												<div class="row">
													<div class="col-md-4">
														<p class="small mt">AGE</p>
														<p><?php echo $age;?></p>
													</div>
													<div class="col-md-4">
														<p class="small mt">POSITION</p>
														<p><?php echo $position;?></p>
													</div>
													<div class="col-md-4">
														<p class="small mt">SENIORITY</p>
														<p><?php echo $seniority;?> years</p>
													</div>
												</div>
											</div>
										</div><!-- /col-md-4 -->
									</div><!-- /row -->


									<div class="row">
										<div class="col-md-6 col-sm-6 mb">
											<div class="white-panel pn need-pull">
												<div id="front_end_skills"></div>
											</div>
										<!--
											<div class="content-panel">
												<h4><i class="fa fa-angle-right"></i>Front End</h4>
												<div class="panel-body">
													<div id="front_end_donut" class="graph"></div>
												</div>
											</div>
										-->	
				                      	</div><!-- /col-md-4 -->
				                      	<div class="col-md-6 col-sm-6 mb">
				                      		<div class="white-panel pn need-pull">
												<div id="back_end_skills"></div>
											</div>
				                      	</div><!-- /col-md-4 -->
									
									</div><!-- /row -->

								</div><!-- /col-lg-9 END SECTION MIDDLE -->

							</div>
					</section>
			</section>

			<!--main content end-->
			<!--footer start-->
			<?php $this->load->view('share/footer.php');?>
			<!--footer end-->
	</section>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="<?=base_url('assets/js/jquery.js');?>"></script>
	<script src="<?=base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<script class="include" type="text/javascript" src="<?=base_url('assets/js/jquery.dcjqaccordion.2.7.js');?>"></script>
	<script src="<?=base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
	<script src="<?=base_url('assets/js/jquery.nicescroll.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/js/jquery.sparkline.js');?>"></script>
	<!--hightcharts-->
	<script src="<?=base_url('assets/js/highchart/highcharts.js');?>"></script>
	<script src="<?=base_url('assets/js/highchart/highcharts-more.js');?>"></script>
	<!--
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	-->
	<!--common script for all pages-->
    <script src="<?=base_url('assets/js/common-scripts.js');?>"></script>
    <script src="<?=base_url('assets/js/aboutMe.js');?>"></script>

	<script type="application/javascript">
		$(document).ready(function () {
			var front_end_obj = JSON.parse('<?php echo $arranged_skill_data["front_end"];?>');
			var back_end_obj = JSON.parse('<?php echo $arranged_skill_data["back_end"];?>');
			$("#date-popover").popover({html: true, trigger: "manual"});
			$("#date-popover").hide();
			$("#date-popover").click(function (e) {
					$(this).hide();
			});
			//createRadar('front_end_skills',front_end_obj,'Front End');
			//createRadar('back_end_skills',back_end_obj,'Back End');
			createLine('front_end_skills',front_end_obj,'Front End');
			createLine('back_end_skills',back_end_obj,'Back End');
/*
				Morris.Donut({
					element: 'front_end_donut',
					data: [
						<?php
              				foreach($skills['front_end'] AS $front_end_skill=>$value){
              			?>
              					{label: '<?php echo $front_end_skill;?>', value: <?php echo $value;?> },
              			<?php
              				}
              			?>
					],
					colors: ['#3498db', '#2980b9', '#34495e'],
					formatter: function (y) { return y + "%" }
				});
*/				
            $('.fa-bars').click();// init hide sidebar

		});

		function myNavFunction(id) {
				$("#date-popover").hide();
				var nav = $("#" + id).data("navigation");
				var to = $("#" + id).data("to");
				console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
		}
	</script>


	</body>
</html>
