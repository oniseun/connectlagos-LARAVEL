@extends('master.homePage')
@section('title','Home')

@section('body')
<!-- Main Slider -->
    
	<section class="slider-container" style="background-image: url(/assets-public/images/slide-img-1-bg.png);">

        <div class="container">
    
            <div class="row">
    
                <div class="col-md-12">
    
                    <div class="slides">
              <?php
                $slide_list =[
                              ['slide-img-1.png','Register your profile',
                              'register with us and get your profile set up in a few seconds. Manage your dashboard, fund your walle, add unlimited transport cards.. and so on.. Its free fast and easy. ','right'],
                              ['slide-img-2.png','Top up your transport cards',
                              'No need to stress over making payments at the bus stop, top up your card online - Fund you wallet, add a card and top up card from your wallet. easy, safe and fast!!','left'],
                              ['slide-img-3.png','Connect with commuters around you',
                              'Connect with other commuters in your location. Share your stories, images and location.. interact and get informed on live traffic trends','right'],
    
                            ];
    
                            foreach($slide_list as $slide):
    
                            list($image,$title,$description,$position)=$slide;
    
              ?>
    
                        <!-- Slide 1 -->
              <div class="slide"  data-bg="/assets-public/images/slide-img-1-bg.png">
    
                
                  @if($position === 'left')
                <div class="slide-image">
    
                  <a href="#">
                    <img src="/assets-public/images/<?=$image?>" class="img-responsive" />
                  </a>
                </div>
                @endif
    
                            <div class="slide-content <?=$position === 'left' ? 'text-right':'';?>" >
                                <h2>
                                    <small>CONNECT - LAGOS</small>
                                    <?=$title?>
                                </h2>
    
                                <p>
                                    <?=$description?>
                                </p>
                            </div>
                <?php
                  if($position === 'right')
                  {
                 ?>
                            <div class="slide-image">
    
                                <a href="#">
                                    <img src="/assets-public/images/<?=$image?>" class="img-responsive" />
                                </a>
                            </div>
                <?php
              }
                 ?>
    
                        </div>
      <?php
    endforeach;
       ?>
    
    
    
                        <!-- Slider navigation -->					<div class="slides-nextprev-nav">
                            <a href="#" class="prev">
                                <i class="entypo-left-open-mini"></i>
                            </a>
                            <a href="#" class="next">
                                <i class="entypo-right-open-mini"></i>
                            </a>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    <!-- Features Blocks --><section class="features-blocks">
    
        <div class="container">
    
            <div class="row vspace"><!-- "vspace" class is added to distinct this row -->
          <?php
            $feature_list =[
                          ['traffic-cone','Plan your journey',
                          'know when the next buses would depart and possibly arrive at destination, trip cost calculator to know how much it would cost  '],
                          ['credit-card','Top up your transport cards',
                          ' Fund your wallet from your dashboard and top up any card you\'ve added. Its easy, safe and fast!!'],
                          ['chat','News feed',
                          ' Connect and share updates with other commuters in your location'],
    
                        ];
    
                        foreach($feature_list as $feature):
    
                        list($icon,$title,$description)=$feature;
    
          ?>
                <div class="col-sm-4">
    
                    <div class="feature-block">
                        <h3>
                            <i class="entypo-<?=$icon?>"></i>
                            <?=$title?>
                        </h3>
    
                        <p>
                            <?=$description?>
                        </p>
                    </div>
    
                </div>
          <?php
        endforeach;
           ?>
    
    
            </div>
    
            <!-- Separator -->
            <div class="row">
                <div class="col-md-12">
                    <hr />
                </div>
            </div>
    
        <div class="row vspace"><!-- "vspace" class is added to distinct this row -->
          <?php
            $feature_list =[
                          ['air','Travel update',
                          'Get unique important updates on weather, road condition, community vices, accidents and so on. '],
                          ['globe','Map',
                          ' Keep up tabs on your location with our integrated GPS services on google maps API'],
                          ['chart-area','Travel reports',
                          ' Get your activity logs update and detailed technical reports sent to you at intervals'],
    
                        ];
    
                        foreach($feature_list as $feature):
    
                        list($icon,$title,$description)=$feature;
    
          ?>
          <div class="col-sm-4">
    
            <div class="feature-block">
              <h3>
                <i class="entypo-<?=$icon?>"></i>
                <?=$title?>
              </h3>
    
              <p>
                <?=$description?>
              </p>
            </div>
    
          </div>
          <?php
        endforeach;
           ?>
    
    
        </div>
    
    
    
        </div>
    
    </section>
    <!-- Portfolio -->
    <!-- Call for Action Button --><div class="container">
        <div class="row vspace">
            <div class="col-md-12">
    
                <div class="callout-action">
                    <h2>Join the largest transport network in Nigeria </h2>
    
                    <div class="callout-button">
                        <a href="/login" class="btn btn-success">LOGIN</a>
                    </div><div class="callout-button">
                        <a href="/register" class="btn btn-secondary">Sign up</a>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    <!-- Testimonails --><section class="testimonials-container">
    
        <div class="container">
    
            <div class="col-md-12">
    
                <div class="testimonials carousel slide" data-interval="8000">
    
                    <div class="carousel-inner">
    
                        <div class="item active">
    
                            <blockquote>
                                <p>
                                    access multiple cards on one account, and even top-up the card (or other cards) remotely (top-up your son’s card from work etc)
                                </p>
                                <small>
                                    <cite>connect lagos</cite> - Cards
                                </small>
                            </blockquote>
    
                        </div>
    
                        <div class="item">
    
                            <blockquote>
                                <p>
                                    Integrated with google map to show your location and the various Primero/LAMATA bus stops close by
                                </p>
                                <small>
                                    <cite>connect lagos</cite> - Integration
                                </small>
                            </blockquote>
    
                        </div>
    
                        <div class="item">
    
                            <blockquote>
                                <p>
                                    Top-up ypur card from within the app using typical EMV payment methods or more <br> i.e. Mastercard, Visa, Verve, eTranzact, Paypal, Paga
                                </p>
                                <small>
                                    <cite>connect lagos</cite> - Payments
                                </small>
                            </blockquote>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    
    <!-- Client Logos --><section class="clients-logos-container">
    
        <div class="container">
    
            <div class="row">
    
                <div class="client-logos carousel slide" data-ride="carousel" data-interval="5000">
    
                    <div class="carousel-inner">
    
                        <div class="item active">
    
                            <a href="#">
                                <img src="/assets-public/images/primero.png" />
                            </a>
    
                            <a href="#">
                                <img src="/assets-public/images/lamata.png" />
                            </a>
    
                            <a href="#">
                                <img src="/assets-public/images/sterling.png" />
                            </a>
    
                            <a href="#">
                                <img src="/assets-public/images/jayden.png" />
                            </a>
    
                        </div>
    
                        <div class="item">
    
                <a href="#">
                                <img src="/assets-public/images/sterling.png" />
                            </a>
    
                            <a href="#">
                                <img src="/assets-public/images/jayden.png" />
                            </a>
    
    
                <a href="#">
                  <img src="/assets-public/images/primero.png" />
                </a>
    
                <a href="#">
                  <img src="/assets-public/images/lamata.png" />
                </a>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>

    @include('components.2ndFooter')
    @endsection