@extends('layouts.frontend.app')

@section('title','Savings Vault')

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
			<div class="row">
				<div class="col-lg-12">
					<div class="setting-main-area" id="balance">
						<div class="settings-content-area">
							<div class="row">
								<div class="col-lg-4">
									<h4>{{ __('Savings Vault') }}</h4>
								</div>
								<div class="col-lg-6 f-right text-center">
									<a href="{{ route('savings.products.all') }}">
										{{ __('Add Savings Plan') }}
									</a>
								</div>
							</div>
							<hr>
							<div class="settings-form">
								@php 
								$option_currency = App\Option::where('key','currency')->first();
								$option_currency_value = json_decode($option_currency->value);
								$currency = $option_currency_value->code
								@endphp
								<div class="row">
									<div class="col-lg-4 text-center">
										<i class="far fa-clock"></i> 
										{{ __('Total Savings') }}
										<p>{{number_format($vaults->sum('amount'))}} {{$currency}}</p>
									</div>
									<div class="col-lg-4">
										<div class="withdraw f-right text-center">
											<i class="far fa-clock"></i> 
											{{ __('Total Expected Interest') }}
											<p>{{number_format($vaults->sum('expected_interest'))}} {{$currency}}</p>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="withdraw f-right text-center">
											<i class="far fa-clock"></i> 
											{{ __('Total Interest Received') }}
											<p>{{number_format($vaults->sum('interest'))}} {{$currency}}</p>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-4">
										@foreach ($vaults as $vault)
											<div class="card withdraw-dashboard text-center" style="border:solid 1px lightblue; border-radius:0px 20px 0px 20px;">
													<div class="single-payment-method">
														<div class="card-header">
															<h5>{{$vault->savingsProduct->name}}</h5>
														</div>
														<p>Staked Amount: {{number_format($vault->amount)}}</p>
														<p>Interest Received: {{number_format($vault->interest)}}</p>
														<p>Expected interest: {{number_format($vault->expected_interest)}}</p>
														<p>Expires In: {{$vault->expiry_period}}</p>
														<p>Status: <span style="color:green">{{$vault->status}}</span></p>
														<div class="card-footer">
															<a href="{{ route('savings.vault.withdraw',$vault->id) }}"><p>Withdraw From Vault</p></a>
														</div>
													</div>
											</div>
										@endforeach

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- main area end -->
@endsection