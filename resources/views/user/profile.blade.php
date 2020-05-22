@extends('master/page')
@section('content')

<section id="blog" class="blog-area pt-125">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center pb-25">
					<h3 class="title mb-15">User Profile</h3>
					<p>Use this form below to change your account details</p>
				</div> <!-- section title -->
			</div>
		</div> <!-- row -->
		<div class="justify-content-center">
			<div class="contact-form">
				<form id="contact-form" action="<?= URL::to('/user/profile/update') ?>" method="post" data-toggle="validator">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="text" name="user" value="<?= $row->user ?>" placeholder="Enter Your Username" data-error="Username is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-6">
									<div class="single-form form-group">
										<input type="email" name="email" value="<?= $row->email ?>"  placeholder="Enter Your Email" data-error="Valid email is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
								<div class="col-lg-12">
									<div class="single-form form-group">
										<input type="password" name="pass" value="<?= $row->pass ?>" placeholder="Enter your Password" data-error="Valid password is required." required="required">
										<div class="help-block with-errors"></div>
									</div> <!-- single form -->
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-form form-group">
								<textarea style="height:140px" name="phone" rows=10 placeholder="Enter Your Phone Number" data-error="Phone is required." required="required"><?= $row->phone ?></textarea>
								<div class="help-block with-errors"></div>
							</div> <!-- single form -->
						</div>
						<div class="col-lg-12 mt-10">
							<button class="main-btn" type="submit">SUBMIT</button>
						</div>
					</div> <!-- row -->
				</form>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</section>

<!--======  BLOG PART ENDS ======-->
@endsection