<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $this->description;?>">
		<meta name="author" content="<?php echo $this->author;?>">
		<meta name="keyword" content="<?php echo $this->keyword;?>">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<title>Olá</title>

		<!-- Bootstrap core CSS -->
		<link href="<?=base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
		<!--external css-->

		<link href="<?=base_url('assets/css/font-awesome/css/font-awesome.css');?>" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/gritter/css/jquery.gritter.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/lineicons/style.css');?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/flag-icon/css/flag-icon.css');?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/flag-icon/css/docs.css');?>">

		<!-- on page scroll-->
		<link href="<?=base_url('assets/css/full_page_style.css');?>" rel="stylesheet">

		<!-- timeline CSS -->
		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		<link href="<?=base_url('assets/css/flat.css');?>" rel="stylesheet" />
		<link href="<?=base_url('assets/css/timeline_style.css');?>" rel="stylesheet" />
		<link href="<?=base_url('assets/css/lightbox.css');?>" rel="stylesheet" />
		<link href="<?=base_url('assets/css/jquery.mCustomScrollbar.css');?>" rel="stylesheet" />

		<!-- customer CSS -->
		<link href="<?=base_url('assets/css/rewrite.css');?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/index.css');?>" rel="stylesheet">

		<!-- typing CSS -->
		<link href="<?=base_url('assets/css/typed.css');?>" rel="stylesheet">
		<style type="text/css">
		</style>
	</head>

	<body>

		<div class="navbar navbar-fixed-top alt" data-spy="affix" data-offset-top="1000">
			<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand" id="go_top">TOP</a>
				<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			</div>
			<div class="navbar-collapse collapse" id="navbar">
				<ul class="nav navbar-nav" id="nav">
				<li><a class="go-to-sec" href="#sec2">INTRODUCTION</a></li>
				<li><a class="go-to-sec" href="#sec3">SKILLS</a></li>
				<li><a class="go-to-sec" href="#sec4">EXPERIENCE</a></li>
				<li><a class="go-to-sec" href="#sec5">PORTFOLIO</a></li>
				<li><a class="go-to-sec" href="#sec6">CONTRACT</a></li>
				</ul>
			</div>
			</div>
		</div>
		<div id="sec1" class="blurb">
			<div class="container">
				<div class="row">
					<div class="hidden-xs">
						<div class="col-md-7 write-typing-effect">
						<!--
							<h1>THIS IS ME,&nbsp;<?php echo $top['name'];?></h1>
							<p class="lead"><?php echo $top['description'];?></p>
						-->
						</div>
					</div>
					<div class="visible-xs">
						<div class="col-md-7">
							<h1>THIS IS ME,&nbsp;<?php echo $top['name'];?></h1>
							<p class="lead"><?php echo $top['description'];?></p>
						</div>
					</div>
					<div class="col-md-5">
						<div id="my_picture" class="scene">
							<div class="layer" data-depth="0.70">
								<!--<img src="<?=base_url('assets/images/my_picture/layer3.png');?>">-->
								<img class="mypic-sm" src="<?=base_url('assets/images/'.$top["pic"]);?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="featurette" id="sec2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="gray-font"><h2>THIS IS MY BASIC INFORMATION</h2></div>
					</div>
				</div>
				<div class="row smoove-effect">
					<?php
						$is_first = true;
						foreach($introduction AS $introduction_key=>$info){

					?>
							<div class="col-md-2 <?php if($is_first == true){ echo 'col-md-offset-1';} ?> text-center">
								<div class="featurette-item">
									<i class="fa <?php echo $info['icon'];?>"></i>
									<div class="gray-font"><h4><?php echo $info['title'];?></h4></div>
									<?php
										if(isset($info['language_description']) && is_array($info['language_description'])){
											foreach($info['language_description'] AS $language=>$value){
									?>
											<div class="col-xs-12">
												<div class="col-xs-5">
													<div class=" flag-wrapper">
														<div class="img-thumbnail flag flag-icon-background flag-icon-<?php echo $language;?>"></div>
													</div>
												</div>
												<div class="col-xs-7 no-padding ">
													<div class="level-bar-area lv-<?php echo ($value['score']);?>">
														<div class="level-bar"><?php echo ($value['score']);?>%</div>
													</div>
												</div>
											</div>
									<?php
											}
										}elseif(isset($info['description'])){
											if($introduction_key == 'country'){
									?>
											<div class="col-xs-12">
												<?php echo strtoupper($info['description']['title']);?>
											</div>
											<div class="col-xs-offset-3 col-xs-6">
												<div class="flag-wrapper">
													<div class="img-thumbnail flag flag-icon-background flag-icon-<?php echo $info['description']['icon'];?>"></div>
												</div>
											</div>
									<?php
											}else{
									?>
												<p><?php echo strtoupper($info['description']);?></p>
									<?php
											}
										}elseif(isset($info['places'])){
											foreach($info['places'] AS $key=>$place){
									?>
											<div class="col-xs-6">
												<?php echo strtoupper($place['title']);?>
												<div class="flag-wrapper">
													<div class="img-thumbnail flag flag-icon-background flag-icon-<?php echo $place['icon'];?>"></div>
												</div>
											</div>
									<?php
											}
										}
									?>
								</div>
							</div>
					<?php
						$is_first = false;
						}
					?>

				</div>
			</div>
		</div>
		<div class="callout" id="sec3" >
			<div class="callout-layout">
				<br>
				<div class="col-md-12 text-center smoove-effect" data-move-x="-50px">
					<div class="white-font">
						<h1 class="no-newline">THOSE ARE MY ABILITIES</h1>
					</div>
				</div>
				<div class="col-md-12 text-center">&nbsp;</div>
				<div class="col-md-8 col-md-offset-2 smoove-effect">
				<?php
					foreach($skills AS $skill_type=>$skill_info){
				?>
						<div class="col-md-12 text-center">
							<div class="white-font">
								<h2 class="no-newline"><?php echo strtoupper($skill_type);  ?></h2>
							</div>
						</div>
						<div class="row hidden-xs">

						<?php
							foreach($skill_info AS $key=>$value){
						?>
							<div class="col-sm-2 text-center no-padding-right">
								<div class="viewport window-style">
									<a href="javascript:void(0);">
										<span class="dark-background"><?php echo  strtoupper($value['level']);?></span>
										<img class="img-circle sm-size" src="<?=base_url('assets/images/skills/'.$value['pic']);?>" />
									</a>
								</div>
								<div class="white-font"><h4 class="dynamic-font"><?php echo  strtoupper($value['title']);?></h4></div>
							</div>
						<?php
							}
						?>
						</div>
						<div class="row visible-xs">
						<?php
							foreach($skill_info AS $key=>$value){
						?>
								<div class="show-skill-mobile">
									<div class="col-sm-2 text-center">
										<div class="viewport mobile-style">
											<a href="javascript:void(0);">
												<span class="dark-background"><?php echo  strtoupper($value['short_name']);?></span>
												<img class="img-circle xs-size" src="<?=base_url('assets/images/skills/'.$value['pic']);?>">
											</a>
										</div>
									</div>
								</div>
						<?php
							}
						?>
						</div>
						<div class="hidden-xs">
							<br>
						</div>
				<?php
					}
				?>
				</div>
			</div>
		</div>
		<div class="timeline-block" id="sec4">

				<div class="row">
				  <div class="col-md-6 col-md-offset-3 text-center smoove-effect" data-move-x="-50px">
				  <!--
					<h4>I COME FROM TAIWAN, TAIPEI</h4>
					<h2>TAKE A LOOK MY WORK EXPERIENCE</h2>
					-->
						<h1 class="no-newline">TAKE A LOOK MY WORK EXPERIENCE</h1>
					<br>
				  </div>
				</div>
				<div class="row smoove-effect">
					<div class="timelineLoader">
						<img src="<?=base_url('assets');?>/images/timeline/loadingAnimation.gif" />
					</div>
					<!-- BEGIN TIMELINE -->
					<div class="timelineFlat timelineFlatPortfolio tl3 ">
						<?php
							foreach($experience['data'] AS $date=>$info){
						?>
								<div class="item" data-id="<?php echo $date;?>" data-description="<?php echo $info['introduction'];?>">
								<?php
									if(isset($info['need_zoom_in_pic']) && $info['need_zoom_in_pic'] == true && isset($info['full_size_pic'])){
								?>
									<a class="image_rollover_bottom con_borderImage" data-description="ZOOM IN" href="<?=base_url('assets/images/experience/full_size/'.$info['full_size_pic']);?>" rel="lightbox[timeline]">
										<img src="<?=base_url('assets/images/experience/'.$info['pic']);?>" alt=""/>
									</a>
								<?php
									}else{
								?>
										<img src="<?=base_url('assets/images/experience/'.$info['pic']);?>" alt=""/>
								<?php
									}

									if(isset($info['description'])){
										if(isset($info['description']['title'])){
								?>
											<h2><?php echo strtoupper($info['description']['title']); ?></h2>
								<?php
										}
										if(isset($info['description']['sub_title'])){
								?>
											<span><?php echo $info['description']['sub_title'];?></span>
								<?php
										}
									}
									if($info['read_more'] == true){
										if(isset($info['description'])){
								?>
											<div class="read_more no-push-top" data-id="<?php echo $date;?>">Read more</div>
								<?php
										}else{
								?>
											<div class="read_more" data-id="<?php echo $date;?>">Read more</div>
								<?php
										}
									}
								?>

								</div>
								<?php
									if($info['read_more'] == true){
								?>
										<div class="item_open" data-id="<?php echo $date;?>" data-access="<?=base_url('index.php/ajax/getInfo?item='.$info['ajax_id']);?>">
											<div class="item_open_content">
												<img class="ajaxloader" src="<?=base_url('assets');?>/images/timeline/loadingAnimation.gif" alt="" />
											</div>
										</div>
								<?php
									}
							}
						?>
					</div> <!-- /END TIMELINE -->
				</div>

		</div>

		<hr>

		<div class="blurb bright" id="sec5">

		  <div class="row more-space-1">
			  <div class="col-md-6 col-md-offset-3 text-center smoove-effect" data-move-x="-50px">
			  <!--
				<h4>HERE HAVE SOME DIFFERNET LANGUAGE PORTFOLIO..</h4>
				<h2 class="no-newline">OH MY GOD, IT'S</h2>&nbsp;<h1 class="no-newline">FREE!</h1>
				-->
				<h1 class="no-newline">HERE HAVE SOME DIFFERNET LANGUAGE PORTFOLIO</h1>
				<br>
			  </div>
		  </div>

		  <div class="row">
		  	<?php
		  		$first_block = true;
		  		foreach($file_download AS $language_type=>$file_info){
		  			if($first_block == true){
		  	?>
		  				<div class="col-sm-4 col-sm-offset-2">
		  	<?php
		  				$first_block = false;
		  			}else{
		  	?>
		  				<div class="col-sm-4">
		  	<?php
		  			}
		  	?>
							<div class="panel panel-default smoove-effect" data-rotate-x="90deg" data-move-z="-500px" data-move-y="200px">
								<div class="panel-heading text-center"><h2><i class="icon-chevron-left"></i><?php echo strtoupper($file_info['title']); ?></h2></div>
								<div class="panel-body text-center"><?php
									if( isset($file_info['description']) && $file_info['description'] != null){ echo strtoupper($file_info['description']); } ?>
										<div class="row">&nbsp;</div>
										<form  name="file_form" action="<?=base_url('index.php/main/fileDownload');?>" method="get">
											<input type="hidden" value="<?php echo $language_type; ?>" name="lang_type">
											<button class="btn btn-lg btn-primary btn-block"><?php echo strtoupper($file_info['button_title']); ?></button>
										</form>
								</div>
							</div>
						</div>
		  	<?php
		  		}
		  	?>
		  </div>
		</div>

		<div class="blurb" id="sec6">

			<div class="col-md-12 text-center smoove-effect" data-move-x="-50px">
				<h1 class="no-newline " >FEEL FREE TO CONTACT ME</h1>
				<br>
			</div>
			<div class="container">
			<div class="row">
			<!--
			  <div class="col-md-6 smoove-effect">
				<div class="col-md-12 google-map-block" id="map-container">
				</div>
				<div class="col-md-6 col-md-offset-3 text-center ">
					<h4>HERE I AM</h4>
				</div>
			  </div>
			 -->
			  <div class="col-md-6  text-center smoove-effect">
			  		<div class="row">
			  			<div class="hidden-xs">
				  			<div class="col-md-12 col-md-offset-7-3">
					  			<div class="col-md-3  text-center">
					  				<a target="_blank" href="<?php echo $contact['linkedin']; ?>">
						  				<div class="featurette-item contact-info sm-size">
							  				<i class="fa fa-linkedin-square fa-7x linkedin-color"></i>
							  			</div>
						  			</a>
					  			</div>
					  			<div class="col-md-3  text-center">
					  				<a target="_blank" href="<?php echo $contact['facebook']; ?>">
						  				<div class="featurette-item contact-info sm-size">
							  				<i class="fa fa-facebook-square fa-7x facebook-color"></i>
							  			</div>
						  			</a>
					  			</div>
					  			<div class="col-md-3  text-center">
					  				<a href="mailto:<?php echo $contact['email']; ?>">
						  				<div class="featurette-item contact-info sm-size">
							  				<i class="fa fa-envelope-o fa-7x email-color"></i>
							  			</div>
						  			</a>
					  			</div>
				  			</div>
				  			<!--<p class="lead pull-right smoove-effect" data-move-x="-50px"><?php echo strtoupper($contact['sub_title']); ?></p>-->
				  		</div>
				  		<div class="visible-xs col-md-12">
				  			<hr>
				  			<div class="col-xs-4  text-center contact-info no-padding">
				  				<a target="_blank" href="<?php echo $contact['linkedin']; ?>">
				  					<i class="fa fa-linkedin-square fa-5x linkedin-color"></i>
				  				</a>
				  			</div>
					  		<div class="col-xs-4  text-center contact-info no-padding">
					  			<a target="_blank" href="<?php echo $contact['facebook']; ?>">
				  					<i class="fa fa-facebook-square fa-5x facebook-color"></i>
				  				</a>
				  			</div>
					  		<div class="col-xs-4  text-center contact-info no-padding">
					  			<a href="mailto:<?php echo $contact['email']; ?>">
				  					<i class="fa fa-envelope-o fa-5x email-color"></i>
				  				</a>
				  			</div>
				  		</div>
			  		</div>
			  </div>
			</div>
		  </div>
		</div>

		<footer>
		  <div class="container smoove-effect">
			<div class="row">
			  <div class="col-md-6 col-md-offset-3 text-center">
				<ul class="list-inline">
				  <li><i class="icon-facebook icon-2x"></i></li>
				  <li><i class="icon-twitter icon-2x"></i></li>
				  <li><i class="icon-google-plus icon-2x"></i></li>
				  <li><i class="icon-pinterest icon-2x"></i></li>
				</ul>
				<hr>
				<p>Built with
					<i class="icon-heart-empty"></i> at <a href="<?php echo ( ($foot_info['link'] != null) ? $foot_info['link'] : 'javascript:void(0);' );?>"><?php echo $foot_info['builder']; ?></a>.
					<br><?php echo $foot_info['email']; ?>
					<br><?php echo $foot_info['title']; ?>©copy right-<?php echo $foot_info['start_time'];?>-<?php echo $foot_info['end_time'];?>
				</p>
			  </div>
			</div>
		  </div>
		</footer>
