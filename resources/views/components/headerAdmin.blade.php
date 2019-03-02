<?php
use App\Auth;
$userInfo = Auth::currentUser();


?>
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="/admin/dashboard" class="logo">
        <img src="/assets-admin/images/logo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row " id="top_menu">

  <div class="btn-gap">
      <button type="submit" class="btn btn-danger"
      open-dialog-url="/admin/dialogs/wallet/topup" dialog-height="500" dialog-width="800"><i class="fa fa-arrow-circle-o-up"></i> Top up wallet</button>
    <button type="submit" class="btn btn-info" data-toggle="modal" href="#card-form"><i class="fa fa-credit-card"></i> Add Transport Card</button>
    <button type="submit" class="btn btn-success refresh-stats"><i class="fa fa-repeat"></i> Refresh Balance</button>
    <!-- Transport card Modal -->
  <div class="modal fade" id="card-form" tabindex="-1" role="dialog" aria-labelledby="card-form-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-credit-card"></i> Add Transport Card</h4>
            </div>
            <div class="modal-body">
     @include('components.forms.addCard')
      </div>
      </div>
</div>
  </div>
  <!-- transport card modal -->


  </div>
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <!-- <input type="text" class="form-control search" placeholder=" Search"> -->
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="/{{ $userInfo->photo }}">
                <span class="username">{{ $userInfo->fullname }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <li>
               <a href="/admin/profile">
                 <i class="fa fa-user"></i>
                Edit Profile
               </a>
             </li>

              <li>
               <a href="/admin/profile#change-password">
                 <i class="fa fa-key"></i>
                 Change Password
               </a>
             </li>

             <li>
               <a href="/admin/logout">
                 <i class="fa fa-power-off"></i>
                 <span>Log Out</span>
               </a>
             </li>

            </ul>
        </li>

        <!-- <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li> -->
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>