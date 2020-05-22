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

	.icon-berhasil {
		font-size: 80px;
		color: #fe7865;
	}

</style>

<section id="blog" class="blog-area" style="padding-top: 200px">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center pb-25">
					<i class="lni-check-mark-circle icon-berhasil"></i>
					<h3 class="title mt-15 mb-15">Success</h3>
					<p>Your booking has been processed, please send payment confirmation to further verification</p>
				</div> <!-- section title -->
			</div>
		</div> 
	</div> <!-- container -->
</section>

@endsection