<!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="lstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

 <form method = "post" action = "register.php">
	<h1>Register</h1>
	<input type="text" name="name" placeholder="Name">
	<input type="password" name="password" id="password" placeholder="Password">
	<input type="email" name="email" placeholder="Email">
	<input type="phone" name="phone" placeholder="Phone Number">
	<button input type="submit" name="register" onclick="return validate()">Register</button>
</form>
</div>
<div class="form-container sign-in-container">
 <form method = "post" action = "login.php">
		<h1>Login</h1>
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<a href="#">Forgot Your Password</a>

	<button input type="submit" name="login" onclick="return validate()">Login</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Have an account?</h1><br><br><br>
			<button class="ghost" id="signIn">Login</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Need an account?</h1><br><br><br>
			<button class="ghost" id="signUp">Register</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>