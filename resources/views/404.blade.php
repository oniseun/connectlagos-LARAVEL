@extends('master.profilePage')
@section('title')
Page Not Found
@endsection
@section('body')

<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h2 style="padding:0; margin:0;"><b><i class="fa fa-times"></i>  Page Not Found </b></h2>
            </div>
        </section>
      </div>
      
          <div class="col-lg-offset-3 col-md-6">
      
            <section class="panel">
                <header class="panel-heading">
                  <i class="fa fa-power-off"></i>
                    Page not found
                </header>
                <div class="panel-body">
                    <center>
                        <h1>Page not found </h1>
                        <hr>
                        <p> <strong>the page you requested was not found on this server </strong> </p>
                            <a href="/home" type="button" class="btn btn-default btn-round btn-lg">Back to home</a>
                    </center>

                        
                   
      
                </div>
            </section>
      
      
      
      
      
          </div>

     
      @endsection
