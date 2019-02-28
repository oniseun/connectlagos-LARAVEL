@extends('master.homePage')
@section('title','About us')

@section('body')

<!-- Breadcrumb -->


<section class="breadcrumb">

	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<h1>About Us</h1>

							<ol class="breadcrumb bc-3">
						<li>
				<a href="/home"><i class="entypo-home"></i>Home</a>
			</li>
				<li class="active">

							<strong>About</strong>
					</li>
					</ol>

			</div>

		</div>

	</div>

</section>


<!-- About Us Text --><section class="content-section">

	<div class="container">

		<div class="row">

			<div class="col-sm-7">

				<h3>The Company</h3>

				<p>No other city is as recognised by its transport system in africa as Lagos. Its yellow buses, blue brts and trains are known the world over.

Every day more than 2 million journeys are made across our network. <br>We do all we can to keep the city moving, working and growing and to make life in our city better.</p><p>

We listen to, and act upon, feedback and complaints to constantly improve our services and work with communities, representative groups, businesses and many other stakeholders to shape transport provision in Lagos.

Customers are at the heart of what we do, and every journey matters.</p>


			</div>

			<div class="col-sm-5">

				<a href="#">
					<img src="/assets-public/images/about-img-1.png" class="img-rounded" />
				</a>

			</div>

		</div>

	</div>

</section>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Services</h3>
			<br />
		</div>
	</div>
</div>

<!-- Skills and Info Section --><section class="content-section bg-gray">

	<div class="container">

		<div class="row">

			<div class="col-md-6">

				<h5>24/7 Support Services</h5>

				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 100%">
					</div>
				</div>


				<h5>Website uptime</h5>

				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 90%">
					</div>
				</div>


				<h5>Payment Gateways</h5>

				<div class="progress progress-rounded">
					<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 95%">
					</div>
				</div>

			</div>

			<div class="col-sm-6">
				<h5>&nbsp;</h5>

				<p>This platform eases the typical stress associated with travelling around
  				Lagos by providing access to the various transport modes (buses, trains, ferries) all from within one website</p>
  				<p>We provide information relating to journey planning, status updates, ticket prices and the ability to purchase tickets online and upfront.</p>
    </div>

		</div>

	</div>

</section>


<!-- Members --><section class="content-section">

	<div class="container">

		<div class="row">

			<div class="col-sm-4">

				<div class="staff-member">

					<a class="image" href="#">
						<img src="/assets-public/images/staff-member.png" class="img-circle" />
					</a>

					<h4>
						<a href="#">Tayo Adeyeye </a>
						<small>Project Lead </small>
					</h4>

					<p>Jayden Resources Limited</p>

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

			<div class="col-sm-4">

				<div class="staff-member">

					<a class="image" href="#">
						<img src="/assets-public/images/staff-member.png" class="img-circle" />
					</a>

					<h4>
						<a href="#">Sunday Bakare </a>
						<small>Support</small>
					</h4>

					<p>Jayden Resources Limited</p>

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

			<div class="col-sm-4">

				<div class="staff-member">

					<a class="image" href="#">
						<img src="/assets-public/images/staff-member.png" class="img-circle" />
					</a>

					<h4>
						<a href="#">Dayo Aderugbo </a>
						<small>Support</small>
					</h4>

					<p>e-Purse Systems Limited</p>

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

@include('components.2ndFooter')
@endsection