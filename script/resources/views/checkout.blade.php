@extends('layouts.frontend.app')

@section('title', 'Checkout')

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
        {{-- start check out area --}}
        <!-- <p>Hint: Design a credit card checkout form or page. Don't forget the important elements such as the numbers, dates, security numbers, etc. (It's up to you!) Don't forget to share on Dribbble and/or Twitter when you're done.</p> -->
        <div class="container-fluid background">
            <div class="row padding-top-20">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 offset-md-1 offset-lg-1 offset-xl-2 padding-horizontal-40">
                    <div class="row">
                        <div class="col-12 main-wrapper">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div id="template" class="row panel-wrapper">
                                        <div class="col-12 panel-header basket-header">
                                            <div class="row">
                                                <div class="col-6 basket-title">
                                                    <span class="description">review your</span><br><span class="emphasized">Cart Summary</span>
                                                </div>
                                                <div class="col-6 order-number align-right">
                                                    <span class="description">order #</span><br><span class="emphasized">1</span>
                                                </div>
                                            </div>
                                            <div class="row column-titles padding-top-10">
                                                <div class="col-2 align-center"><span>Photo</span></div>
                                                <div class="col-5 align-center"><span>Name</span></div>
                                                <div class="col-2 align-center"><span>Quantity</span></div>
                                                <div class="col-3 align-right"><span>Price</span></div>
                                            </div>                                    
                                        </div>
                                        <div class="col-12 panel-body basket-body">
                                            @if (Session::has('products'))
                                                @foreach ($cart_items as $key => $product)
                                                    <div class="row product">
                                                        <div class="col-2 product-image"><img src="{{asset($product->image)}}"></div>
                                                        <div class="col-3">{{$product->name}}<br><span class="sub">{{$product->weight}}</span><span class="additional">Cat</span></div>
                                                        <div class="col-2 align-right">{{$product->order_quantity}}</div>
                                                        <div class="col-3 align-right"><span class="sub">{{$currency}}</span> {{number_format($product->price * $product->order_quantity, 2)}}</div>
                                                        <div class="col-2 align-right">
                                                            <a href="{{route('cart.item.remove', $key)}}" style="color: #ff0000; font-weight:600"> X</a>
                                                        </div>
                                                    </div>   
                                                @endforeach
                                            @else
                                                <p>No items in the cart</p>
                                            @endif
                                        </div>
                                        <div class="col-12 panel-footer basket-footer">
                                            <hr>
                                            <div class="row">
                                                <div class="col-8 align-right description"><div class="dive">Subtotal</div></div>
                                                <div class="col-4 align-right"><span class="emphasized">{{$currency}} {{number_format($sub_total, 2)}}</span></div>
                                                <div class="col-8 align-right description"><div class="dive">Taxes</div></div>
                                                <div class="col-4 align-right"><span class="emphasized">{{$currency}} 0</span></div>
                                                <div class="col-8 align-right description"><div class="dive">Shipping</div></div>
                                                <div class="col-4 align-right"><span class="emphasized">{{$currency}} 0</span></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-8 align-right description"><div class="dive">Total</div></div>
                                                <div class="col-4 align-right"><span class="emphasized">{{$currency}} {{number_format($sub_total, 2)}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row panel-wrapper">
                                        <div class="col-12 panel-header creditcard-header">
                                            <div class="row">
                                                <div class="col-12 creditcard-title">
                                                    <span class="description">please enter your</span><br><span class="emphasized">Credit Card Information</span>
                                                    <span class="description"><a href = "{{route('settings')}}">Set payment method</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 panel-body creditcard-body">
                                            @if ($payment_method == 'Flutter Wave')
                                                <h3>Pay with Flutter wave</h3>
                                                <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                                                    {{ csrf_field() }}
                                                    <fieldset>
                                                        <input name="name" placeholder="Name"  type='text' id='card-name'/>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input name="email" type="email" id='card-name' placeholder="Your Email" />
                                                    </fieldset>
                                                    <fieldset>
                                                        <input name="phone" type="tel" id='card-name' placeholder="Phone number" />
                                                    </fieldset>
                                                    <input name="amount" placeholder="Name" value="{{$sub_total}}"  type='hidden'/>
                                                    <input type="submit" value="Pay" />
                                                </form>

                                            @else

                                                <form action="{{route('cart.checkout')}}" method="post" target="_self">
                                                    <fieldset>
                                                        <label for="card-name">Name on the Card</label><br>
                                                        <i class="fa fa-user-o" aria-hidden="true"></i><input type='text' id='card-name' name='card-name' placeholder='John Doe' title='Name on the Card'>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label for="card-number">Card Number</label><br>
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i><input type='text' id='card-number' name='card-number' placeholder='1234 5678 9123 4567' title='Card Number'>
                                                    </fieldset>
                                                    <fieldset>
                                                        <label for="card-expiration">Expiration Date</label><br>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i><input type='text' id='card-expiration' name='card-expiration' placeholder='YY/MM' title='Expiration' class="card-expiration">
                                                    </fieldset>
                                                    <fieldset>
                                                        <label for="card-ccv">CVC/CCV</label>&nbsp;<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards. On your American Express branded credit or debit card it is a 4 digit numeric code."></i><br>
                                                        <i class="fa fa-lock" aria-hidden="true"></i><input type='text' id='card-ccv' name='card-ccv' placeholder='123' title='CVC/CCV'>
                                                    </fieldset>

                                                    <button class="confirm" type="submit">
                                                        Confirm & Pay
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="col-12 panel-footer creditcard-footer">
                                            <div class="row">
                                                <div class="col-12 align-right">
                                                    <button class="cancel">
                                                        <a href="{{route('products.index')}}">CONTINUE SHOPPING</a>
                                                    </button>
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
    </div> {{-- end main area --}}
      
</section>
@endsection

@stack('css')
<style>

.main-wrapper
{
    border-radius: 15px 15px 15px 15px;
    -moz-border-radius: 15px 15px 15px 15px;
    -webkit-border-radius: 15px 15px 15px 15px;
    border: none;
    -webkit-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
}

.basket-header
{
    border-radius: 15px 0 0 0;
    -moz-border-radius: 15px 0 0 0;
    -webkit-border-radius: 15px 0 0 0;
    padding-left: 25px !important;
}

.creditcard-header
{
    border-radius: 0 15px 0 0;
    -moz-border-radius: 0 15px 0 0;
    -webkit-border-radius: 0 15px 0 0;
    padding-left: 35px !important;
}

.panel-wrapper
{
}

.panel-header
{
    background: #012f43;
    height: 80px;
    padding: 15px 20px 0 20px;
}

.panel-wrapper .basket-header .column-titles
{
    color: rosybrown;
    padding: 0;
    margin: 0;
    /* font-family: 'Anton', sans-serif; */
    display: none;
    visibility: hidden;
}

.fix-overflow
{
    padding-right: 5px !important;
}

.panel-wrapper .basket-body
{
    overflow-x: hidden;
    overflow-y: auto;
}

.panel-wrapper .creditcard-body
{
    padding: 30px 40px 0 40px;
}

.panel-wrapper .panel-body
{
    font-weight: 400;
    font-size: 1.0em;
    outline: none !important;
    min-height: 350px;
}

.basket-body
{
    background: #F9F9F9;
}

.creditcard-body
{
    background: white;
}

.basket-body .row.product
{
    margin: 5px 0 5px 0;
    padding:  5px 0 5px 0;
    border-bottom: solid 1px #eeeeee;
}

.basket-body .row.product div
{
    color: #777879;
    padding: 0 10px 0 10px;
}

.basket-body .row.product .product-image
{
}

.product-image img
{
    -o-object-fit: contain;
    object-fit: contain;
    width: 100%;
    min-width: 100%;
    max-width: 100%;
    max-height: 80px;
}

.card-wrapper
{
    height: 100%;
}

.padding-top-10
{
    padding-top: 10px !important;
}

.padding-top-20
{
    padding-top: 20px !important;
}

.padding-horizontal-40
{
    padding: 0 40px 0 40px;
}

.align-right
{
    text-align: right;
}

.align-center
{
    text-align: center;
}

.emphasized
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-size: 1em;
    color: white;
}

