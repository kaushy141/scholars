<div class="rd-navbar-wrap">
  <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
	<div class="rd-navbar-main-outer">
	  <div class="rd-navbar-main">
		<!--RD Navbar Panel-->
		<div class="rd-navbar-panel">
		  <!--RD Navbar Toggle-->
		  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
		  <!--RD Navbar Brand-->
		  <div class="rd-navbar-brand">
			<!--Brand--><a class="brand" href="index.php"><img class="brand-logo-dark" src="<?php echo base_url()?>/public/frontend/images/logo-default-428x112.png" alt="" width="214" height="56"/><img class="brand-logo-light" src="<?php echo base_url()?>/public/frontend/images/logo-inverse-430x112.png" alt="" width="215" height="56"/></a>
		  </div>
		</div>
		<div class="rd-navbar-main-element">
		  <div class="rd-navbar-nav-wrap">
			<ul class="rd-navbar-nav">
			  <li class="rd-nav-item <?php activateMenu('index');?>"><a class="rd-nav-link" href="<?php echo base_url()?>">Home</a>
			  </li>
			  <li class="rd-nav-item <?php activateMenu('gift-vouchers');?>"><a class="rd-nav-link" href="<?php echo base_url('gifts')?>">Gift Vouchers</a>
			  </li>
			  <li class="rd-nav-item" <?php activateMenu('about');?>><a class="rd-nav-link" href="<?php echo base_url('about')?>">About</a>
			  </li>
			  <li class="rd-nav-item" <?php activateMenu('message');?>><a class="rd-nav-link" href="<?php echo base_url('messages')?>">Message</a>
				<ul class="rd-menu rd-navbar-dropdown">
				  <li class="rd-dropdown-item <?php activateMenu('index');?>"><a class="rd-dropdown-link" href="single-massage.php">Single Massage</a>
				  </li>
				</ul>
			  </li>
			  <li class="rd-nav-item <?php activateMenu('contacts');?>"><a class="rd-nav-link" href="<?php echo base_url('contacts')?>">Contacts</a>
			  </li>
			  <li class="rd-nav-item"><a class="rd-nav-link" href="#">Pages</a>
				<ul class="rd-menu rd-navbar-dropdown">
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Typography</a>
				  </li>
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Buttons</a>
				  </li>
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Forms</a>
				  </li>
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Tabs and accordions</a>
				  </li>
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Privacy policy</a>
				  </li>
				  <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Under Construction</a>
				  </li>
				</ul>
			  </li>
			</ul>
		  </div>
		</div>
		<div class="rd-nav-item">
		  <div class="btn-wrap"><a class="button button-secondary button-sm" href="#">Get A Massage</a></div>
		</div>
	  </div>
	</div>
  </nav>
</div>