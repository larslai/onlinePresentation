$(document).ready(function () {
	loadJsonFile();
});

function loadJsonFile(){
	//load menu
	$.getJSON( "json_file/menu.json", function( menu_data ) {
		initMenu(menu_data);
	});

	//load top
	$.getJSON( "json_file/top.json", function( top_data ) {
		initTop(top_data);
	});

	//load basic
	$.getJSON( "json_file/basic.json", function( basic_data ) {
		initBasic(basic_data);
	});

	//load skill
	$.getJSON( "json_file/skill.json", function( skill_row_data ) {
		skill_data = sortSkill(skill_row_data);
		initSkill(skill_data);
	});

	//load experience
	$.getJSON( "json_file/experience_data.json", function( experience_row_data ) {
		var newest_experience_first = true;
		experience_data = filterExperience(experience_row_data , newest_experience_first);
		initExperience(experience_data);
	});

	//load contact
	$.getJSON( "json_file/contact.json", function( contact_data ) {
		initContact(contact_data);
	});

	//load footer
	$.getJSON( "json_file/footer.json", function( footer_data ) {
		initFooter(footer_data);
	});
}

function initMenu(menu_data){
	var menu_li_dom = "";
	$.each( menu_data , function( sec_id, data ) {
		if(data.display == false){
			$('#'+sec_id).remove();
		}else{
			menu_li_dom += '<li><a class="go-to-sec" href="#'+sec_id+'">'+data.title+'</a></li>';
		}
    });
    $('#nav').append(menu_li_dom);
    return;
}

function initTop(top_data){
	$('.js-top-name').html("THIS IS ME,&nbsp;"+top_data.name);
	$('.lead').html(top_data.description);
	$('.mypic-sm').attr("src", top_data.pic);

	$(".write-typing-effect").typed({
		strings: ["<h1>THIS IS ME,&nbsp;"+top_data.name+"</h1><p class='lead'>"+top_data.description+"</p>"],
		typeSpeed: 30,
		backDelay: 500,
		showCursor:false,
		loop: false,
		contentType: 'html', // or text
		// defaults to false for infinite loop
		loopCount: false,
    });

	// Pretty simple huh?
	var parallax = new Parallax($('#my_picture')[0]);
}

function initBasic(basic_data){
	var basic_dom = '';
	$.each( basic_data , function( basic_data_type, data ) {
		basic_dom += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 text-center">';
		basic_dom += '	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 featurette-item">';
		basic_dom += '		<i class="fa '+data.icon+'"></i>';
		basic_dom += '		<div class="white-font"><h4>'+data.title+'</h4></div>';
		basic_dom += '	</div>';

		//language info
		if( ("language_description" in data ) && !(jQuery.isEmptyObject(data.language_description))){
			$.each( data.language_description , function( country_id, language_info ) {
				basic_dom += '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-11 col-lg-offset-1">';
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6">';
				basic_dom += '		<div class=" flag-wrapper">';
				basic_dom += '			<div class="img-thumbnail flag flag-icon-background flag-icon-'+country_id+'"></div>';
				basic_dom += '		</div>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 no-padding">';
				basic_dom += '		<span class="language-score js-score-animation" data-value="'+language_info.score+'">0%</span>';
				basic_dom += '	</div>';
				basic_dom += '</div>';
			});
		}else if( ("description" in data ) ){
			if(basic_data_type == 'country'){
				basic_dom += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
				basic_dom += '	<div class="col-xs-6 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4  hidden-xs hidden-lg">';
				basic_dom += '		<span class="country-word">'+data.description.title+'</span>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-5 col-lg-offset-1">';
				basic_dom += '		<div class="flag-wrapper">';
				basic_dom += '			<div class="img-thumbnail flag flag-icon-background flag-icon-'+data.description.icon+'"></div>';
				basic_dom += '		</div>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-lg-5 visible-xs visible-lg">';
				basic_dom += '		<span class="country-word">'+data.description.title+'</span>';
				basic_dom += '	</div>';
				basic_dom += '</div>';
			}else if(basic_data_type == 'experience'){
				basic_dom += '<span class="country-word js-experience-years-animation" data-value="'+data.description+'">'+data.description+' YEARS</span>';
			}else if( basic_data_type == 'age'){
				basic_dom += '<span class="country-word js-age-animation" data-value="'+data.description+'">'+data.description+'</span>';
			}else{
				basic_dom += '<span class="country-word">'+data.description+'</span>';
			}
		}else if(("places" in data )){
			var css_dom;
			$.each( data.places , function( index, place ) {
				if(index == 0){
					css_dom = 'col-sm-offset-2 col-md-offset-2';
				}else{
					css_dom = '';
				}
				basic_dom += '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-12 col-lg-offset-1 '+css_dom+'">';
				basic_dom += '	<div class="col-sm-12 col-md-12 hidden-xs hidden-lg">';
				basic_dom += '		<span class="country-word">'+place.title+'</span>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12 col-lg-5">';
				basic_dom += '		<div class=" flag-wrapper">';
				basic_dom += '			<div class="img-thumbnail flag flag-icon-background flag-icon-'+place.icon+' "></div>';
				basic_dom += '		</div>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-lg-5 visible-xs visible-lg">';
				basic_dom += '		<span class="country-word">'+place.title+'</span>';
				basic_dom += '	</div>';
				basic_dom += '</div>';
			});
		}

		basic_dom += '</div>';
    });

    $('#basic_info').append(basic_dom);
    var percent_number_step = $.animateNumber.numberStepFactories.append(' %');
	$('.js-score-animation').each(function(){
	    var score = $(this).attr("data-value");
	    $(this).animateNumber(
		  {
		    number: score,
		    easing: 'easeInQuad',
		    numberStep: percent_number_step
		  },
		  8000
		);
	});

	var experience_years_number_step = $.animateNumber.numberStepFactories.append(' YEARS');
	$('.js-experience-years-animation').each(function(){
	    var experience_years = $(this).attr("data-value");
	    $(this).animateNumber(
		  {
		    number: experience_years,
		    easing: 'easeInQuad',
		    numberStep: experience_years_number_step
		  },
		  3000
		);
	});

	$('.js-age-animation').each(function(){
	    var age = $(this).attr("data-value");
	    $(this).animateNumber(
		  {
		    number: age,
		    easing: 'easeInQuad',
		  },
		  5000
		);
	});
}

