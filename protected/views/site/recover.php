<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo URL; ?>/"><b>GDD</b>Manager</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<?php
		if(isset($message)){
			echo '<p class="login-box-msg">' . $message . '</p>';
		}
		else if(isset($change)){
		?>
			<p class="login-box-msg"><?php echo Language::$newPassword; ?></p>
			<div class="form">
				<form id="Recover" method="post">
					<div class="form-group">
						<input class="form-control" placeholder="<?php echo Language::$password; ?>" name="password" id="password" type="password" autocomplete="off">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group text-center">
						<input class="btn btn-primary" type="submit" name="yt0" value="<?php echo Language::$recover; ?>">
					</div>
				</form>
			</div>
		<?php
		}
		else{
		?>
			<p class="login-box-msg"><?php echo Language::$recoverDesc; ?></p>
			<div class="form">
				<form id="Recover" method="post">
					<div class="form-group">
						<input class="form-control" placeholder="<?php echo Language::$email; ?>" name="email" id="email" type="text">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group text-center">
						<input class="btn btn-primary" type="submit" name="yt0" value="<?php echo Language::$recover; ?>">
					</div>
				</form>
			</div>
			<a href="<?php echo URL; ?>/site/login"><?php echo Language::$haveAccount; ?></a><br>
			<a href="<?php echo URL; ?>/site/register"><?php echo Language::$registerMember; ?></a>
		<?php } ?>
  </div>
</div>