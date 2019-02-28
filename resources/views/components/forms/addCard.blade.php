<form class="form-horizontal bucket-form reset-on-success" method="post" action="/admin/finalize/add/card">
@csrf
    <p class="return-message"></p>
    <div class="form-group">
    <label for="card_provider" class="col-sm-3 control-label">Card Provider</label>
    <div class="col-sm-6">
    <select class="form-control round-input" id="card_provider" name="card_provider">
    <option value="primero">Primero transport Service</option>
    </select>
    </div>
    </div>
    
    
    <div class="form-group">
        <label for="card_number" class="col-sm-3 control-label">Card Number</label>
        <div class="col-sm-6">
        <input type="number" name="card_number" class="form-control round-input" id="card_number" placeholder="">
        </div>
    </div>
    
    
    <div class="form-group">
    <label  class="col-sm-3 control-label">Expiry Date</label>
            <div class="col-sm-2">
                    <select class="form-control round-input" id="expiry_month" name="expiry_month">
                    
                    @for($i=1 ; $i<13 ; $i++)
                    
                    <option value="{{ $i }}">{{ str_pad($i,2,0,STR_PAD_LEFT) }}</option>
                    
                    @endfor
                    
                    </select>
            </div>
            <div class="col-sm-4">
                    <select class="form-control round-input" id="expiry_year" name="expiry_year">
                    
                    @for($i = date("Y") + 5 ; $i >= date("Y")-5 ; $i--)
                    
                    <option value="{{ $i }}" <?=$i==date("Y")?'selected="selected"':'';?>>{{ $i }}</option>
                    
                    @endfor
                    
                    </select>
            </div>
    </div>
    
    
    
    
    <div class="form-group">
    <label for="owners_name" class="col-sm-3 control-label">Name On Card</label>
    <div class="col-sm-6">
    <input type="text" name="owners_name" class="form-control round-input" id="owners_name" placeholder="">
    </div>
    </div>
    
    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 text-lrft">
    <button type="submit" class="btn btn-primary btn-round ajax-submit">Add Card</button>
    <a href="#" type="submit" data-dismiss="modal" class="btn btn-danger btn-round">Cancel</a>
    </div>

    </div>
    
    </form>
    