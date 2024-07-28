<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Tambah Aksara</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('backend/dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item active">Tambah Aksara</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Halaman Tambah Aksara</h3>
					</div>
					<form action="<?= base_url('aksara/insert') ?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label for="nama_aksara">Nama</label>
								<input type="text" name="nama_aksara" id="nama_aksara" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="simbol">Simbol</label>
								<input type="file" name="simbol" id="simbol" class="form-control">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea name="keterangan" id="keterangan" class="form-control" cols="10"
										  rows="10"></textarea>
							</div>
						</div>
						<div class="card-footer">
							<a href="<?= base_url('aksara') ?>" class="btn btn-warning">
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
	</section>
</div>

<?php $this->load->view('templates/footer') ?>