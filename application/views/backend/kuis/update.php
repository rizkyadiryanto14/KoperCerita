<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Update Kuis</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Update Kuis</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Form Update Kuis</h3>
						</div>
						<form action="<?= base_url('kuis/update/' . $kuis['id_kuis']) ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="id_konten">Konten <small class="text-danger">*</small></label>
									<select id="id_konten" name="id_konten" class="form-control" required>
										<option disabled selected>Pilih Konten</option>
										<?php foreach ($pelatihan as $item) { ?>
											<option value="<?= $item->id_konten ?>">
												<?= $item->judul ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="jenis_pertanyaan">Jenis Pertanyaan <small class="text-danger">*</small></label>
									<select id="jenis_pertanyaan" name="jenis_pertanyaan" class="form-control" required>
										<option value="" disabled selected>Pilih Jenis</option>
										<option value="pilihan_ganda">Pilihan Ganda</option>
										<option value="esai">Esai</option>
									</select>
								</div>
								<div class="form-group" id="opsi_jawaban_container" style="display: none;">
									<label for="opsi_jawaban">Opsi Jawaban (Pisahkan dengan koma) <small class="text-danger">*</small></label>
									<textarea id="opsi_jawaban" name="opsi_jawaban" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="summernote">Pertanyaan <small class="text-danger">*</small></label>
									<textarea id="summernote" name="pertanyaan" class="form-control" cols="10" rows="10" required>
                                   <?= $kuis['pertanyaan'] ?>
                                </textarea>
								</div>
								<div class="form-group">
									<label for="jawaban">Jawaban <small class="text-danger">*</small></label>
									<input type="text" name="jawaban" id="jawaban" class="form-control" value="<?= $kuis['jawaban'] ?>" required>
								</div>
								<div class="form-group">
									<label for="point">Point</label>
									<input type="number" name="point" id="point" value="<?= $kuis['point'] ?>" class="form-control" placeholder="contoh 5">
								</div>
							</div>
							<div class="card-footer">
								<a href="<?= base_url('backend/kuis') ?>" type="button" class="btn btn-warning">
									<i class="fas fa-arrow-left"></i>
									Kembali
								</a>
								<button class="btn btn-primary" type="submit">
									<i class="fas fa-save"></i>
									Simpan
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Masukkan DataTables JS di sini -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	function validateForm() {
		// Validasi sederhana, tambahkan validasi lebih lanjut sesuai kebutuhan
		var pertanyaan = document.getElementById("pertanyaan").value;
		if (pertanyaan.trim() === "") {
			alert("Pertanyaan harus diisi.");
			return false;
		}
		return true;
	}

	document.getElementById("jenis_pertanyaan").addEventListener("change", function() {
		var opsiJawabanContainer = document.getElementById("opsi_jawaban_container");
		if (this.value === "pilihan_ganda") {
			opsiJawabanContainer.style.display = "block";
		} else {
			opsiJawabanContainer.style.display = "none";
		}
	});
</script>

<?php $this->load->view('templates/footer') ?>