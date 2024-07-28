<?php $this->load->view('templates_user/header') ?>
<?php $this->load->view('templates_user/sidebar') ?>
<?php $this->load->view('templates_user/button_menu') ?>

<!-- App Capsule -->
<div id="appCapsule">

	<div class="header-large-title mb-3">
		<h3 class="title">Selamat Datang <?= $this->session->userdata('username') ?>!</h3>
	</div>

	<div class="section">
		<div class="row gx-4 gx-md-4 g-4">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-info text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?php echo round($progress); ?>%
						</h3>
						<p class="card-text">Progress</p>
					</div>
					<div class="card-footer">
						<a href="#" data-bs-target="#progress" data-bs-toggle="modal"
						   class="btn btn-sm btn-outline-light">More info
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-success text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?= $kuis ?>
						</h3>
						<p class="card-text">Kuis</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('user/kuis') ?>" class="btn btn-sm btn-outline-light">More info
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-warning text-white">
					<div class="card-body">
						<h3 class="card-title">
							<?= $jumlah_latihan ?>
						</h3>
						<p class="card-text">Latihan</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('user/kontent') ?>" class="btn btn-sm btn-outline-light">More info
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</a>
					</div>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="card bg-danger text-white">
					<div class="card-body">
						<h3 class="card-title">
							Not
						</h3>
						<p class="card-text">Level</p>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('users') ?>" class="btn btn-sm btn-outline-light">Informasi Level
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($pelatihan as $item) { ?>
		<div class="section mt-3 mb-3">
			<div class="card">
				<img src="<?= base_url("upload/thumbnail/" . $item->thumbnail) ?>" class="card-img-top" alt="image">
				<div class="card-body">
					<h6 class="card-subtitle"><?= $item->jenis_konten ?></h6>
					<h5 class="card-title"><?= $item->judul ?></h5>
					<a href="<?= base_url('user/detail_kontent/' . $item->id_konten) ?>" class="btn btn-primary">
						<ion-icon name="cube-outline"></ion-icon>
						Preview
					</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<div class="modal fade" id="progress">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Progress</h3>
			</div>
			<div class="modal-body">
				Progress Penyelesaian Latihan adalah <?php echo round($progress); ?>%
			</div>
			<div class="modal-footer">
				<button class="btn btn-warning" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- * App Capsule -->
<?php $this->load->view('templates_user/footer') ?>






