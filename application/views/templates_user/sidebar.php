<!-- App Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
	<div class="offcanvas-body">
		<!-- profile box -->
		<div class="profileBox">
			<div class="image-wrapper">
				<img src="<?= base_url() ?>assets/frontend/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
			</div>
			<div class="in">
				<strong><?= $this->session->userdata('username') ?></strong>
				<div class="text-muted">
					<ion-icon name="location"></ion-icon>
					Bima
				</div>
			</div>
			<a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
				<ion-icon name="close"></ion-icon>
			</a>
		</div>
		<!-- * profile box -->

		<ul class="listview flush transparent no-line image-listview mt-2">
			<li>
				<a href="<?= base_url('user/dashboard') ?>" class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="home-outline"></ion-icon>
					</div>
					<div class="in">
						Dashboard
					</div>
				</a>
			</li>
			<li>
				<a href="<?= base_url('user/kontent') ?>" class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="cube-outline"></ion-icon>
					</div>
					<div class="in">
						Latihan
					</div>
				</a>
			</li>
			<!--			<li>-->
			<!--				<a href="--><?php //= base_url('user/kuis') 
											?>
			<!--" class="item">-->
			<!--					<div class="icon-box bg-primary">-->
			<!--						<ion-icon name="layers-outline"></ion-icon>-->
			<!--					</div>-->
			<!--					<div class="in">-->
			<!--						<div>Kuis</div>-->
			<!--					</div>-->
			<!--				</a>-->
			<!--			</li>-->
			<li>
				<div class="item">
					<div class="icon-box bg-primary">
						<ion-icon name="moon-outline"></ion-icon>
					</div>
					<div class="in">
						<div>Dark Mode</div>
						<div class="form-check form-switch">
							<input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
							<label class="form-check-label" for="darkmodesidebar"></label>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- sidebar buttons -->
	<div class="sidebar-buttons">
		<a href="#" class="button">
			<ion-icon name="settings-outline"></ion-icon>
		</a>
		<a href="<?= base_url('logout') ?>" class="button">
			<ion-icon name="log-out-outline"></ion-icon>
		</a>
	</div>
	<!-- * sidebar buttons -->
</div>
<!-- * App Sidebar -->