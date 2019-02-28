@extends('master.homePage')
@section('title','Register')

@section('body')
    <!-- Breadcrumb -->
	<section class="breadcrumb">

        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-12">
    
                    <h1>Register your profile</h1>
    
                                <ol class="breadcrumb bc-3">
                            <li>
                    <a href="/home"><i class="entypo-home"></i>Home</a>
                </li>
                    <li class="active">
    
                                <strong>register</strong>
                        </li>
                        </ol>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-9 sep">
    
    
                    <hr>
    
                    <form class="form-horizontal" class="reset-on-success" action="/finalize/register" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                            </div>
                        </div>
    
                        <div class="form-group">
                                <label for="fullname" class="col-sm-3 control-label">Fullname</label>
                                <div class="col-sm-6">
                                        <input type="text" name="fullname" id="fullname"  class="form-control round-input">
                                </div>
                        </div>
    
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone number</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control round-input" id="phone" placeholder="">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password here...">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="re-enter password ...">
                            </div>
                        </div>
    
                        <!-- <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username here...">
                            </div>
                        </div> -->
    
    
                        <div class="form-group">
                            <label for="date_of_birth" class="col-sm-3 control-label">Date of Birth</label>
                            <div class="col-sm-6">
                                <div data-date-viewmode="years"  data-date-format="dd-mm-yyyy" data-date=""  class="input-append date dpYears">
                                        <input type="text" name="date_of_birth" id="date_of_birth" readonly="" value="- Select date -" size="16" class="form-control">
                                                    <span class="input-group-btn add-on">
                                                    </span>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="form-group">
                            <label for="gender" class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="gender" name="gender">
                                        <option value="male">Male</option>
                                     <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
    
    
                        <!-- <div class="form-group">
                            <label for="about" class="col-sm-3 control-label">About you</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="about" rows="4"></textarea>
                            </div>
                        </div> -->
    
    
                        <div class="form-group ">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary btn-lg ajax-submit">SIGN UP</button>
                            </div>
                        </div>
                        <p class="return-message"></p>
    
                        <p  class="col-sm-offset-3 col-sm-8 text-left">
                            Already have an account? <strong><a href="/login" >login here</a></strong>
                        </p>
    
                    </form>
    
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
            @section('scripts')
                <script type="text/javascript" src="/assets-admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
                <script type="text/javascript" src="/assets-admin/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>

                <script src="/assets-admin/js/advanced-form.js"></script>

                <script src="/assets-admin/js/formdata.js"></script>
                <script src="/assets-admin/js/worker.js"></script>
                <script>
                /* on click of ajax button*/
                $(function(){
                    $('body').on('click','.ajax-submit',
                    function (e)
                    {
                        var $loading_circle = '<div class="spinning-circle">  </div>';
                        e.preventDefault();
                        send_form_data($(this).parents('form'), '.return-message', $loading_circle);

                    });

                });

                </script>
            @endsection
    @endsection