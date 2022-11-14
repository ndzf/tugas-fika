<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CUSTOM FONTS -->
	<link rel="stylesheet" href="<?= base_url("/assets/fonts/rubik/rubik.css") ?>">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url("/assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
	<!-- CUSTOM STYLE -->
	<link rel="stylesheet" href="<?= base_url("/assets/css/style.css") ?>">
	<title><?= $title ?? "Login Dulu Bos.." ?></title>
</head>
<body>
	<div class="app-wrapper d-flex align-items-center ">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-6">
					<div class="card border-0 shadow">
						<div class="card-body">
							<h3 class="fw-normal">Login</h3>
							<form action="<?= base_url("/login") ?>" method="post">
								<div class="mb-2">
									<label for="username" class="col-form-label">Username</label>
									<input type="text" name="username" required minlength="3" id="username" class="form-control">
								</div>
								<div class="mb-4">
									<label for="password" class="col-form-label">Password</label>
									<input type="password" name="password" required minlength="4" id="password" class="form-control" for="password">
								</div>
								<div class="mb-2 d-flex justify-content-end">
									<button class="btn btn-primary" type="submit">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Bootstrap -->
	<script src="<?= base_url("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
</body>
</html>
