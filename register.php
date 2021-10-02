<?php
	session_start();

	if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
		header('location: index.php');
		exit;
	}

	$register_error = '';

	require_once('recaptcha_connect.php');

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$captcha;

		if(isset($_POST['g-recaptcha-response'])) {
			$captcha = $_POST['g-recaptcha-response'];
		}

		if(!$captcha) {
			echo '<h2>Please check the captcha form</h2>';
			exit;
		}

		$response = (array) json_decode(file_get_contents(
			'https://www.google.com/recaptcha/api/siteverify?secret=' . $RECAPTCHA_SECRET .
			'&response=' . $captcha .
			'&remoteip=' . $_SERVER['REMOTE_ADDR']));

		if($response['success'] !== true) {
			$register_error = 'Verifikasi RECAPTCHA gagal';
		}
		else {
			require_once('db_connect.php');

			$query =
				'INSERT INTO `accounts` 
				(`email`, `username`, `password`, `first_name`, `last_name`, `birth_date`, `gender`) VALUES 
				(:email, :username, :password, :first_name, :last_name, :birth_date, :gender)';

			if($stmt = $db->prepare($query)) {
				$email		= trim($_POST['email']);
				$username	= trim($_POST['username']);
				$password	= password_hash($_POST['password'], PASSWORD_DEFAULT);
				unset($_POST['password']);
				$firstName	= trim($_POST['firstName']);
				$lastName	= trim($_POST['lastName']);
				$birthDate	= trim($_POST['birthDate']);
				$gender		= $_POST['gender'];

				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':username', $username, PDO::PARAM_STR);
				$stmt->bindParam(':password', $password, PDO::PARAM_STR);
				$stmt->bindParam(':first_name', $firstName, PDO::PARAM_STR);
				$stmt->bindParam(':last_name', $lastName, PDO::PARAM_STR);
				$stmt->bindParam(':birth_date', $birthDate, PDO::PARAM_STR);
				$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
				
				if($stmt->execute()) {
					/* $_SESSION['isLoggedIn'] = true;

					$_SESSION['email'] = $email;
					$_SESSION['username'] = $username;
					$_SESSION['fullName'] = $firstName . $lastName; */

					header('location: index.php');
					exit;
				}
				else {
					$register_error = 'Gagal mendaftar. Silakan coba beberapa saat lagi';

					if($stmt->errorCode() === '23505') {
						$register_error = 'Username telah digunakan';
					}
				}
				unset($stmt);
			}
			unset($db);
		}
	}
?>

<!DOCTYPE html>

