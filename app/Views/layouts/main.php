<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Custom Fonts -->
	<link rel="stylesheet" href="<?= base_url("/assets/fonts/rubik/rubik.css") ?>">
	<link rel="stylesheet" href="<?= base_url("/assets/plugins/fontawesome-free-5/css/all.min.css") ?>">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url("/assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
	<?= $this->renderSection("style") ?>
	<!-- Custom Style -->
	<link rel="stylesheet" href="<?= base_url("/assets/css/style.css") ?>">
	<title>Document</title>
</head>
<body>
	<div class="app-wrapper">
		<nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4">
			<div class="container">
			<a class="navbar-brand" href="<?= base_url("/") ?>">Siswa</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
						<a class="nav-link <?= (url_is("/") === true) ? "active" : "" ?>" aria-current="page" href="<?= base_url("/") ?>">
								<i class="fas fa-fire"></i>
								<span>Home</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= (url_is("/students") === true) ? "active" : "" ?>" href="<?= base_url("/students") ?>">
								<i class="fas fa-user-graduate"></i>
								<span>Siswa</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url("/logout") ?>">
								<i class="fas fa-power-off"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<?= $this->renderSection("content") ?>

	</div>
	<!-- JQuery -->
	<script src="<?= base_url("/assets/plugins/jquery/jquery.min.js") ?>"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
	<!-- Script -->
	<?= $this->renderSection("script") ?>
</body>
</html>
