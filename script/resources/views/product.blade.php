@extends('layouts.frontend.app')

@section('title','Product | {{$product->name}}')

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
        <section class="product">
          <div class="col-md-6">
            <h1 class="product__details-heading">{{$product->name}}</h1>
            <span class="product__details-sub-heading">{{$product->description}}</span>
        
            <div class="product__details-image-wrapper">
                <img class="product__details-image" src="{{ asset($product->image) }}" alt="">
            </div>
        
            <div class="product__details-basket">
              <div class="product__details-basket-item">
                <span class="product__details-basket-heading">Quantity</span>
                <div class="product__details-basket-quantity-wrapper" onchange="show_total_price('{{$product->price}}')">
                    <select class="product__details-basket-quantity" name="quantity" id="quantity" onchange="show_total_price('{{$product->price}}');" data-product-quantity>
                        @php 
                            $value = 0;
                        @endphp

                        @while ($value < 10) 
                            @php $value ++ @endphp
                            <option value="{{$value}}">{{$value}}</option>
                        @endwhile
                    </select>
                </div>
              </div>
        
                <div class="product__details-basket-item">
                  <span class="product__details-basket-heading product__details-basket-heading--right">Price</span>
                  <span class="product__details-basket-price" id="total_price"  data-product-price>{{$currency}} {{$product->price}}</span>
                </div>
              </div>
          </div>

          <div class="col-md-8  product__details">
            <form class="card-details" action="" data-form>
            <fieldset class="card-details__fieldset">
                <span class="card-details__heading">Card Type</span>
        
                <div class="card-details__cards" data-card-types>
                <div class="card-details__cards-item">
                    <input class="card-details__card-input" type="radio" name="cardType" id="visa" data-card-type="visa" checked>
                    <label class="card-details__card-label" for="visa">Visa</label>
                    <img class="card-details__cards-image" src="https://svgshare.com/i/7h2.svg" alt="Visa Card" aria-hidden="true">
                </div>
        
                <div class="card-details__cards-item">
                    <input class="card-details__card-input" type="radio" name="cardType" id="mastercard" data-card-type="mastercard">
                    <label class="card-details__card-label" for="mastercard">MasterCard</label>
                    <img class="card-details__cards-image" src="https://svgshare.com/i/7fu.svg" alt="MasterCard" aria-hidden="true">
                </div>
        
                <div class="card-details__cards-item">
                    <input class="card-details__card-input" type="radio" name="cardType" id="discover" data-card-type="discover">
                    <label class="card-details__card-label" for="discover">Discover</label>
                    <img class="card-details__cards-image" src="https://svgshare.com/i/7hP.svg" alt="Discover Card" aria-hidden="true">
                </div>
        
                <div class="card-details__cards-item">
                    <input class="card-details__card-input" type="radio" name="cardType" id="express" data-card-type="express">
                    <label class="card-details__card-label" for="express">American Express</label>
                    <img class="card-details__cards-image" src="https://svgshare.com/i/7gD.svg" alt="Amercican Express Card" aria-hidden="true">
                </div>
                </div>
            </fieldset>
        
            <fieldset class="card-details__fieldset">
                <span class="card-details__heading">Card Number</span>
        
                <div class="card-details__number">
                <div class="card-details__number-field">
                    <label for="cardNumberFirstFour" class="card-details__number-label">First Four Digits</label>
                    <input class="card-details__number-input" type="text" maxlength="4" name="card-number" value="0000" id="cardNumberFirstFour" data-input>
                </div>
        
                <div class="card-details__number-card">
                    <img class="card-details__number-card-image" src="https://svgshare.com/i/7h2.svg" alt="Visa Card" data-card-image>
                </div>
                </div>
            </fieldset>
        
            <fieldset class="card-details__fieldset">
                <span class="card-details__heading" aria-hidden="true">Card Holder Name</span>
                <div class="card-details__holder">
                <label class="card-details__holder-label" for="cardHolderName">Card Holder Name</label>
                <input class="card-details__holder-input" type="text" id="cardHolderName" data-input>
                </div>
            </fieldset>
        
            <fieldset class="card-details__fieldset">
                <div class="card-details__expiration">
                    <span class="card-details__heading" aria-hidden="true">Expiration Date</span>
                    <div class="card-details__expiration-date">
                        <label class="card-details__expiration-date-label" for="expirationDate">Expiration Date</label>
                        <input class="card-details__expiration-date-input" type="text" maxlength="7" value="MM / YY" id="expirationDate" data-input>
                    </div>
                </div>
        
                <div class="card-details__security">
                <span class="card-details__heading" style="margin-left: 100px;" aria-hidden="true">CVV</span>
                <div class="card-details__details__security-code">
                    <label class="card-details__security-code-label" for="expirationDate">CVV</label>
                    <input class="card-details__security-code-input" type="text" maxlength="3" value="000" id="expirationDate" data-input>
                </div>
                </div>
            </fieldset>
        
            <button class="card-details__submit" type="button" data-submit-button>PAY</button>
            </form>
          </div>
        </section>
                
        </div>
    </div>
</section>
<!-- main area end -->
@endsection

@stack('css')
<style>

