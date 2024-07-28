<?php $this->load->view('templates_user/header') ?>
<style>
	.aksara-item {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
		margin-bottom: 20px;
	}

	.aksara-item img {
		max-width: 100%;
		height: auto;
	}

	.aksara-item p {
		margin-top: 10px;
		font-size: 16px;
	}
</style>
<?php $this->load->view('templates_user/sidebar') ?>
<?php $this->load->view('templates_user/button_menu') ?>

<div id="appCapsule">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Aksara</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Aksara</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="row">
			<?php foreach ($aksara as $item) { ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
					<div class="aksara-item">
						<img src="<?= base_url('upload/simbol/' . $item->simbol) ?>" alt="aksara"
							 class="img-responsive">
						<p><?= $item->penjelasan ?></p>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
</div>

<?php $this->load->view('templates_user/footer') ?>
