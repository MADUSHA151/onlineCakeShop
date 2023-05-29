<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Akshi Cake | Reset Password</title>
    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="style/password.css">
</head>

<body> 
    <section class="wrapper">
		
				<form class="rounded bg-white shadow p-5 ">
                    <img src="image/fPasswordRe/image1.png" class="img-fluid ">
					<h3 class="text-dark fw-bolder fs-4 mb-2">Reset Password ?</h3>

					<div class="fw-normal text-muted mb-4">
						Enter your email and we'll send you a code to reset your password.
					</div>  

					
					<div class="row g-2">
                    <div class="form-floating col-lg-6 my-3">
						<input type="password" class="form-control" id="pw"  placeholder="password">
						<label for="floatingInput">Password</label>
					</div> 

                    <div class="form-floating col-lg-6 my-3">
						<input type="password" class="form-control" id="rpw"  placeholder="Re-password">
						<label for="floatingInput"> Re-enter Password</label>
					</div> 
                 </div>

				 <div class="form-floating col-lg-12">
						<input type="email" class="form-control" id="vr"  placeholder="name@example.com">
						<label for="floatingInput">Verification Code</label>
					</div> 

					<button type="submit" class="submit col-md-12 submit_btn my-2 btn btn-primary" onclick="resertPassword();">Submit</button>

					
                     
				</form>
	</section>
	<script src="script/script.js"></script>
</body>
</html>
