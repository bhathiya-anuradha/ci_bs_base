<?php
	$success = false;
	$error = false;

	if(isset($_SESSION['flash_success']) && $_SESSION['flash_success'] != "")
	{
		$success = $_SESSION['flash_success'];
		unset($_SESSION['flash_success']);
	}
	if(isset($_SESSION['flash_error']) && $_SESSION['flash_error'] != "")
	{
		$success = $_SESSION['flash_error'];
		unset($_SESSION['flash_error']);
	}
?>

<?php if($success): ?>
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong>Success!</strong>
	  <br>
	  <?php echo $success; ?>
	</div>
<?php endif; ?>

<?php if($error): ?>
	<div class="alert alert-danger alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong>Success!</strong>
	  <br>
	  <?php echo $error; ?>
	</div>
<?php endif; ?>