@extends('master.homePage')
@section('title','Login')

@section('body')

	<!-- Breadcrumb -->
	<section class="breadcrumb">

        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-12">
    
                    <h1>Login to your account</h1>
    
                                <ol class="breadcrumb bc-3">
                            <li>
                    <a href="/home"><i class="entypo-home"></i>Home</a>
                </li>
                    <li class="active">
    
                                <strong>login</strong>
                        </li>
                        </ol>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-9 sep">
    
    
                    <hr>
    
                    <form class="form-horizontal" class="reset-on-success" action="/finalize/login" method="post">
                        @csrf
                        <p class="return-message"></p>
    
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email address</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" autocomplete="off" class="form-control" id="email" placeholder="Enter email here...">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" autocomplete="off" value=""class="form-control" id="password" name="password" placeholder="Enter password here...">
                            </div>
                        </div>
                        <p  class="col-sm-offset-4 col-sm-8 text-left">
                            Forgot password? <strong><a href="/reset" >click here</a></strong>
                        </p>
    
    
                        <div class="form-group ">
                            <div class="col-sm-offset-4 col-sm-8 text-left">
                                <button type="submit" class="btn btn-success btn-lg ajax-submit">SIGN IN</button>
                                <!-- <a href="reset-password.php" type="submit" class="btn btn-default btn-lg ajax-submit">FORGOT PASSWORD ?</a> -->
                            </div>
                        </div>
    
                        <p  class="col-sm-offset-4 col-sm-8 text-left">
                            Don't have an account yet? <strong><a href="/register" >register for a free account here</a></strong>
                        </p>
    
                    </form>
    
                </div>
    
                <div class="col-sm-offset-1 col-sm-2">
    
                    <div class="info-entry">
    
    
                    </div>
    
                    <div class="info-entry">
    
    
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
            @section('scripts')
            <script src="/assets-admin/js/formdata.js"></script>
            <script src="/assets-admin/js/worker.js"></script>
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

            });

            </script>
            @endsection
    @endsection