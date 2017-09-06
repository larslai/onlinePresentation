<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
	public function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$ci =& get_instance();
	}

	private function genImgDOM($img_list){
		$dom = '';
		foreach($img_list as $key=>$img){
			switch ($img) {
				case 'fuelphp':
					$pic_name = 'fuelphp.png';
					$short_name = 'FUELPHP';
					break;				
				case 'phalcon':
					$pic_name = 'phalcon.png';
					$short_name = 'PHALCON';
					break;
				case 'yii':
					$pic_name = 'yii.png';
					$short_name = 'YII';
					break;
				case 'php':
					$pic_name = 'php.png';
					$short_name = 'PHP';
					break;
				case 'html':
					$pic_name = 'html.jpg';
					$short_name = 'HTML';
					break;
				case 'css':
					$pic_name = 'css.jpg';
					$short_name = 'CSS';
					break;
				case 'js':
					$pic_name = 'js.png';
					$short_name = 'JS';
					break;
				case 'jquery':
					$pic_name = 'jquery.png';
					$short_name = 'JQUERY';
					break;
				case 'lamp':
					$pic_name = 'lamp.jpg';
					$short_name = 'LAMP';
					break;
				case 'mysql':
					$pic_name = 'mysql.png';
					$short_name = 'MySQL';
					break;
				case 'git':
					$pic_name = 'git.png';
					$short_name = 'GIT';
					break;
				case 'ci':
					$pic_name = 'ci.jpg';
					$short_name = 'CI';
					break;
				case 'axure':
					$pic_name = 'axure.jpg';
					$short_name = 'AXURE';
					break;
				case 'illustrator':
					$pic_name = 'illustrator.png';
					$short_name = 'AI';
					break;
				case 'photoshop':
					$pic_name = 'photoshop.png';
					$short_name = 'PS';
					break;
				case 'bootstrap':
					$pic_name = 'bootstrap.png';
					$short_name = 'BOOT<br>STRAP';
					break;
				case 'rwd':
					$pic_name = 'rwd.png';
					$short_name = 'RWD';
					break;
				case 'es':
					$pic_name = 'elastic_search.png';
					$short_name = 'ELASTIC<br>SEARCH';
					break;
				case 'solr':
					$pic_name = 'solr.png';
					$short_name = 'SOLR';
					break;
				case 'FBSDK':
					$pic_name = 'FBSDK.png';
					$short_name = 'FBSDK';
					break;
				case 'restful':
					$pic_name = 'restful.jpg';
					$short_name = 'RESTFUL';
					break;
				case 'redmine':
					$pic_name = 'redmine.jpg';
					$short_name = 'REDMINE';
					break;
				case 'vagrant':
					$pic_name = 'vagrant.jpg';
					$short_name = 'VAGRANT';
					break;
				case 'cakephp':
					$pic_name = 'cakePHP.png';
					$short_name = 'CAKEPHP';
					break;
				case 'jenkins':
					$pic_name = 'jenkis.jpg';
					$short_name = 'JENKINS';
					break;
				case 'memcached':
					$pic_name = 'memcached.png';
					$short_name = 'MEMCACHED';
					break;
				case 'redis':
					$pic_name = 'jenkis.jpg';
					$short_name = 'REDIS';
					break;		
				default:				
					# code...
					break;
			}



			$dom .= "<div class=\"viewport detail-style\">
						<a href=\"javascript:void(0);\">
							<span class=\"dark-background db-s-size\">".$short_name."</span>
							<img class=\"img-circle xxs-size\" src=\"".base_url('assets/images/skills/'.$pic_name)."\"/>
						</a>
					</div>";
		}

		return $dom;
	}

	public function getInfo(){
		$id = isset($_GET['item']) ? trim($_GET['item']) : null;
		$show_responsibile = true;
		switch($id) {

			//1st from the left
			case '20120830' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Multinational EC system builde";
				$description = "To develop the functional multinational EC system for CPA advertising.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.</p>
								You can visit this platform by <a href=\"http://pub.offerme2.com/\" target=\"_blank\">here</a>";
				break;
			case '20120903' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Virtual currency builde";
				$description = "To develop virtual currency for CPA advertising platform.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.</p>
								You can visit this platform by <a href=\"http://pub.offerme2.com/store\" target=\"_blank\">here</a>";
				break;
			case '20120915' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Financial management system";
				$description = "To develop management system for CPA advertising platform to monitor all activies in advertising platform, analysis active users and financial management.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.";
				break;
			case '20130602' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','axure','illustrator','photoshop');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Image website builde";
				$description = "To develop image website to introduce company's products.</p>
								In this project, I was responsibile for front end and back end coding at first.<br>
								After we created the RD team, I was responsibile for PM and team leader.";
				break;
			case '20130810' :
				$img_list = array('ci','php','html','css','js','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Inventory Management system builde";
				$description = "To develop inventory management system in order to make receive and shipping effectively.</p>
								In this project, I was responsibile for PM, team leader and coding support.";
				break;
			case '20131120' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','bootstrap','rwd','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "SRM system support";
				$description = "To develop social relationship management system in order to analysis big data of social platform.</p>
								In this project, I was responsibile for front end and back end coding.";
				break;
			case '20140101' :
				$img_list = array('ci','php','restful','html','css','js','jquery','lamp','mysql','git','bootstrap','rwd','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "E-Commerce analysis system builde";
				$description = "To develop electronic commerce analysis system in order to analysis big data of online multinational electronic commerce.</p>
								In this project, I was responsibile for front end and back end coding.";
				break;
			case '20140115' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Data analysis system builde";
				$description = "To develop data analysis system in order to help customer compile and download the information of social platform.</p>
								In this project, I was responsibile for front end and back end coding.";
				break;
			case '20140615' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Taipeicity social data system builde";
				$description = "To develop social data system in order to remote the user behavior in the social platform.</p>
								In this project, I was responsibile for front end and back end coding.";
				break;
			case '20140726' :
				$img_list = array('ci','php','restful','lamp','mysql','git','es');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "SER Hackathon API platform";
				$description = "To develop SER system for business hackathon activity.</p>
								In this project, I was responsibile for back end API function coding.";
				break;
			case '20140830' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','rwd','bootstrap','es');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "SER API redesign";
				$description = "After finished hackathon activity, we reformed SER system to become the business API platform.</p>
								In this project, I was responsibile for front end support and back end API function coding.</p>
								You can visit this platform by <a href=\"http://api.ser.ideas.iii.org.tw/docs/\" target=\"_blank\">here</a>";
				break;
			case '20141213' :
				$img_list = array('ci','php','html','css','js','jquery','git','rwd','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Instore analysis system";
				$description = "To develop this platfrom in order to analysis remote data of camera.</p>
								In this project, I was responsibile for front end coding and api calling support.<br>";
				break;
			case '20150120' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','rwd','bootstrap','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "EC analysis system redesign";
				$description = "Rebulid EC system from DB to front end in order to increase this system's reusing, efficiency and usability.</p>
								In this project, I was responsibile for rewrited all function to make code clean and maintainability.";
				break;
			case '20150129' :
				$img_list = array('ci','php','html','css','js','jquery','rwd','bootstrap','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Personal websibe builde";
				$description = "Build this website to introduce myself to the world.</p>
								Actually, this is the third version.<br>
								I still try to make it better.<br>
								If you have any good ideas, welcome to tell me.";
				break;
			case '20150225' :
				$img_list = array('ci','php','html','css','js','jquery','rwd','bootstrap','FBSDK');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Rss assistance system";
				$description = "Build the system to support user to post the Rss article to the FB.</p>
								In this project, I was responsibile for FB tool apply and implant, front end programming and back end API calling support.";
				break;
			case '20150401' :
				$img_list = array('html','css','js','jquery','rwd','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Supplier system support";
				$description = "According to the request of supplier, simplify the original analysis system</p>
								To make supplier easy to use and comfortable to use the EC analysis system.</p>
								In this project, I was responsibile for front end programming and back end API calling support.";
				break;
			case '20150410' :
				$img_list = array('ci','php','html','css','js','jquery','rwd','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "FB App analysis system";
				$description = "Cooperate with Common Wealth magazine company.</p>
								Build the system to support them to analysis keyword and fanspage in every FB APPs effectively.</p>
								In this project, I was responsibile for front end programming and back end API calling support.";
				break;
			case '20150520' :
				$img_list = array('ci','php','restful');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "FB user behavior system";
				$description = "Cooperate with OpenLife company.</p>
								Build the system to support them to analysis FB user behavior.</p>
								In this project, I was responsibile for back end API calling support.";
				break;
			case '20151001' :
				$img_list = array('phalcon','php','html','css','js','jquery','rwd','bootstrap','lamp','mysql');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Hybrid FB post App";
				$description = "My first hybrid app</p>
								Help user to post topic and comment in FB by this app.</p>
								In this project, I was responsibile for front end programming and back end API calling support.";
				break;
			case '20160101' :
				$img_list = array('phalcon','php','html','css','js','jquery','rwd','bootstrap','redmine','vagrant','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "APP and product management system";
				$description = "Cooperate with MUJI company</p>
								Build the multinational version management system.</p>
								In this project, I was responsibile for front end and back end programming support.";
				break;
			case '20160601' :
				$img_list = array('cakephp','php','html','css','js','jquery','rwd','bootstrap','redmine','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Wedding ring website";
				$description = "Cooperate with Vendome company</p>
								Image website for introduce the products</p>
								In this project, I was responsibile for front end support.";
				break;
			case '20160801' :
				$img_list = array('phalcon','php','restful','redmine','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Passport App Restful API";
				$description = "Passport App Restful API</p>
								Bulid the Restful API for passport App.</p>
								In this project, I was responsibile for Restful API support.";
				break;
			case '20160901' :
				$img_list = array('phalcon','php','html','css','js','jquery','rwd','redmine','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Official website";
				$description = "Teamlab official website</p>
								Image website for introduce the teamlab</p>
								In this project, I was responsibile for front end and back end support.</p>
								You can visit this platform by <a href=\"https://www.team-lab.net/\" target=\"_blank\">here</a>";
				break;
			case '20170201' :
				$img_list = array('fuelphp','php','html','css','js','jenkins','lamp','mysql','git','memcached','redis');
				$img_dom_list = $this->genImgDOM($img_list);
				$title_name = "Official website";
				$description = "DMM E-Commerce</p>
								E-Commerce system for DMM</p>
								In this project, I was responsibile for back end support.</p>
								You can visit this platform by <a href=\"https://www.dmm.com/\" target=\"_blank\">here</a>";
				break;				
			default:
				$show_responsibile = false;
				$title_name = "Oops!";
				$description = "no content.";
				break;
		}

		if($show_responsibile == true){
			$output_html = "<div class=\"timeline_open_content\">
								<h2 class=\"no-marg-top\">".$title_name."</h2>
								<div class=\"info-detail\">".$description."
									<hr>
									<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
								</div>
							</div>";
		}else{
			$output_html = "<div class=\"timeline_open_content\">
								<h2 class=\"no-marg-top\">".$title_name."</h2>
								<div class=\"info-detail\">".$description."
								</div>
							</div>";
		}


		echo $output_html;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */