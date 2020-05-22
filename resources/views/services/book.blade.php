@extends('master/page')
@section('content')
<!--======  BLOG PART START ======-->
<style>
	.bank {
		-webkit-box-shadow: 0px 1px 21px -5px rgba(0,0,0,0.15);
		-moz-box-shadow: 0px 1px 21px -5px rgba(0,0,0,0.15);
		box-shadow: 0px 1px 21px -5px rgba(0,0,0,0.15);
		border:none;
		cursor:pointer;
	}

	.rekening .nomor {
		font-size: 20px;
		color: #fe7865;
	}

	.rekening {
		background-color: #f3f3f3;
		padding: 10px;
	}

	.single-info .info-icon i {
		background-color: #fe7865;
		padding: 5px;
		color: white;
		font-size: 10px;
		border-radius: 15px;
	}

</style>

<section id="blog" class="blog-area pt-125">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center pb-25">
					<h3 class="title mb-15">Book Details</h3>
					<p>Complete this following form to book our services</p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="justify-content-center">
			<div class="contact-form">
				<form id="contact-form" action="<?= URL::to("services/list") ?>" method="post" data-toggle="validator">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="text" name="name" placeholder="Enter Your Name" data-error="Name is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="email" name="email" placeholder="Enter Your Email" data-error="Valid email is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-12">
									<div class="single-form form-group">
										<input type="number" id="weight" name="weight" placeholder="Clothes Weight (Kg)" data-error="Valid email is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-form form-group">
								<textarea style="height:140px" name="address" rows=10 placeholder="Enter Your Address" data-error="Address is required." required="required"></textarea>
								<div class="help-block with-errors"></div>
							</div> <!-- single form -->
						</div>
						<div class="col-lg-12">
							<div class="payment-method mt-30">
								<div class="section-title pb-30">
									<h5 class="mb-15">Payment Method</h5>
									<div class="row">
										<div class="col-md-4">
											<?php foreach($bank as $banks) { ?>
											<div class="card bank mb-10" id="btn-bankid-<?= $banks->id ?>">
												<div class="card-body">
													<?= $banks->name ?>
													<input type="hidden" value="<?= $banks->rekening ?>" id="bankid-<?= $banks->id ?>">
												</div>
											</div>
											<?php } ?>
										</div>
										<div class="col-md-8">
											<div class="card">
												<div class="card-body">
													<h4> BANK </h4>
													<p>Transfer this following amount</p>
													<div class="row">
														<div class="col-md-6">
															<div class="rekening mt-15 text-center">
																<div class="info-content">
																	<i class="lni-coin"></i>
																	<div class="harga">
																		<p id="price">Rp. <?= $row->price - ($row->price * $row->discount / 100)?></p>

																		<input type="hidden" id="price-prod" value="<?= $row->price - ($row->price * $row->discount / 100)?>"> value="<?= $row->price ?>">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="rekening mt-15 text-center">
																<div class="info-content">
																	<i class="lni-wallet"></i>
																	<div id="no-rek">
																		<p><?= $bank[0]->rekening ?></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<input type="hidden" name="price-tot" id="price-tot">
													<input type="hidden" name="no-rek" id="no-rekening">
													<input type="hidden" name="service" value="<?= Request::segment(3) ?>">
													<div class="instruction mt-20">
														<button class="main-btn" type="submit">BOOK NOW</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- row -->
				</form>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<!--======  BLOG PART ENDS ======-->
@endsection