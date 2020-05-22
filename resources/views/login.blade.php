<?php

if(!empty(Session::get('status'))) {
	if (Session::get('status') == "success") {
		echo "<script>alert('Sign Up was Successfull')</script>";
	} else if (Session::get('status') == "login_failed") {
		echo "<script>alert('Wrong Username or Password')</script>";
	} else if (Session::get('status') == "wrong_code") {
		echo "<script>alert('Wrong Activation Code')</script>";
	} else if (Session::get('status') == "confirmed") {
		echo "<script>alert('Your email has been confirmed')</script>";
	} else {
		echo "<script>alert('Check your email for activation')</script>";
	} 
}

?>

@extends('master/page')

@section('content')

<!--====== DISCOUNT PRODUCT PART START ======-->

<section id="discount-product" class="discount-product" style="padding-top: 100px">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="single-discount-product mt-30">
					<div class="product-image">
						<img src="<?= URL::to('/') ?>/assets/images/discount-product/product-1.jpg" alt="">
					</div> <!-- product image -->
					<div class="product-content">
						<h4 class="content-title mb-15">Login <br> to Your Account</h4>
						<a href="<?= URL::to('signup') ?>">Create Account <i class="lni-chevron-right"></i></a>
					</div> <!-- product content -->
				</div> <!-- single discount product -->
			</div>
			<div class="col-lg-6 pt-30">
				<form action="<?= URL::to("backend/login") ?>" method="POST">
					@csrf
					<div class="single-form form-group">
						<input type="text" name="user" placeholder="Username" data-error="Username is required." required="required">
						<div class="help-block with-errors"></div>
					</div>
					<div class="single-form form-group">
						<input type="password" name="pass" placeholder="Password" data-error="Password is required." required="required">
						<div class="help-block with-errors"></div>
					</div>
					<div class="single-form form-group">
						<button class="main-btn" type="submit">LOGIN NOW</button>
					</div>
				</form>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

@endsection