<!--
		<ul class="nav pull-right scroll-down">
		  <li><a href="#" title="Scroll down"><i class="icon-chevron-down icon-3x"></i></a></li>
		</ul>
		<ul class="nav pull-right scroll-top">
		  <li><a href="#" title="Scroll to top"><i class="icon-chevron-up icon-3x"></i></a></li>
		</ul>
-->

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="<?=base_url('assets/js/jquery.js');?>"></script>
	<script src="<?=base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<!-- <script src="<?=base_url('assets/js/jquery.nicescroll.js');?>" type="text/javascript"></script> -->

	<!--neccessary in timeline effect-->
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.mCustomScrollbar.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.easing.1.3.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/jquery.timeline.min.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/image.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/lightbox.js');?>"></script>

	<!--picture parallax effect-->
	<script src="<?=base_url('assets/js/deploy/parallax.js');?>"></script>

	<!--smoove effect-->
	<script src="<?=base_url('assets/js/jquery.smoove.js');?>"></script>

	<!--write typing effect-->
	<script src="<?=base_url('assets/js/typed.js');?>"></script>

	<!--google map-->
	<!--<script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
	<script type="application/javascript">
		$(document).ready(function () {
/*
			//google map
			function init_map() {
				var var_location = new google.maps.LatLng(25.0854061,121.5615012);

				var var_mapoptions = {
					center: var_location,
					zoom: 6,
					styles: [
					  {
						featureType: "road.local",
						stylers: [
							  { visibility: "off" }
								  ]
					  },
					  {
						featureType: "poi",
							stylers: [
							  { visibility: "off" }
									  ]
					  },
					  {
						featureType: "poi.attraction",
						stylers: [
							  {visibility: "on"}
								  ]
					  },
					  					  {
						featureType: "poi.place_of_worship",
						stylers: [
							  {visibility: "on"}
								  ]
					  },

					  {
						featureType: "poi.park",
						stylers: [
							  {visibility: "on"}
								  ]
					  }
					  ],
				};

				var var_marker = new google.maps.Marker({
					position: var_location,
					map: var_map,
					title:"Venice"
				});

				var var_map = new google.maps.Map(document.getElementById("map-container"),var_mapoptions);

				var_marker.setMap(var_map);

			}

			google.maps.event.addDomListener(window, 'load', init_map);
*/
			$('.smoove-effect').smoove({
				offset:'40%',
			});


			$(".write-typing-effect").typed({
				strings: ["<h1>THIS IS ME,&nbsp;<?php echo $top['name'];?></h1><p class='lead'><?php echo $top['description'];?></p>"],
				typeSpeed: 30,
				backDelay: 500,
				showCursor:false,
				loop: false,
				contentType: 'html', // or text
				// defaults to false for infinite loop
				loopCount: false,
	        });
			//skill pic viewport
			 $('.viewport.window-style').mouseenter(function(e) {
			    $(this).children('a').children('img').animate({ height: '110', left: '0', top: '0', width: '110'}, 100);
			    $(this).children('a').children('span').fadeIn(100);
		    }).mouseleave(function(e) {
		        $(this).children('a').children('img').animate({ height: '100', left: '-20', top: '-20', width: '100'}, 100);
		        $(this).children('a').children('span').fadeOut(100);
		    });


			//website scroll style
			//$("html").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

			//smooth effect of scroll to block

			$('.go-to-sec').click(function(e){
				 e.preventDefault();
				$('html, body').animate({scrollTop: $( $.attr(this, 'href') ).offset().top}, 500);
				return false;
			})

			$('#go_top').click(function(e){
				 e.preventDefault();
				$('html, body').animate({scrollTop: 0}, 500);
				return false;
			})


			// light
			$('.tl3').timeline({
				openTriggerClass : '.read_more',
				startItem : "<?php echo $experience['start_time']; ?>",
				closeText : 'x'
			});
			$('.tl3').on('ajaxLoaded.timeline', function(e){
				console.log(e.element.find('.timeline_open_content .info-detail'));

				var height = e.element.height()-60-e.element.find('h2').height();
				e.element.find('.timeline_open_content .info-detail').css('max-height', height).mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin"
				});
			});

			// Pretty simple huh?
			var parallax = new Parallax($('#my_picture')[0]);

		});
	</script>


	</body>
</html>
