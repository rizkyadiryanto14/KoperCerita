<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">

		<!-- User Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
				<i class="fas fa-user"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
					<i class="fas fa-sign-out-alt mr-2"></i> Logout
				</a>
			</div>
		</li>
	</ul>
	</ul>
</nav>
<!-- /.navbar -->