.product {
  width: 100%;
  max-width: 100%;
  margin-bottom: 15px;
}

.product__details {
  padding: 40px 15px 20px 40px;
  background-color: #14162f;
  color: white;
}

.product__details-heading {
  margin-top: 0;
  color:rosybrown;
  margin-bottom: 5px;
  font-weight: bold;
}

.product__details-sub-heading {
  display: block;
  margin-bottom: 20px;
  font-size: 1.2em;
  font-weight: 100;
}

.card-details {
  position: relative;
  padding: 25px;
  background: linear-gradient(to right, navy-blue 0%, #00324e 100%);
  color:rosybrown;

}

.card-details__fieldset {
  margin-top: 0;
  margin-bottom: 10px;
  border: none;
}

.card-details__heading {
  display: block;
  font-size: 0.95em;
  font-weight: bold;
  align-items: center;
  justify-content: left; 
}

.card-details__cards {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
}

.card-details__cards-item {
  position: relative;
  width: 18%;
  max-width: 53px;
  border-radius: 5px;
  overflow: hidden;
}

.card-details__card-input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  border: none;
  cursor: pointer;
  appearance: none;
  z-index: 1;
}

.card-details__card-label {
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  text-indent: -9999px;
  z-index: 0;
}

.card-details__cards-image {
  border-radius: 5px;
  opacity: 1;
  transition: opacity 0.25s ease-in-out;
  }

.card-details__number {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-top: 15px;
}

.card-details__number-field {
  position: relative;
  width: 15%;
}

.card-details__number-card {
  width: 14%;
  margin-left: 10px;
  border-radius: 5px;
  overflow: hidden;
}

.card-details__number-label {
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  text-indent: -9999px;
  clip: rect(0, 0, 0);
}

.card-details__number-input,
.card-details__expiration-date-input,
.card-details__security-code-input {
}

.card-details__holder {
  position: relative;
  margin-top: 10px;
}

.card-details__holder-label,
.card-details__expiration-date-label,
.card-details__security-code-label {
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  text-indent: -9999px;
  clip: rect(0, 0, 0);
}

.card-details__holder-input {
}

.card-details__expiration,
.card-details__security {
  display: inline-block;
  vertical-align: middle;
}

.card-details__expiration {
}

.card-details__expiration-date {
  position: relative;
  max-width: 66px;
  margin-top: 15px;
  margin-right: 50px;
}

.card-details__details__security-code {
  position: relative;
  max-width: 29px;
  margin-top: 15px;
  margin-left: 100px;
}

.card-details__submit {
  display: block;
  width: 100%;
  background: radial-gradient(ellipse at center, #803f03 0%, #061030 100%);
  background-position: center;
  background-repeat: no-repeat;
  color: white;
  border: none;
  border-radius: 0;
  padding: 16px 35px;
  font-size: 1em;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  appearance: none;
}

.product__details-basket {
  display: flex;
  justify-content: space-between;
  margin-top: 0px;
}

.product__details-basket-heading {
  display: block;
  margin-bottom: 10px;
  color: rgba(white, 0.7);
  font-size: 0.95em;
  
  &--right {
    text-align: right;
  }
}

.product__details-basket-quantity-wrapper {
    background-color: #013552;
    position: absolute;
    font-family: 'Trebuchet MS', Helvetica, sans-serif;
    color: rgba(white, 0.7);
    font-size: 1em;
  }

.product__details-basket-quantity {
  display: block;
  position: relative;
  width: 100%;
  background-color: transparent;
  margin: 0;
  padding: 6px 12px;
  border: none;
  border-radius: 0;
  color: white;
  font-size: 1em;
  appearance: none;
  z-index: 1;
  overflow: hidden;
}

.product__details-basket-price {
  display: block;
  color:rosybrown;
  font-size: 1.3em;
  font-weight: bold;
}

@media screen and (min-width: 40em) {
  .product__details-heading {
    font-size: 1.7em;  
  }
  
  .card-details {
    padding-right: 50px;
    padding-bottom: 35px;
    padding-left: 50px;
  }
  
  .card-details__holder {
    width: calc(80% - 10px);
  }
}

@media screen and (min-width: 47.938em) {
  .product {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .product__details {
    position: relative;
    padding-top: 10px;
    padding-bottom: 10px;
    flex: 1;
    box-shadow: 0px 0px 15px 8px rgba(black, 0.35);
    z-index: 1;
  }
  
  .product__details-sub-heading {
    margin-bottom: 0px;
  }
  
  .product__details-image-wrapper {
    position: relative;
    margin-bottom: 0%;
    padding-top: 56.25%;
  }
  
  .product__details-image {
    position: absolute;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    transform: rotate(-0deg) translate(-0%, -0%);
    transform-origin: 50%;
    z-index: 1;
  }
  
  .card-details {
    max-width: 450px;
    box-shadow: 0px 0px 15px 8px rgba(black, 0.35);
  }
  
  .card-details__submit {
    position: absolute;
    right: 20px;
    bottom: -25px;
    width: auto;
    box-shadow: 0px 0px 15px 5px rgba(black, 0.35);
    padding-bottom: 10px;
  }
}


</style>