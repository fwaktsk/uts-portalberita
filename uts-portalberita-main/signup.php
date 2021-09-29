<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<p class="navbar-brand">Kampung Naga News</>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					</div>
			</div>
		</nav>
	</div>

	<div>
		<div class="container" style="width: 55%;">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card border-0 shadow rounded-3 my-5">
						<div class="card-body p-4 p-sm-5">
							<h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
							<form method="post">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="firstName" placeholder="First Name"
										name="firstName">
									<label for="firstName">First Name</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="lastName" placeholder="Last Name"
										name="lastName">
									<label for="lastname">Last Name</label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="username" placeholder="Username"
										name="username">
									<label for="username">Username</label>
								</div>
								<div class="form-floating mb-3">
									<input type="password" class="form-control" id="password" placeholder="Password"
										name="password">
									<label for="password">Password</label>
								</div>
								<div class="form-floating mb-3">
									<input type="date" class="form-control" id="birthDate" name="birthDate">
									<label for="birthDate">Birth Date</label>
								</div>
								<div class="form-group">
									<label for="flexRadioDefault">Gender</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault"
											id="flexRadioDefault1">
										<label class="form-check-label" for="flexRadioDefault1">
											Laki - Laki
										</label>
									</div>
									<br>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault"
											id="flexRadioDefault2">
										<label class="form-check-label" for="flexRadioDefault2">
											Perempuan
										</label>
									</div>
									<br>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault"
											id="flexRadioDefault2">
										<label class="form-check-label" for="flexRadioDefault2">
											Prefer To Not Disclose
										</label>
									</div>
								</div>
								<br>
								<br>
								<div class="input-group mb-3">
									<input type="file" class="form-control" id="inputImage" accetp="image/*">
									<label class="input-group-text" for="inputImage">Upload</label>
								</div>
								<div class="g-recaptcha" data-sitekey="" style="margin-bottom: 10px">
								</div>
								<div class="d-grid">
									<button class="btn btn-primary btn-login text-uppercase fw-bold"
										type="submit">Create Account!</button>
								</div>
								<br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div>
		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0);">
				© 2020 Copyright:
				<a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
			</div>
			<!-- Copyright -->
		</footer>
	</div>
</body>

</html>