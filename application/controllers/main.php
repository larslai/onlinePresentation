<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $greeting,$list,$nowOn,$keyword,$author,$description; //清單列表,目前屬於哪個位置,關鍵字
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		//session_start();
		$this->list = array(
			'skills'=>array('front_end','back_end'),
			'experience'=>array('meeya','leeGuitars','III','case','teamlab','japan','taiwan'),
			);
		$ci =& get_instance();
		$this->nowOn = $ci->router->method;
		$this->keyword = 'remotely,hire,job,work,engineer,designer, UX, project planner';
		$this->author = 'Lars';
		$this->description = 'This is my online presentation that to introduce myself to you. I come from Taiwan and I am looking for the foreign job. If you intresting, please feel free to contact me.';
	}

	public function fileDownload(){

		$lang = isset($_GET['lang_type']) ? trim($_GET['lang_type']) : 'english' ;

		switch ($lang) {
			case 'english':
				$file = 'assets/files/CV/portfolio_en.pdf';
				$name = 'portfolio.pdf';
				break;
			case 'chinese':
				$file = 'assets/files/CV/portfolio_ch.pdf';
				$name = '作品集.pdf';
				break;
			default:
				$file = 'assets/files/CV/portfolio_en.pdf';
				$name = 'portfolio.pdf';
				break;
		}

		if (file_exists($file)) {
		    $data = file_get_contents($file); // Read the file's contents


			force_download($name, $data);

		}

	}

	public function index(){

		$menu = $this->getMenuInfo();
		$top = $this->getTopInfo();
		$introduction = $this->getIntroductionInfo();
		$skills = $this->getSkillsInfo();

		$newest_experience_first = true;
		$experience_img_default_size = 'md';
		$experience = $this->getExperienceInfo( $experience_img_default_size );
		$arranged_experience = array(
			'start_time' => $experience['start_time'],
			'data' => array(),
			);
		foreach($experience['data'] AS $date => $info){
			if($info['display'] == false){
				continue;
			}
			$arranged_experience['data'][$date] = $info;
		}
		$experience = $arranged_experience;

		$file_download = $this->getFilesInfo();
		$contact = $this->getContactInfo();
		$foot_info = $this->getFootInfo();

		//技能排序
		$arranged_skills = array();
		foreach($skills AS $type=>$skills_info){
			$master_skills = $expert_skills = $proficient_skills = $familiar_skills = $beginner_skills = array();
			foreach($skills_info AS $skill=>$info){

				switch (strtoupper($info['level'])) {
					case 'MASTER':
						$master_skills[$skill] = $info;
						break;
					case 'EXPERT':
						$expert_skills[$skill] = $info;
						break;
					case 'PROFICIENT':
						$proficient_skills[$skill] = $info;
						break;
					case 'FAMILIAR':
						$familiar_skills[$skill] = $info;
						break;
					default:
						$beginner_skills[$skill] = $info;
						break;
				}
			}

			$arranged_skills[$type] = array_merge( $master_skills, $expert_skills, $proficient_skills,$familiar_skills , $beginner_skills );
		}

		//工作經驗顯示順序反轉,第一個顯示為最新工作
		if( $newest_experience_first == true ){
			$reverse_experience = array_reverse($experience['data']);
			$experience['data'] = $reverse_experience;
		}
		$experience['start_time'] = key($experience['data']);

		$data = array(
			'menu'=>$menu,
			'top'=>$top,
			'introduction'=>$introduction,
			'skills'=>$arranged_skills,
			'experience'=>$experience,
			'file_download'=>$file_download,
			'contact'=>$contact,
			'foot_info'=>$foot_info,
			);

		$data['foot_info'] = $foot_info;
		$this->load->view('index',$data);
	}

	private function getMenuInfo(){
		$menu = array(
			'sec2' => array(
				'display' => true,
				'title' => 'INTRODUCTION',
				),
			'sec3' => array(
				'display' => true,
				'title' => 'SKILLS',
				),
			'sec4' => array(
				'display' => true,
				'title' => 'EXPERIENCE',
				),
			'sec5' => array(
				'display' => false,
				'title' => 'PORTFOLIO',
				),
			'sec6' => array(
				'display' => true,
				'title' => 'CONTRACT',
				),
			);
		return $menu;
	}

	private function getTopInfo(){
		$top = array(
			'pic'=>'my_picture/me.jpg',
			'name'=>'lars',
			'description'=>'The UX,<br> Project planner,<br> Front-End & Back-End Engineer',
		);
		return $top;
	}

	private function getIntroductionInfo(){
		$introduction = array(
			'experience'=>array(
				'title'=>'WORK EXPERIENCE',
				'icon'=>'fa-users',
				'description'=>(date('Y')-2012),
				),
			'age'=>array(
				'title'=>'age',
				'icon'=>'fa-male',
				'description'=>date('Y') - 1987,
				),
			'country'=>array(
				'title'=>'COUNTRY',
				'icon'=>'fa-flag',
				'description'=>array(
					'title'=>'Taiwan',
					'icon'=>'tw',
					),
				),
			'work_place'=>array(
				'title'=>'WORKING PLACE',
				'icon'=>'fa-map-o',
				'places'=>array(
					'0'=>array(
						'title'=>'TAIWAN',
						'icon'=>'tw',
						),
					'1'=>array(
						'title'=>'JAPAN',
						'icon'=>'jp',
						),
					),
				),
			'language'=>array(
				'title'=>'LANGUAGE',
				'icon'=>'fa-language',
				'language_description'=>array(
					'tw'=>array(
						'score'=>100,
						'lv'=>'nature',
						),
					'cn'=>array(
						'score'=>90,
						'lv'=>'upper-intermediate',
						),
					'gb'=>array(
						'score'=>80,
						'lv'=>'intermediate',
						),
					'jp'=>array(
						'score'=>60,
						'lv'=>'N3',
						),
					),
				),
			);

		return $introduction;
	}

	private function getSkillsInfo(){
		$skills = array(
			'front-end'=>array(
				'RWD_design'=>array(
					'pic'=>'rwd.png',
					'title'=>'responsive web design',
					'short_name'=>'RWD',
					'level'=>'EXPERT',
					),
				'HTML'=>array(
					'pic'=>'html.jpg',
					'title'=>'HTML',
					'short_name'=>'HTML',
					'level'=>'MASTER',
					),
				'Javascript'=>array(
					'pic'=>'js.png',
					'title'=>'Javascript',
					'short_name'=>'JS',
					'level'=>'EXPERT',
					),
				'Jquery'=>array(
					'pic'=>'jquery.png',
					'title'=>'Jquery',
					'short_name'=>'Jquery',
					'level'=>'MASTER',
					),
				'CSS'=>array(
					'pic'=>'css3.jpg',
					'title'=>'CSS',
					'short_name'=>'CSS',
					'level'=>'MASTER',
					),
				'Bootstrap'=>array(
					'pic'=>'bootstrap.png',
					'title'=>'Bootstrap',
					'short_name'=>'Bootstrap',
					'level'=>'Master',
					),
				'SASS'=>array(
					'pic'=>'sass.jpg',
					'title'=>'SASS',
					'short_name'=>'SASS',
					'level'=>'PROFICIENT',
					),
				),
			'back-end'=>array(
				'LAMP'=>array(
					'pic'=>'lamp.jpg',
					'title'=>'LAMP',
					'short_name'=>'LAMP',
					'level'=>'EXPERT',
					),
				'PHP'=>array(
					'pic'=>'php.png',
					'title'=>'PHP',
					'short_name'=>'PHP',
					'level'=>'Master',
					),
				'CI'=>array(
					'pic'=>'ci.jpg',
					'title'=>'codeigniter',
					'short_name'=>'CI',
					'level'=>'Master',
					),
				'YII'=>array(
					'pic'=>'yii.png',
					'title'=>'YII',
					'short_name'=>'YII',
					'level'=>'EXPERT',
					),
				'PHALCON'=>array(
					'pic'=>'phalcon.png',
					'title'=>'PHALCON',
					'short_name'=>'PHALCON',
					'level'=>'EXPERT',
					),
				'MySQL'=>array(
					'pic'=>'mysql.png',
					'title'=>'MYSQL',
					'short_name'=>'MySQL',
					'level'=>'Master',
					),
				'ES'=>array(
					'pic'=>'elastic_search.png',
					'title'=>'elasticSearch',
					'short_name'=>'ES',
					'level'=>'FAMILIAR',
					),
				'SOLR'=>array(
					'pic'=>'solr.png',
					'title'=>'SOLR',
					'short_name'=>'SOLR',
					'level'=>'FAMILIAR',
					),
				'AS'=>array(
					'pic'=>'actionscript.png',
					'title'=>'Actionscript',
					'short_name'=>'AS',
					'level'=>'FAMILIAR',
					),
				'RESTful'=>array(
					'pic'=>'restful.jpg',
					'title'=>'RESTful',
					'short_name'=>'RESTful',
					'level'=>'EXPERT',
					),
				'Cakephp'=>array(
					'pic'=>'cakePHP.png',
					'title'=>'Cakephp',
					'short_name'=>'Cakephp',
					'level'=>'FAMILIAR',
					),
				'FuelPHP'=>array(
					'pic'=>'fuelphp.png',
					'title'=>'FuelPHP',
					'short_name'=>'FuelPHP',
					'level'=>'EXPERT',
					),
				'Memcached'=>array(
					'pic'=>'memcached.png',
					'title'=>'Memcached',
					'short_name'=>'Memcached',
					'level'=>'FAMILIAR',
					),				
				'Redis'=>array(
					'pic'=>'redis.png',
					'title'=>'Redis',
					'short_name'=>'Redis',
					'level'=>'FAMILIAR',
					),
				'JAVA'=>array(
					'pic'=>'java.png',
					'title'=>'Java',
					'short_name'=>'java',
					'level'=>'FAMILIAR',
					),
				'Spring'=>array(
					'pic'=>'spring.png',
					'title'=>'Spring',
					'short_name'=>'Spring',
					'level'=>'FAMILIAR',
					),
				'Python'=>array(
					'pic'=>'python.png',
					'title'=>'Python',
					'short_name'=>'Python',
					'level'=>'FAMILIAR',
					),
				),
			'tools'=>array(				
				'Git'=>array(
					'pic'=>'git.png',
					'title'=>'Git',
					'short_name'=>'Git',
					'level'=>'EXPERT',
					),
				'AXURE'=>array(
					'pic'=>'axure.jpg',
					'title'=>'AXURE',
					'short_name'=>'AXURE',
					'level'=>'EXPERT',
					),
				'FBSDK'=>array(
					'pic'=>'FBSDK.png',
					'title'=>'FB dvelopers',
					'short_name'=>'FB SDK',
					'level'=>'PROFICIENT',
					),
				'Flash'=>array(
					'pic'=>'flash.png',
					'title'=>'Flash',
					'short_name'=>'Flash',
					'level'=>'PROFICIENT',
					),
				'Illustrator'=>array(
					'pic'=>'illustrator.png',
					'title'=>'Illustrator',
					'short_name'=>'AI',
					'level'=>'PROFICIENT',
					),
				'Photoshop'=>array(
					'pic'=>'photoshop.png',
					'title'=>'Photoshop',
					'short_name'=>'PS',
					'level'=>'PROFICIENT',
					),
				'Redmine'=>array(
					'pic'=>'redmine.jpg',
					'title'=>'Redmine',
					'short_name'=>'Redmine',
					'level'=>'FAMILIAR',
					),
				'Vagrant'=>array(
					'pic'=>'vagrant.jpg',
					'title'=>'Vagrant',
					'short_name'=>'Vagrant',
					'level'=>'PROFICIENT',
					),
				'Jenkins'=>array(
					'pic'=>'jenkis.jpg',
					'title'=>'Jenkins',
					'short_name'=>'Jenkins',
					'level'=>'FAMILIAR',
					),				
				),
			);
		return $skills;
	}

	private function getExperienceInfo( $experience_img_default_size ){
		$experience = array(
			'start_time'=>'',
			'data'=>array(
				'30/08/2012'=>array(
					'display'=>true,
					'ajax_id'=>'20120830',
					'introduction'=>'Multinational EC system builde',
					'pic'=>$experience_img_default_size.'/multinational_EC_system.jpg',
					'full_size_pic'=>'multinational_EC_system.jpg',
					'description'=>array(
						'title'=>'Multinational EC system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'03/09/2012'=>array(
					'display'=>true,
					'ajax_id'=>'20120903',
					'introduction'=>'Virtual currency builde',
					'pic'=>$experience_img_default_size.'/virtual_currency.jpg',
					'full_size_pic'=>'virtual_currency.jpg',
					'description'=>array(
						'title'=>'Virtual currency builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'15/09/2012'=>array(
					'display'=>true,
					'ajax_id'=>'20120915',
					'introduction'=>'Financial management system support',
					'pic'=>$experience_img_default_size.'/financial_management.jpg',
					'full_size_pic'=>'financial_management.png',
					'description'=>array(
						'title'=>'Financial management system support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'17/12/2012'=>array(
					'display'=>true,
					'ajax_id'=>'20121217',
					'introduction'=>'OTP system design',
					'pic'=>'md/otp.jpg',
					'description'=>array(
						'title'=>'OTP system design',
						'sub_title'=>"Use PHP to design one time password system to increase security of management system.<br>
										Responsible for php coding in this project.",
						),
					'read_more'=>false,
					'need_zoom_in_pic'=>false,
					),
				'02/06/2013'=>array(
					'display'=>true,
					'ajax_id'=>'20130602',
					'introduction'=>'Image website builde',
					'pic'=>$experience_img_default_size.'/lee.jpg',
					'full_size_pic'=>'lee.jpg',
					'description'=>array(
						'title'=>'Image website builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'10/08/2013'=>array(
					'display'=>false,
					'ajax_id'=>'20130810',
					'introduction'=>'Inventory Management system builde',
					'pic'=>$experience_img_default_size.'/inventory_management.jpg',
					'full_size_pic'=>'inventory_management.jpg',
					'description'=>array(
						'title'=>'Inventory Management system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'20/11/2013'=>array(
					'display'=>true,
					'ajax_id'=>'20131120',
					'introduction'=>'Social relationship management system support',
					'pic'=>$experience_img_default_size.'/srm.jpg',
					'full_size_pic'=>'srm.png',
					'read_more'=>true,
					'description'=>array(
						'title'=>'SRM system support',
						),
					'need_zoom_in_pic'=>true,
					),
				'01/01/2014'=>array(
					'display'=>true,
					'ajax_id'=>'20140101',
					'introduction'=>'EC analysis system builde',
					'pic'=>$experience_img_default_size.'/ec_analysis.jpg',
					'full_size_pic'=>'ec_analysis.jpg',
					'description'=>array(
						'title'=>'EC analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'15/01/2014'=>array(
					'display'=>false,
					'ajax_id'=>'20140115',
					'introduction'=>'Data analysis system builde',
					'pic'=>$experience_img_default_size.'/indexasia.jpg',
					'full_size_pic'=>'indexasia.png',
					'description'=>array(
						'title'=>'Data analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'22/03/2014'=>array(
					'display'=>true,
					'ajax_id'=>'20140322',
					'introduction'=>'Pixnet hackathon participating',
					'pic'=>'md/pixnet.jpg',
					'description'=>array(
						'title'=>'Pixnet hackathon participating',
						'sub_title'=>"Design multi keyword search engine by open data that Pixnet providing.<br>
										Responsible for php coding and front end support in this project.",
						),
					'read_more'=>false,
					'need_zoom_in_pic'=>false,
					),
				'15/06/2014'=>array(
					'display'=>true,
					'ajax_id'=>'20140615',
					'introduction'=>'Taipeicity social data system builde',
					'pic'=>$experience_img_default_size.'/taipeicity_social.jpg',
					'full_size_pic'=>'taipeicity_social.png',
					'description'=>array(
						'title'=>'Taipeicity social data system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'26/07/2014'=>array(
					'display'=>true,
					'ajax_id'=>'20140726',
					'introduction'=>'SER Hackathon API platform builde',
					'pic'=>$experience_img_default_size.'/ser_api.jpg',
					'full_size_pic'=>'ser_api.png',
					'description'=>array(
						'title'=>'SER Hackathon API platform builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'30/08/2014'=>array(
					'display'=>false,
					'ajax_id'=>'20140830',
					'introduction'=>'SER API platform redesign',
					'pic'=>$experience_img_default_size.'/ser_api_redesign.jpg',
					'full_size_pic'=>'ser_api_redesign.png',
					'description'=>array(
						'title'=>'SER API platform redesign',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'13/12/2014'=>array(
					'display'=>false,
					'ajax_id'=>'20141213',
					'introduction'=>'Instore analysis system builde',
					'pic'=>$experience_img_default_size.'/hot_spot.jpg',
					'full_size_pic'=>'hot_spot.jpg',
					'description'=>array(
						'title'=>'Instore analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'20/01/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20150120',
					'introduction'=>'EC analysis system redesign',
					'pic'=>$experience_img_default_size.'/ec_analysis_redesign.jpg',
					'full_size_pic'=>'ec_analysis_redesign.jpg',
					'description'=>array(
						'title'=>'EC analysis system redesign',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'29/01/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20150129',
					'introduction'=>'Personal websibe builde',
					'pic'=>$experience_img_default_size.'/my_website.jpg',
					'full_size_pic'=>'my_website.png',
					'description'=>array(
						'title'=>'Personal websibe builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'25/02/2015'=>array(
					'display'=>false,
					'ajax_id'=>'20150225',
					'introduction'=>'Rss assistance system',
					'pic'=>$experience_img_default_size.'/rss_post_assistance.jpg',
					'full_size_pic'=>'rss_post_assistance.png',
					'description'=>array(
						'title'=>'Rss assistance system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/04/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20150401',
					'introduction'=>'Supplier analysis system support',
					'pic'=>$experience_img_default_size.'/supplier_analysis_system.jpg',
					'full_size_pic'=>'supplier_analysis_system.jpg',
					'description'=>array(
						'title'=>'Supplier analysis system support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'10/04/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20150410',
					'introduction'=>'FB App analysis system',
					'pic'=>$experience_img_default_size.'/FB_app_analysis_system.jpg',
					'full_size_pic'=>'FB_app_analysis_system.jpg',
					'description'=>array(
						'title'=>'FB App analysis system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'20/05/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20150520',
					'introduction'=>'FB user behavior system',
					'pic'=>$experience_img_default_size.'/FB_user_behavior_system.jpg',
					'full_size_pic'=>'FB_user_behavior_system.jpg',
					'description'=>array(
						'title'=>'FB user behavior system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/10/2015'=>array(
					'display'=>true,
					'ajax_id'=>'20151001',
					'introduction'=>'Hybrid FB post App',
					'pic'=>$experience_img_default_size.'/matome.jpg',
					'full_size_pic'=>'matome.png',
					'description'=>array(
						'title'=>'Hybrid FB post App',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/01/2016'=>array(
					'display'=>true,
					'ajax_id'=>'20160101',
					'introduction'=>'App and product management system',
					'pic'=>$experience_img_default_size.'/muji.jpg',
					'full_size_pic'=>'muji.png',
					'description'=>array(
						'title'=>'App and product management system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/06/2016'=>array(
					'display'=>true,
					'ajax_id'=>'20160601',
					'introduction'=>'Wedding ring website',
					'pic'=>$experience_img_default_size.'/vendome.jpg',
					'full_size_pic'=>'vendome.png',
					'description'=>array(
						'title'=>'Wedding ring website',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/08/2016'=>array(
					'display'=>true,
					'ajax_id'=>'20160801',
					'introduction'=>'Passport App Restful API',
					'pic'=>$experience_img_default_size.'/passport.jpg',
					'full_size_pic'=>'passport.png',
					'description'=>array(
						'title'=>'Wedding ring website',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/09/2016'=>array(
					'display'=>true,
					'ajax_id'=>'20160901',
					'introduction'=>'Teamlab official website',
					'pic'=>$experience_img_default_size.'/dotnet.jpg',
					'full_size_pic'=>'dotnet.png',
					'description'=>array(
						'title'=>'Teamlab official website',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'01/02/2017'=>array(
					'display'=>true,
					'ajax_id'=>'20170201',
					'introduction'=>'Dmm E-commerce',
					'pic'=>$experience_img_default_size.'/dmm_website.jpg',
					'full_size_pic'=>'dmm_website.png',
					'description'=>array(
						'title'=>'Dmm E-commerce',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),				
				),
			);

		return $experience;
	}

	private function getFilesInfo(){
		$file_download = array(
			'english'=>array(
				'title'=>'english',
				'description'=>'This portfolio introduce the projects that I\'ve participated in last '.(date('Y')-2012).' years. If you are interesting, please feel free to contact me via those way below.',
				'button_title'=>'download',
				),
			'chinese'=>array(
				'title'=>'中文版',
				'description'=>'此為簡單的自我作品集介紹,蒐集了過去'.(date('Y')-2012).'年中我所參與過的專案,若想了解更多,歡迎利用下方連絡資訊與我連繫',
				'button_title'=>'下載',
				),
			);
		return $file_download;
	}

	private function getContactInfo(){
		$contact = array(
			'facebook'=>'https://www.facebook.com/lars247247',
			'linkedin'=>'http://tw.linkedin.com/in/larsali',
			'email'=>'lars247247@gmail.com',
			'title'=>'lars247247@gmail.com',
			'sub_title'=>'feel free to contact me via those way',
			);
		return $contact;
	}

	private function getFootInfo(){
		$foot_info = array(
			'builder'=>'Larslai',
			'email'=>'lars247247@gmail.com',
			//'link'=>'http://www.bootply.com',
			'link'=>'javascript:void(0);',
			'title'=>"Peace & Love",
			'start_time' => '2014',
			'end_time' => date('Y'),
		);

		return $foot_info;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */