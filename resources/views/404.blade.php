@extends('master.homePage')
@section('title')
Page Not Found
@endsection
@section('body')
  
      
     <!-- Breadcrumb -->
	<section class="breadcrumb">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <h1>Page Not Found</h1>

                            <ol class="breadcrumb bc-3">
                        <li>
                <a href="/home"><i class="entypo-home"></i>Home</a>
            </li>
                <li class="active">

                            <strong>Page Not Found</strong>
                    </li>
                    </ol>

            </div>

        </div>

    </div>

</section>


<section class="contact-container">

    <div class="container">

        <div class="row">

          <div class="col-md-offset-2 col-md-8">
      
            <section class="panel">
                <div class="panel-body">
                    <center>
                        <h1> <p> <strong>The page you requested was not found on this server </strong> </p> </h1>
                        <hr>
                       
                            <a href="/home" type="button" class="btn btn-default btn-round btn-lg">Back to home</a>
                    </center>

                        
                   
      
                </div>
            </section>
      
      
      
      
      
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

      @endsection
