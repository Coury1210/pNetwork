@extends('layouts.backend.app')

@section('title','Add Savings Product')

@push('css')

@endpush

@section('content')

<!-- main area start -->
<section>
    <div class="login-area pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <h4 class="card-header">{{ __('Add Savings Product') }}</h4>
                            <div class="card-body login-form">
                                <form action="{{ route('forum.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <p>{{ __('Name') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="text" id="title" class="login-form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="{{ __('Forum Title') }}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="login-form-gorup">
                                        <input type="number" id="min_savings_amount" class="login-form-control @error('min_savings_amount') is-invalid @enderror" name="min_savings_amount" value="{{ old('min_savings_amount') }}" placeholder="{{ __('Min Amount') }}" required autocomplete="min_savings_amount" autofocus>
                                        @error('min_savings_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="login-form-gorup">
                                        <input type="number" id="max_savings_amount" class="login-form-control @error('max_savings_amount') is-invalid @enderror" name="max_savings_amount" value="{{ old('max_savings_amount') }}" placeholder="{{ __('Max Amount') }}" required autocomplete="max_savings_amount" autofocus>
                                        @error('max_savings_amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="login-form-gorup">
                                        <input type="number" id="annual_rate" class="login-form-control @error('annual_rate') is-invalid @enderror" name="annual_rate" value="{{ old('annual_rate') }}" placeholder="{{ __('Annual Rate (%)') }}" required autocomplete="annual_rate" autofocus>
                                        @error('annual_rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="login-form-gorup">
                                        <input type="number" id="duration" class="login-form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" placeholder="{{ __('Duration') }}" required autocomplete="duration" autofocus>
                                        @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="login-form-gorup">
                                        <input type="number" id="interval" class="login-form-control @error('interval') is-invalid @enderror" name="interval" value="{{ old('interval') }}" placeholder="{{ __('Interval') }}" required autocomplete="interval" autofocus>
                                        @error('interval')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                   
                                    <div class="login-form-button">
                                        <button type="submit">{{ __('ADD') }}</button>
                                    </div>
                                </form>
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
