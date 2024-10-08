<?php echo $this->renderPartial('_menu'); ?>
<?php echo $this->renderPartial('_menu2', array('model'=>$model)); ?>
<?php $avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . $model->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . $model->id . '.png' : URL . '/img/avatar.png'; ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$team; ?> <small><?php echo Language::$memberDetail; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li><a href="<?php echo URL . '/user';?>"><?php echo Language::$userList; ?></a></li>
    <li class="active"><?php echo $model->name != '' ? $model->name : $model->email; ?></li>
  </ol>
</section>

<section class="content">
	<div class="box box-success">
    <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="<?php echo $avatar; ?>" alt="User profile picture">

      <h3 class="profile-username text-center"><?php echo $model->name; ?></h3>

      <p class="text-muted text-center"><?php echo Functions::getRoles($model->roles); ?></p>

      <ul class="list-group list-group-unbordered">
        <!--<li class="list-group-item">
          <b><i class="fa fa-user margin-r-5"></i> <?php echo Language::$status; ?></b> <span class="text-muted pull-right"><?php echo $model->activity; ?></span>
        </li>-->
        <li class="list-group-item">
          <b><i class="fa fa-envelope margin-r-5"></i> <?php echo Language::$email; ?></b> <span class="text-muted pull-right"><?php echo $model->email; ?></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-map-marker margin-r-5"></i> <?php echo Language::$location; ?></b> <span class="text-muted pull-right"><?php echo $model->location; ?> <?php echo Language::$timezones[$model->timezone]; ?></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-calendar margin-r-5"></i> <?php echo Language::$workdays; ?></b> <span class="text-muted pull-right"><?php echo Functions::getWeekDays($model->workdays); ?></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-clock-o margin-r-5"></i> <?php echo Language::$worktime; ?></b> <span class="text-muted pull-right"><?php echo $model->worktime; ?> hrs.</span>
        </li>
        <?php if (in_array('admin', Yii::app()->user->roles) || Yii::app()->user->id == $model->id){?>
          <li class="list-group-item">
            <b><i class="fa fa-money margin-r-5"></i> <?php echo Language::$weeklySalary; ?></b> <span class="text-muted pull-right">$<?php echo Functions::getSalary($model->workdays, $model->salary, $model->worktime); ?></span>
          </li>
        <?php } ?>
      </ul>

      <?php if (in_array('admin', Yii::app()->user->roles) || Yii::app()->user->id == $model->id){?>
        <a href="<?php echo URL;?>/user/update/<?php echo $model->id;?>" class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o"></i> <?php echo Language::$edit; ?></a>
      <?php } ?>
      <?php if ($model->id != Yii::app()->user->id){ ?>
        <a href="../messages/<?php echo $model->id; ?>" class="btn btn-success btn-block"><i class="fa fa-comments-o"></i> <b><?php echo Language::$message; ?></b></a>
      <?php } ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>