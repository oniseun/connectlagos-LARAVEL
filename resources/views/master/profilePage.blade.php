 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>

    <link rel="shortcut icon" href="">
    <title>@yield('title') | Admin | Connect Lagos</title>
<!--Core CSS -->
<link href="/assets-admin/bs3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/assets-admin/js/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="/assets-admin/js/bootstrap-datepicker/css/datepicker.css" />
<link href="/assets-admin/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
<link href="/assets-admin/css/bootstrap-reset.css" rel="stylesheet">
<link href="/assets-admin/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="/assets-admin/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
<link href="/assets-admin/css/clndr.css" rel="stylesheet">
<!--clock css-->
<link href="/assets-admin/js/css3clock/css/style.css" rel="stylesheet">
<!--Morris Chart CSS -->
<link rel="stylesheet" href="/assets-admin/js/morris-chart/morris.css">
<!-- Custom styles for this template -->
<link href="/assets-admin/css/style.css" rel="stylesheet">
<link href="/assets-admin/css/style-responsive.css" rel="stylesheet"/>
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]>
<script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style>
.bucket-form input,.bucket-form select,.bucket-form textarea{color:#666;}
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
<section id="container">
<!--header start-->
@include('components.headerAdmin')
<!--header end-->
<!--sidebar start-->
@include('components.sideMenuAdmin')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<section class="wrapper">





<div class="row">
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
</div>


</section>
</section>
<!--main content end-->

</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="/assets-admin/js/jquery.js"></script>
<script src="/assets-admin/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="/assets-admin/bs3/js/bootstrap.min.js"></script>
<script src="/assets-admin/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/assets-admin/js/jquery.scrollTo.min.js"></script>
<script src="/assets-admin/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/assets-admin/js/jquery.nicescroll.js"></script>
<script src="/assets-admin/js/skycons/skycons.js"></script>
<script src="/assets-admin/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="/assets-admin/js/calendar/clndr.js"></script>
<script src="/assets-admin/js/underscore-min.js"></script>
<script src="/assets-admin/js/calendar/moment-2.2.1.js"></script>
<script src="/assets-admin/js/evnt.calendar.init.js"></script>
<!--clock init-->
<script src="/assets-admin/js/css3clock/js/css3clock.js"></script>
<script src="/assets-admin/js/dashboard.js"></script>
<script src="/assets-admin/js/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script src="/assets-admin/js/scripts.js"></script>
<!--script for this page-->

<script type="text/javascript" src="/assets-admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets-admin/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>

<script src="/assets-admin/js/advanced-form.js"></script>
<script src="/assets-admin/js/formdata.js"></script>
<script src="/assets-admin/js/main.js"></script>
<script>
/* on click of ajax button*/
$(function(){
  $('body').on('click','.ajax-submit',
  function (e)
  {
    var $loading_circle = '<div class="spinning-circle">  </div>';
    e.preventDefault();
    send_form_data($(this).parents('form'), '.return-message', $loading_circle);

  });

  $('body').on('click','[delete-alert]',
  function (e)
  {
    e.preventDefault();
    var url = $(this).attr('delete-url');
    var msg = $(this).attr('delete-alert');
    var prt = $(this).attr('delete-parent');
    var csrf_token = $(this).attr('csrf_token');
    var ref_id = $(this).attr('ref_id');
    var parent = $(this).parents(prt);
    var r = confirm(msg);

      if (r == true) {
          parent.remove();

          $.ajax({
                  type: "POST",
                  url: url,
                  data: {_token : csrf_token, ref_id : ref_id},
                  success: function(result)
                  {
                    alert('Card removed successfully');
                  }
                });
      }

  });

});

</script>

@yield('scripts')

</body>
</html>
