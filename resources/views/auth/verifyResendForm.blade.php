
@extends('master.profilePage')
@section('title')
Send verification Link
@endsection
@section('body')

<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h2 style="padding:0; margin:0;"><b> Verify Link </b></h2>
            </div>
        </section>
      </div>
      
          <div class="col-lg-offset-3 col-md-6">
      
            <section class="panel">
                <header class="panel-heading">
                    Verification Link Resent
                </header>
                <div class="panel-body">
                    <center>
                        <h1> Verification Link resent </h1>
                        <p> <strong>Check your mail</strong> </p>
                            <a href="/admin/dashboard" type="button" class="btn btn-default btn-round btn-lg">Back to dashboard</a>
                    </center>

                        
                   
      
                </div>
            </section>
      
      
      
      
      
          </div>

     
      @endsection
