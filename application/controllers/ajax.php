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
		switch($id) {
	
			//1st from the left
			case '20120830' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Multinational EC system builde</h2>
							<div class=\"info-detail\">
								To develop the functional multinational EC system for CPA advertising.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.</p>
								You can visit this platform by <a href=\"http://pub.offerme2.com/\" target=\"_blank\">here</a>

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."	

								
							</div>
						</div>";
				break;
			case '20120903' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Virtual currency builde</h2>
							<div class=\"info-detail\">
								To develop virtual currency for CPA advertising platform.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.</p>
								You can visit this platform by <a href=\"http://pub.offerme2.com/store\" target=\"_blank\">here</a>

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."

							</div>	
						</div>";
				break;
			case '20120915' :
				$img_list = array('yii','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Financial management system</h2>
							<div class=\"info-detail\">
								To develop management system for CPA advertising platform to monitor all activies in advertising platform, analysis active users and financial management.</p>
								In this project, I worked in RD and I was responsibile for front end and back end coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."	
								
							</div>	
						</div>";
				break;	
			case '20130602' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','axure','illustrator','photoshop');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Image website builde</h2>
							<div class=\"info-detail\">
								To develop image website to introduce company's products.</p>
								In this project, I was responsibile for front end and back end coding at first.<br>
								After we created the RD team, I was responsibile for PM and team leader.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."	
								
							</div>
						</div>";
				break;		
			case '20130810' :
				$img_list = array('ci','php','html','css','js','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Inventory Management system builde</h2>
							<div class=\"info-detail\">
								To develop inventory management system in order to make receive and shipping effectively.</p>
								In this project, I was responsibile for PM, team leader and coding support.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."	
								
							</div>
						</div>";
				break;
			case '20131120' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','bootstrap','rwd','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">SRM system support</h2>
							<div class=\"info-detail\">
								To develop social relationship management system in order to analysis big data of social platform.</p>
								In this project, I was responsibile for front end and back end coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;	
			case '20140101' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','bootstrap','rwd','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">E-Commerce analysis system builde</h2>
							<div class=\"info-detail\">
								To develop electronic commerce analysis system in order to analysis big data of online multinational electronic commerce.</p>
								In this project, I was responsibile for front end and back end coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
								
							</div>
						</div>";
				break;	
			case '20140115' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Data analysis system builde</h2>
							<div class=\"info-detail\">
								To develop data analysis system in order to help customer compile and download the information of social platform.</p>
								In this project, I was responsibile for front end and back end coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;		
			case '20140615' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Taipeicity social data system builde</h2>
							<div class=\"info-detail\">
								To develop social data system in order to remote the user behavior in the social platform.</p>
								In this project, I was responsibile for front end and back end coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;	
			case '20140726' :
				$img_list = array('ci','php','lamp','mysql','git','es');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">SER Hackathon API platform</h2>
							<div class=\"info-detail\">
								To develop SER system for business hackathon activity.</p>
								In this project, I was responsibile for back end API function coding.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;	
			case '20140803' :
				$img_list = array('html','css','js','jquery','git');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Sport betting website redesign</h2>
							<div class=\"info-detail\">
								Support Japan business to redesign front end of functional webpage.</p>
								In this project, I was responsibile for front end supprot.</p>
								You can visit this platform by <a href=\"https://toto.rakuten.co.jp/toto/\" target=\"_blank\">here</a>

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;		
			case '20140830' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','rwd','bootstrap','es');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">SER API platform redesign</h2>
							<div class=\"info-detail\">
								After finished hackathon activity, we reformed SER system to become the business API platform.</p>
								In this project, I was responsibile for front end support and back end API function coding.</p>
								You can visit this platform by <a href=\"http://api.ser.ideas.iii.org.tw/docs/\" target=\"_blank\">here</a>
								
								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;						
			case '20140904' :
				$img_list = array('html','css','js','jquery','git','rwd');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Credit card website redesign</h2>
							<div class=\"info-detail\">
								Support Japan business to redesign front end of image webpage.</p>
								In this project, I was responsibile for front end supprot.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;						
			case '20141213' :
				$img_list = array('ci','php','html','css','js','jquery','git','rwd','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Camera hot spot analysis system</h2>
							<div class=\"info-detail\">
								To develop this platfrom in order to analysis remote data of camera.</p>
								In this project, I was responsibile for front end coding and api calling support.<br>

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;						
			case '20150120' :
				$img_list = array('ci','php','html','css','js','jquery','lamp','mysql','git','rwd','bootstrap','solr');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">EC analysis system redesign</h2>
							<div class=\"info-detail\">
								Rebulid EC system from DB to front end in order to increase this system's reusing, efficiency and usability.</p>
								In this project, I was responsibile for rewrited all function to make code clean and maintainability.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;	
			case '20150129' :
				$img_list = array('ci','php','html','css','js','jquery','rwd','bootstrap');
				$img_dom_list = $this->genImgDOM($img_list);
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Personal websibe builde</h2>
							<div class=\"info-detail\">
								Build this website to introduce myself to the world.</p>
								Actually, this is the third version.<br>
								I still try to make it better.<br>
								If you have any good ideas, welcome to tell me.

								<hr>
								<h4 class=\"no-marg-top\">Those are what I was responsibile for</h4>".$img_dom_list."
							</div>
						</div>";
				break;
			default:
				echo "
						<div class=\"timeline_open_content\">
							<h2 class=\"no-marg-top\">Oops!</h2>
							<div class=\"info-detail\">
								no content.
							</div>
						</div>";
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */