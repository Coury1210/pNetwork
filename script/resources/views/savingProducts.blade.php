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
									@foreach ($products as $product)
										<div class="col-md-4">
											<div class="card withdraw-dashboard text-center mb-20" style="border:solid 1px lightblue; border-radius:0px 20px 0px 20px;">
													<div class="single-payment-method">
														@php 
															$option_currency = App\Option::where('key','currency')->first();
															$option_currency_value = json_decode($option_currency->value);
															$currency = $option_currency_value->code
														@endphp
														<div class="card-header">
															<h5>{{$product->name}}</h5>
														</div>
														<p>Min Amount: {{number_format($product->min_savings_amount)}} {{$currency}}</p>
														<p>Max Amount: {{number_format($product->max_savings_amount)}} {{$currency}}</p>
														<p>Annual Rate: {{$product->annual_rate}} %</p>
														<p>Period: {{$product->duration}}  {{$product->interval}}</p>
														<div class="card-footer">
															<a href="{{ route('savings.vault.add',$product->id) }}">Add To Vault</a>
														</div>
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
</section>
<!-- main area end -->
@endsection