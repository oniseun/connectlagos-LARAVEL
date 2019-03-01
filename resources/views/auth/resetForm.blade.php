@extends('master.homePage')
@section('title','Reset Password')

@section('body')

	
	<!-- Breadcrumb -->
	<section class="breadcrumb">

        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-12">
    
                    <h1>Reset Password</h1>
    
    
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-9 sep">
    
    
                    <hr>
    
                    <form class="form-horizontal" class="reset-on-success" action="/finalize/reset" method="post">
    
    
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email address</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                            </div>
                        </div>
    
    
    
                        <div class="form-group ">
                            <div class="col-sm-offset-4 col-sm-8 text-left">
                                <button type="submit" class="btn btn-primary btn-lg">SEND RESET LINK</button>
                            </div>
                        </div>
    
    
    
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