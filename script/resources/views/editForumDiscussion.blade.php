@extends('layouts.frontend.app')

@section('title','Edit Forum Discussion')

@section('content')


<!-- main area start -->
<section>
    <div class="login-area pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-section">
                        <div class="card login-title">
                            <h4 class="card-header">{{ __('Edit DIscussion') }}</h4>
                            <div class="card-body login-form">
                                <form action="{{ route('forum.discussion.update', [$forumId, $discussion->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p>{{ __('Discussion topic') }}</p>
                                    <div class="login-form-gorup">
                                        <input type="text" id="topic" class="login-form-control @error('topic') is-invalid @enderror" name="topic" value="{{ old('topic') }}" placeholder="{{ __('Discussion topic') }}" required autocomplete="topic" autofocus>
                                        @error('topic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <p>{{ __('Description') }}</p>
                                    <div class="login-form-group">
                                        <textarea class="login-form-control" placeholder="{{ __('describe your discussion topic') }}" name="description">{{$discussion->description}}</textarea>
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
