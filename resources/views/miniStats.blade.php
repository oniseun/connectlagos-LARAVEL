
<div class="col-md-4">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-money"></i></span>
            <div class="mini-stat-info">
                <span><strike>N</strike>{{ $balance < 1000 ? number_format($balance,2) : number_format($balance) }}</span>
                Wallet Balance
            </div>
        </div>
    </div>
    
      <div class="col-md-4">
          <div class="mini-stat clearfix">
              <span class="mini-stat-icon pink "><i class="fa fa-credit-card"></i></span>
              <div class="mini-stat-info">
                  <span>{{ str_pad(number_format($userStats->transport_cards),3,'0',STR_PAD_LEFT) }}</span>
                  Transport Cards
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="mini-stat clearfix">
              <span class="mini-stat-icon green"><i class="fa fa-bolt"></i></span>
              <div class="mini-stat-info">
                  <span>{{ str_pad(number_format($userStats->user_activities),3,'0',STR_PAD_LEFT) }}</span>
                  Activities
              </div>
          </div>
      </div>