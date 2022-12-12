@extends('layouts.frontend.app')

@section('title', 'FAQS')

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

                <div class="center divShow">
                    <div class="faq">
                      <a href="#divShow_1">
                        <h4>I can't login, or I forgot my username or password</h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_1">
                      <p>If you cannot login, check to make sure that your "caps lock" key is off. 
                        Your username and password are CaSe SeNsItIvE.
                        If you still cannot login, you can request to 
                        <a href="{{ route('password.request') }}"> reset your password </a> or <a href="{{ route('contact') }}">contact us</a>.
                      </p>
                    </div>
                  
                  
                    <div class="faq">
                      <a href="#divShow_2">
                        <h4>How can I update my profile? </h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_2">
                      <p>To update your profile, you must go into your profile and settings in your profile editing. You can move through the different parts of your profile by clicking the tabs at the top of the page</p>
                    </div>
                  
                  
                    <div class="faq">
                      <a href="#divShow_3">
                        <h4>How can I delete my account?</h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_3">
                      <p>If you are absolutely sure that you want to delete your account, you can do so in your privacy settings. Please note that your account will be permanently deleted and irrecoverable!</p>
                    </div>
                  
                  
                    <div class="faq">
                      <a href="#divShow_4">
                        <h4>How can I update my email address?</h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_4">
                      <p>For safety and to prevent spam, you can not change your email address.</p>
                    </div>
                  
                  
                    <div class="faq">
                      <a href="#divShow_5">
                        <h4>How can I deal with someone that is bothering me?</h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_5">
                      <p>If someone is bothering or harassing you, blocking them is usually the best solution. Please report it via our contact form with the url of the profile of the person and the explanation of what the person has done wrong.</p>
                    </div>
                  
                  
                    <div class="faq">
                      <a href="#divShow_6">
                        <h4>By who this Web App has been developed?</h4>
                      </a>
                    </div>
                  
                    <div class="hidden" id="divShow_6">
                      <p>This whole social website has been developed by 
                      <a href="" title="Author">Bosco Kagimu</a> 
                      (<em>
                          <a href="https://github.com/Coury1210" title="Author">GitHub</a>
                          /<a href="https://www.linkedin.com/Coury1210">LinkedIn</a>
                        </em>).
                      </p> 
                    </div>
                </div>
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
