@extends('layouts.frontend.app')

@section('title', 'Single post')

@section('content')

<!-- success-alert start -->
<div class="alert-message-area">
    <div class="alert-content">
        <h4 class="ale">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- success-alert end -->

<!-- error-alert start -->
<div class="error-message-area">
    <div class="error-content">
        <h4 class="error-msg">{{ __('Your Settings Successfully Updated') }}</h4>
    </div>
</div>
<!-- error-alert end -->

<!-- ellipsis modal -->
<div class="ellipish-modal d-none">
	<div class="ellipish-modal-content">

	</div>
</div>


<!-- modal -->
<div class="bg-modal d-none">
	<div class="close-btn">
		<a href="javascript:void(0)"><img src="{{ asset('frontend/img/cancel.png') }}"></a>
	</div>
	<div class="modal-content-area">

	</div>
</div>

<section>
	<div class="single-video-area">
		<div class="main-area pt-50">
			<div class="container">
				<a href="{{route('posts.index')}}">
					<p>Back to Posts</p>
				</a>

				<div class="row">
					<div class="col-lg-12">
						<div class="row">
								@include('layouts.frontend.section.post')	
						</div>
						<input type="hidden" id="video_ads_url" value="{{ route('ads.show') }}">
					</div> 
				</div> 
			</div> 
		</div>
	</div> 
</section>
@endsection