
@extends('master.profilePage')
@section('title','Wallet Transactions')

@section('body')

<div class="col-md-12">
  <section class="panel">
      <div class="panel-body">
        <h2 style="padding:0; margin:0;"><b><i class="fa fa-exchange"></i>       <span>Wallet Transactions</span></b></h2>
      </div>
  </section>
</div>

<div class="col-md-12">

      <section class="panel">
          <header class="panel-heading">
            <form action="main-view/wallet-transactions.php" method="post" class="bucket-form search-form">

              <div class="input-group">

                <span class="input-group-btn">

                  <a href="#"  class="btn btn-info refresh-main-view btn-lg" type="button" >
                     <span class="glyphicon glyphicon-repeat"  aria-hidden="true"></span>
                                        </a>

                </span>

              <input type="text" name="q" class="form-control input-lg search-textbox"
              placeholder="search wallet transactions">

              <span class="input-group-btn">
                <button class="btn btn-default  btn-lg search-form-btn" type="button">
                   <span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;
                </button>
              </span>

            </div>
          </form>

          </header>
          <div class="panel-body">
            <table class="table  table-striped general-table data-container" >

            </table>
          </div>
      </section>


    </div>

          @section('scripts') 
          <script>

                var $data_list_link = '/admin/wallet/transactions/ajax/list';
                var $loading_circle = '<div class="spinning-circle">  </div>';
                var $container_class = '.data-container';
                
                 $(function(){
                
                  /* auto load all ajax containers with their url links  */
                  xloader($data_list_link, $container_class, $loading_circle);
                
                
                 /* on click of refresh button */
                 $('body').on('click','.refresh-main-view',
                 function (e)
                 {
                
                   xloader($data_list_link, $container_class, $loading_circle);
                
                 });
                
                 /* on submit of form */
                 $('body').on('submit','.search-form',
                 function (e)
                 {
                   e.preventDefault();
                   search_data($(this), $container_class, $loading_circle);
                
                 });
                
                /* When search form button is clicked */
                
                 $('body').on('click', '.search-form-btn',
                 function (e)
                 {
                   e.preventDefault();
                   search_data($(this).parents('form'), $container_class, $loading_circle);
                 });
                
                /* When next button is clicked DESIGN LIKE : <p><button href="url" class="next-view-btn">next</button></p> */
                 $("body").on('click', '.next-view-btn',
                 function(){
                
                   var get_url = $(this).attr('href');
                   var list_container = $($container_class);
                   var button_wrapper_to_remove = $(this).parent('p') ;
                
                   /* remove button */
                
                   $(this).remove();
                   var loading_text = $loading_circle;
                
                   // send through ajax
                   load_next_data(get_url, list_container, button_wrapper_to_remove, loading_text);
                
                       });
                
                });
                
                 </script>
                <!--script for this page-->
          @endsection
      @endsection
