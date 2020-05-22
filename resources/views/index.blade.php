@extends('master/page')

@section('content')

<!--====== SLIDER PART START ======-->

<section id="home" class="slider-area pt-100">
	<div class="container-fluid position-relative">
		<div class="slider-active">
			<div class="single-slider">
				<div class="slider-bg">
					<div class="row no-gutters align-items-center ">
						<div class="col-lg-4 col-md-5">
							<div class="slider-product-image d-none d-md-block">
								<img src="<?= URL::to('/') ?>/assets/images/1.jpg" alt="Slider">
								<div class="slider-discount-tag">
									<p>-50% <br> OFF</p>
								</div>
							</div> <!-- slider product image -->
						</div>
						<div class="col-lg-8 col-md-7">
							<div class="slider-product-content">
								<h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Clean</span> your <span>Clothes</span></h1>
								<p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">Kang Laundry Penyedia Layanan Laundry yang Tersebar di Seluruh Indonesia</p>
								<a class="main-btn" href="<?= URL::to('browse') ?>" data-animation="fadeInUp" data-delay="1.5s">Browse More <i class="lni-chevron-right"></i></a>
							</div> <!-- slider product content -->
						</div>
					</div> <!-- row -->
				</div> <!-- container -->
			</div> <!-- single slider -->
		</div> <!-- slider active -->
		<div class="slider-social">
			<div class="row justify-content-end">
				<div class="col-lg-7 col-md-6">
					<ul class="social text-right">
						<li><a href="#"><i class="lni-facebook-filled"></i></a></li>
						<li><a href="#"><i class="lni-twitter-original"></i></a></li>
						<li><a href="#"><i class="lni-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- container fluid -->
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== PRODUCT PART START ======-->

<section class="product-area pt-100 pb-130">
	<div class="container">
		<div class="row">
			<?php foreach($product as $row) {?>
			<div class="col-lg-3 pt-30">
				<div class="single-product-items">
					<div class="product-item-image">
						<a href="<?= URL::to("services/details/".$row->id) ?>"><img src="<?= URL::to('assets/uploads/'.$row->photo) ?>" alt="Product"></a>
						<?php if(!empty($row->discount))  { ?>
							<div class="product-discount-tag">
								<p>-<?= $row->discount ?>%</p>
							</div>
						<?php } ?>
					</div>
					<div class="product-item-content text-center mt-30">
						<h5 class="product-title"><a href="<?= URL::to("services/details/".$row->id) ?>"><?= $row->title ?></a></h5>
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
	</div> <!-- row -->
</div> <!-- container -->
</section>

@endsection