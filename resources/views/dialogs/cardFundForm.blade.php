
@extends('master.profileDialogs')
@section('title','Fund Card')

@section('body')
<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h3 style="padding:0; margin:0;"><b><i class="fa  fa-arrow-circle-o-up"></i> <span>Fund Card</span></b></h3>
            </div>
        </section>
      </div>
    
    <div class="col-md-12">
      <section class="panel">
          <header class="panel-heading">
            <?php
              $trans_ref = uniqid().md5(uniqid());
             ?>
            <i class="fa  fa-money"></i>  CURRENT WALLET BALANCE : <b><strike>N</strike>{{ $balance < 1000 ? number_format($balance,2) : number_format($balance) }}</b>
          </header>
          <div class="panel-body">
    
            <form class="form-horizontal bucket-form" method="post" action="/admin/finalize/fund/card">
            @csrf
            
            <div class="form-group">
            <label for="amount" class="col-sm-3 control-label">Transaction REF:</label>
            <div class="col-sm-6">
            <button disabled="disabled" class="btn btn-primary text-center expand"><b>{{ $trans_ref }}</b></button>
            </div>
            </div>
    
            <div class="form-group">
            <label class="col-sm-3 control-label">Card Number</label>
            <div class="col-sm-6">
            <button disabled="disabled" class="btn btn-primary text-center expand"><b>{{ $cardInfo->card_number }}</b></button>
            </div>
            </div>
    
            <div class="form-group">
            <label class="col-sm-3 control-label">Card Provider</label>
            <div class="col-sm-6">
            <button disabled="disabled" class="btn btn-primary text-center expand"><b>{{ $cardInfo->card_provider }}</b></button>
            </div>
            </div>
    
            <input type="hidden" value="{{ $trans_ref }}" name="trans_ref" />
            <input type="hidden" value="{{ $cardInfo->ref_id }}" name="ref_id" />
            <div class="form-group">
            <label for="amount" class="col-sm-3 control-label">Amount</label>
            <div class="col-sm-6">
            <input type="number" name="amount" class="form-control round-input" id="amount" value="500" placeholder="">
            </div>
            </div>
    
    
            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 text-lrft">
            <button type="submit" class="btn btn-primary btn-round">Fund Card</button>
            <a href="#" type="submit" data-dismiss="modal" onclick="window.close()" class="btn btn-danger btn-round">Cancel</a>
            </div>
            </div>
    
            </form>
    
          </div>
      </section>
    </div>

    @endsection