@extends('master/page')
@section('content')

<!--====== DISCOUNT PRODUCT PART START ======-->

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
									<p style="font-size: 50px"><i class="lni-search"></i></p>
								</div>
							</div> <!-- slider product image -->
						</div>
						<div class="col-lg-8 col-md-7">
							<div class="slider-product-content">
								<h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s"><span>Browse</span> our <span>Service</span></h1>
								<p class="mb-25" data-animation="fadeInUp" data-delay="0.9s">Kang Laundry Penyedia Layanan Laundry yang Tersebar di Seluruh Indonesia</p>
								<div class="single-form form-group" data-animation="fadeInUp">
									<form action="<?= URL::to('browse') ?>" method="POST">
										@csrf
										<div class="row">
											<div class="col-md-8 mt-10">
												<input type="text" value="<?= $keyword ?>" name="keyword" placeholder="Keyword by Location" data-error="Keyword is required." required="required">
												<div class="help-block with-errors"></div>
											</div>
											<div class="col-md-4 mt-10">
												<button class="main-btn" type="submit" data-delay="1.5s">Search <i class="lni-chevron-right"></i></button>
											</div>
										</div>
									</form>
								</div>
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

<section id="discount-product" class="discount-product" style="padding: 50px 0 50px 0">
	<div class="container">
		<?php if(!empty($keyword)) { ?>
			<div class="search-box">
				Hasil Pencarian "<?= $keyword ?>"
			</div>
		<?php }	?>
	</div> <!-- container -->
</section>

<!--====== DISCOUNT PRODUCT PART ENDS ======-->

<section id="service" class="services-area pt-50 pb-100">
	<div class="container">
		<div class="row">
			<?php foreach($result as $row) { ?>
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
		</div>
	</div>
</section>

@endsection