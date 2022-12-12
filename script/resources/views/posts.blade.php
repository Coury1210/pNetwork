@extends('layouts.frontend.app')

@section('title','Wall')

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
  <div class="modal-content-area" style="background:transparent">

  </div>
</div>

<!-- Tabs -->
<section id="tabs" style="background-color: #013552;">
  <div class="main-area pt-50">

    <div class="container-fluid">
      {{-- <h6 class="section-title">Member Wall</h6> --}}
      <div class="row">
        <div class="col-xs-12 ">
          <nav  style="background-color:#013552;">
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Wall Posts</a>
              <a class="nav-item nav-link" id="nav-forum-tab" data-toggle="tab" href="#nav-forum" role="tab" aria-controls="nav-forum" aria-selected="false">Discussion Forums</a>
            </div>
          </nav>
          {{-- start posts tab --}}
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <input type="hidden" id="popup_url" value="{{ route('popup.post') }}">
              <a class="btn pjax"  onclick="popup('{{ auth()->user()->id }}')" loop muted="muted" onmouseover="mouseover('{{ auth()->user()->id }}')" onmouseout="mouseout('{{ auth()->user()->id }}')">{{ __('Add Post') }}</a>
              <div class="posts-content">
                <div class="row">
                  @foreach ($posts as $post)
                    @include('layouts.frontend.section.post')
                  @endforeach
                </div>
              </div>
            </div>
           {{-- start forum tab --}}
            <div class="tab-pane fade" id="nav-forum" role="tabpanel" aria-labelledby="nav-forum-tab">
              <input type="hidden" id="popup_url" value="{{ route('popup.forum') }}">
              <a class="btn pjax"  onclick="popup('{{ auth()->user()->id }}')">
                {{ __('Add Forum') }}
              </a>
              <div class="row mt-20">
                @foreach ($forums as $forum)
                <div class="col-md-4" style="padding-bottom: 10px;">
                  <div class="card">
                    <div class="card-header" style="background-color:#013552"><h5 style="color:beige"><i class="fas fa-star"></i> {{$forum->title}}</h5></div>

                    <div class="card-body">
                      @if ($forum->thumbnail)
                        <img src="{{asset($forum->thumbnail)}}" width="100%"/>
                      @else
                        <img src="{{asset('uploads/header.png')}}" width="100%"/> 
                      @endif
                      <p>{{$forum->description}}</p>
                      <a href="{{route('forum.discussions.show', $forum->id)}}">
                        <b>{{$forum->discussions->count()}} Discussion(s) </b>
                      </a>
                      <a href="{{route('forum.discussion.create', $forum->id)}}"> 
                        <p class="btn btn-primary bt-sm">Add Discussion</p>   
                      </a>
                    </div>
                    <div class="card-footer" onmouseover="show_forum_links('{{$forum->id}}')" onmouseout="hide_forum_links('{{$forum->id}}')">
                      
                      <p style="text-align: right">Created by
                        <a class="pjax" href="{{ route('profile.show',$forum->creator->slug) }}" onclick="profileshow()">
                          <b> {{$forum->creator->username}}</b>
                        </a>
                      </p>
                      @if ($forum->own_forum)
                        <div class="video-card-details-info d-none" id="forumlinks{{$forum->id}}">                  
                          <div class="video-total-view">
                            <a href="{{route('forum.edit', $forum->id)}}"><i class="fas fa-edit"></i></a>
                            
                            <input type="hidden" id="delete_forum_url{{$forum->id}}" value="{{route('forum.delete', $forum->id)}}">
                            <input type="hidden" id="redirect_url" value="{{route('posts.index')}}">

                            <a href="javascript:void(0)" onclick="delete_forum('{{$forum->id}}')"><i class="fas fa-trash"></i></a>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            {{-- end forum tab --}}
          </div>
          {{-- end posts tab --}}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- main area end -->
<input type="hidden" id="popup_url" value="{{ route('popup.post') }}">
<input type="hidden" id="scroll_top" value="1">
@endsection