function sortSkill(skill_row_data){
	var arranged_skills = {};
	var master_skills = {};
	var expert_skills = {};
	var proficient_skills = {};
	var familiar_skills = {};
	var beginner_skills ={};
	$.each( skill_row_data , function( skill_type, skill_info ) {
		master_skills = {};
		expert_skills = {};
		proficient_skills = {};
		familiar_skills = {};
		beginner_skills = {};
		$.each( skill_info , function( skill, info ) {
			switch(info.level) {
			    case 'MASTER':
			        master_skills[skill] = info;
			        break;
			    case 'EXPERT':
			        expert_skills[skill] = info;
			        break;
			    case 'PROFICIENT':
			        proficient_skills[skill] = info;
			        break;
			    case 'FAMILIAR':
			        familiar_skills[skill] = info;
			        break;
			    default:
			        beginner_skills[skill] = info;
			}
		});
		arranged_skills[skill_type] = {};
		arranged_skills[skill_type][0] = master_skills;
		arranged_skills[skill_type][1] = expert_skills;
		arranged_skills[skill_type][2] = proficient_skills;
		arranged_skills[skill_type][3] = familiar_skills;
		arranged_skills[skill_type][4] = beginner_skills;
	});
	return arranged_skills;
}


function initSkill(skill_data){
	var skill_dom = '';

	$.each( skill_data , function( skill_type, skill_info_order ) {
		skill_dom += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">';
		skill_dom += '	<div class="white-font">';
		skill_dom += '		<h2 class="no-newline">'+skill_type+'</h2>';
		skill_dom += '	</div>';
		skill_dom += '</div>';
		skill_dom += '<div class="row hidden-xs">';
		$.each( skill_info_order , function( index, skill_info ) {
			$.each( skill_info , function( skill_name, skill ) {
				skill_dom += '<div class="col-sm-3 col-md-3 col-lg-3 text-center no-padding-right">';
				skill_dom += '	<div class="viewport window-style">';
				skill_dom += '		<a href="javascript:void(0);">';
				skill_dom += '			<span class="dark-background">'+skill.level+'</span>';
				skill_dom += '			<img class="img-circle sm-size" src="images/skills/'+skill.pic+'" />';
				skill_dom += '		</a>';
				skill_dom += '	</div>';
				skill_dom += '	<div class="white-font"><h4 class="dynamic-font">'+skill.title+'</h4></div>';
				skill_dom += '</div>';
			});
		});
		skill_dom += '</div>';
		skill_dom += '<div class="row visible-xs">';
		$.each( skill_info_order , function( index, skill_info ) {
			$.each( skill_info , function( skill_name, skill ) {
				skill_dom += '<div class="show-skill-mobile">';
				skill_dom += '	<div class="col-xs-12 text-center">';
				skill_dom += '		<div class="viewport mobile-style">';
				skill_dom += '			<a href="javascript:void(0);">';
				skill_dom += '				<span class="dark-background">'+skill.short_name+'</span>';
				skill_dom += '				<img class="img-circle xs-size" src="images/skills/'+skill.pic+'">';
				skill_dom += '			</a>';
				skill_dom += '		</div>';
				skill_dom += '	</div>';
				skill_dom += '</div>';
			});
		});
		skill_dom += '</div>';
		skill_dom += '<div class="hidden-xs">';
		skill_dom += '	<br>';
		skill_dom += '</div>';
	});

	$('#skill_info').append(skill_dom);

	//skill pic viewport
	 $('.viewport.window-style').mouseenter(function(e) {
	    $(this).children('a').children('img').animate({ height: '110', left: '0', top: '0', width: '110'}, 100);
	    $(this).children('a').children('span').fadeIn(100);
    }).mouseleave(function(e) {
        $(this).children('a').children('img').animate({ height: '100', left: '-20', top: '-20', width: '100'}, 100);
        $(this).children('a').children('span').fadeOut(100);
    });
}

