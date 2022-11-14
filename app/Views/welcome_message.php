<?= $this->extend("layouts/main"); ?>

<?= $this->section("content") ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="card border-0 shadow">
				<div class="card-body p-2">
					<div class="d-flex align-items-center">
						<div class="box p-3 rounded text-white bg-primary me-2">
							<i class="fas fa-user"></i>
						</div>
						<div class="d-flex">
							<h3 class="fs-5 mb-0">Hi, <?= $user->name ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card border-0 shadow">
				<div class="card-body p-2">
					<div class="d-flex align-items-center">
						<div class="box p-3 rounded text-white bg-primary me-2">
							<i class="fas fa-user-graduate"></i>
						</div>
						<div class="d-flex">
							<h3 class="fs-5 mb-0">Jumlah Siswa <?= $student ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
