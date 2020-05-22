@extends('master/page')
@section('content')
<?php
	if(Session::get('status') == "success") {
		echo '<script>alert("bukti pembayaran terkirim")</script>';
	}

?>
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
					<h3 class="title mb-15">My Invoice</h3>
					<p>Here are your Invoice</p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="justify-content-center">
			<div class="head-service">
				Manage Your Invoice
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<section id="service" class="services-area pt-50 pb-100">
	<div class="container">
		<div class="row">
			<?php 
				foreach($order as $data) {
					$row = DB::table('product')->where('id', $data->service)->first();
				 ?>
				<div class="col-lg-3 pt-30">
					<div class="single-product-items">
						<div class="product-item-image">
							<a href="#" class="invo-img" data-toggle="modal" data-id="<?= $data->id ?>" data-target="#exampleModalCenter"><img src="<?= URL::to('assets/uploads/'.$row->photo) ?>" alt="Product"></a>
							<?php if(!empty($row->discount))  { ?>
								<div class="product-discount-tag">
									<p>-<?= $row->discount ?>%</p>
								</div>
							<?php } ?>
						</div>
						<div class="product-item-content text-center mt-30">
							<h5 class="product-title"><?= $row->title ?></h5>
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

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Payment Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="services/confirm" enctype="multipart/form-data" method="post">
      @csrf
      <div class="modal-body">
        	<label class="mt-15">Upload Payment Proof</label><br>
			<input class="mb-15" type="file" name="photo">
			<input type="hidden" name="ord-id" id="ord-id">
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	<!--======  BLOG PART ENDS ======-->
	@endsection