function filterExperience(experience_row_data , newest_experience_first){
	var order_list = [];
	var new_experience = {};
	new_experience.start_time = experience_row_data.start_time;
	new_experience.data = {};
	var temp_experience_data = {};

	$.each( experience_row_data.data , function( date, info ) {
		if(info.display == true){
			new_experience.data[date] = info;
			order_list.push(date);
		}
	});

	if(newest_experience_first == true){
		order_list.reverse();
		$.each( order_list , function( index, date_value ) {
			temp_experience_data[date_value] = new_experience.data[date_value];
		});

		new_experience.data = temp_experience_data;
	}
	var start_time = Object.keys(new_experience.data)[0];
	new_experience.start_time = start_time;
	return new_experience;
}

function initExperience(experience_data){
	var experience_dom = '';
	$.each( experience_data.data , function( date, info ) {
		experience_dom += '<div class="item" data-id="'+date+'" data-description="'+info.introduction+'">';
		if(("need_zoom_in_pic" in info ) && info.need_zoom_in_pic == true && ("full_size_pic" in info )){
			experience_dom += '<a class="image_rollover_bottom con_borderImage" data-description="ZOOM IN" href="images/experience/full_size/'+info.full_size_pic+'" rel="lightbox[timeline]">';
			experience_dom += '	<img src="images/experience/'+info.pic+'" alt=""/>';
			experience_dom += '</a>';
		}else{
			experience_dom += '<img src="images/experience/'+info.pic+'" alt=""/>';
		}

		if(("description" in info )){
			if(("title" in info.description )){
				experience_dom += '<h2>'+info.description.title+'</h2>';
			}

			if(("sub_title" in info.description )){
				experience_dom += '<span>'+info.description.sub_title+'</span>';
			}
		}

		if(info.read_more == true){
			if(("description" in info )){
				experience_dom += '<div class="read_more no-push-top" data-id="'+date+'">Read more</div>';
			}else{
				experience_dom += '<div class="read_more" data-id="'+date+'">Read more</div>';
			}

		}

		experience_dom += '</div>';

		if(info.read_more == true){
			experience_dom += '<div class="item_open" data-id="'+date+'" data-access="ajax/ajax-content.php?item='+info.ajax_id+'">';
			experience_dom += '	<div class="item_open_content">';
			experience_dom += '		<img class="ajaxloader" src="images/timeline/loadingAnimation.gif" alt="" />';
			experience_dom += '	</div>';
			experience_dom += '</div>';
		}
	});

	$('#experience_info').append(experience_dom);

	// light
	$('.tl3').timeline({
		openTriggerClass : '.read_more',
		startItem : experience_data.start_time,
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
}


function initContact(contact_data){
	$('.js-linkdin-link').attr("href", contact_data.linkedin);
	$('.js-facebook-link').attr("href", contact_data.facebook);
}

function initFooter(footer){
	var footer_dom = 'Built with<i class="icon-heart-empty"></i> at ';
	if(footer.link != null){
		footer_dom += '<a href="'+footer.link+'">'+footer.builder+'</a>.';
	}else{
		footer_dom += '<a href="javascript:void(0);">'+footer.builder+'</a>.';
	}

	footer_dom += '<br>'+footer.email;
	footer_dom += '<br>'+footer.title;
	footer_dom += '©copy right-'+footer.start_time+'-'+(new Date).getFullYear();
	$('#footer_info').html(footer_dom);
	return;
}