@extends('layouts.backend.app')

@section('title','Manage Sponsor')

@push('css')

@endpush

@section('content')

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>{{ __('Manage Savings Products') }}</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></div>
				<div class="breadcrumb-item">{{ __('Manage Savings Products') }}</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">{{ __('Manage Savings Products') }}</h2>
			<p class="section-lead">{{ __('Manage Savings Products Section') }}</p>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>{{ __('Manage Savings Products') }}</h4>
							<div class="card-header-form">
								<form>
									<div class="input-group">
										<input type="text" id="data_search" class="form-control" placeholder="Search">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="fas fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card-body p-0">
							@php 
							$option_currency = App\Option::where('key','currency')->first();
							$option_currency_value = json_decode($option_currency->value);
							$currency = $option_currency_value->code;
							$msg = \Illuminate\Support\Facades\Session::get('return_msg');
							$err = \Illuminate\Support\Facades\Session::get('return_err');
							@endphp
							@if ($msg)
							<div  style="padding-left:20px;background:green; border-radius:10px 10px 10px 10px; align-content:center" id="message-text" onmouseout="hideErrors()"> 
							<p style="color:antiquewhite; font-size:14px;">{{ $msg }}</p>
							</div>
							@endif
							@if ($err)
							<div style="padding-left:20px;background:rgb(195, 85, 85); border-radius:10px 10px 10px 10px; align-content:center" id="message-text" onmouseout="hideErrors()"> 
							<p style="color:white; font-size:14px;">{{ $err }}</p>
							</div>
							@endif
							<div class="row">
								@foreach ($products as $product)
									<div class="col-md-4">
										<div class="card withdraw-dashboard text-center mb-20" style="border:solid 1px lightblue; border-radius:0px 20px 0px 20px;">
												<div class="single-payment-method">
													<div class="card-header">
														<h5>{{$product->name}}</h5>
													</div>
													<p>Min Amount: {{number_format($product->min_savings_amount)}} {{$currency}}</p>
													<p>Max Amount: {{number_format($product->max_savings_amount)}} {{$currency}}</p>
													<p>Annual Rate: {{$product->annual_rate}} %</p>
													<p>Period: {{$product->duration}}  {{$product->interval}}</p>
													<div class="card-footer">
														<a href="{{ route('admin.savingsProducts.edit',$product->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
														@if ($product->status == 'active')
															<a href="{{ route('admin.savingsProducts.deactivate',$product->id) }}" class="btn btn-danger">{{ __('Deactivate') }}</a>
														@else
														<a href="{{ route('admin.savingsProducts.activate',$product->id) }}" class="btn btn-warning">{{ __('Activate') }}</a>
														@endif
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
	</section>
</div>
@endsection
