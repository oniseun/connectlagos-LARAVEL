
@extends('master.profilePage')
@section('title','Dashboard')

@section('body')

<div class="col-md-8">
        <!--mini statistics start-->
        <div class="row mini-stats-container">
  
  
  
        </div>
        <!--mini statistics end-->
  
  
        <div class="row">
  
            <!-- Transport Cards-->
            <div class="col-md-12">
              <section class="panel">
                  <header class="panel-heading">
                      <b><i class="fa fa-credit-card"></i> Transport Cards</b>
                      <span class="tools pull-right">
                        <span href="#" class="label label-warning label-mini refresh-card" style="color:#fff;cursor:pointer;"><span class="fa fa-repeat"></span> refresh</span>
                      </span>
  
                  </header>
                  <div class="panel-body">
                    <table class="table  table-striped general-table card-container" >
  
                    </table>
                  </div>
              </section>
              <!--/ Transport Cards-->
  
              <!-- Activities-->
              <section class="panel">
                  <header class="panel-heading">
                    <b><i class="fa  fa-bolt"></i>  Recent Activities</b>
                      <span class="tools pull-right">
                        <span href="#" class="label label-warning label-mini refresh-activity" style="color:#fff;cursor:pointer;"><i class="fa fa-repeat"></i> refresh</span>
                      </span>
                  </header>
                  <div class="panel-body">
                    <table class="table  table-striped general-table activity-container" >
  
                    </table>
  
                  </div>
              </section>
              <!--/ Activities-->
  
  
            </div>
  
        </div>
        <!-- Dashboard List -->
  
      </div>
  
      <div class="col-md-4">
        @include('components.calenderClock')
  
      </div>

        @section('scripts')   
        <script>

                var $data_list_link = '/admin/card/ajax/list/few';
                var $data_list_link2 = '/admin/activities/ajax/list/few';
                var $data_list_link3 = '/admin/stats';
                var $loading_circle = '<div class="spinning-circle">  </div>';
                var $container_class = '.card-container';
                var $container_class2 = '.activity-container';
                var $container_class3 = '.mini-stats-container';
                
                $(function(){
                
                 /* auto load all ajax containers with their url links  */
                 xloader($data_list_link, $container_class, $loading_circle);
                 xloader($data_list_link2, $container_class2, $loading_circle);
                  xloader($data_list_link3, $container_class3, $loading_circle);
                
                 /* on click of refresh button */
                 $('body').on('click','.refresh-card',
                 function (e)
                 {
                   xloader($data_list_link, $container_class, $loading_circle);
                
                 });
                
                 /* on click of refresh button */
                 $('body').on('click','.refresh-activity',
                 function (e)
                 {
                   xloader($data_list_link2, $container_class2, $loading_circle);
                
                 });
                
                 /* on click of refresh button */
                 $('body').on('click','.refresh-stats',
                 function (e)
                 {
                   xloader($data_list_link3, $container_class3, $loading_circle);
                
                 });
                
                
                
                 });
                 </script>
        @endsection

@endsection