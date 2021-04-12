<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('ref.title') }}</title>

	<link rel="icon" type="image/png" href="{{url('/images/xgracias-favicon.png')}}" />

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/css/icons/icomoon/styles.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/css/icons/flag-icon/css/flag-icon.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/css/icons/fontawesome/styles.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/js/plugins/pickers/bootstrap-datepicker.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/js/plugins/pickers/bootstrap-datepicker-themes.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/layout_3/css/bootstrap.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/layout_3/css/bootstrap_limitless.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/layout_3/css/layout.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/layout_3/css/components.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/layout_3/css/colors.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('themes/limitless/global/css/custom.css')}}">
	<link type="text/css" rel="stylesheet" href="{{url('styles/app.css')}}">

	<!-- /global stylesheets -->



	<style>
		.groups-filter {
			float: left;
			margin-left: 0.75rem;
		}
		.modal-mlg {
			max-width: 700px;
		}

		/* Dropzone Hover Fullpage*/
		.dz-drag-hover .dropzone-fullpage {
			visibility:visible !important;
			opacity:1 !important;
		}
		div.dropzone-fullpage
		{
			position: fixed; top: 0; left: 0;
			z-index: 9999999999;
			width: 100%; height: 100%;
			background-color: rgba(14,77,107,0.9);
			transition: visibility 175ms, opacity 175ms;
			padding:20px;
			border:0px;
		}
		.dropzone-fullpage .dz-wrapper {
			border:dashed 1px #f2f2f2;
			width: 100%; height: 100%;
		}
		.dropzone-fullpage .dz-default.dz-message:before {
			color:#f2f2f2;
			text-shadow: 0 1px 1px #000;
		}
		.dropzone-fullpage .dz-default.dz-message span {
			color:#f2f2f2;
			text-shadow: 0 1px 1px #000;
		}
		.dropzone-fullpage .dz-default.dz-message span>span {
			color:#f2f2f2;
		}

		.sidebar-light .nav-sidebar>.nav-item-open>.nav-link:not(.disabled), .sidebar-light .nav-sidebar>.nav-item>.nav-link.active {
			background-color: #eaeff3;
			color: #072148;
		}
		.sidebar-xs .sidebar-main .nav-sidebar > li:hover > a > span {
			display: block !important;
		}
		.sidebar-xs .sidebar-main .nav-sidebar > li > a > span {
			display: none;
			position: absolute;
			top: 0;
			right: -260px;
			background-color: #eaeff3;
			border: 1px solid #eaeff3;
			padding: 11px 8px 11px 0px;
			width: 260px;
			text-align: left;
			color: #072148;
			cursor: pointer;
			border-bottom-right-radius: 3px;
			border-top-right-radius: 3px;
		}
		.table-striped tbody tr:nth-of-type(odd) {
			background-color: #f1f8fe;
		}
		body {
			background-color: #f4f7f9;
		}
		.datatable-header-accent {
			background-color: #f0f0f0;
		}
		.dt-buttons>.btn+.btn {
			margin-left: 5px;
		}
		.dt-buttons>.btn {
			border-radius: 0.45em !important;
			line-height: 2;
		}
		.dataTables_filter input {
			line-height: 2;
		}
		.dataTables_length .select2-selection--single {
			line-height: 2;
		}
		.datatable-header {
			padding: .834rem 1rem 0 1rem;
		}
	</style>
	@yield('css_section')
</head>
<body class="@yield('body_class')">

<!-- Loading -->
<div class="yloading" id="loading-img">
	<div class="loader-container">
		<div class="theme_xbox theme_xbox_with_text">
			<div class="pace_progress" data-progress-text="60%" data-progress="60"></div>
			<div class="pace_activity"></div> <span>LOADING...</span>
		</div>
	</div>
</div>
<!-- Loading -->

<!-- Dropzone -->
<div style="visibility:hidden; opacity:0" class="dropzone-fullpage dropzone">
	<div class="dz-wrapper">
		<div class="dz-default dz-message"><span>Drop files here to start uploading (Max File Size: <strong>5Mb</strong>) <span>or CLICK HERE</span></span></div>
	</div>
