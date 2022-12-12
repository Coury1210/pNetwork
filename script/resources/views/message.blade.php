<div class="container-fluid">
    <div class="col-lg-12">       
        <div class="login-section">
            <div class="card login-title">
                <div class="card-header">
                    <h3>{{ __('Send Message') }}</h3>
                </div>
                <div class="card-body login-form">
                    <form action="{{ route('message.send', $receiver->id) }}" method="POST">
                        @csrf
                        <h6>{{ __('Send to..') }}</h6>
                        <div class="login-birthday-display d-flex">
                            <div class="login-form-gorup first-name">
                                <input type="text" id="name" class="login-form-control" value="{{ $receiver->username }}" placeholder="{{ __('Receiver') }}" disabled>
                            </div>
                        </div>
                        <h6>{{ __('Message') }}</h6>
                        <div class="login-form-gorup">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="{{ __('type your message here') }}" name="message"></textarea>
                            </div>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="login-form-button">
                            <button type="submit">{{ __('Send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="video_ads_url" value="{{ route('ads.show') }}">
<input type="hidden" id="report_url" value="{{ route('report.show') }}">
<script src="{{ asset('frontend/js/modal/modal.js') }}"></script>