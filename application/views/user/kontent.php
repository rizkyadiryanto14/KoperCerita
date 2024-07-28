<?php $this->load->view('templates_user/header') ?>
<?php $this->load->view('templates_user/sidebar') ?>
<?php $this->load->view('templates_user/button_menu') ?>

<div id="appCapsule">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Konten</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Konten</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>

	<!-- /.content-header -->
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


<?php $this->load->view('templates_user/footer') ?>
