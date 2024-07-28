<?php $this->load->view('templates/header') ?>

<div class="content">
	<div class="container">
		<div class="mt-5">
			<div class="row">
				<div class="col-12 col-md-6 text-center mt-3 mx-auto p-3">
					<img src="<?= base_url('assets/images/logo_smp.png') ?>" width="35%" class="mb-4" alt="" />
					<br>
					<h1 class="h2" style="font-size: 28px;">KoperCerita</h1>
					<p class="lead">Masuk untuk mendapat akses ke sistem.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-md-5 mx-auto mt-6">
					<form action="<?= base_url('login') ?>" method="post">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text input-group-text-costum" id="inputGroup-sizing-default">
									<i class="fa fa-user"></i>
								</span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text input-group-text-costum" id="inputGroup-sizing-default">
									<i class="fa fa-lock"></i>
								</span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="input-group mb-3">
							<button type="submit" name="submit" value="login" class="btn btn-block btn-success">
								LOGIN
								<i class="fa fa-arrow-alt-circle-right"></i>
							</button>
						</div>
					</form>
					<div class="text-center">
						Belum Memiliki akun?<a href="<?= base_url('register') ?>"><br>Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer') ?>