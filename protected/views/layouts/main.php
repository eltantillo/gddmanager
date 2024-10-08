<?php /* @var $this Controller */
$company = Company::model()->findByPK(Yii::app()->user->company);
$avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . Yii::app()->user->id . '.png' : URL . '/img/avatar.png';
$users = User::model()->findAllbyAttributes(array('company_id'=>Yii::app()->user->company));

$newMessages = Message::model()->findAllByAttributes(array(
	'user_to_id' => Yii::app()->user->getId(),
	'read' => false,
));
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/bootstrap.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/fork-awesome.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/ionicons.min.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/skin-green.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/introjs.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/main.css">

  <link rel="stylesheet" href="<?php echo URL; ?>/css/wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>/css/bootstrap-datepicker.min.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700|Raleway:400&display=swap">

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
  <!-- Event snippet for Website traffic conversion page -->
  <script>
    gtag('event', 'conversion', {'send_to': 'AW-999887361/xc0qCMW349EBEIGk5NwD'});
  </script>

</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="loader"></div>
<div class="wrapper" id="contents">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo URL; ?>/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DD</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GDD</b>Manager</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle visible-xs" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li <?php if(Yii::app()->controller->id == 'user') echo 'class="active"';  ?>>
            <a href="<?php echo URL; ?>/user">
              <i class="fa fa-users"></i> <span class="hidden-xs"><?php echo Language::$team; ?></span>
            </a>
          </li>
          <li <?php if(Yii::app()->controller->id == 'project') echo 'class="active"';  ?>>
            <a href="<?php echo URL; ?>/project/<?php if (isset(Yii::app()->user->project)) { echo Yii::app()->user->project; } ?>">
              <i class="fa fa-gamepad"></i> <span class="hidden-xs"><?php echo Language::$games; ?></span>
            </a>
          </li>
          <li <?php if(Yii::app()->controller->id == 'development') echo 'class="active"';  ?>>
            <a href="<?php echo URL; ?>/development/<?php if (isset(Yii::app()->user->project)) { echo Yii::app()->user->project; } ?>">
              <i class="fa fa-calendar-check-o"></i> <span class="hidden-xs"><?php echo Language::$development; ?></span>
            </a>
          </li>
          <li <?php if(Yii::app()->controller->id == 'documents') echo 'class="active"';  ?>>
            <a href="<?php echo URL; ?>/documents/<?php if (isset(Yii::app()->user->project)) { echo Yii::app()->user->project; } ?>">
              <i class="fa fa-file"></i> <span class="hidden-xs"><?php echo Language::$documents; ?></span>
            </a>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $avatar; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Yii::app()->user->displayName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo Yii::app()->user->displayName; ?> - <?php //echo Yii::app()->user->roles; ?>
                  <small><?php echo Language::$memberSince . ' ' . date('M Y', Yii::app()->user->date); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo URL . '/user/' . Yii::app()->user->id ; ?>" class="btn btn-success btn-flat"><?php echo Language::$profile; ?></a>
                  <?php if(in_array('admin', Yii::app()->user->roles)){ ?>
                    <a href="<?php echo URL . '/company/'; ?>" class="btn btn-primary btn-flat"><?php echo Language::$company; ?></a>
                  <?php } ?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo URL; ?>/site/logout" class="btn btn-default btn-flat"><?php echo Language::$logout; ?></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><?php if (count($newMessages)){ ?><span class="label label-danger"><?php echo count($newMessages); ?></span><?php } ?><i class="fa fa-comments-o"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Yii::app()->user->displayName; ?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> <?php echo Language::$online; ?></a>-->
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="<?php echo Language::$search; ?>...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?php echo mb_strtoupper(Language::$mainNavigation); ?></li>
        <?php echo $this->clips['globalSidebar']; ?>
        <?php echo $this->clips['specificSidebar']; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <?php
      if (!Yii::app()->user->isGuest and Yii::app()->controller->id != 'company' and Yii::app()->controller->id != 'user'){
        $expiry = date('Y-m-d H:i:s', strtotime("+15 days", strtotime($company->membership)));
        $now = date("Y-m-d H:i:s");
        $freeUsers = 2;
        // 15 Days Buffer alert
        if(in_array('admin', Yii::app()->user->roles) and $now > $company->membership and $now < $expiry and $company->month_users > $freeUsers){
          echo $content;
          echo '<a href="' . URL . '/company/payment/"><div class="payment alert alert-danger"><i class="fa fa-warning"></i> ' . Language::$paymentRequired . '</div></a>';
        }
        // Block System
        else if($now > $expiry and $company->month_users > $freeUsers){
          $this->renderPartial('/site/payment');
        }
        // Enabled System
        else{
          echo $content;
        }
      }
      else{
        echo $content;
      }
    ?>
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <?php $year = date('Y'); if ($year != '2018') { echo '– ' .  date('Y'); } ?> <a href="<?php echo URL; ?>">GDDManager.com</a>.</strong> All rights reserved.
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#chat-sidebar-home-tab" data-toggle="tab"><i class="fa fa-comments-o"></i></a></li>
      <!--li><a href="#chat-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li-->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="chat-sidebar-home-tab">
        <?php foreach ($users as $user) {
          if ($user->id != Yii::app()->user->getId()){
            if ($user->name != ''){
                $displayName = $user->name;
            }
            else{
                $displayName = $user->email;
            }
            $userAvatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png' : URL . '/img/avatar.png';
          ?>
            <div class="user-panel">
              <div class="pull-left image">
                <a href="<?php echo URL . '/messages/' . $user->id; ?>"><img src="<?php echo $userAvatar; ?>" class="img-circle" alt="User Image"></a>
                <?php if (count($newMessages) > 0){
                  foreach ($newMessages as $message){
                    if ($message->user_from_id == $user-> id){ ?>
                      <span class="label label-danger new-message"><?php echo count($newMessages); ?></span>
                <?php }}} ?>
              </div>
              <div class="pull-left info">
                <p><a class="tab-link" href="<?php echo URL . '/messages/' . $user->id; ?>"><?php echo $displayName; ?></a></p>
                <!--<i class="fa fa-circle text-success"></i> <?php echo $user->activity; ?>-->
              </div>
            </div>
        <?php }} ?>
      </div>
      <div class="tab-pane" id="chat-sidebar-settings-tab">
        <h3 class="control-sidebar-heading">Chat Settings</h3>
      </div>
        <!-- /.control-sidebar-menu -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<script type="text/javascript" src="<?php echo URL; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/adminlte.min.js"></script>
<script src="<?php echo URL; ?>/js/wysihtml5.all.min.js"></script>
<script src="<?php echo URL; ?>/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo URL; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/intro.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/js/main.js"></script>
</body>
</html>