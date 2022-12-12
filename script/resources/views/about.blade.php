@extends('layouts.frontend.app')

@section('title', "About {{ env('APP_NAME')}}")

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
    <div class="main-area pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <p>{{env('APP_NAME')}} is a religious social site for sharing information and thoughts about christian living which was founded in 2018</p>
                    <p> We believe that this kind of lifestyle can encourage build and strengthen christian relations through fellowship</p>
                    <p> This can also help the gospel to reach out to nations where it can hradly be physically preached</p>
                    <p> Users are also able to buy christian material online and also showcase products to sell and support their ministries</p>

                    <h4>Platform subscription</h4>
                    <p>Users are able to subsribe to this site using their chosen credentials which migh include the email or phone number and also a desired username.. 
                        User accounts may require verification if enabled in the settings or requirwed by platform owners.
                    </p>

                    <h4>Chat platform</h4>
                    We belive that all christians should be able to share their thoughts in  a safe environment.
                    <p>On this platform subscribers can share video, photos and test about different subjects in relation to christ and noral living</p>
                    <p>Members have a wall where recent posts and shares about the gospel and christianity are shown. Any member can share their thoughts, comment or react to a post.
                    Posts are verified by the administrators and the system automatically detects nudity and obscene language which might lead to blocking of the member account. </p>

                    <h4>The market place</h4>
                    <p>Only verified accounts may be able create and sell products on this platform for security reasons. Buyers able to access products auctioned for sell by the emebers 
                    de[ending on their location</p>

                    <h4>Messaging</h4>
                    <p>Internal communication is enable for members. Members can easily send instant messages to different profiles.</p>
                    <h4>Security Features</h4>
                    Two factor authentication
                    
                    User blocking


                  
                </div>
                @include('layouts.frontend.partials.sidebar')
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="popup_url" value="{{ route('popup') }}">
<input type="hidden" id="ellipsis_url" value="{{ route('ellipsis') }}">
<input type="hidden" id="asset_url" value="{{ route('welcome') }}">

<!-- copied to clipboard -->
<div class="copied">
  <p>{{ __('Link copied to clipboard.') }}</p>
</div>
@endsection
