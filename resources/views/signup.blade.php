
@extends('master/page')

@section('content')

<!--====== DISCOUNT PRODUCT PART START ======-->
<style type="text/css">
	.vendor-link {
		color: #777;
	}

	.vendor-link:hover {
		color: #fe7865;	
	}
</style>

<section id="discount-product" class="discount-product" style="padding-top: 100px">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="single-discount-product mt-30">
					<div class="product-image">
						<img src="<?= URL::to('/') ?>/assets/images/discount-product/product-1.jpg" alt="">
					</div> <!-- product image -->
					<div class="product-content">
						<h4 class="content-title mb-15">Register a <br> New Account</h4>
						<a href="<?= URL::to('login') ?>">Login Now <i class="lni-chevron-right"></i></a>
					</div> <!-- product content -->
				</div> <!-- single discount product -->
			</div>
			<div class="col-lg-6">
				<form action="<?= URL::to('backend/register') ?>" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="single-form form-group">
								<input type="text" name="user" placeholder="Username" data-error="Username is required." required="required">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-form form-group">
								<input type="password" name="pass" placeholder="Password" data-error="Password is required." required="required">
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="single-form form-group">
						<input type="email" name="email" placeholder="Email" data-error="Email is required." required="required">
						<div class="help-block with-errors"></div>
					</div>
					
					<input type="hidden" name="role" value="user">
					<input type="hidden" name="phone" value="-">

					<div class="single-form form-group">
						<button class="main-btn" type="submit">SIGNUP NOW</button>
					</div>
				</form>
				<div class="single-form form-group">
					<a href="<?= URL::to('vendor/signup') ?>" class="vendor-link">Register as Vendor</a>
				</div>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<!--====== DISCOUNT PRODUCT PART ENDS ======-->

@endsection