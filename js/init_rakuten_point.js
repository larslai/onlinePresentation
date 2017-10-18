$(document).ready(function () {
	loadJsonFile();
});

function loadJsonFile(){
	//load basic
	$.getJSON( "rakuten_point_json_file/basic.json", function( basic_data ) {
		initBasic(basic_data);
	});
		
	//load skill
	$.getJSON( "rakuten_point_json_file/skill.json", function( skill_row_data ) {
		skill_data = sortSkill(skill_row_data);
		initSkill(skill_data);
	});

	//load experience
	$.getJSON( "rakuten_point_json_file/experience_data.json", function( experience_row_data ) {
		var newest_experience_first = true;
		experience_data = filterExperience(experience_row_data , newest_experience_first);
		initExperience(experience_data);
	});
}

function initBasic(basic_data){
	var basic_dom = '';
	$.each( basic_data , function( basic_data_type, data ) {
		basic_dom += '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center">';
		basic_dom += '	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center featurette-item">';
		basic_dom += '		<i class="fa '+data.icon+'"></i>';
		basic_dom += '		<div class="black-font"><h4>'+data.title+'</h4></div>';
		basic_dom += '	</div>';

		//language info
		if( ("language_description" in data ) && !(jQuery.isEmptyObject(data.language_description))){
			$.each( data.language_description , function( country_id, language_info ) {
				basic_dom += '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-11 col-lg-offset-1">';
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 no-padding">';
				basic_dom += '		<span class="language-score js-score-animation" data-value="'+language_info.score+'">0%</span>';
				basic_dom += '	</div>';				
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6">';
				basic_dom += '		<div class=" flag-wrapper">';
				basic_dom += '			<div class="img-thumbnail flag flag-icon-background flag-icon-'+country_id+'"></div>';
				basic_dom += '		</div>';
				basic_dom += '	</div>';
				basic_dom += '</div>';
			});
		}else if( ("description" in data ) ){
			if(basic_data_type == 'country'){
				basic_dom += '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
				basic_dom += '	<div class="col-xs-6 col-sm-12 col-md-12  hidden-xs hidden-lg">';
				basic_dom += '		<span class="country-word">'+data.description.title+'</span>';
				basic_dom += '	</div>';
				basic_dom += '	<div class="col-xs-6 col-lg-5 visible-xs visible-lg">';
				basic_dom += '		<span class="country-word">'+data.description.title+'</span>';
				basic_dom += '	</div>';				
				basic_dom += '	<div class="col-xs-6 col-sm-6 col-sm-offset-3 col-md-12 col-lg-5 col-lg-offset-1">';
				basic_dom += '		<div class="flag-wrapper">';
				basic_dom += '			<div class="img-thumbnail flag flag-icon-background flag-icon-'+data.description.icon+'"></div>';
				basic_dom += '		</div>';
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


	var now_date = new Date();
	var now_month = now_date.getFullYear();
	var work_experience = now_month - 2012;
	var now_age = now_month - 1987;
	var experience_years_number_step = $.animateNumber.numberStepFactories.append(' YEARS');
	$('.js-experience-years-animation').each(function(){
	    $(this).animateNumber(
		  {
		    number: work_experience,
		    easing: 'easeInQuad',
		    numberStep: experience_years_number_step
		  },
		  3000
		);
	});


	$('.js-age-animation').each(function(){
	    $(this).animateNumber(
		  {
		    number: now_age,
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
		skill_dom += '<div class="col-sm-12 col-md-12 col-lg-12 no-padding">';
        skill_dom += '  <div class="arrow-box-right">'
        skill_dom += '		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">';
		skill_dom += '			<div class="black-font">';
		skill_dom += '				<h3 class="no-newline">'+skill_type+'</h3>';
		skill_dom += '			</div>';
		skill_dom += '		</div>';
		skill_dom += '	</div>';
		skill_dom += '</div>';
		skill_dom += '<div class="col-sm-12 col-md-12 col-lg-12 no-padding margin-bottom-10">';
		skill_dom += '		<div class="row hidden-xs">';
		$.each( skill_info_order , function( index, skill_info ) {
			$.each( skill_info , function( skill_name, skill ) {
				skill_dom += '		<div class="col-sm-3 col-md-3 col-lg-2 text-center">';
				skill_dom += '			<div class="viewport window-style">';
				skill_dom += '				<a href="javascript:void(0);">';
				skill_dom += '					<span class="dark-background">'+skill.level+'</span>';
				skill_dom += '					<img class="img-circle sm-size" src="images/skills/'+skill.pic+'" />';
				skill_dom += '				</a>';
				skill_dom += '			</div>';
				skill_dom += '			<div class="black-font"><h4 class="dynamic-font">'+skill.title+'</h4></div>';
				skill_dom += '		</div>';
			});
		});
		skill_dom += '		</div>';
		skill_dom += '		<div class="row visible-xs">';
		$.each( skill_info_order , function( index, skill_info ) {
			$.each( skill_info , function( skill_name, skill ) {
				skill_dom += '		<div class="show-skill-mobile">';
				skill_dom += '			<div class="col-xs-12 text-center">';
				skill_dom += '				<div class="viewport mobile-style">';
				skill_dom += '					<a href="javascript:void(0);">';
				skill_dom += '						<span class="dark-background">'+skill.short_name+'</span>';
				skill_dom += '						<img class="img-circle xs-size" src="images/skills/'+skill.pic+'">';
				skill_dom += '					</a>';
				skill_dom += '				</div>';
				skill_dom += '			</div>';
				skill_dom += '		</div>';
			});
		});
		skill_dom += '	</div>';
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
	var date_info;
	var month_value;
	var date_value;
	var months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

	$.each( experience_data.data , function( date, info ) {
		experience_dom += '<div class="item" data-id="'+date+'" data-description="'+info.introduction+'">';
		if(("need_zoom_in_pic" in info ) && info.need_zoom_in_pic == true && ("full_size_pic" in info )){
			experience_dom += '<a class="image_rollover_bottom con_borderImage" data-description="ZOOM IN" href="images/experience/full_size/'+info.full_size_pic+'" rel="lightbox[timeline]">';
			experience_dom += '	<img src="images/experience/'+info.pic+'" alt=""/>';
			experience_dom += '</a>';
		}else{
			experience_dom += '<img src="images/experience/'+info.pic+'" alt=""/>';
		}

		date_info = date.split("/");
		month_value = parseInt(date_info[1]);
		date_value = parseInt(date_info[0]);
		month_name = months[month_value - 1];
		experience_dom += '<div class="post_date">'+date_value+'<span>'+month_name+'</span></div>';
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
			experience_dom += '<div class="item_open" data-id="'+date+'" data-access="ajax/'+info.ajax_id+'.html">';
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
