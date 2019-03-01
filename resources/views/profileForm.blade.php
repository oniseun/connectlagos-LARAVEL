
@extends('master.profilePage')
@section('title')
User Profile - {{ $userInfo->fullname }}
@endsection
@section('body')

<div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
              <h2 style="padding:0; margin:0;"><b><i class="fa fa-user"></i>  Edit Profile Information</b></h2>
            </div>
        </section>
      </div>
      
          <div class="col-md-8">
      
            <section class="panel">
                <header class="panel-heading">
                  <i class="fa fa-info-circle"></i>
                    <b> Change Previous Information </b>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal bucket-form" method="post" action="/admin/finalize/update/profile/info">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-6">
                                <input type="email" id="email" name="email" value="{{ $userInfo->email }}" class="form-control round-input">
                            </div>
                        </div>
      
                        <div class="form-group">
                            <label for="fullname" class="col-sm-3 control-label">Fullname</label>
                            <div class="col-sm-6">
                                <input type="text" name="fullname" id="fullname" value ="{{ $userInfo->fullname }}" class="form-control round-input">
                            </div>
                        </div>
      
                        <div class="form-group">
                            <label for="loginid" class="col-sm-3 control-label">Loginid</label>
                            <div class="col-sm-6">
                                <input type="text" name="loginid" id="loginid" value ="{{ $userInfo->loginid }}" class="form-control round-input">
                            </div>
                        </div>
      
                        <div class="form-group">
                          <label for="gender" class="col-sm-3 control-label">Gender</label>
                          <div class="col-sm-6">
                            <select class="form-control round-input" id="gender" name="gender">
                                <option value="male" <?=toggle_select($userInfo->gender,'male' )?>>Male</option>
                               <option value="female" <?=toggle_select($userInfo->gender,'female' )?>>Female</option>
                            </select>
                          </div>
                        </div>
      
      
                        <div class="form-group">
                          <label for="phone" class="col-sm-3 control-label">Phone number</label>
                          <div class="col-sm-6">
                            <input type="text" name="phone" class="form-control round-input" value ="{{ $userInfo->phone }}" id="phone" placeholder="">
                          </div>
                        </div>
      
                        <div class="form-group">
                          <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>
                          <div class="col-sm-6">
                            <div data-date-viewmode="years"  data-date-format="dd-mm-yyyy" data-date="<?=date("d-m-Y",strtotime($userInfo->date_of_birth) )?>"  class="input-append date dpYears">
                                <input type="text" name="date_of_birth" id="date_of_birth" readonly="" value="<?=date("d-m-Y",strtotime($userInfo->date_of_birth)) ?>" size="16" class="form-control">
                                      <span class="input-group-btn add-on">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                      </span>
                            </div>
                          </div>
                        </div>
      
                        <div class="form-group">
                          <label for="about" class="col-sm-3 control-label">About you</label>
                          <div class="col-sm-6">
                            <textarea class="form-control" name="about" rows="4">{{ $userInfo->about }}</textarea>
                          </div>
                        </div>
      
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" class="btn btn-primary btn-round ajax-submit">Update info</button>
                                <a href="/admin/dashboard" type="button" class="btn btn-default btn-round">Cancel</a>
                            </div>
                        </div>
                        <p class="return-message"></p>
      
                    </form>
                </div>
            </section>
      
            <!-- change password -->
            <section class="panel" id="change-password">
                <header class="panel-heading">
                  <i class="fa fa-key"></i>
                  <b>  Change Password </b>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal bucket-form reset-on-success" method="post" action="/admin/finalize/update/profile/password" >
                        @csrf
                    <p class="return-message"></p>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="current_password">Current Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="current_password" id="current_password" class="form-control round-input" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="new_password">New Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="new_password" id="new_password" class="form-control round-input" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="confirm_password">Confirm Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="confirm_password" id="confirm_password"  class="form-control round-input" placeholder="">
                            </div>
                        </div>
      
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" class="btn btn-primary btn-round ajax-submit">Update password</button>
                            </div>
                        </div>
      
                    </form>
                </div>
            </section>
      
      
      
      
          </div>
      
          <div class="col-md-4">
            <!-- change password -->
            <section class="panel">
                <header class="panel-heading">
                  <i class="fa fa-camera"></i>
                    <b> Change Profile picture </b>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal bucket-form" method="post" action="finalize/update/profile/photo" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group text-center">
                          <h3>Profile Picture</h3>
                          <p>
                            <hr>
                          </p>
                          <div class="col-md-12" >
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="/{{ $userInfo->photo }}" alt="{{ $userInfo->fullname }}" />
                                      <p>
                                        <hr>
                                      </p>
                                  </div>
      
                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                  <div>
                                      <br>
                                             <span class="btn btn-white btn-file">
      
                                             <span class="fileupload-new"><i class="fa fa-camera"></i> Select image</span>
                                             <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                             <input type="file" class="default" name="photo" accept="image/jpeg,image/x-png"/>
                                             </span>
                                             <div class="text-center fileupload-exists">
                                               <hr>
                                                 <button type="submit" class="btn btn-primary btn-round ajax-submit"><i class="fa fa-upload"></i> Upload image</button>
                                             </div>
                                  </div>
                              </div>
      
                          </div>
                      </div>
                      <p class="return-message"></p>
      
                    </form>
                </div>
            </section>
      
      
          </div>

     
      @endsection
