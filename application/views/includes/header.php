<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8">
	<title>untitled</title>

	<link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap.css" 
	type="text/css" media="screen" charset="utf-8">
	
	<link rel="stylesheet" href="<?php echo asset_url();?>css/style.css"
	type="text/css" media="screen" charset="utf-8">

	<script type="text/javascript" src="<?php echo asset_url();?>js/bootstrap.min.js"></script>
	
	<!-- <script type='text/javascript' src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
	<script type='text/javascript' src="<?php echo asset_url();?>js/jquery-1.11.0.min.js"></script>
	<script type='text/javascript' src="<?php echo asset_url();?>js/app.js"></script>
</head>

<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">May's Schedule</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo anchor('schedule/display_weekly_calendar/', 'Weekly Calendar View'); ?></li>
        <li><?php echo anchor('schedule/display_monthly_calendar/', 'Monthly Calendar View'); ?></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://www.weibo.com/4everpan">About Author</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">User's Profile <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Sex</a></li>
            <li><a href="#">Age</a></li>
            <li><a href="#">Average score</a></li>
            <li class="divider"></li>
            <li><a href="#">About the user</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>