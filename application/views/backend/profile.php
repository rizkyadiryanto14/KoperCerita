<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Profile</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Profile</li>
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
							<h1 class="card-title">Keterangan :</h1><br>
							<span>1 = admin</span><br>
							<span>2 = User</span>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control"
									   value="<?= $profile_admin['email'] ?>" readonly>
							</div>
							<div class="form-group">
								<label for="username">Email</label>
								<input type="text" name="username" id="username" class="form-control"
									   value="<?= $profile_admin['username'] ?>" readonly>
							</div>
							<div class="form-group">
								<label for="level">Role</label>
								<input type="text" name="level" id="level" class="form-control"
									   value="<?= $profile_admin['level'] ?>" readonly>
							</div>
						</div>
						<div class="card-footer">
							<a href="<?= base_url('backend/dashboard') ?>" class="btn btn-warning">
								<i class="fas fa-arrow-left"></i>
								Kembali
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('templates/footer') ?>
