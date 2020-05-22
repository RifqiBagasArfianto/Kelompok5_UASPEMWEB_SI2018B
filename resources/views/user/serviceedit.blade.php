@extends('master/page')
@section('content')
<!--======  BLOG PART START ======-->
<style>
	.btn-check {
		display: none;
		padding: 0;
		margin: 0;
		width:0;
		height: 0;
	}

	.btn-primary {
		font-size:12px;
		border-left: 1px solid #005cbf;
	}
</style>

<section id="blog" class="blog-area pt-125">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center pb-25">
					<h3 class="title mb-15">Edit Services</h3>
					<p>Use this form below to edit your services</p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="justify-content-center">
			<div class="contact-form">
				<form id="contact-form" action="<?= URL::to('user/service/update') ?>" method="post" data-toggle="validator" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="text" value="<?= $prod->title ?>" name="title" placeholder="Title" data-error="Title is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="number" value="<?= $prod->price ?>" name="price" placeholder="Price" data-error="Price is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-12">
									<div class="single-form form-group">
										<input type="number" name="discount" value="<?= $prod->discount ?>" placeholder="Discount">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
									<div class="single-form form-group">
										<label>Facility</label>
										<br>
										<div class="btn-group" data-toggle="buttons">
											<?php foreach ($facility as $facs) { ?>
												<label class="btn btn-primary">
													<input class="btn-check" type="checkbox" name="facility[]" value="<?= $facs->name ?>"><?= $facs->name ?>
												</label>
											<?php } ?>
										</div>
									</div> <!-- single form -->
									<label class="mt-15">Service Photo</label><br>
									<input class="mb-15" type="file" name="photo">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-form form-group">
								<textarea style="height:140px" name="description" rows=10 placeholder="Description" data-error="Description is required." required="required"><?= $prod->description ?></textarea>
								<div class="help-block with-errors"></div>
							</div> <!-- single form -->
							<input type="hidden" name="seller" value="<?= Session::get('id') ?>">
							<input type="hidden" name="prodid" value="<?= $prod->id ?>">
							<div class="single-form form-group" style="margin-top: 10px">
								<label>Location</label>
								<br>
								<select name="location" data-error="Location is required." required="required">
									<option value="">Choose Location</option>
									<?php foreach($location as $loc) { ?>
										<option value="<?= $loc->name."|".$loc->lu."|".$loc->ls ?>"><?= $loc->name ?></option>
									<?php } ?>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-lg-6 mt-10">
							<button class="main-btn" type="submit">UPDATE</button>
							<a class="main-btn" href="<?= URL::to("user/service/delete/".$prod->id) ?>">DELETE</a>
						</div>
					</div> <!-- row -->
				</form>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<!--======  BLOG PART ENDS ======-->
@endsection