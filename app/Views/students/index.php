<?= $this->extend("layouts/main") ?>


<?= $this->section("content") ?>
<link rel="stylesheet" href="<?= base_url("/assets/plugins/datatables/datatables.min.css") ?>">
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card border-0 shadow">
				<div class="card-body p-0">
					<table class="table text-nowrap" id="table" style="margin-top: 0px !important;">
						<thead>
							<tr>
								<th>No. Induk</th>
								<th>Nama</th>
								<th>Tanggal Masuk</th>
								<th>Lulus</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($students as $student): ?>
							<tr>
								<td> <?= esc($student->number) ?> </td>
								<td> <?= esc($student->name) ?> </td>
								<td> <?= esc($student->date) ?> </td>
								<td>
									<?= ($student->graduated === "1") ? "Lulus" : "Belum Lulus" ?>
								</td>
								<td>
									<a href="javascript:void(0)" type="button" onclick="editStudent(`<?= $student->id ?>`)" title="Edit" class="text-primary me-2">
										<i class="fas fa-search"></i>
									</a>
									<a href="javascript:void(0)" type="button" onclick="deleteStudent(`<?= $student->id ?>`)" title="Hapus" class="text-danger">
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="modal-create-student" tabindex="-1" aria-labelledby="modal-create-student-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-3 border-0">
				<h1 class="modal-title fs-5" id="modal-create-student-label">Input Data Siswa</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pt-0">
				<form action="<?= base_url("/students") ?>" id="form-create" method="post">
					<div class="mb-2">
						<label class="col-form-label">No. Induk</label>
						<input type="text" name="number" value="<?= old("number") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">Tanggal Masuk</label>
						<input type="date" name="date" value="<?= old("date", $date) ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">Nama Siswa</label>
						<input type="text" required name="name" value="<?= old("name") ?>" class="form-control">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label class="col-form-label">NIK</label>
						<input type="text" name="nik" value="<?= old("nik") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">No. KK</label>
						<input type="text" name="no_kk" value="<?= old("no_kk") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-from-label">Lulus</label>
						<select name="graduated" required class="form-select">
							<option value="0">Belum Lulus</option>
							<option value="1">Lulus</option>
						</select>
					</div>
					<div class="mb-2">
						<label class="col-form-label">Tahun Lulus</label>
						<input type="text" name="graduation_year" value="<?= old("graduation_year") ?>" class="form-control" required="required">
					</div>
					<div class="mt-4 mb-2">
						<h3 class="h5 mb-0">Data Orang Tua</h3>
					</div>
					<div class="mb-2">
						<label class="col-form-label">Nama Ayah</label>
						<input type="text" name="father_name" value="<?= old("father_name") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="father_place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="father_date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label class="col-form-label">Nama Ibu</label>
						<input type="text" name="mother_name" value="<?= old("father_name") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="mother_place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="mother_date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label for="" class="col-form-label">Pekerjaan Orang Tua</label>
						<input type="text" name="parents_job" class="form-control" required="required">
					</div>
					<div class="mt-4 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit-student" tabindex="-1" aria-labelledby="modal-edit-student-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header py-3 border-0">
				<h1 class="modal-title fs-5" id="modal-create-edit-label">Edit Data Siswa</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body pt-0">
				<form action="<?= base_url("/students") ?>" id="form-edit" method="post">
					<input type="hidden" name="_method" value="PUT">
					<div class="mb-2">
						<label class="col-form-label">No. Induk</label>
						<input type="text" name="number" value="<?= old("number") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">Tanggal Masuk</label>
						<input type="date" name="date" value="<?= old("date", $date) ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">Nama Siswa</label>
						<input type="text" required name="name" value="<?= old("name") ?>" class="form-control">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label class="col-form-label">NIK</label>
						<input type="text" name="nik" value="<?= old("nik") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-form-label">No. KK</label>
						<input type="text" name="no_kk" value="<?= old("no_kk") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2">
						<label class="col-from-label">Lulus</label>
						<select name="graduated" required class="form-select">
							<option value="0">Belum Lulus</option>
							<option value="1">Lulus</option>
						</select>
					</div>
					<div class="mb-2">
						<label class="col-form-label">Tahun Lulus</label>
						<input type="text" name="graduation_year" value="<?= old("graduation_year") ?>" class="form-control" required="required">
					</div>
					<div class="mt-4 mb-2">
						<h3 class="h5 mb-0">Data Orang Tua</h3>
					</div>

					<div class="mb-2">
						<label class="col-form-label">Nama Ayah</label>
						<input type="text" name="father_name" value="<?= old("father_name") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="father_place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="father_date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label class="col-form-label">Nama Ibu</label>
						<input type="text" name="mother_name" value="<?= old("father_name") ?>" class="form-control" required="required">
					</div>
					<div class="mb-2 row">
						<div class="col">
							<label class="col-form-label">Tempat Lahir</label>
							<input type="text" name="mother_place_of_birth" value="<?= old("place_of_birth") ?>" class="form-control" required="required">
						</div>
						<div class="col">
							<label class="col-form-label">Tanggal Lahir</label>
							<input type="date" name="mother_date_of_birth" class="form-control" value="<?= old("date_of_birth") ?>" required="required">
						</div>
					</div>
					<div class="mb-2">
						<label for="" class="col-form-label">Pekerjaan Orang Tua</label>
						<input type="text" name="parents_job" class="form-control" required="required">
					</div>
					<div class="mt-4 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<form action="" method="post" id="form-delete">
	<input type="hidden" name="_method" value="DELETE">
