<div class="container-fluid">
    <div class="col-lg-12">       
        <div class="login-section">
            <div class="card login-title">
                <div class="card-header">
                    <h3>{{ __('Add post') }}</h3>
                </div>
                <div class="card-body login-form">
                    <form action="{{ route('post.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6>{{ __('Message') }}</h6>
                      
                        <div class="login-form-gorup">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="{{ __('what is on your mind') }}" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_upload" class="text-center">
                                    <div class="info-star">
                                        <div class="settings-menu">
                                            <ul class="nav nav-tabs justify-content-center">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#image_upload">
                                                        <i class="fas fa-image"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" class="active" href="#audio_upload">
                                                        <i class="fas fa-file-audio"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </label>

                                <div class="tab-content">
								    <div id="image_upload" class="tab-pane">
                                        <p>Upload image</p>
                                        <input type="file" name="image_upload"  id="file_upload">
                                    </div>
                                     <div id="audio_upload" class="tab-pane">
                                        <p>Upload audio file</p>
                                        <input type="file" name="audio_upload"  id="file_upload">
                                    </div>
                                </div>
                            </div>

                            @error('content')
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
<input type="hidden" id="video_ads_url" value="{{ route('ads.show') }}">
<input type="hidden" id="report_url" value="{{ route('report.show') }}">
<script src="{{ asset('frontend/js/modal/modal.js') }}"></script>