</div>
<!-- Dropzone -->

<!-- Main navbar  072148 -->
<div class="navbar navbar-expand-md navbar-dark" style="background:#AA2B1D">
	{{-- <div class="navbar-brand wmin-200" style="padding-top: 6px; padding-bottom: 0px">
		<a href="{{ url('/') }}" class="d-inline-block" style="font-size: 24px; color: #F9C31C">
			<strong>Fuel Delivery Tracker</strong>
		</a>
	</div> --}}

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav">
			@if(Session::has('user'))
			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{ url('images/ypt-propict.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
					<span>{{Session::get('user')->fullname}}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="{{url('/logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
			@else
			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{ url('images/ypt-propict.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
					<span>Riski Ananda Widiya Putri</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
			@endif
		</ul>
	</div>
</div>
<!-- /main navbar -->

<!-- Secondary navbar -->
@yield('navbar')
<!-- /Secondary navbar -->

@if (trim($__env->yieldContent('page_title')))
	<div class="page-header">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4>
					@if (trim($__env->yieldContent('url_back')))
						<a href="@yield('url_back')"><i class="icon-arrow-left52 mr-2 text-pink-800"></i></a>
					@else
						<a href="{{ url('') }}"><i class="icon-arrow-left52 mr-2 text-pink-800"></i></a>
					@endif
					@yield('page_title')
				</h4>
				<a href="" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			</div>
			<div class="header-elements py-0">
				<div class="breadcrumb">
					@yield('breadcrumb')
				</div>
			</div>

			@yield('page_title_right')
		</div>
	</div>
@else
	<p>&nbsp;</p>
@endif

<!-- Page container -->
<div class="page-content pt-0">
	<!-- Sidebar -->
	<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md align-self-start" style="background:#AA2B1D">
    <img src="{{url('images/logo.png')}}" width="100%"clas />
		<!-- Sidebar content -->
		<div class="sidebar-content pt-0">
			<div class="card card-sidebar-mobile">
				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{ url('images/kiki.jpg') }}" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">{{Session::get('user')->fullname}}</div>
								<div class="font-size-xs opacity-50">
									Sebagai {{Session::get('user')->role}}
								</div>
							</div>
							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->
				<!-- Main navigation -->
				<div class="card-body p-0">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<!-- Main -->
						<li class="nav-item">
							<a href="{{url('/')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
								<i class="icon-stats-bars"></i> <span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('/admin/drivers')}}" class="nav-link {{ Request::is('/admin/drivers') ? 'active' : '' }}">
								<i class="fa fa-user"></i> <span>Data Driver</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('/admin/supervisors')}}" class="nav-link {{ Request::is('/admin/supervisors') ? 'active' : '' }}">
								<i class="fa fa-user"></i> <span>Data Supervisor</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('/admin/spbus')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
								<i class="fa fa-building"></i> <span>Data SPBU</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('/admin/tasks')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
								<i class="icon-clipboard"></i> <span>Data Task</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /sidebar content -->
	</div>
	<div class="content-wrapper">
		<div class="content">
			@yield('content')
		</div>
	</div>
</div>
<!-- /page container -->



<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
		<span class="navbar-text">
			&copy; {{ date('Y') }}. by Fuel Delivery Tracker Information System
		</span>

		<ul class="navbar-nav ml-lg-auto">
			<li class="nav-item"><a href="" class="navbar-nav-link"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
		</ul>
	</div>
</div>
<!-- /footer -->

<!-- Core JS files -->
<script type="text/javascript" src="{{url('themes/limitless/global/js/main/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/main/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- Core JS files -->

<script type="text/javascript" src="{{url('themes/limitless/layout_4/js/app.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/extensions/buttons/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/tables/datatables/extensions/buttons/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/forms/validation/validate.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/forms/validation/additional-methods.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/notifications/noty.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/setting.js?v='.time())}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/pickers/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
<script type="text/javascript" src="{{url('themes/limitless/global/js/demo_pages/form_select2.js')}}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

@yield('js_section')

</body>
</html>
