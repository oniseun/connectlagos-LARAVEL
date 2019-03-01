@extends('master.homePage')
@section('title','Contact us')

@section('body')

<section class="contact-map" id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.622027853408!2d3.4154188141891932!3d6.442556095338965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2b0dfca011%3A0x96fed00393a81036!2s42+Norman+Williams+St%2C+Obalende%2C+Lagos!5e0!3m2!1sen!2sng!4v1491775859025"
    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    
    
    <section class="contact-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="col-sm-7 sep">
    
                    <h4>Get in touch with us, write us an e-mail!</h4>
    
                    <p>
                        If you want to comment or complain about any of our services, get in touch using the contact details in the sections below.
                    </p>
    
                    <form class="contact-form" role="form" method="post" action="/finalize/contact" enctype="application/x-www-form-urlencoded">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="full_name" class="form-control" placeholder="Name:" />
                        </div>
    
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="E-mail:" />
                        </div>
    
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder="Message:" rows="6"></textarea>
                        </div>
    
                        <div class="form-group text-right">
                            <button class="btn btn-primary" name="send">Send</button>
                        </div>
    
                    </form>
    
                </div>
    
                <div class="col-sm-offset-1 col-sm-4">
    
                    <div class="info-entry">
    
                        <h4>Address</h4>
    
                        <p>
                            42 Norman Williams Street,<br>
                     Ikoyi, <br>
                     Lagos state
    
                            <br />
                            <br />
    
                            <strong>Working Hours:</strong>
                            <br />
                            08:00 - 17:00 <br />
                            Monday to Friday
                            <br />
                            <br />
                        </p>
    
                    </div>
    
                    <div class="info-entry">
    
                        <h4>Call Us</h4>
    
                        <p>
                            Phone: +234–1–632046 <br />
                    Fax: +2348121826656 <br />
                    info@jaydenres.net
                        </p>
    
                        <ul class="social-networks">
                            <li>
                                <a href="#">
                                    <i class="entypo-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="entypo-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="entypo-facebook"></i>
                                </a>
                            </li>
                        </ul>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>

    @endsection