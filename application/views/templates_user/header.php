<!doctype html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="theme-color" content="#000000">
	<title>Belajar Aksara</title>
	<meta name="description" content="Mobilekit HTML Mobile UI Kit">
	<meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/frontend/img/favicon.png" sizes="32x32">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/frontend/img/icon/192x192.png">
	<link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="manifest" href="<?= base_url() ?>assets/frontend/__manifest.json">

	<!--Datable-->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
</head>

<body>


	<!-- App Header -->
	<div class="appHeader bg-primary scrolled">
		<div class="left">
			<a href="#" class="headerButton" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
				<ion-icon name="menu-outline"></ion-icon>
			</a>
		</div>
		<div class="pageTitle">
			KoperCerita
		</div>
		<div class="right">
			<a href="#" class="headerButton toggle-searchbox">
				<ion-icon name="search-outline"></ion-icon>
			</a>
		</div>
	</div>
	<!-- * App Header -->

	<!-- Search Component -->
	<div id="search" class="appHeader">
		<form class="search-form">
			<div class="form-group searchbox">
				<input type="text" class="form-control" placeholder="Search...">
				<i class="input-icon">
					<ion-icon name="search-outline"></ion-icon>
				</i>
				<a href="#" class="ms-1 close toggle-searchbox">
					<ion-icon name="close-circle"></ion-icon>
				</a>
			</div>
		</form>
	</div>
	<!-- * Search Component -->