.description
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 1.0em;
    color: #A2C6DD;
}

.panel-footer
{
    padding-top: 10px;
    height: auto;
}

.basket-footer
{
    background: #012f43;
    border-radius: 0 0 0 15px;
    -moz-border-radius: 0 0 0 15px;
    -webkit-border-radius: 0 0 0 15px;
}

.basket-footer .title, .basket-footer .subtitle
{
}

.creditcard-footer
{
    background: white;
    border-radius: 0 0 15px 0;
    -moz-border-radius: 0 0 15px 0;
    -webkit-border-radius: 0 0 15px 0;
    padding: 75px 30px 0 30px;
}

.basket-footer .row .subtitle, .basket-footer .row .title
{
}

.panel-footer hr
{
    margin: 3px 0 3px 0;
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #197fb3;
    padding: 0;
}

.panel-footer button
{
    border: solid 1px brown;
    background: #166D9A;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    color: white;
    font-size: 0.8em;
    text-transform: uppercase;
    padding: 10px 15px 11px 15px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}

.panel-footer button:hover
{
    cursor: pointer;
}

button.cancel
{
    background: white;
    color: #166D9A;
}

button.cancel:hover
{
    background: #ff0000;
    border-color: #ff0000;
    color: white;
}

button.confirm:hover
{
    background: brown;
    color: white;
}

.dive
{
    margin-top: 5px;
}

.sub
{
    font-size: 60%;
    color: #aaaaaa;
}

.very
{
    font-size: 1.0em;
    font-weight: 600;
}

.creditcard-body form
{
    font-size: 0.8em;
}
 
.creditcard-body form i.fa
{
    margin-right: 10px;
    color: #166D9A;
}

.creditcard-body form fieldset
{
    border-bottom: dotted 2px #D0D0D0;
    margin-bottom: 25px;
}

.creditcard-body form input
{
    border: none;
    font-weight: 200;
    color: #555555;
    width: 85%;
    outline: none;
}

.creditcard-body form input::placeholder
{
    color: #D0D0D0;
}

.creditcard-body form label
{
    color: rosybrown;
    font-weight: 600;
}

.additional
{
    font-weight: 300;
    font-size: 70%;
}

.fa-info-circle
{
    color: #aaaaaa !important;
}

span.month.focused.active
{
    background: #166D9A !important;
    background-image: none !important;
}


@media (max-width: 992px)
{
}

@media (max-width: 767px)
{
    
    .basket-header
    {
        border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        -webkit-border-radius: 15px 15px 0 0;
    }
    
    .basket-footer
    {
        background: #166D9A;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }    
    
    .creditcard-header
    {
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }
    
    .creditcard-footer
    {
        border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        -webkit-border-radius: 0 0 15px 15px;
    }
    
}

</style>
