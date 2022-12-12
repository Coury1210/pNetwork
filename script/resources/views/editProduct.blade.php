@extends('layouts.frontend.app')

@section('title','Edit Product')

@section('content')


<!-- main area start -->
<section>
    <div class="login-area pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <h5 class="card-header" style="background: rosybrown">{{ __('Edit product') }}</h5>
                            <div class="card-body login-form">
                                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p>{{ __('Product Name') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="text" id="name" class="login-form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" placeholder="{{ __('Product Name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Price') }}</p>
                                    <div class="login-form-group">
                                        <input type="text" id="price" class="login-form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" placeholder="{{ __('Price') }}" required autocomplete="price">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Quantity') }}</p>
                                    <div class="login-form-group">
                                        <input type="text" id="quantity" class="login-form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity}}" placeholder="{{ __('Quantity') }}" required autocomplete="quantity" autofocus>
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Color') }}</p>
                                    <div class="login-form-group">
                                        <input type="text" id="color" class="login-form-control @error('color') is-invalid @enderror" name="color" value="{{ $product->color }}" placeholder="{{ __('Color') }}" autocomplete="color" autofocus>
                                        @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Weight') }}</p>
                                    <div class="login-form-group">
                                        <input type="text" id="weight" class="login-form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $product->weight }}" placeholder="{{ __('Weight') }}" autocomplete="weight">
                                        @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <select name="units">
                                        <option  value="Kgs">{{ __('Kgs') }}</option>
                                        <option  value="Gms">{{ __('Gms') }}</option>
                                        <option  value="Tonnes">{{ __('Tonnes') }}</option>
                                    </select>

                                    <div class="login-form-group">
                                        <label for="image_upload" class="text-center">
                                            <div class="info-star">
                                                @if ($product->image)
                                                    <img src="{{asset($product->image)}}" width="100%"/>
                                                @else
                                                    <i class="fas fa-image"></i>
                                                @endif
                                            </div>
                                        </label>
                                        <h5>{{ __('Change image') }}</h5>
                                        <input type="file" name="image"  id="image_upload">
                                    </div>

                                    <div class="login-form-button">
                                        <button type="submit">{{ __('UPDATE') }}</button>
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