<html lang="id">
	<head>
		<title>Daftar</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- <link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> -->
	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a href="#" class="navbar-brand">Company</a>
					<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<a class="nav-link" href="login.php">
									<!-- <span class="glyphicon glyphicon-log-in"></span> -->
									Masuk
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="#">
									<!-- <span class="glyphicon glyphicon-user"></span> -->
									Daftar
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<div class="container col-12 col-sm-11 col-md-8 col-lg-6">
			<form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
				<?php
					if(!empty($register_error)) {
						echo '<div class="alert alert-danger">' . $register_error . '</div>';
					}
				?>
				
				<div class="row mb-3">
					<div class="col-12 col-sm-6 mb-2">
						<div class="form-floating">
							<input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName">
							<label for="firstName">First Name</label>
						</div>
					</div>
					<div class="col-12 col-sm-6 mb-2">
						<div class="form-floating">
							<input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName">
							<label for="lastName">Last Name</label>
						</div>
					</div>
				</div>

				<div class="form-floating mb-2">
					<input type="text" class="form-control" id="email" placeholder="Email" name="email">
					<label for="email">Email</label>
				</div>

				<div class="form-floating mb-2">
					<input type="text" class="form-control" id="username" placeholder="Username" name="username">
					<label for="username">Username</label>
				</div>

				<div class="row mb-3">
					<div class="col-12 col-sm-6 mb-2">
						<div class="form-floating">
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="col-12 col-sm-6 mb-2">
						<div class="form-floating">
							<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword">
							<label for="confirmPassword">Confirm Password</label>
						</div>
					</div>
				</div>

				<div class="form-floating mb-3">
					<input type="date" class="form-control" id="birthDate" placeholder="Birth Date" name="birthDate">
					<label for="birthDate">Birth Date</label>
				</div>

				<div class="form-group mb-3">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="genderMale" checked>
						<label class="form-check-label" for="genderMale">Laki-laki</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" id="genderFemale">
						<label class="form-check-label" for="genderFemale">Perempuan</label>
					</div>
				</div>

				<div class="form-group mb-3">
					<div class="g-recaptcha" data-sitekey="<?php echo $RECAPTCHA_SITE; ?>" data-callback="recaptchaCallback">
					</div>
					<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
				</div>

				<div class="d-grid">
					<button type="submit" class="btn btn-primary">DAFTAR</button>
				</div>
			</form>
		</div>

		<!-- JAVASCRIPT -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js" integrity="sha256-TAzGN4WNZQPLqSYvi+dXQMKehTYFoVOnveRqbi42frA=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_id.min.js" integrity="sha256-vgrTuBfeM5qbY7HY/kmyOSHg2au9FXiRq5/6A7RMNms=" crossorigin="anonymous"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>

		<script type="text/javascript">
			function recaptchaCallback() {
				$('#hiddenRecaptcha').valid();
			};

			$(document).ready(function() {
				$.validator.defaults.onfocusout = function(element, event) {
					if($(element).data("control") === "mycitycontrol")
						return;

					if(!this.checkable(element) && (element.name in this.submitted || !this.optional(element))) {
						this.element(element);
					}
				}
				
				$.validator.defaults.onkeyup = function(element, event) {
					if($(element).data("control") === "mycitycontrol")
						return;

					if(event.which === 9 && this.elementValue(element) === "")
						return;

					if(element.name in this.submitted || element === this.lastElement) {
						this.element(element);
					}
				}

				$.validator.addMethod('lettersOnly', function(value, element) {
					return this.optional(element) || /^[A-Za-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
				}, 'Hanya boleh huruf dan spasi'); 

				$.validator.addMethod('emailEx', function(value, element) {
					return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
				}, 'Email tidak valid');

				$.validator.addMethod('noSpaceSymbol', function(value, element) {
					return this.optional(element) || /^[a-zA-Z0-9_]+$/i.test(value);
				}, 'Tidak boleh spasi dan simbol selain underscore');

				$.validator.addMethod('lessThanToday', function(value, element) {
					return new Date(value) < new Date();
				}, 'Tanggal lahir tidak valid');

				$('#registerForm').validate({
					ignore: '.ignore',

					rules: {
						firstName: {
							required: true,
							lettersOnly: true,
							minlength: 2
						},
						lastName: {
							required: true,
							lettersOnly: true,
							minlength: 2
						},
						email: {
							required: true,
							emailEx: true
						},
						username: {
							required: true,
							noSpaceSymbol: true,
							minlength: 5,
							maxlength: 36
						},
						password: {
							required: true,
							minlength: 5
						},
						confirmPassword: {
							required: true,
							minlength: 5,
							equalTo: '#password'
						},
						birthDate: {
							required: true,
							dateISO: true,
							lessThanToday: true
						},
						gender: {
							required: true,
						},
						hiddenRecaptcha: {
							required: function() {
								return grecaptcha.getResponse() == '';
							}
						}
					},
					/* messages: {
						firstName: {
							required: 'Harap masukkan nama pertama',
							minlength: 'Nama pertama minimal {0} karakter'
						}
					}, */
					errorElement: 'em',
					errorPlacement: function(error, element) {
						error.addClass('invalid-feedback');

						if(element.prop('type') === 'checkbox') {
							error.insertAfter(element.next('label'));
						}
						else {
							error.insertAfter(element);
						}
					},
					highlight: function(element, errorClass, validClass) {
						$(element).addClass('is-invalid').removeClass('is-valid');
					},
					unhighlight: function(element, errorClass, validClass) {
						$(element).addClass('is-valid').removeClass('is-invalid');
					},
					submitHandler: function(form) {
						if($("#form").valid()) {
							form.submit();
						}
					}
				});
			});
		</script>
	</body>
</html>