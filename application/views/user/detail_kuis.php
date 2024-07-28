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
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kuis</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<?php
							$no = 1;
							foreach ($kuis as $item) { ?>
								<div class="form-group">
									<label for="jawaban"><?= $no++ ?>. <?= $item->pertanyaan ?></label>
									<?php if ($item->jenis_pertanyaan == 'pilihan_ganda') { ?>
										<?php $options = explode(',', $item->opsi_jawaban); ?>
										<?php foreach ($options as $option) { ?>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="jawaban[<?= $item->id_kuis ?>]" id="jawaban_<?= $item->id_kuis ?>_<?= $option ?>" value="<?= $option ?>">
												<label class="form-check-label" for="jawaban_<?= $item->id_kuis ?>_<?= $option ?>">
													<?= $option ?>
												</label>
											</div>
										<?php } ?>
									<?php } else { ?>
										<input type="text" name="jawaban[<?= $item->id_kuis ?>]" id="jawaban_<?= $item->id_kuis ?>" class="form-control">
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<div class="card-body">
							<a href="<?= base_url('user/kuis') ?>" class="btn btn-warning">
								<i class="fas fa-arrow-left"></i>
								Kembali
							</a>
							<button class="btn btn-primary" type="submit">
								<i class="fas fa-save"></i>
								Kirim jawaban
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('templates_user/footer') ?>