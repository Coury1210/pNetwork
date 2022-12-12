@extends('layouts.frontend.app')

@section('title','Edit Forum')

@section('content')


<!-- main area start -->
<section>
    <div class="login-area pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <h4 class="card-header">{{ __('Edit Forum') }}</h4>
                            <div class="card-body login-form">
                                <form action="{{ route('forum.update', $forum->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p>{{ __('Forum Title') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="text" id="title" class="login-form-control @error('title') is-invalid @enderror" name="title" value="{{$forum->title}}" placeholder="{{ __('Forum Title') }}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Category') }}</p>
                                    <div class="login-form-group">
                                        <select class="login-form-control" placeholder="{{ __('select forum category') }}" name="category">
                                            @foreach ($categories as $cat)
                                                @if ($cat->id == $forum->id)
                                                    <option value="{{$cat->id}}" selected>{{ __($cat->name) }}</option> 
                                                @else 
                                                    <option value="{{$cat->id}}">{{ __($cat->name) }}</option> 
                                                @endif                                  
                                            @endforeach
                                        </select>
                                    </div>

                                    <p>{{ __('Description') }}</p>
                                    <div class="login-form-group">
                                        <textarea class="login-form-control" placeholder="{{ __('Forum Description') }}"  name="description">{{ $forum->description }}</textarea>
                                    </div>

                                    <p>{{ __('Upoad image') }}</p>
                                    <div class="login-form-group">
                                        <label for="image_upload" class="text-center">
                                            <div class="info-star">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        </label>
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
