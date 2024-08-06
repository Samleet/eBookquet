<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="google-site-verification" content="8AQQt9RBZDF2JnM6XDSUrWOIGpwgJmQoKpx3WVZu7C0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
	<title>{{ ($title.' :: '.env('APP_NAME')) }}</title>
	<link rel="shortcut icon" href="/themes/xenalite/images/favicon.png"/>
    <link rel="stylesheet" href="/themes/xenalite/css/vendors/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/vendors/bootstrap/switch.css"/>
	<link rel="stylesheet" href="/themes/xenalite/css/vendors/toastr.plugins/build/toastr.min.css"/>
	<link rel="stylesheet" href="/themes/xenalite/css/vendors/datepicker/timepicker.min.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/animate.min.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/vendors/font-awesome/font-awesome.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/vendors/ionicon-icon/ion-icon.min.css"/>
	<link rel="stylesheet" href="/themes/xenalite/css/vendors/quill/quill.snow.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/app.css"/>
    <link rel="stylesheet" href="/themes/xenalite/css/custom.css"/>

	<script src="/themes/xenalite/js/jquery.js"></script>
	<script src="/themes/xenalite/js/vendors/datepicker/timepicker.min.js"></script>
	<script src="/themes/xenalite/js/vendors/bootstrap/bootstrap.min.js"></script>
	<script src="/themes/xenalite/js/vendors/toastr.plugins/build/toastr.min.js"></script>
    <script src="/themes/xenalite/js/vendors/jsql-z-min/js/jsql.zero.min.js"></script>
	<script src="/themes/xenalite/js/vendors/clipboard/clipboard.min.js"></script>
    <script src="/themes/xenalite/js/vendors/sweetalert/src/sweetalert.min.js"></script>
	<script src="/themes/xenalite/js/wowjs.min-sfx.js"></script>
	<script src="/themes/xenalite/js/vendors/countdown-js/countdown.js"></script>
    <script src="/themes/xenalite/js/FileLoader_Api.js"></script>
    <script src="/themes/xenalite/js/vendors/lightDB-v1.0.2/lightDB-v1.0.2.js"></script>
	<script src="/themes/xenalite/js/vendors/screenshot.js/html2canvas.min.js"></script>
	<script src="/themes/xenalite/js/vendors/screenshot.js/screenshot.min.js"></script>
	<script src="/themes/xenalite/js/vendors/payments/paystack/paystackClient.js"></script>
	<script src="/themes/xenalite/js/vendors/quill/quill.min.js"></script>
	<script src="/themes/xenalite/js/vendors/quill/image-resize.min.js"></script>
	<script src="/themes/xenalite/js/vendors/scrollbar/smooth-scrollbar.js"></script>
	<script src="/themes/xenalite/js/app.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-4VRL78CCQX"></script>
	<script>
		window.dataLayer = window.dataLayer || []; 
		function gtag(){ 
			dataLayer.push(arguments) 
		}
		gtag('js', new Date()); 
		gtag('config', 'G-4VRL78CCQX');
	</script>

	<script async id="vb"> wow = new WOW({mobile: true, live: true}); wow.init(); </script>
</head>
<body>
	<section class="App">

        @yield('content')

    </section>

    <script>
        @if(session()->get('message'))

        (() => toastr['{{ session()->get('status') }}']('{{session()->get('message')}}'))();

        @endif

    </script>
</body>
</html>