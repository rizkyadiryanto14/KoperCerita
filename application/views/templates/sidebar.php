<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="<?= base_url() ?>assets/images/aksara_logo.png" alt="AdminLTE Logo"
			 class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">KoperCerita</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
					 alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url('backend/dashboard') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('backend/pelatihan') ?>" class="nav-link">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Kelola Materi
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('backend/kuis') ?>" class="nav-link">
						<i class="nav-icon fas fa-edit"></i>
						<p>
							Kelola Kuis
						</p>
					</a>
				</li>
				<!--				<li class="nav-item">-->
				<!--					<a href="--><?php //= base_url('aksara') 
				?>
				<!--" class="nav-link">-->
				<!--						<i class="nav-icon fas fa-wind"></i>-->
				<!--						<p>-->
				<!--							Kelola Aksara-->
				<!--						</p>-->
				<!--					</a>-->
				<!--				</li>-->
				<li class="nav-item">
					<a href="<?= base_url('backend/pengguna') ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Kelola Pengguna
						</p>
					</a>
				</li>
				<!--				<li class="nav-item">-->
				<!--					<a href="--><?php //= base_url('laporan') 
				?>
				<!--" class="nav-link">-->
				<!--						<i class="nav-icon fas fa-print"></i>-->
				<!--						<p>-->
				<!--							Laporan-->
				<!--						</p>-->
				<!--					</a>-->
				<!--				</li>-->
				<li class="nav-item">
					<a href="<?= base_url('profile') ?>" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Profile
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