</form>

<?= $this->endSection() ?>


<?= $this->section("script") ?>
	<script src="<?= base_url("/assets/plugins/datatables/datatables.min.js") ?>"></script>
	<script src="<?= base_url("/assets/plugins/autocomplete-lite/src/autocomplete-lite-min.js") ?>"></script>
	<script src="<?= base_url("/assets/plugins/sweetalert2/sweetalert2.all.min.js") ?>"></script>

	<script>
		function showModal(target) {
			const modal = new bootstrap.Modal(target);
			modal.show();
		}
	</script>

	<script>
		const jobs = ["Petani", "IRT", "Drug Dealer", "Human Trafic", "Importir Alis Monyet"];
		$("#form-edit input[name=parents_job]").autocomplete_init(jobs);
		$("#form-create input[name=parents_job]").autocomplete_init(jobs);
	</script>

	<script>
		$(document).ready(() => {
			$("#table").DataTable({
				dom: `<"d-flex p-3" f <"ms-auto" B>> <"table-responsive" t><"p-3" p>`, 
				language: {
					search: ""
				},
				columnDefs: [
					{target: [3,4], orderable: false}
				],
				buttons: [
					{
						text: `<i class="fas fa-plus">`,
						action: function(e) {
							showModal(document.querySelector("#modal-create-student"));
						},
						className: "btn btn-primary"
					}
				]
			});
		})
		$.fn.dataTable.ext.classes.sFilterInput = "form-control"
	</script>

	<script>
		function getStudent(id) {
			return $.ajax({
				method: "GET",
				dataType: "json",
				url: `<?= base_url() ?>/students/${id}/edit`,
				headers: {
					"Content-Type": "application/json",
					"X-Requested-With": "XMLHttpRequest",
				}
			})
		}

		async function editStudent(id){
			const student = await getStudent(id);
			const formEdit = document.querySelector("#form-edit");
			formEdit.querySelector("input[name=number]").value = student.number;
			formEdit.querySelector("input[name=date]").value = student.date;
			formEdit.querySelector("input[name=name]").value = student.name;
			formEdit.querySelector("input[name=place_of_birth]").value = student.place_of_birth;
			formEdit.querySelector("input[name=date_of_birth]").value = student.date_of_birth;
			formEdit.querySelector("input[name=nik]").value = student.nik;
			formEdit.querySelector("input[name=no_kk]").value = student.no_kk;
			formEdit.querySelector("input[name=father_name]").value = student.father_name;
			formEdit.querySelector("input[name=father_date_of_birth]").value = student.father_date_of_birth;
			formEdit.querySelector("input[name=father_place_of_birth]").value = student.father_place_of_birth;
			formEdit.querySelector("input[name=mother_name]").value = student.mother_name;
			formEdit.querySelector("input[name=mother_date_of_birth]").value = student.mother_date_of_birth;
			formEdit.querySelector("input[name=mother_place_of_birth]").value = student.mother_place_of_birth;
			formEdit.querySelector("input[name=parents_job]").value = student.parents_job;
			formEdit.querySelector("select[name=graduated]").value = student.graduated;
			formEdit.querySelector("input[name=graduation_year]").value = student.graduation_year;

			formEdit.action = `<?= base_url() ?>/students/${id}`;

			showModal(document.querySelector("#modal-edit-student"));
		}
	</script>

	<script>
		function deleteStudent(id) {
			Swal.fire({
				title: 'Hapus data siswa?',
				showDenyButton: false,
				showCancelButton: true,
				confirmButtonText: 'Save',
			}).then((result) => {
				if (result.isConfirmed) {
					const formDelete = document.querySelector("#form-delete");
					formDelete.action = `<?= base_url() ?>/students/${id}`;
					formDelete.submit();
				} 			
			})
		}
	</script>
<?= $this->endSection() ?>
