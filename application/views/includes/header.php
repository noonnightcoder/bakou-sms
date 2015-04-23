<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/pages/faq.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
    <a class="brand" href="<?php echo base_url(); ?>index.php/admin/dashboard">Bootstrap Admin Template </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $this->session->userdata('user_name'); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php if($this->uri->segment(2) == 'dashboard') { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
        <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li <?php if(($this->uri->segment(2) == 'students') or ($this->uri->segment(2) == 'parents')) { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/students"><i class="icon-user"></i><span>Student</span> </a> </li>
        <li <?php if(($this->uri->segment(2) == 'academics') or ($this->uri->segment(2) == 'academic_programs')) { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/academics"><i class="icon-sitemap"></i><span>Academic</span> </a> </li>
        <li <?php if(($this->uri->segment(2) == 'transports') or ($this->uri->segment(2) == 'vehicles')) { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/transports"><i class="icon-road"></i><span>Transport</span> </a> </li>
        <li <?php if(($this->uri->segment(2) == 'library') or ($this->uri->segment(2) == 'books')) { ?> class="active" <?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/library"><i class="icon-book"></i><span>Library</span> </a> </li>
        <li <?php if(($this->uri->segment(2) == 'school') or ($this->uri->segment(2) == 'buildings') or ($this->uri->segment(2) == 'staffs') or ($this->uri->segment(2) == 'faculties') or ($this->uri->segment(2) == 'services') or ($this->uri->segment(2) == 'classrooms') or ($this->uri->segment(2) == 'classroom_types') or ($this->uri->segment(2) == 'positions') or ($this->uri->segment(2) == 'departments') or ($this->uri->segment(2) == 'classes') or ($this->uri->segment(2) == 'subjects')) { ?> class="dropdown active" <?php }else{ ?> class="dropdown" <?php } ?>><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i><span>Setting</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>index.php/admin/school/update/1">School Info</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/buildings">Campus / Building Info</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/staffs">Employee Info</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/faculties">Faculty Info</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/services">Additional Service</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/noticeboards">Noticeboard</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
