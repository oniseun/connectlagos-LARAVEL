
@extends('master.profilePage')
@section('title')
Page not Found
@endsection
@section('body')

<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h2 style="padding:0; margin:0;"><b> Page Not Found</b></h2>
            </div>
        </section>
      </div>
      
          <div class="col-lg-offset-3 col-md-6">
      
            <section class="panel">
                <div class="panel-body">
                    <center>
                        <h1> Page Not Found </h1>
                        <p> <strong>the page you requested was not found on this server</strong> </p>
                            <a href="/admin/dashboard" type="button" class="btn btn-default btn-round btn-lg">Back to dashboard</a>
                    </center>

                        
                   
      
                </div>
            </section>
      
      
      
      
      
          </div>

     
      @endsection
