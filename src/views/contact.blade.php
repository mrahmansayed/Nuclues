@extends('nuclues::frontend.layouts.app')

@section('content')

	<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Contact Us</h1>

					<!--=======  breadcrumb list  =======-->
					
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">contact us</li>
						</ul>
					
					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>
	
    <!--=======  End of breadcrumb area =======-->
    
	<!--=============================================
	=            section title  container      =
	=============================================-->
	
	<div class="section-title-container mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  section title  =======-->
					
					<div class="section-title section-title--one text-center">
						<p class="subtitle subtitle--deep">COME HAVE A LOOK</p>
						<h1>Contact detail</h1>
					</div>
					
					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of section title container ======-->
	

	<!--=============================================
	=            icon box area         =
	=============================================-->
	
	<div class="icon-box-area mb-100 mb-md-30 mb-sm-30">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->
					
					<div class="single-icon-box">
						<div class="icon-box-icon">
							<i class="ion-location"></i>
						</div>
						<div class="icon-box-content">
							<h3 class="title">ADDRESS</h3>
							<p class="content">1800 Abbot Kinney Blvd. Unit D & E Venice</p>
						</div>
					</div>
					
					<!--=======  End of single icon box  =======-->
				</div>
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->
					
					<div class="single-icon-box mb-10">
						<div class="icon-box-icon">
							<i class="ion-ios-telephone"></i>
						</div>
						<div class="icon-box-content">
							<h3 class="title">CONTACT</h3>
							<p class="content">Mobile: (+88) – 1990 – 6886 <span>Hotline: 1800 – 1102</span></p>
						</div>
					</div>
					
					<div class="single-icon-box">
						<div class="icon-box-icon">
							<i class="ion-ios-email"></i>
						</div>
						<div class="icon-box-content">
							<p class="content">	Mail: contact@lezadastore.com </p>
						</div>
					</div>
					
					<!--=======  End of single icon box  =======-->
				</div>
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->
					
					<div class="single-icon-box">
						<div class="icon-box-icon">
							<i class="ion-ios-clock-outline"></i>
						</div>
						<div class="icon-box-content">
							<h3 class="title">HOUR OF OPERATION</h3>
							<p class="content">Monday – Friday : 09:00 – 20:00<span>Sunday & Saturday: 10:30 – 22:00</span></p>
						</div>
					</div>
					
					<!--=======  End of single icon box  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of icon box area  ======-->

	<!--=============================================
	=            box layout map         =
	=============================================-->
	
	<div class="box-layout-map-area mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  box layout map container  =======-->
					
					<div class="box-layout-map-container">
						<div class="google-map" id="google-map-one"></div>
					</div>
					
					<!--=======  End of box layout map container  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of box layout map  ======-->

	<!--=============================================
	=            section title  container      =
	=============================================-->
	
	<div class="section-title-container mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  section title  =======-->
					
					<div class="section-title section-title--one text-center">
						<h1>Get in touch</h1>
					</div>
					
					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of section title container ======-->


	<!--=============================================
	=            contact form area         =
	=============================================-->
	
	<div class="contact-form-area mb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="lezada-form contact-form">
						<form id="contact-form" action="{{ route('contact') }}" method="post">
							@csrf
							<div class="row">
								<div class="col-md-6 mb-40">
									<input type="text" placeholder="First Name *"  name="customerName" id="customername"  required>
								</div>
								<div class="col-md-6 mb-40">
									<input type="email" placeholder="Email *"  name="customerEmail" id="customerEmail"  required>
								</div>
								<div class="col-lg-12 mb-40">
									<input type="text" placeholder="Subject"  name="contactSubject" id="contactSubject">
								</div>
								<div class="col-lg-12 mb-40">
									<textarea  cols="30" rows="10" placeholder="Message" name="contactMessage" id="contactMessage"></textarea>
								</div>
								<div class="col-lg-12 text-center">
									<button type="submit" value="submit" id="submit" class="lezada-button lezada-button--medium">submit</button>
								</div>
							</div>
						</form>
					</div>
					<p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of contact form area  ======-->


@endsection