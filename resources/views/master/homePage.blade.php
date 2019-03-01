<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="@yield('title') - Connect lagos - Lagos online transport service" />
	<meta name="author" content="" />

	<title>@yield('title') | Connect Lagos </title>


	<link rel="stylesheet" href="/assets-public/css/bootstrap.css">
	<link rel="stylesheet" href="/assets-public/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="/assets-public/css/neon.css">

	<script src="/assets-public/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="/assets-public/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		.spinning-circle {
			border: 4px solid #f3f3f3;
			border-top: 4px solid #666;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			animation: spin 1s linear infinite;
			-webkit-animation: spin 1s linear infinite;
			-moz-animation: spin 1s linear infinite;
			display: block;
			margin: 0 auto 5px auto;
		}
		
		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}
		</style>
</head>
<body>

<div class="wrap">

	<!-- Logo and Navigation -->


@include('components.header')

@if(session('failure'))
<p>
{!! ajax_alert('danger',session('failure')) !!}
</p>

@endif

@if(session('success'))
<p>
{!! ajax_alert('success',session('success')) !!}
</p>
@endif

@yield('body')

@include('components.footer')
</div>


	<!-- Bottom Scripts -->
	<script src="/assets-public/js/gsap/main-gsap.js"></script>
	<script src="/assets-public/js/bootstrap.js"></script>
	<script src="/assets-public/js/joinable.js"></script>
	<script src="/assets-public/js/resizeable.js"></script>
	<script src="/assets-public/js/neon-slider.js"></script>
    <script src="/assets-public/js/neon-custom.js"></script>
    @yield('scripts')

</body>
</html>
