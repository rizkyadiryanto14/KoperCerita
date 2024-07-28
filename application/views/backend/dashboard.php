<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pelatihan</span>
							<span class="info-box-number">
								<?= $pelatihan ?>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-lg-3 col-6">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">kuis</span>
							<span class="info-box-number"><?= $kuis ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-lg-3 col-6">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Users</span>
							<span class="info-box-number"><?= $pengguna ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<canvas id="userGrowthChart"></canvas>
				</div>
				<div class="col-md-6">
					<canvas id="quizPerformanceChart"></canvas>
				</div>
			</div>
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	// Grafik Pertumbuhan Pengguna (Dummy Data)
	var userGrowthData = <?php echo $userGrowthData; ?>;

	// Inisialisasi Chart.js untuk User Growth Chart
	var userGrowthChart = new Chart(document.getElementById('userGrowthChart'), {
		type: 'line',
		data: {
			labels: userGrowthData.map(data => data.month), // Ambil bulan dari hasil query
			datasets: [{
				label: 'Jumlah Pengguna Baru',
				data: userGrowthData.map(data => data.count), // Ambil jumlah pengguna dari hasil query
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
<?php $this->load->view('templates/footer') ?>