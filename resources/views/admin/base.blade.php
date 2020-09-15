<!DOCTYPE HTML>
<html>

<head>
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="{{asset('admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
	<script src="{{asset('admin/js/jquery.min.js')}}"> </script>
	<script src="{{asset('admin/js/bootstrap.min.js')}}"> </script>

	<!-- Mainly scripts -->
	<script src="{{asset('admin/js/jquery.metisMenu.js')}}"></script>
	<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
	<!-- Custom and plugin javascript -->
	<link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
	<script src="{{asset('admin/js/custom.js')}}"></script>
	<script src="{{asset('admin/js/screenfull.js')}}"></script>
	<script>
		$(function() {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
			if (!screenfull.enabled) {
				return false;
			}
			$('#toggle').click(function() {
				screenfull.toggle($('#container')[0]);
			});
		});
	</script>
	<style>
		html {
			zoom: 90%;
		}
	</style>
</head>

<body>
	<div id="wrapper">
		<!----->
		<nav class="navbar-default navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1> <a class="navbar-brand" href="index.html">Admin</a></h1>
			</div>
			<div class=" border-bottom">
				<div class="full-left">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
					</section>
					<div class="clearfix"> </div>
				</div>
				@include('admin.components.notifikasi')
				<div class="clearfix"></div>
				@include('admin.components.sidebar')
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">@yield('content')</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--scrolling js-->
	<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('admin/js/scripts.js')}}"></script>
	<!--//scrolling js-->
	<!---->

</body>

</html>