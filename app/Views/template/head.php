<head>
	<meta charset="utf-8">
	<title>WYD Desert</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="alternate" href="index.html" hreflang="pt" />
	<link rel="alternate" href="en/index.html" hreflang="en" />
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<link rel="stylesheet" href="<?= base_url('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/style.html') ?>">
	<link rel="stylesheet" href="<?= base_url('css/style-2.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/hover.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/animate.css') ?>">
	<script src="<?= base_url('js/jquery.js') ?>"></script>
	<script src="<?= base_url('js/smoothscroll.js') ?>"></script>
	<script src="<?= base_url('js/jquery.bxslider.js') ?>"></script>
	<script src="<?= base_url('js/jquery.dotdotdot.js') ?>"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<div id="fb-root"></div>
	<script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=3650498805056335&autoLogAppEvents=1"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-59564134-9"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-59564134-9');
	</script>
	<style>
		p img {
			width: 100%;
			object-fit: contain;
			overflow: hidden;
		}
		.news-warp .ipsEmoji,
		.news-txt img {
			display: none;
		}

		.pop-up {
			display: block;
			position: fixed;
			z-index: 9999;
			padding-top: 270px;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0, 0, 0);
			background-color: rgba(0, 0, 0, 0.4);
		}

		.raidpop-content {
			background: #1c0b07 url('<?= base_url('img/discord-pop-up.html') ?>') center no-repeat;
			margin: auto;
			padding: 20px;
			border: 1px solid #ff3131;
			width: 550px;
			height: 350px;
			border-radius: 2px;
			box-shadow: 0px 5px 55px rgba(0, 0, 0, 0.4);
		}

		.raidpop-content p {
			color: #fff;
			font-size: 21px;
		}

		.close {
			color: #ff3131;
			float: right;
			margin-top: -14px;
			font-size: 28px;

		}

		.close:hover,
		.close:focus {
			color: #fff;
			text-decoration: none;
			cursor: pointer;
			text-shadow: 0 0 10px #fff;
		}
	</style>
	<style>
		@media only screen and (max-width: 700px) {
			#l2oops {
				display: none;
			}
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<script src="https://cdn.tiny.cloud/1/1lhp4scr4dp6utok2d8hee393e6d3rs9yabki2p9jrqxwij5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>