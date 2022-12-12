@extends('layouts.backend.app')

@section('title','Add Savings Product')

@push('css')

@endpush

@section('content')
@php
$msg = \Illuminate\Support\Facades\Session::get('return_msg');
$err = \Illuminate\Support\Facades\Session::get('return_err');
@endphp

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>{{ __('Add Savings Product') }}</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></div>
				<div class="breadcrumb-item">{{ __('Add Savings Product') }}</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">{{ __('Add Savings Product') }}</h2>
			<p class="section-lead">{{ __('Add Savings Product Section') }}</p>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>{{ __('Create Savings Product') }}</h4>
						</div>
						<div class="card-body">
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
							<form action="{{ route('admin.products.savings.store') }}" method="POST">
								@csrf
								<div class="form-group">
									<label>{{ __('Name') }}</label>
									<input type="text" class="form-control" name="name">
								</div>

								<div class="form-group">
									<label>{{ __('Min Amount') }}</label>
									<input type="number" class="form-control" name="min_savings_amount">
								</div>

								<div class="form-group">
									<label>{{ __('Max Amount') }}</label>
									<input type="number" class="form-control" name="max_savings_amount">
								</div>

								<div class="form-group">
									<label>{{ __('Annual Interest Rate') }}</label>
									<input type="number" class="form-control" name="annual_rate">
								</div>

								<div class="form-group">
									<label>{{ __('Duration') }}</label>
									<input type="number" class="form-control" name="duration">
								</div>

								<div class="form-group">
									<label>{{ __('Interval') }}</label>
									<input type="text" class="form-control" name="interval">
								</div>
								
								<div class="text-right">
									<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
