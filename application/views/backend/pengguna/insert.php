<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Pengguna</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pengguna</li>
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
							<h3 class="card-title">Form Tambah Pengguna</h3>
						</div>
						<form action="<?= base_url('pengguna/insert') ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" id="username" class="form-control">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control">
								</div>
								<div class="form-group">
									<label for="level">Level</label>
									<select name="level" id="level" class="form-control">
										<option selected disabled>Pilih Level</option>
										<option value="2">User</option>
										<option value="1">Admin</option>
									</select>
								</div>
							</div>
							<div class="card-footer">
								<a href="<?= base_url('pengguna') ?>" class="btn btn-warning">
									<i class="fas fa-arrow-left"></i>
									Kembali
								</a>
								<button class="btn btn-primary" type="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('templates/footer') ?>
