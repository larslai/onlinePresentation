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
			'experience'=>array('meeya','leeGuitars','III','case'),
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
				//var_dump($now_year);exit;
		$data = array();
		
		$top = array(
			'pic'=>'my_picture/me.jpg',
			'name'=>'lars',
			'description'=>'The UX,<br> Project planner,<br> Front-End & Back-End Engineer',
			);
		$introduction = array(
			'experience'=>array(
				'title'=>'WORK EXPERIENCE',
				'icon'=>'fa-users',
				'description'=>(date('Y')-2012).' YEARS',
				),
			'age'=>array(
				'title'=>'age',
				'icon'=>'fa-male',
				'description'=>date('Y') - 1987,
				),
			'country'=>array(
				'title'=>'country',
				'icon'=>'fa-flag',
				'description'=>'Taiwan',
				),
			'language'=>array(
				'title'=>'LANGUAGE',
				'icon'=>'fa-language',
				'description'=>array(
					'chinese'=>100,
					'english'=>100,
					'japanese'=>30,
					),
				),
			);
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
					'level'=>'PROFICIENT',
					),
				'SOLR'=>array(
					'pic'=>'solr.png',
					'title'=>'SOLR',
					'short_name'=>'SOLR',
					'level'=>'PROFICIENT',
					),
				'AS'=>array(
					'pic'=>'actionscript.png',
					'title'=>'Actionscript',
					'short_name'=>'AS',
					'level'=>'PROFICIENT',
					),
				'RESTful'=>array(
					'pic'=>'restful.jpg',
					'title'=>'RESTful',
					'short_name'=>'RESTful',
					'level'=>'EXPERT',
					),
				),
			'tools'=>array(
				'Bootstrap'=>array(
					'pic'=>'bootstrap.png',
					'title'=>'Bootstrap',
					'short_name'=>'Bootstrap',
					'level'=>'Master',
					),
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
				'SASS'=>array(
					'pic'=>'sass.jpg',
					'title'=>'SASS',
					'short_name'=>'SASS',
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
				),
			);
		$experience = array(
			'start_time'=>'30/08/2012',
			'data'=>array(
				'30/08/2012'=>array(
					'ajax_id'=>'20120830',
					'introduction'=>'Multinational EC system builde',
					'pic'=>'lg/multinational_EC_system.jpg',
					'full_size_pic'=>'multinational_EC_system.jpg',
					'description'=>array(
						'title'=>'Multinational EC system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'03/09/2012'=>array(
					'ajax_id'=>'20120903',
					'introduction'=>'Virtual currency builde',
					'pic'=>'lg/virtual_currency.jpg',
					'full_size_pic'=>'virtual_currency.jpg',
					'description'=>array(
						'title'=>'Virtual currency builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'15/09/2012'=>array(
					'ajax_id'=>'20120915',
					'introduction'=>'Financial management system support',
					'pic'=>'lg/financial_management.jpg',
					'full_size_pic'=>'financial_management.png',
					'description'=>array(
						'title'=>'Financial management system support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'17/12/2012'=>array(
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
					'ajax_id'=>'20130602',
					'introduction'=>'Image website builde',
					'pic'=>'lg/lee.jpg',
					'full_size_pic'=>'lee.jpg',
					'description'=>array(
						'title'=>'Image website builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'10/08/2013'=>array(
					'ajax_id'=>'20130810',
					'introduction'=>'Inventory Management system builde',
					'pic'=>'lg/inventory_management.jpg',
					'full_size_pic'=>'inventory_management.jpg',
					'description'=>array(
						'title'=>'Inventory Management system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'20/11/2013'=>array(
					'ajax_id'=>'20131120',
					'introduction'=>'Social relationship management system support',
					'pic'=>'lg/srm.jpg',
					'full_size_pic'=>'srm.png',
					'read_more'=>true,
					'description'=>array(
						'title'=>'SRM system support',
						),
					'need_zoom_in_pic'=>true,
					),
				'01/01/2014'=>array(
					'ajax_id'=>'20140101',
					'introduction'=>'EC analysis system builde',
					'pic'=>'lg/ec_analysis.jpg',
					'full_size_pic'=>'ec_analysis.jpg',
					'description'=>array(
						'title'=>'EC analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'15/01/2014'=>array(
					'ajax_id'=>'20140115',
					'introduction'=>'Data analysis system builde',
					'pic'=>'lg/indexasia.jpg',
					'full_size_pic'=>'indexasia.png',
					'description'=>array(
						'title'=>'Data analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'22/03/2014'=>array(
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
					'ajax_id'=>'20140615',
					'introduction'=>'Taipeicity social data system builde',
					'pic'=>'lg/taipeicity_social.jpg',
					'full_size_pic'=>'taipeicity_social.png',
					'description'=>array(
						'title'=>'Taipeicity social data system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'26/07/2014'=>array(
					'ajax_id'=>'20140726',
					'introduction'=>'SER Hackathon API platform builde',
					'pic'=>'lg/ser_api.jpg',
					'full_size_pic'=>'ser_api.png',
					'description'=>array(
						'title'=>'SER Hackathon API platform builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'03/08/2014'=>array(
					'ajax_id'=>'20140803',
					'introduction'=>'Sport betting website redesign support',
					'pic'=>'lg/sport_betting.jpg',
					'full_size_pic'=>'sport_betting.jpg',
					'description'=>array(
						'title'=>'Sport betting website redesign support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'30/08/2014'=>array(
					'ajax_id'=>'20140830',
					'introduction'=>'SER API platform redesign',
					'pic'=>'lg/ser_api_redesign.jpg',
					'full_size_pic'=>'ser_api_redesign.png',
					'description'=>array(
						'title'=>'SER API platform redesign',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'04/09/2014'=>array(
					'ajax_id'=>'20140904',
					'introduction'=>'Credit card website redesign support',
					'pic'=>'lg/creditcard.jpg',
					'full_size_pic'=>'creditcard.jpg',
					'description'=>array(
						'title'=>'Credit card website redesign support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'13/12/2014'=>array(
					'ajax_id'=>'20141213',
					'introduction'=>'Camera hot spot analysis system builde',
					'pic'=>'lg/hot_spot.jpg',
					'full_size_pic'=>'hot_spot.jpg',
					'description'=>array(
						'title'=>'Camera hot spot analysis system builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'20/01/2015'=>array(
					'ajax_id'=>'20150120',
					'introduction'=>'EC analysis system redesign',
					'pic'=>'lg/ec_analysis_redesign.jpg',
					'full_size_pic'=>'ec_analysis_redesign.jpg',
					'description'=>array(
						'title'=>'EC analysis system redesign',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),
				'29/01/2015'=>array(
					'ajax_id'=>'20150129',
					'introduction'=>'Personal websibe builde',
					'pic'=>'lg/my_website.jpg',
					'full_size_pic'=>'my_website.png',
					'description'=>array(
						'title'=>'Personal websibe builde',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),	
				'25/02/2015'=>array(
					'ajax_id'=>'20150225',
					'introduction'=>'Rss assistance system',
					'pic'=>'lg/rss_post_assistance.jpg',
					'full_size_pic'=>'rss_post_assistance.png',
					'description'=>array(
						'title'=>'Rss assistance system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),	
				'01/04/2015'=>array(
					'ajax_id'=>'20150401',
					'introduction'=>'Supplier analysis system support',
					'pic'=>'lg/supplier_analysis_system.jpg',
					'full_size_pic'=>'supplier_analysis_system.jpg',
					'description'=>array(
						'title'=>'Supplier analysis system support',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),	
				'10/04/2015'=>array(
					'ajax_id'=>'20150410',
					'introduction'=>'FB App analysis system',
					'pic'=>'lg/FB_app_analysis_system.jpg',
					'full_size_pic'=>'FB_app_analysis_system.jpg',
					'description'=>array(
						'title'=>'FB App analysis system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),		
				'05/20/2015'=>array(
					'ajax_id'=>'20150520',
					'introduction'=>'FB user behavior system',
					'pic'=>'lg/FB_user_behavior_system.jpg',
					'full_size_pic'=>'FB_user_behavior_system.jpg',
					'description'=>array(
						'title'=>'FB user behavior system',
						),
					'read_more'=>true,
					'need_zoom_in_pic'=>true,
					),									
				),
			);
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
		$contact = array(
			'facebook'=>'https://www.facebook.com/lars247247',
			'linkedin'=>'http://tw.linkedin.com/in/larsali',
			'email'=>'lars247247@gmail.com',
			'title'=>'lars247247@gmail.com',
			'sub_title'=>'feel free to contact me via those way',
			);
		$foot_info = array(
			'builder'=>'Larslai',
			'email'=>'lars247247@gmail.com',
			//'link'=>'http://www.bootply.com',
			'link'=>'javascript:void(0);',
			'title'=>"Peace & Love",
			'start_time' => '2014',
			'end_time' => date('Y'),
			);
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

		$data = array(
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

	public function portfolio()
	{
		//var_dump($this->config->config['base_url']);exit;
		$this->load->view('portfolio');
	}

	public function aboutMe()
	{	
		//var_dump($now_year);exit;
		$data = array(
			'photo'=>'me.jpg',
			'name'=>array(
				'ch'=>'賴彥伸',
				'en'=>'Lars lai',
				),
			'language'=>array('english','chinese'),
			'age'=>date('Y') - 1987,
			'position'=>'web engineer',
			'education'=>array(
				'degree'=>'Master',
				'major'=>'Information management',
				'school'=>'',
				),
			'skills'=>array(
				'front_end'=>array(
					'RWD design'=> 7,
					'HTML'=>8,
					'Bootstrap'=>7,
					'Javascript'=>6,
					'Jquery'=>6,
					'CSS'=>7,
					'SASS'=>5,
					'Flash'=>4,
					'Illustrator'=>5,
					'Photoshop'=>6,
					),
				'back_end'=>array(
					'PHP'=>8,
					'CI'=>8,
					'YII'=>7,
					'MySQL'=>7,
					'Actionscript 2.0'=>5,
					),
				),
			'seniority'=>0,
			'experience'=>array(
				'meeya'=>array(
					'months'=>12,
					'projects'=>array(
						'Multinational EC system',
						'Financial management system',
						'OTP system',
						),
					),
				'leeGuitars'=>array(
					'months'=>6,
					'projects'=>array(
						'Lee guitars product website',
						'Inventory Management system',
						),
					),
				'III'=>array(
					'months'=>15,
					'projects'=>array(
						'Multinational EC analysis system',
						'Big data analysis platform',
						'Ser api platfrom',
						'Indexasia company data analysis system',
						'Taipeicity social data system',
						),
					),
				'others'=>array(
					'months'=>4,
					'projects'=>array(
						'Rakuten sport betting website redesign support',
						'Rakuten credit card website redesign support',
						'Camera hot spot analysis system',
						),
					),
				),
			);

		//計算總年資
		foreach($data['experience'] AS $company=>$info){
			$data['seniority'] += $info['months'];
		}
		$data['seniority'] = ceil($data['seniority'] / 12);

		//整理skill資料成陣列格式
		foreach($data['skills'] AS $type=>$skill_data){
			$skill_temp = array();
			$rate_temp = array();
			foreach($skill_data AS $skill=>$rate){
				array_push($skill_temp, $skill);
				array_push($rate_temp, $rate);
			}
		
			$data['arranged_skill_data'][$type] = json_encode(array(
				'skills'=>$skill_temp,
				'rates'=>$rate_temp,
			));
			unset($skill_temp);
			unset($rate_temp);
			
		}

		$this->load->view('aboutMe',$data);
	}	

	public function skill()
	{
				$data = array(
			'photo'=>'me.jpg',
			'name'=>array(
				'ch'=>'賴彥伸',
				'en'=>'Lars lai',
				),
			'language'=>array('english','chinese'),
			'age'=>date('Y') - 1987,
			'position'=>'web engineer',
			'education'=>array(
				'degree'=>'Master',
				'major'=>'Information management',
				'school'=>'National Sun Yat-sen University',
				),
			'portfolio'=>array(
				'1'=>array(
					'title'=>'Multinational EC system',
					'img'=>'',
					'support'=>array(
						'PHP','YII','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'2'=>array(
					'title'=>'Financial system',
					'img'=>'',
					'support'=>array(
						'PHP','YII','HTML','Jqvascript','Jquery','OTP system','MySQL'
						),
					),
				'3'=>array(
					'title'=>'Product website',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'4'=>array(
					'title'=>'Inventory Management system',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'5'=>array(
					'title'=>'EC analysis system',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'6'=>array(
					'title'=>'Big data analysis platform',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'7'=>array(
					'title'=>'Ser api platfrom',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'8'=>array(
					'title'=>'Data analysis system',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'9'=>array(
					'title'=>'Taipeicity social data system',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				'10'=>array(
					'title'=>'sport betting website redesign',
					'img'=>'',
					'support'=>array(
						'HTML','Jqvascript','Jquery'
						),
					),
				'11'=>array(
					'title'=>'credit card website redesign',
					'img'=>'',
					'support'=>array(
						'HTML','Jqvascript','Jquery'
						),
					),
				'12'=>array(
					'title'=>'Hot spot analysis system',
					'img'=>'',
					'support'=>array(
						'PHP','CI','HTML','Jqvascript','Jquery','MySQL'
						),
					),
				),
			'skills'=>array(
				'front_end'=>array(
					'RWD design'=> 7,
					'HTML'=>8,
					'Javascript'=>6,
					'Jquery'=>7,
					'CSS'=>7,
					),
				'back_end'=>array(
					'PHP'=>8,
					'CI'=>8,
					'YII'=>7,
					'MySQL'=>7,
					'Actionscript 2.0'=>5,
					),
				'tools'=>array(
					'Bootstrap'=>7,
					'Git'=>7,
					'SASS'=>5,
					'Flash'=>4,
					'Illustrator'=>5,
					'Photoshop'=>6,
					),
				),
			'seniority'=>0,
			'experience'=>array(
				'meeya'=>array(
					'months'=>12,
					'projects'=>array(
						'Multinational EC system',
						'Financial management system',
						'OTP system',
						),
					),
				'leeGuitars'=>array(
					'months'=>6,
					'projects'=>array(
						'Lee guitars product website',
						'Inventory Management system',
						),
					),
				'III'=>array(
					'months'=>15,
					'projects'=>array(
						'Multinational EC analysis system',
						'Big data analysis platform',
						'Ser api platfrom',
						'Indexasia company data analysis system',
						'Taipeicity social data system',
						),
					),
				'others'=>array(
					'months'=>4,
					'projects'=>array(
						'Rakuten sport betting website redesign support',
						'Rakuten credit card website redesign support',
						'Camera hot spot analysis system',
						),
					),
				),
			);

		//計算總年資
		foreach($data['experience'] AS $company=>$info){
			$data['seniority'] += $info['months'];
		}
		$data['seniority'] = ceil($data['seniority'] / 12);

		//整理skill資料成陣列格式
		foreach($data['skills'] AS $type=>$skill_data){
			arsort($skill_data);
			$skill_temp = array();
			$rate_temp = array();
			foreach($skill_data AS $skill=>$rate){
				array_push($skill_temp, $skill);
				array_push($rate_temp, $rate);
			}
		
			$data['arranged_skill_data'][$type] = json_encode(array(
				'skills'=>$skill_temp,
				'rates'=>$rate_temp,
			));
			unset($skill_temp);
			unset($rate_temp);
			
		}

		//var_dump('skill');exit;
		//var_dump($this->config->config['base_url']);exit;
		$this->load->view('main');
	}

	public function experience()
	{
		//var_dump('experience');exit;
		//var_dump($this->config->config['base_url']);exit;
		$this->load->view('main');
	}

	public function contactMe()
	{
		//var_dump('contactMe');exit;
		//var_dump($this->config->config['base_url']);exit;
		$this->load->view('main');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */