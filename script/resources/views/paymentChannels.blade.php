@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <p> Choose payment channel </p>
                </div>

                <div class="card-body">
                    <div class="col-md-4">
                        <label class="card-details__card-label" for="visa">Visa</label>
                        <img class="card-details__cards-image" src="https://svgshare.com/i/7h2.svg" alt="Visa Card" aria-hidden="true">
                    </div>
                    <div class="col-md-4">
                        <label class="card-details__card-label" for="mastercard">MasterCard</label>
                        <img class="card-details__cards-image" src="https://svgshare.com/i/7fu.svg" alt="MasterCard" aria-hidden="true">
                    </div>
                    <div class="col-md-4">
                        <label class="card-details__card-label" for="discover">Discover</label>
                        <img class="card-details__cards-image" src="https://svgshare.com/i/7hP.svg" alt="Discover Card" aria-hidden="true">
                    </div>
                    <div class="col-md-4">
                        <label class="card-details__card-label" for="express">American Express</label>
                        <img class="card-details__cards-image" src="https://svgshare.com/i/7gD.svg" alt="Amercican Express Card" aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
