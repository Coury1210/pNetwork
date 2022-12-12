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
							<div class="settings-form">
								<div class="row">
									<div class="col-lg-4 text-center">
										<a href="{{route('savings.products.all')}}">
											<i class="fas fa-backward"></i> 
											{{ __('Saving Plans') }}
										</a>
									</div>
								</div>
								<hr>

								<div class="row">
									<div class="col-md-4">
										<div class="card withdraw-dashboard text-center" style="border:solid 1px lightblue; border-radius:0px 20px 0px 20px;">
												<div class="single-payment-method">
													<div class="card-header">
														<h5>{{$product->name}}</h5>
													</div>
													<p>Min Amount: {{number_format($product->min_savings_amount)}}</p>
													<p>Max Amount: {{number_format($product->max_savings_amount)}}</p>
													<p>Annual Rate: {{$product->annual_rate}} %</p>
													<p>Period: {{$product->duration}}  {{$product->interval}}</p>
												</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<form class="deposit_form" action="{{ route('savings.vault.create', $product->id) }}" method="post">
												@csrf
												<div class="col-lg-10">
													<div class="form-group">
														<label><h5>Amount</h5></label>
														<input type="number" onkeyup="check_amount('{{$product->min_savings_amount}}', '{{$product->max_savings_amount}}'); show_interest('{{$product->annual_rate}}', '{{$product->duration}}','{{$product->interval}}');" placeholder="Amount" name="amount" id="amount">
													</div>
													<div class="form_errors" style="color:rosybrown"></div>
													<div class="settings-btn">
														<button class="withdraw_button" type="submit" id="Button">{{ __('Add To Vault') }}</button>
													</div>
												</div>
											</form>

											<div class="col-lg-4">
												<h5>{{ __('Periodic Interest') }}</h5>
												<div class="interest" id="interest" style="font-size: 20px; font-weight:600">0</div>
											</div>	
										</div>
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