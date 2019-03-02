
@extends('master.homePage')
@section('title','Email Verified')

@section('body')

	
	<!-- Breadcrumb -->
	<section class="breadcrumb">

        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-12">
    
                    <h1>Your Email has been verified!! </h1>
    
    
                    <a href="/home"  class="btn btn-primary btn-lg">Back to home</a>
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-9 sep">
    
    
                    <hr>
    
                    
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