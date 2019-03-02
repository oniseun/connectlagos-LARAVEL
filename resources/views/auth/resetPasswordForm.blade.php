@extends('master.homePage')
@section('title','Create New Password')

@section('body')

	
	<!-- Breadcrumb -->
	<section class="breadcrumb">

        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-12">
    
                    <h1>Create New Password</h1>
    
    
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-9 sep">
    
    
                    <hr>
    
                    <form class="form-horizontal" class="reset-on-success" action="/finalize/reset/password" method="post">
                        @csrf

                        <input type="hidden" name="reset_code" value="{{ $reset_code }}" />
                        
    
                        <p class="return-message">
                        </p>
                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">Email address</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                            </div>
                        </div>

                        <div class="form-group">
                                <label class="col-sm-4 control-label" for="new_password">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="new_password" id="new_password" class="form-control round-input" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="confirm_password">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="confirm_password" id="confirm_password"  class="form-control round-input" placeholder="">
                                </div>
                            </div>
    
    
    
                        <div class="form-group ">
                            <div class="col-sm-offset-4 col-sm-8 text-left">
                                <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
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