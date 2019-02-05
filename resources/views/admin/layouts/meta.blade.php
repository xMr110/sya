<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
{{--semantic ui--}}
<link href="/assets/backend/semantic/semantic.css" rel="stylesheet" type="text/css">
<!-- Favicon icon -->
@if(isset($settings->favicon))
<link rel="icon" type="/image/png" sizes="16x16" href="{{ url('/storage/' . $settings->favicon) }}">
@endif
<title>Admin Panel</title>
<!-- Bootstrap Core CSS -->
<link href="/assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="/assets/backend/css/style.css" rel="stylesheet">
<!-- page css -->
<link href="/assets/backend/css/pages/file-upload.css" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="/assets/backend/css/colors/megna-dark.css" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!--alerts CSS -->
<link href="/assets/backend/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

<link href="/assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">



