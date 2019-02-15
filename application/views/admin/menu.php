<?php
   if (isset($this->session->userdata['logged_in'])) {
       $username = ($this->session->userdata['logged_in']['username']);
   } else {
   	// TODO: remove auth validation and add to controllers
       header("location: " . base_url() . "login"); 
   }
   ?>
<div class="preloader">
   <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
   </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
<!-- header header  -->
<div class="header">
   <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <!-- Logo -->
      <div class="navbar-header">
         <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="homepage"  width="60" height="50" class="dark-logo" /></b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <!-- <span><img src="<?php echo base_url(); ?>assets/admin/images/logo-text.png" alt="homepage" class="dark-logo" /></span> -->
         </a>
      </div>
      <!-- End Logo -->
      <div class="navbar-collapse">
         <!-- toggle and nav items -->
         <ul class="navbar-nav mr-auto mt-md-0">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <!-- Messages -->
            <li class="nav-item dropdown mega-dropdown">
               <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
               <div class="dropdown-menu animated zoomIn">
                  <ul class="mega-dropdown-menu row">
                     <li class="col-lg-3  m-b-30">
                        <h4 class="m-b-20">CONTACT US</h4>
                        <!-- Contact -->
                        <form>
                           <div class="form-group">
                              <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> 
                           </div>
                           <div class="form-group">
                              <input type="email" class="form-control" placeholder="Enter email"> 
                           </div>
                           <div class="form-group">
                              <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                           </div>
                           <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                     </li>
                     <li class="col-lg-3 col-xlg-3 m-b-30">
                        <h4 class="m-b-20">List style</h4>
                        <!-- List style -->
                        <ul class="list-style-none">
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                        </ul>
                     </li>
                     <li class="col-lg-3 col-xlg-3 m-b-30">
                        <h4 class="m-b-20">List style</h4>
                        <!-- List style -->
                        <ul class="list-style-none">
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                        </ul>
                     </li>
                     <li class="col-lg-3 col-xlg-3 m-b-30">
                        <h4 class="m-b-20">List style</h4>
                        <!-- List style -->
                        <ul class="list-style-none">
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                           <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </li>
            <!-- End Messages -->
         </ul>
         <!-- User profile and search -->
         <ul class="navbar-nav my-lg-0">
            <!-- Search -->
            <li class="nav-item hidden-sm-down search-box">
               <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
               <form class="app-search">
                  <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> 
               </form>
            </li>
            <!-- Comment -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell"></i>
                  <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
               </a>
               <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                  <ul>
                     <li>
                        <div class="drop-title">Notifications</div>
                     </li>
                     <li>
                        <div class="message-center">
                           <!-- Message -->
                           <a href="#">
                              <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                              <div class="mail-contnet">
                                 <h5>This is title</h5>
                                 <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                              <div class="mail-contnet">
                                 <h5>This is another title</h5>
                                 <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                              <div class="mail-contnet">
                                 <h5>This is title</h5>
                                 <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                              <div class="mail-contnet">
                                 <h5>This is another title</h5>
                                 <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                              </div>
                           </a>
                        </div>
                     </li>
                     <li>
                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                     </li>
                  </ul>
               </div>
            </li>
            <!-- End Comment -->
            <!-- Messages -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope"></i>
                  <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
               </a>
               <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                  <ul>
                     <li>
                        <div class="drop-title">You have 4 new messages</div>
                     </li>
                     <li>
                        <div class="message-center">
                           <!-- Message -->
                           <a href="#">
                              <div class="user-img"> <img src="<?php echo base_url(); ?>assets/admin/images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                              <div class="mail-contnet">
                                 <h5>Michael Qin</h5>
                                 <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="user-img"> <img src="<?php echo base_url(); ?>assets/admin/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                              <div class="mail-contnet">
                                 <h5>John Doe</h5>
                                 <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="user-img"> <img src="<?php echo base_url(); ?>assets/admin/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                              <div class="mail-contnet">
                                 <h5>Mr. John</h5>
                                 <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                              </div>
                           </a>
                           <!-- Message -->
                           <a href="#">
                              <div class="user-img"> <img src="<?php echo base_url(); ?>assets/admin/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                              <div class="mail-contnet">
                                 <h5>Michael Qin</h5>
                                 <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                              </div>
                           </a>
                        </div>
                     </li>
                     <li>
                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                     </li>
                  </ul>
               </div>
            </li>
            <!-- End Messages -->
            <!-- Profile -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/admin/images/users/5.jpg" alt="user" class="profile-pic" /></a>
               <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                  <ul class="dropdown-user">
                     <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                     <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                     <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                     <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                     <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
   </nav>
</div>
<!-- End header header -->
<!-- Left Sidebar  -->
<div class="left-sidebar">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
         <ul id="sidebarnav">
            <li class="nav-label">Seções</li>
            <li>
               <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Noticias</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url(); ?>admin/news">Lista</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/news/create">Criar</a></li>
               </ul>
            </li>
				<li>
               <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Texto Principal</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url(); ?>admin/maintext">Lista</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/maintext/create">Criar</a></li>
               </ul>
            </li>
				<li>
               <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Typer</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url(); ?>admin/typer">Lista</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/typer/create">Criar</a></li>
               </ul>
            </li>
				<li>
               <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Promoções</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url(); ?>admin/sales">Lista</a></li>
                  <li><a href="<?php echo base_url(); ?>admin/sales/create">Criar</a></li>
               </ul>
            </li>
            <li>
               <!-- <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Cotações <span class="label label-rouded label-success pull-right">6</span></span></a> -->
               <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">Cotações</a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="<?php echo base_url(); ?>admin/quotes">Cotacoes</a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Dashboard</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Dashboard</li>
      </ol>
   </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
