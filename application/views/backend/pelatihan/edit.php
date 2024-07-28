<?php $this->load->view('templates/header') ?>
<style>
	#thumbnail-preview {
		max-width: 100px;
		max-height: 100px;
	}

	#thumbnail-preview img {
		width: 100%;
		height: auto;
	}
</style>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Latihan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Latihan</li>
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
						<h3 class="card-title">Form Update Latihan</h3>
					</div>
					<form action="<?= base_url('pelatihan/update/' . $konten['id_konten']) ?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<label for="thumbnail">Thumbnail <span class="text-danger">*</span></label>
								<input type="file" name="thumbnail" id="thumbnail" class="form-control" value="<?= $konten['thumbnail'] ?>" onchange="previewThumbnail(this)">
							</div>
							<div id="thumbnail-preview" class="mt-2">
							</div>
							<div class="form-group">
								<label for="jenis_kontent">Jenis Kontent <span class="text-danger">*</span></label>
								<select name="jenis_kontent" id="jenis_kontent" class="form-control">
									<option selected disabled>Pilih Jenis Kontent</option>
									<option value="pengenalan">Pengenalan</option>
									<option value="latihan">Latihan</option>
									<option value="permainan">Permainan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="judul">Judul <span class="text-danger">*</span></label>
								<input type="text" name="judul" id="judul" class="form-control" value="<?= $konten['judul'] ?>">
							</div>
							<div class="form-group">
								<label for="summernote">Materi <span class="text-danger">*</span></label>
								<textarea id="summernote" name="materi" class="form-control" cols="10" rows="10">
											<?= $konten['isi'] ?>
										</textarea>
							</div>
						</div>
						<div class="card-footer">
							<a href="<?= base_url('backend/insert_pelatihan') ?>" class="btn btn-warning">
								<i class="fas fa-arrow-left"></i>
								Kembali
							</a>
							<button class="btn btn-primary" type="submit">
								<i class="fas fa-save"></i>
								Update
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function previewThumbnail(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#thumbnail-preview').html('<img src="' + e.target.result + '" alt="Thumbnail">');
			}
			reader.readAsDataURL(input.files[0]);
		} else {
			$('#thumbnail-preview').html('');
		}
	}
</script>

<?php $this->load->view('templates/footer') ?>