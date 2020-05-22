@extends('master/page')
@section('content')

<style>
	.head-service {
		background-color: #777;
		padding: 20px 30px;
		color:white;
	}

	.button-add {
		color: #fe7865;
		right:0;
		text-align: right;
		float:right;
	}

	.head-service a:hover {
		color: white;
	}
	
</style>
<!--======  BLOG PART START ======-->

<section id="blog" class="blog-area pt-125">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center pb-25">
					<h3 class="title mb-15">My Services</h3>
					<p>Here are your service</p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="justify-content-center">
			<div class="head-service">
				Manage Your Services
				<a href="<?= URL::to("user/service/add") ?>" class="button-add"><i class="lni-plus"></i> Add Services</a>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<section id="service" class="services-area pt-50 pb-100">
	<div class="container">
		<div class="row">
			<?php foreach($service as $row) { ?>
				<div class="col-lg-3 pt-30">
					<div class="single-product-items">
						<div class="product-item-image">
							<a href="<?= URL::to("user/service/edit/".$row->id) ?>"><img src="<?= URL::to('assets/uploads/'.$row->photo) ?>" alt="Product"></a>
							<?php if(!empty($row->discount))  { ?>
								<div class="product-discount-tag">
									<p>-<?= $row->discount ?>%</p>
								</div>
							<?php } ?>
						</div>
						<div class="product-item-content text-center mt-30">
							<h5 class="product-title"><a href="<?= URL::to("user/service/edit/".$row->id) ?>"><?= $row->title ?></a></h5>
							<p class="mt-10 product-desc"><?= $row->description ?></p>
							<?php if(!empty($row->discount))  { ?>
								<span class="regular-price"><?= $row->price - ($row->price * ($row->discount / 100)) ?></span>
								<span class="discount-price"><?= $row->price ?></span>
							<?php } else { ?>
								<span class="regular-price"><?= $row->price ?></span>
							<?php } ?>	
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>

	<!--======  BLOG PART ENDS ======-->
	@endsection