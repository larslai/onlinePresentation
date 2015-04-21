<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Dashboard">
		<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

		<title>INeedWork</title>

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
											<!-- SERVER STATUS PANELS -->
												<div class="col-md-4 col-sm-4 mb">
													<div class="white-panel pn donut-chart">
														<div class="white-header">
										<h5>SERVER LOAD</h5>
														</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 70%</p>
									</div>
														</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
													</div><! --/grey-panel -->
												</div><!-- /col-md-4-->


												<div class="col-md-4 col-sm-4 mb">
													<div class="white-panel pn">
														<div class="white-header">
										<h5>TOP PRODUCT</h5>
														</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-heart"></i> 122</p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
														</div>
														<div class="centered">
										<img src="<?=base_url('assets/img/product.png');?>" width="120">
														</div>
													</div>
												</div><!-- /col-md-4 -->

						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="<?=base_url('assets/img/ui-zac.jpg');?>" class="img-circle" width="80"></p>
								<p><b>Zac Snider</b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">MEMBER SINCE</p>
										<p>2012</p>
									</div>
									<div class="col-md-6">
										<p class="small mt">TOTAL SPEND</p>
										<p>$ 47,60</p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->


										</div><!-- /row -->


					<div class="row">
						<!-- TWITTER PANEL -->
						<div class="col-md-4 mb">
													<div class="darkblue-panel pn">
														<div class="darkblue-header">
										<h5>DROPBOX STATICS</h5>
														</div>
								<canvas id="serverstatus02" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 60,
												color:"#68dff0"
											},
											{
												value : 40,
												color : "#444c57"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
								</script>
								<p>April 17, 2014</p>
								<footer>
									<div class="pull-left">
										<h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
									</div>
									<div class="pull-right">
										<h5>60% Used</h5>
									</div>
								</footer>
													</div><! -- /darkblue panel -->
						</div><!-- /col-md-4 -->


						<div class="col-md-4 mb">
							<!-- INSTAGRAM PANEL -->
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@THISISYOU<br/>
									5 min. ago
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!-- /col-md-4 -->

						<div class="col-md-4 col-sm-4 mb">
							<!-- REVENUE PANEL -->
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>REVENUE</h5>
								</div>
								<div class="chart mt">
									<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
								</div>
								<p class="mt"><b>$ 17,980</b><br/>Month Income</p>
							</div>
						</div><!-- /col-md-4 -->

					</div><!-- /row -->

									</div><!-- /col-lg-9 END SECTION MIDDLE -->

							</div><! --/row -->
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


		<!--common script for all pages-->
		<script src="<?=base_url('assets/js/common-scripts.js');?>"></script>
		<!--script for this page-->
		<script src="<?=base_url('assets/js/sparkline-chart.js');?>"></script>

	

	<script type="application/javascript">
				$(document).ready(function () {
						$("#date-popover").popover({html: true, trigger: "manual"});
						$("#date-popover").hide();
						$("#date-popover").click(function (e) {
								$(this).hide();
						});
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
