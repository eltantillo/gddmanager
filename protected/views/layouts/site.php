<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="robots" content="index,follow" />

	<meta property="og:type"        content="article" /> 
	<meta property="og:url"         content="<?php echo URL; ?>" />
	<meta property="og:title"       content="<?php echo Language::$gddeasy; ?>" />
	<meta property="og:description" content="<?php echo Language::$mainSlogan; ?>" />
	<meta property="og:image"       content="<?php echo URL; ?>/img/logo_hd.png" />
	<meta property="og:alt"         content="<?php echo Language::$gddeasy; ?>" />
	<meta property="fb:app_id"      content="1714904542085546" />

	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/bootstrap.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/fork-awesome.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/ionicons.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/skin-green.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/main.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link href="https://fonts.googleapis.com/css?family=Raleway|PT+Sans:400,900&display=swap" rel="stylesheet">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159550126-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-159550126-1');
  </script>
  
  <!-- Global site tag (gtag.js) - Google Ads: 999887361 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-999887361"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'AW-999887361');
  </script>
</head>

<body class="hold-transition  skin-green login-page">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo URL; ?>/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GDD</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GDD</b>Manager</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo URL; ?>/documents">
              <i class="fa fa-gamepad"></i> <?php echo Language::$games; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo URL; ?>/site/devlogs">
              <i class="fa fa-newspaper-o"></i> <?php echo Language::$devlogs; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo URL; ?>/site/register">
              <i class="fa fa-users"></i> <?php echo Language::$register; ?>
            </a>
          </li>
          <li>
            <a href="<?php echo URL; ?>/site/login">
              <i class="fa fa-gamepad"></i> <?php echo Language::$login; ?>
            </a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<div class="full-page">
  <?php echo $content; ?>
</div>

<footer class="footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <?php $year = date('Y'); if ($year != '2018') { echo '– ' .  date('Y'); } ?> <a href="<?php echo URL; ?>">GDDManager.com</a>.</strong> All rights reserved.
</footer>
</body>

<script type="text/javascript" src="<?php echo URL; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/adminlte.min.js"></script>
<script>
  /*$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });*/
</script>
</html>