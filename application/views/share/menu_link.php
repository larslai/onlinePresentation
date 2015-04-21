      <link href="<?=base_url('assets/css/rewrite.css');?>" rel="stylesheet">
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?=base_url('main/portfolio')?>" class="logo"><b>I Am Lars</b></a>
            <!--logo end-->
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="<?=base_url('assets/img/ui-sam.jpg');?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Take A Look</h5>
                  <li class="mt">
                      <a <?php if($this->nowOn=='aboutMe'){ echo 'class="active"'; }?> href="<?=base_url('main/aboutMe')?>">
                          <i class="fa fa-child"></i>
                          <span>About Me</span>
                      </a>
                  </li>
              	  <li class="sub-menu">
                      <a <?php if($this->nowOn=='portfolio'){ echo 'class="active"'; }?> href="<?=base_url('main/portfolio')?>">
                          <i class="fa fa-trophy"></i>
                          <span>My Portfolio</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($this->nowOn=='skill'){ echo 'class="active"'; }?> href="javascript:;" >
                          <i class="fa fa-pie-chart"></i>
                          <span>Skills</span>
                      </a>
                      <ul class="sub">
                      	<?php
                      		foreach($this->list['skills'] AS $key=>$skill){
                      	?>
                      		 <li><a <?php if(isset($_GET['name']) && $_GET['name'] == $skill){ echo 'class="active"';}?> href="<?php echo base_url('main/skill?name='.$skill);?>"><?php echo str_replace('_','-',ucfirst($skill));?></a></li>
                      	<?php
                      		}
                      	?>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($this->nowOn=='experience'){ echo 'class="active"'; }?> href="javascript:;" >
                          <i class="fa fa-file-text"></i>
                          <span>Work Experience</span>
                      </a>
                      <ul class="sub">
                      	<?php
                      		foreach($this->list['experience'] AS $key=>$company_name){
                      	?>
                      		 <li><a <?php if(isset($_GET['name']) && $_GET['name'] == $company_name){ echo 'class="active"';}?> href="<?php echo base_url('main/experience?name='.$company_name);?>"><?php echo ucfirst($company_name);?></a></li>
                      	<?php
                      		}
                      	?>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($this->nowOn=='contactMe'){ echo 'class="active"'; }?> href="<?=base_url('main/contactMe');?>">
                          <i class="fa fa-envelope"></i>
                          <span>Contact Me</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>