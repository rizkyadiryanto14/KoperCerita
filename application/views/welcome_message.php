<!-- application/views/animasi_koper.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animasi Koper</title>
	<style>
		.container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.suitcase {
			width: 100px;
			height: 100px;
			background: brown;
			position: relative;
			border-radius: 10px;
			cursor: pointer;
			margin-bottom: 20px;
		}

		.suitcase::before,
		.suitcase::after {
			content: '';
			width: 100%;
			height: 10px;
			background: brown;
			position: absolute;
			left: 0;
			border-radius: 10px 10px 0 0;
			transform-origin: bottom;
		}

		.suitcase::before {
			top: -10px;
		}

		.suitcase::after {
			top: 100%;
			border-radius: 0 0 10px 10px;
		}

		.open::before {
			animation: openTop 2s forwards;
		}

		.open::after {
			animation: openBottom 2s forwards;
		}

		@keyframes openTop {
			to {
				transform: rotate(45deg);
			}
		}

		@keyframes openBottom {
			to {
				transform: rotate(-45deg);
			}
		}

		.instruction {
			font-size: 16px;
			color: #333;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="suitcase" id="suitcase"></div>
	<div class="instruction">Klik untuk membuka koper</div>
</div>
<script>
	document.getElementById('suitcase').addEventListener('click', function () {
		this.classList.add('open');
		setTimeout(function () {
			window.location.href = '<?= base_url('redirect-dashboard'); ?>';
		}, 2000); // Waktu dalam milidetik (2000ms = 2 detik)
	});
</script>
</body>
</html>
