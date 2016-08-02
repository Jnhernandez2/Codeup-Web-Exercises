<?php 
session_start();
require_once 'functions.php';
function pageController() {
	
	$data = [];
	$message = '';

	if (isset($_SESSION['logged_in_user'])) {
		header('Location: authentication.php');
		exit();
	}

	if (count($_REQUEST) > 0) {
		
		$data['username'] = inputGet('username', null);
		$data['password'] = inputGet('password', null);

	
		

		if (($data['username'] == 'guest') && ($data['password'] == 'password')) {
			$_SESSION['logged_in_user'] = $data['username'];
			header('Location: authentication.php');
			exit();	
		} else {
			$data['message'] = 'Invalid!';
			$message = $data['message'];
		}
	}
	

	return ['message' => $message];

}

extract(pageController());


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		body {
			background-image: url("/IMG/wood-panel-background.png");
			background-size: 100%;
			background-repeat: no-repeat;
		}
		.form-group {
			width: 65%;

		}
	</style>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- <div class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modal title</h4>
	      </div>
	      <div class="modal-body"> -->
	      	<?php if (isset($message)):  ?>
	      	<h1><?= $message; ?></h1>
	      	<?php endif; ?>
	        <form method="POST" class="form-horizontal">
		        <label>Username</label>
		        <input type="text" name="username"><br>
		        <label>Password</label>
		        <input type="password" name="password"><br>
		        <input type="submit">
		    </form>

	      <!-- </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    <!-- </div> --><!--/.modal-content -->
 <!--  </div> --> <!--/.modal-dialog -->
<!-- </div> --> <!-- /.modal -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
 integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
</script>

</body>
</html>