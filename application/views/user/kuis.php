<?php $this->load->view('templates_user/header') ?>
<?php $this->load->view('templates_user/sidebar') ?>
<?php $this->load->view('templates_user/button_menu') ?>

<div id="appCapsule">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Kuis</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kuis</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="container-fluid">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="kuis" class="table table-bordered">
									<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Materi</th>
									</tr>
									</thead>
								</table>
							</div>
						</div>
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
	$(document).ready(function () {
		var dataTable = $('#kuis').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo base_url('user/get_data_kuis'); ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [0, 1],
				"orderable": false,
			}],
		});
	});
</script>
<?php $this->load->view('templates_user/footer') ?>
