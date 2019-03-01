
@extends('master.profilePage')
@section('title')
Logout Profile - {{ $userInfo->fullname }}
@endsection
@section('body')

<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h2 style="padding:0; margin:0;"><b><i class="fa fa-power-off"></i>  Logout </b></h2>
            </div>
        </section>
      </div>
      
          <div class="col-lg-offset-3 col-md-6">
      
            <section class="panel">
                <header class="panel-heading">
                  <i class="fa fa-power-off"></i>
                    Logout out of current session.
                </header>
                <div class="panel-body">
                    <form class="form-horizontal bucket-form" method="post" action="/admin/finalize/logout">
                        @csrf
                      <p class="return-message"></p>
                      <input type="hidden" name="logout" value="yes" />
                      <div class="feed-box text-center">
                          <section class="panel">
                              <div class="panel-body">
                                  <div class="corner-ribon blue-ribon">
                                      <i class="fa fa-power-off"></i>
                                  </div>
                                  <a href="widget.html#">
                                      <img alt="" src="/{{ $userInfo->photo }}">
                                  </a>
                                  <h1>{{ $userInfo->fullname }}</h1>
                                  <p>Are you sure you want to logout?</p>
                              </div>
                          </section>
                      </div>
                      <hr>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6 text-center">
                                <button type="submit" class="btn btn-primary btn-round">Logout</button>
                                <a href="/admin/dashboard" type="button" class="btn btn-default btn-round">Cancel</a>
                            </div>
                        </div>
      
                    </form>
                </div>
            </section>
      
      
      
      
      
          </div>

     
      @endsection
