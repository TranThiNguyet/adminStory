<?php 
    ob_start();
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/adminStory/util/DatabaseConnectUtil.php';
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Đăng nhập</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="/adminStory/templates/admin/assets/css/login.css">
   </head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Login</h3>
			</div>
			<div class="card-body">
			<?php 
					if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){
						$username = $_POST['username'];
						$password = $_POST['password'];
						$passEncry = md5($password);
					$query = "SELECT * FROM users WHERE username = '{$username}' && password = '{$passEncry}'";
					$result = $mysqli->query($query);
					$user = mysqli_fetch_assoc($result);
					if($user == null){     
					echo "<span style='color: white'>Sai username hoặc pasword</span><br /><br/>";   
					} else {
						if(!empty($_POST['remember_me'])){
							setcookie("username", $username, time()+ (10 * 365 * 24 * 60 * 60));
							setcookie("password", $password, time()+ (10 * 365 * 24 * 60 * 60));
						}else{
							setcookie ("username",""); 
							setcookie ("password","");
						}
					//đăng nhập dúng
					//B1: tạo session
					$_SESSION['user'] = $user;
					//b2: Cho chuyển hướng sang chủ admin
					header("location: /adminStory/");
					die();
					}
				}
				?>
				<form action="" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username']; } ?>">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember_me">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="register.php">Register</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="forgotPass.php">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
  ob_end_flush();	
?>
