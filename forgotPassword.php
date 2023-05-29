
<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Akshi Cake | Forgot Password</title>
	<link rel="icon" href="resources/logo.png" />
	<link rel="stylesheet" href="bootstrap.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="style/password.css">
</head>

<body>
	<section class="wrapper bg-white">

		<div class="rounded bg-btn-bg-white shadow p-5 ">
			<img src="image/fPasswordRe/image1.png" class="img-fluid ">
			<h3 class="text-dark fw-bolder fs-4 mb-2">Forgot Password ?</h3>

			<div class="fw-normal text-muted mb-4">
				Enter your email and we'll send you a code to reset your password.
			</div>

			<div class="form-floating col-lg-12">
				<input type="email" class="form-control"  id="fogot-Password-Input" placeholder="name@example.com" name="e" >
				<label for="floatingInput">Email address</label>
			</div>


			<button class="submit col-md-12 submit_btn my-4 btn btn-primary" onclick="forgotPassword();">Submit</button>

			<a href="signIn.php" class="back"> Back to Login</a>

		</div>
	</section>
	<script src="script/script.js"></script>
</body>

</html>