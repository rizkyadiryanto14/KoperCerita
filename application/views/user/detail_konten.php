<?php $this->load->view('templates_user/header') ?>
<?php $this->load->view('templates_user/sidebar') ?>
<?php $this->load->view('templates_user/button_menu') ?>

<div id="appCapsule">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Detail Pelatihan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Detail Pelatihan</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content mt-4">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="card">
						<?php if (!empty($konten)): ?>
							<img src="<?php echo base_url('upload/thumbnail/' . $konten['thumbnail']); ?>"
								 class="card-img-top" alt="<?php echo $konten['judul']; ?>" width="50%">
							<div class="card-body">
								<h5 class="card-title"><?php echo $konten['judul']; ?></h5>
								<p class="card-text"><?php echo $konten['isi']; ?></p>
							</div>
							<div class="card-footer">
								<small class="text-muted">Tanggal
									Publikasi: <?php echo $konten['tanggal_publikasi']; ?></small>
							</div>
						<?php else: ?>
							<div class="card-body">
								<p>Tidak ada konten tersedia.</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('templates_user/footer') ?>
