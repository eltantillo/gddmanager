<?php echo $this->renderPartial('_menu'); ?>
<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$team; ?> <small><?php echo Language::$userList; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL;?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li class="active"><?php echo Language::$userList; ?></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <?php foreach ($users as $user) {
    $avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/' . $user->id . '.png' : URL . '/img/avatar.png'; ?>
    <div class="col-md-4">
      <div class="box box-widget widget-user">
        <a href="<?php echo URL . '/user/' . $user->id ?>">
        <div class="widget-user-header bg-green">
          <h3 class="widget-user-username"><?php echo $user->name ? $user->name: $user->email . '<br/>(' . Language::$languages[$user['language']] . ')'; ?></h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?php echo $avatar; ?>" alt="User Avatar">
        </div>
    	</a>
        <div class="box-footer">
          <div class="col-sm-12">
            <div class="description-block">
              <h5 class="description-header"><?php echo mb_strtoupper(Language::$rolesName); ?></h5>
              <span class="description-text"><?php echo Functions::getRoles($user->roles); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>