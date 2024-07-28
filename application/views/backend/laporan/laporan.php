<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Laporan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Laporan</li>
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
						<a href="<?= base_url('backend/dashboard') ?>" class="btn btn-warning">
							<i class="fas fa-arrow-left"></i>
							Kembali
						</a>
						<a href="" class="btn btn-danger"><i class="fas fa-print"></i> Export PDF</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
								<tr class="text-center">
									<th>Laporan User</th>
									<th>Laporan Kuis</th>
									<th>Laporan Latihan</th>
								</tr>
								</thead>
								<tbody>
								<tr class="text-center">
									<td>
										<button class="btn btn-primary"><i class="fas fa-save"></i></button>
									</td>
									<td>
										<button class="btn btn-success"><i class="fas fa-save"></i></button>
									</td>
									<td>
										<button class="btn btn-warning"><i class="fas fa-save"></i></button>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>

</script>
<?php $this->load->view('templates/footer') ?>
