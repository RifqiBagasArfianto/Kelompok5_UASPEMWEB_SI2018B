@extends('master/page')

@section('content')

<!--====== SERVICES PART START ======-->
<style type="text/css">
	.single-product-items .product-item-content span {
		font-size: 21px;
	}
	.seller {
		color: #fe7865;
		margin-left: 112px;
		margin-top: -25px;
		position: absolute;
	}

	.sell-user a:hover {
		color: #fe7865;
	}

	.seller i {
		background-color: #fe7865;
		padding: 5px;
		color: white;
		font-size: 10px;
		border-radius: 15px;
	}

	.single-info .info-content {
		padding-left: 20px;
	}

	.single-info .info-icon i {
		background-color: #fe7865;
		padding: 5px;
		color: white;
		font-size: 10px;
		border-radius: 15px;
	}

	.prod-img {
		max-height: 400px;
		object-fit: cover;
	}

</style>

<section id="service" class="services-area" style="padding-bottom:30px; padding-top: 180px">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title pb-30">
					<h5 class="mb-15">Service Details</h5>
					<h3 class="title mb-15"><?= $row->title ?></h3>
					<p><?= $row->description ?></p>
				</div> <!-- section title -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="services-left mt-45">
					<div class="services">
						<img class="prod-img" src="<?= URL::to('assets/uploads/'.$row->photo) ?>" alt="Product">
						<?php if(Session::get('loggedin') != "authorized") { ?>
							<a href="<?= URL::to("login") ?>" class="main-btn mt-30">Book Now <i class="lni-chevron-right"></i></a>
						<?php } else { ?>
							<a href="<?= URL::to("services/book/".$row->id) ?>" class="main-btn mt-30">Book Now <i class="lni-chevron-right"></i></a>
						<?php } ?>
					</div> <!-- services btn -->
				</div> <!-- services left -->
			</div>
			<div class="col-lg-6">
				
				<div class="services-right mt-45">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="location">
								<i class="lni-map-marker"></i> <?= $location[0] ?>
							</div>
							<div class="single-product-items mt-10">
								<div class="product-item-content text-left">
									<p>Service From
										<div class="sell-user">
											<a href="#" class="seller">
												<i class="lni-grid-alt"></i> 
											John Doe</a>
										</div>
									</p>
									<span class="regular-price dsc" style="margin-top: 10px"><?= $row->price - ($row->price * ($row->discount / 100)) ?></span>
									<span class="discount-price dsc"><?= $row->price ?></span>
								</div>
							</div>
							<div class="facility mt-10">
								<h5 class="mb-20">Facility</h5>
								<ul>
									<?php
									$fac = explode("|", $row->facility); 
									foreach($fac as $facs) 
										{ ?>
											<li>
												<div class="single-info mt-10">
													<div class="info-icon">
														<i class="bunder"></i>
													</div>
													<div class="info-content">
														<p><?= $facs ?></p>
													</div>
												</div> <!-- single info -->
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div> <!-- row -->
					</div> <!-- services right -->
				</div>
			</div> <!-- row -->
			<div class="section-title pt-50">
				<h5 class="mb-15">Location</h5>
			</div>
			<div class="maps mt-50">
				<div id="map" style="width:100%; min-height: 500px"></div>
			</div>
		</div> <!-- container -->
	</section>

	<!--====== SERVICES PART ENDS ======-->

@endsection