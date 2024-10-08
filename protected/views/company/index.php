<?php $avatar = file_exists($_SERVER['DOCUMENT_ROOT'] . Yii::app()->request->baseUrl . '/files/' . Yii::app()->user->company . '/avatars/company.png') ? URL . '/files/' . Yii::app()->user->company . '/avatars/company.png' : URL . '/img/cover.png'; ?>

<section class="content-header">
  <h1 class="hidden-xs"><?php echo Language::$company; ?> <small><?php echo Language::$information; ?></small></h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo URL; ?>/"><i class="fa fa-dashboard"></i> <?php echo Language::$home; ?></a></li>
    <li class="active"><?php echo $model->name; ?></li>
  </ol>
</section>

<section class="content">
	<div class="box box-success">
    <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="<?php echo $avatar; ?>" alt="User profile picture">

      <h3 class="profile-username text-center"><?php echo $model->name; ?></h3>

      <p class="text-muted text-center"><?php echo $model->slogan; ?></p>

      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b><i class="fa fa-envelope margin-r-5"></i> <?php echo Language::$email; ?></b> <span class="text-muted pull-right"><a href="mailto:<?php echo $model->email; ?>"><?php echo $model->email; ?></a></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-building-o margin-r-5"></i> <?php echo Language::$address; ?></b>
          <span class="text-muted pull-right">
            <address>
              <?php echo $model->address1; ?>, <?php echo $model->address2; ?>
              <?php echo $model->city; ?>, <?php echo $model->state; ?> <?php echo $model->country; ?> <?php echo $model->zip; ?>
            </address>
          </span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-map-marker margin-r-5"></i> <?php echo Language::$timezone; ?></b> <span class="text-muted pull-right"><?php echo Language::$timezones[$model->timezone]; ?></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-globe margin-r-5"></i> <?php echo Language::$website; ?></b> <span class="text-muted pull-right"><a href="<?php echo $model->website; ?>" target="_blank"><?php echo $model->website; ?></a></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-phone margin-r-5"></i> <?php echo Language::$phone; ?></b> <span class="text-muted pull-right">
            <?php
              if(strlen($model->phone) == 10) {
                echo preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $model->phone);
              }
              else{
                echo $model->phone;
              }
            ?>
          </span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-paypal margin-r-5"></i> <?php echo Language::$paypalEmail; ?></b> <span class="text-muted pull-right"><a href="mailto:<?php echo $model->paypal_email; ?>"><?php echo $model->paypal_email; ?></a></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-money margin-r-5"></i> <?php echo Language::$nextInvoice; ?></b> <span class="text-muted pull-right"><?php echo $model->membership; ?></span>
        </li>
        <li class="list-group-item">
          <b><i class="fa fa-link margin-r-5"></i> <?php echo Language::$referralLink; $link = URL . '/site/register?ref=' . Yii::app()->user->company; ?></b> <i class="fa fa-question-circle"  data-toggle="referral" data-placement="top" title="<?php echo Language::$referralDesc; ?>"></i> <span class="text-muted pull-right"><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></span>
        </li>
      </ul>

      <?php if (in_array('admin', Yii::app()->user->roles)){?>
        <a href="<?php echo URL; ?>/company/update/<?php echo $model->id;?>" class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o"></i> <?php echo Language::$edit; ?></a>
        <?php if ($model->month_users > 1){?>
        <a href="<?php echo URL;?>/company/payment/" class="btn btn-success btn-block"><i class="fa fa-money"></i> <b><?php echo Language::$invoice; ?></b></a>
      <?php }} ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>

<script type="text/javascript">
  $(function () {
    $('[data-toggle="referral"]').tooltip()
  })
</script>