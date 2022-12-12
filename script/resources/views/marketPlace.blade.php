@extends('layouts.frontend.app')

@section('title','Product | Market Place')

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


<!-- main area start -->
<section>
    <div class="main-area pt-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="header-search-area">
              <div class="header-searchbox text-center">
                  <input type="text" placeholder="{{ __('Search') }}" id="product-search" oninput="search_product()" autocomplete="off">
                  <input type="hidden" id="product_search_url" value="{{ route('search', ['market_place']) }}">
                  <input type="hidden" id="base_url" value="{{ url('/') }}">
              </div>
              <div class="product-search-append"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="header-right-section">
              <a class="btn pjax" href="{{route('product.add.view')}}">
                {{ __('Add Product') }}
              </a>
            </div>
          </div>
          
        </div>
      
        <hr style="border-bottom-color: #013552">

        <div class="row"> 
          @foreach ($products as $product)
          <div class="col-md-4" style="padding-bottom: 10px;">
            <a href="{{route('product.show', $product->id)}}">
              <div class="card">
                <div class="card-header" style="background-color:#013552">
                  <h5 class="f-left" style="color: beige">{{$product->name}}</h5></span>
                  <div class="f-right">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('login') }}" class="pjax dropdown-item">
                          <i class="far fa-flag"></i> {{ __('Report') }}</a>
                        <a href="{{route('product.edit', $product->id)}}" class="pjax dropdown-item"><i class="far fa-edit"></i>Edit</a>
                        <a href="{{route('product.delete', $product->id)}}" class="pjax dropdown-item"><i class="fas fa-trash"></i>Delete</a>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                    <img width="100%" class="rounded-circle" src="{{ $product->image }}" >
                    <p>{{$product->description}}</p>
                </div>
                <div class="card-footer">
                  <p><b>{{number_format($product->price, 2) }} {{$currency}}</b></p>
                  @if ($product->quantity > 0)
                    <p><b>{{$product->quantity}} InStock</b></p>
                    <form action="{{route('cart.item.add', $product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <p>{{ __('Order Quantity') }}</p>
                      <div class="login-form-group">
                          <select class="login-form-control" placeholder="{{ __('order quantity') }}" name="quantity">
                            @php $i = 1; while ($i <= 100) { 
                                  echo "<option value={$i}> {$i} </option>";
                                  $i++;
                            }
                            @endphp                                   
                          </select>
                      </div>
                      <div class="login-form-button">
                          <button type="submit" class="btn" style="background: rgb(107, 55, 7)"><p>ADD TO CART</p></button>
                      </div>
                    </form>
                  @else
                    <center><span class="btn btn-danger">Out of Stock</span></center>
                  @endif

                  {{-- edit products --}}
                  <div class="d-none" id="productlinks{{$product->id}}">                  
                    <div class="video-total-view">
                      <a href="{{route('product.edit', $product->id)}}"><i class="fas fa-edit"></i></a>
                      
                      <input type="hidden" id="delete_product_url{{$product->id}}" value="{{route('product.delete', $product->id)}}">
                      <input type="hidden" id="redirect_url" value="{{route('products.index')}}">

                      <a href="javascript:void(0)" onclick="delete_product('{{$product->id}}')"><i class="fas fa-trash"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
         {{-- end row --}}
      </div>
      {{-- end container --}}
    </div>
    <!-- main area end -->
</section>
<!-- end section -->
@endsection
