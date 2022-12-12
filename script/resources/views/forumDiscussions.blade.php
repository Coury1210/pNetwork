@extends('layouts.frontend.app')


@section('title','Forum Discussions')


@section('content')
<div class="main-area pt-50">
    <div class="container-fluid">
        <div class="posts-content">
          <div class="row">
            <div class="col-lg-6">
              <div class="header-search-area">
                <div class="header-searchbox">
                    <input type="text" placeholder="{{ __('Search') }}" id="search" oninput="search()" autocomplete="off">
                    <input type="hidden" id="search_url" value="{{ route('search', ['forum_discussions']) }}">
                    <input type="hidden" id="base_url" value="{{ url('/') }}">
                </div>
              </div>
              <div class="search-append"></div>
            </div>

            <div class="col-lg-4">
              <div class="header-right-section">
                <a class="btn pjax" href="{{route('forum.discussion.create', $forumId)}}">
                  {{ __('Add Discussion Topic') }}
                </a>
              </div>
            </div>
            <hr>  
          </div>
        
            <div class="row">
              @foreach ($discussions as $discussion)
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <span><h4> {{$discussion->topic}} </h4> 
                        <small>Started {{$discussion->created_at}} by
                          <a class="pjax" href="{{ route('profile.show',$discussion->user->slug) }}">{{$discussion->user->username}}</a>
                        </small>
                      </span>
                    </div>

                    <div class="card-body">
                      <p>{{$discussion->description}}</p>
                    
                    </div>
                    <div class="card-footer">
                        <a href="javascript:void(0)" onclick="comment_form('{{$discussion->id}}')" class="d-inline-block text-muted ml-3">
                            Add Opinion
                        </a>
                        <form id="comment_form{{$discussion->id}}" class="d-none" action="{{ route('forum.topic.comment.add',[$forumId, $discussion->id]) }}" method="POST">
                          @csrf
                          <div class="form-group">
                              <input type="text" class="form-control" id="view" name="message" placeholder="add your opinion">
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
                        </form>
                        @if ($discussion->opinions->count() > 0)
                        <a href="javascript:void(0)" onclick="show_comments('{{$discussion->id}}')" class="d-inline-block text-muted ml-3">
                            <i class="fas fa-inbox"></i> <strong>{{$discussion->opinions->count()}}</strong> Topic Opinions
                        </a>
                        @endif
                        @if ($discussion->is_owner)
                          <a href="{{route('forum.edit', $discussion->id)}}"><i class="fas fa-edit"></i></a>
                          
                          <input type="hidden" id="delete_forum_url{{$discussion->id}}" value="{{route('forum.discussion.delete', [$forumId, $discussion->id])}}">
                          <input type="hidden" id="redirect_url" value="{{route('posts.index')}}">

                          <a href="javascript:void(0)" onclick="delete_forum_discussion('{{$discussion->id}}')"><i class="fas fa-trash"></i></a>
                        @endif
                    </div>
                    <div class="col-lg-12 d-none" id="comment{{$discussion->id}}">
                      @foreach ($discussion->opinions as $comment)
                        <div class="single-comment" id="comment{{$comment->id}}">
                          <a class="pjax" href="{{ route('profile.show',$comment->user->slug) }}">
                            <img src="{{ asset($comment->user->image) }}" alt="">
                          </a>
                          <span> 
                            <div class="comment-info">
                              <div class="panel"> 
                                <div class="panel-header">
                                  <a class="pjax" href="{{ route('profile.show',$comment->user->slug) }}" onclick="profileshow()">{{ $comment->user->username }}</a> 
                                </div>
                                <div class="panel-body">
                                  {{ $comment->message }}
                                </div>

                                <input type="hidden" id="post_comment_like_url" value="{{ route('post_comment_like') }}">
                                <div class="panel-footer">
                                  <a href="javascript:void(0)" onclick="post_comment_like('{{ $comment->id }}')">
                                    <i class="far fa-heart"></i>
                                    <span id="post_comment_like_count{{ $comment->id }}" class="likes">{{ $comment->likes }}</span> <span>Likes</span>
                                  </a>
                                  <a href="javascript:void(0)" onclick="post_comment_unlike('{{ $comment->id }}')">
                                    <i class="far fa-thumbs-down"></i>
                                    <span id="post_comment_like_count{{ $comment->id }}" class="likes">{{ $comment->dislikes }}</span> <span>DisLikes</span>
                                  </a>

                                  <form id="comment_reply{{$comment->id}}" class="d-none" action="{{ route('comment.reply',[$comment->id]) }}" method="POST">
                                    @csrf
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="view" name="content" placeholder="post reply">
                                      </div>
                                      <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </span>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                   
              @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
