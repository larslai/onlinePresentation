      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right"></div>
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
                  <li class="sub-menu" data-menuanchor="aboutMe">
                      <a <?php if($this->nowOn=='aboutMe'){ echo 'class="active"'; }?> href="#aboutMe">
                          <i class="fa fa-child"></i>
                          <span>About Me</span>
                      </a>
                  </li>
              	  <li class="sub-menu" data-menuanchor="portfolio">
                      <a <?php if($this->nowOn=='portfolio'){ echo 'class="active"'; }?> href="#portfolio">
                          <i class="fa fa-trophy"></i>
                          <span>My Portfolio</span>
                      </a>
                  </li>
                  <li class="sub-menu" data-menuanchor="skills">
                      <a <?php if($this->nowOn=='skill'){ echo 'class="active"'; }?> href="#skills">
                          <i class="fa fa-pie-chart"></i>
                          <span>Skills</span>
                      </a>
                  </li>
                  <li class="sub-menu" data-menuanchor="experience">
                      <a <?php if($this->nowOn=='experience'){ echo 'class="active"'; }?> href="#experience">
                          <i class="fa fa-file-text"></i>
                          <span>Work Experience</span>
                      </a>
                  </li>
                  <li class="sub-menu"  data-menuanchor="contactMe">
                      <a <?php if($this->nowOn=='contactMe'){ echo 'class="active"'; }?> href="#contactMe">
                          <i class="fa fa-envelope"></i>
                          <span>Contact Me</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>