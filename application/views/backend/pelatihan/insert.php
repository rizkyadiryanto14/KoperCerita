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
					<h1 class="m-0">Tambah Latihan</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tambah Latihan</li>
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
							<h3 class="card-title">Halaman Latihan</h3>
							<br>
							<div class="header">
								<h3 class="card-title">Keterangan : </h3>
								<br>
								<div class="keterangan">
									<span class="text-danger">*</span> : Wajib Diisi
								</div>
							</div>
						</div>
						<form action="<?= base_url('backend/insert_pelatihan') ?>" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label for="thumbnail">Thumbnail <span class="text-danger">*</span></label>
									<input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="previewThumbnail(this)">
								</div>
								<div id="thumbnail-preview" class="mt-2"></div>
								<div class="form-group">
									<label for="jenis_kontent">Jenis Kontent <span class="text-danger">*</span></label>
									<select name="jenis_kontent" id="jenis_kontent" class="form-control">
										<option selected disabled>Pilih Jenis Kontent</option>
										<option value="Materi">Meteri</option>
										<option value="Cerita">Cerita</option>
										<option value="Latihan">Latihan</option>
									</select>
								</div>
								<div class="form-group">
									<label for="judul">Judul <span class="text-danger">*</span></label>
									<input type="text" name="judul" id="judul" class="form-control">
								</div>
								<div class="form-group">
									<label for="summernote">Materi <span class="text-danger">*</span></label>
									<textarea id="summernote" name="materi" class="form-control" cols="10" rows="10">
                                        Tulis Materi Disini
                                    </textarea>
								</div>
							</div>
							<div class="card-footer">
								<a href="<?= base_url('backend/pelatihan') ?>" class="btn btn-primary">
									<i class="fas fa-arrow-left"></i>
									Kembali
								</a>
								<button class="btn btn-success" type="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']], // Add fontsize to the toolbar
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
				['insert', ['link', 'picture', 'video']], // Add insert options
				['view', ['fullscreen', 'codeview', 'help']],
				['table', ['table']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontname', ['fontname']]
			],
			fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '64', '82', '150']
		});
	});

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