@extends('layouts.frontend.app')

@section('title','Edit Post')

@section('content')


<!-- main area start -->
<section>
    <div class="login-area pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <h4 class="card-header">{{ __('Edit post') }}</h4>
                            <div class="card-body login-form">
                                <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p>{{ __('Content') }}</p>
                                    <div class="login-form-group">
                                        <textarea class="login-form-control" placeholder="{{ __('post content') }}"  name="content">{{ $post->content }}</textarea>
                                    </div>

                                    <p>{{ __('Upoad image') }}</p>
                                    <div class="login-form-group">
                                        <label for="image_upload" class="text-center">
                                            <div class="info-star">
                                                <div class="settings-menu">
                                                    <ul class="nav nav-tabs justify-content-center">
                                                        <li class="active">
                                                            <a data-toggle="tab" href="#image_upload">  
                                                                @if ($post->thumbnail)
                                                                    <img src="{{asset($post->thumbnail)}}"/>
                                                                @else
                                                                    <i class="fas fa-image"></i>
                                                                @endif
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
