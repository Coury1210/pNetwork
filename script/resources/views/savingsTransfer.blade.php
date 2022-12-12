@extends('layouts.frontend.app')

@section('title','Deposit')

@section('content')
<!-- success-alert start -->
<div class="alert-message-area">
	<div class="alert-content">
		<h4 class="ale">{{ __(config('constants.success.settings_updated')) }}</h4>
	</div>
</div>
<!-- success-alert end -->

<!-- error-alert start -->
<div class="error-message-area">
	<div class="error-content">
		<h4 class="error-msg">{{ __(config('constants.success.settings_updated')) }}</h4>
	</div>
</div>
<!-- error-alert end -->

<!-- main area start -->
<section>
	<div class="main-area pt-50 ml-200">
		<div class="container">
            <div class="paypal-section tab-pane fade active show" id="paypal_section">
                <form class="deposit_form" action="{{ route('savings.transfer.create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('Receiver Username') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Receiver Username') }}" name="receiver_username">
                            </div>
                        </div>	
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('Amount') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Amount') }}" name="amount">
                            </div>
                        </div>
                    </div>
                    <div class="settings-btn">
                        <button class="withdraw_button" type="submit">{{ __('Transfer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- main area end -->
@endsection
