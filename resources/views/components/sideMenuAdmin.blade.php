<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                             <a class="<?=mark_link('/admin/dashboard')?>" href="/admin/dashboard">
                                 <i class="fa fa-dashboard"></i>
                                 <span>Dashboard</span>
                             </a>
                         </li>

         <li>
          <a class="<?=mark_link('/admin/activities/list')?>" href="/admin/activities/list">
            <i class="fa  fa-bolt"></i>
            <span>All Activities</span>
          </a>
        </li>

        <li>
         <a class="<?=mark_link('/admin/wallet/transactions/list')?>" href="/admin/wallet/transactions/list">
           <i class="fa  fa-exchange"></i>
           <span>Wallet Transactions</span>
         </a>
       </li>


        <li>
         <a class="<?=mark_link('/admin/card/list')?>" href="/admin/card/list">
             <i class="fa fa-credit-card"></i>
           <span>Transport Cards</span>
         </a>
       </li>

       <li>
        <a class="<?=mark_link('/admin/card/transactions/list')?>" href="/admin/card/transactions/list">
          <i class="fa fa-briefcase"></i>
          <span>Transport Card Transactions</span>
        </a>
      </li>

        <li>
            <a class="<?=mark_link('/admin/profile')?>" href="/admin/profile">
                <i class="fa fa-user"></i>
                <span>Edit Profile</span>
            </a>
        </li>



        <li>
            <a class="<?=mark_link('/admin/logout')?>" href="/admin/logout">
                <i class="fa fa-power-off"></i>
                <span>Log Out</span>
            </a>
        </li>
            </ul>
                </div>
        <!-- sidebar menu end-->
    </div>
</aside>