<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | Wiprotools</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div>
		</div>
		<div class="login-logo">
			<img src="<?=base_url()?>assets/dist/img/logo.jpg" class="img-circle" width="100px"><br>
			<a href="<?=base_url()?>"><b>Login</b> Wiprotools</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Masuk ke akun Anda</p>

			<form action="<?=site_url('auth/proses')?>" method="post" autocomplete="off">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<div class="col-xs-4">
						<button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</body>
</html>