
@php $user = App\User::find($post->user_id); 
    $isHome = request()->route()->getName() == 'welcome' ||  request()->route()->getName() =='posts.index';
@endphp
<div class="col-lg-12">
    <div class="card mb-4">
    <div class="card-body">
        <div class="media mb-0">
            <img src="{{ asset($user->image) }}" class="d-block ui-w-40 rounded-circle" alt="">
            <div class="media-body ml-3">
                <a class="pjax" href="{{ route('profile.show',$user->slug) }}" onclick="profileshow()">
                    <p><b>{{$user->first_name}} {{$user->last_name}}</b> <span style="color: rosybrown; font-weight:600">{{$user->username}}</span></p>
                </a>
                <div class="text-muted small"> {{$user->last_activity_date}}</div>
            </div>
        </div>
        <p onmouseover="view_post('{{$post->id}}')"> {{$post->content}}</p>
        @if ($post->thumbnail)
            <img src={{ asset($post->thumbnail) }}>
        @endif

        @if ($post->audio)
            <audio controls>
                <source src={{ asset($post->audio) }} type="audio/mpeg">
                Your browser does not support the audio element.
            </audio> 
        <audio src=>
        @endif
    </div>
    <input type="hidden" id="post_like_url" value="{{ route('post_like') }}">
    <div class="card-footer" onmouseover="show_post_links('{{$post->id}}')" onmouseout="hide_post_links('{{$post->id}}')">

        <a href="javascript:void(0)"  onclick="post_like('{{ $post->id }}')" class="d-inline-block text-muted ml-3" id="post_like{{ $post->id }}">
        <i class="{{ $post->likes == 0 ? 'fas fa-heart' : 'far fa-heart' }}" id="post_like{{ $post->id }}"> </i>
        <span>
            <span id="post_like_count{{ $post->id }}" class="likes"> <b>{{ $post->likes }}</b> Likes</span>
        </span>
        </a>

        @if ($post->comments->count() > 0)
        <a href="javascript:void(0)" onclick="show_comments('{{$post->id}}')" class="d-inline-block text-muted ml-3">
            <i class="fas fa-inbox"></i> <strong>{{$post->comments->count()}}</strong> Comments
        </a>
        @else
        <a href="javascript:void(0)" onclick="comment_form('{{$post->id}}')" class="d-inline-block text-muted ml-3">
            Add Comment
        </a>
        <form id="comment_form{{$post->id}}" class="d-none" action="{{ route('post.comment.add',[$post->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="view" name="content" placeholder="add comment">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
        </form>
        @endif
        {{-- posts actions --}}
        <div class="d-none" id="postlinks{{$post->id}}">
            <div class="video-total-view">
            @if ($post->own_post)
                <a href="{{route('post.edit', $post->id)}}"><i class="fas fa-edit"></i></a>
                
                <input type="hidden" id="delete_post_url{{$post->id}}" value="{{route('post.delete', $post->id)}}">
                <input type="hidden" id="redirect_url" value="{{route('posts.index')}}">

                <a href="javascript:void(0)" onclick="delete_post('{{$post->id}}')"><i class="fas fa-trash"></i></a>
            @endif
            </div>

        </div>
    </div>

    <div class="panel">
        <a href="javascript:void(0)" onclick="comment_form('{{$post->id}}')" class="d-inline-block text-muted ml-3">
        Add Comment
        </a>
        <form id="comment_form{{$post->id}}" class="d-none" action="{{ route('post.comment.add',[$post->id]) }}" method="POST">
        @csrf
            <div class="form-group">
            <input type="text" class="form-control" id="view" name="content" placeholder="add comment">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
        </form>
    </div>

    <div class="{{$isHome ? 'col-lg-12 d-none' : 'col-lg-12'}}" id="comment{{$post->id}}">
        @foreach ($post->comments as $comment)
        <div class="single-comment" id="single-comment{{$comment->id}}">
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
                {{ $comment->content }}
                </div>

                <input type="hidden" id="post_comment_like_url" value="{{ route('post_comment_like') }}">
                <div class="panel-footer">
                <a href="javascript:void(0)" onclick="post_comment_like('{{ $comment->id }}')">
                    <i class="far fa-heart"></i>
                    <span id="post_comment_like_count{{ $comment->id }}" class="likes">{{ $comment->likes }}</span> <span>Likes</span>
                </a>
                {{-- comments actions --}}
                @if ($comment->own_comment)
                    <a href="{{route('post.edit', $comment->id)}}" class="d-inline-block text-muted ml-3">
                    <p><i class="fas fa-edit"></i> Edit</p>
                    </a>
                    
                    <input type="hidden" id="delete_post_url{{$comment->id}}" value="{{route('post.delete', $comment->id)}}">
                    <input type="hidden" id="redirect_url" value="{{route('posts.index')}}">

                    <a href="javascript:void(0)" onclick="delete_post('{{$comment->id}}')" class="d-inline-block text-muted ml-3">
                    <p><i class="fas fa-trash"></i> Delete </p>
                    </a>
                @endif
                
                <a href="javascript:void(0)" onclick="comment_reply_form('{{$comment->id}}')" class="d-inline-block text-muted ml-3">
                    <p><i class="fas fa-share"></i>Reply</p>
                </a>
                <form id="comment_reply{{$comment->id}}" class="d-none" action="{{ route('comment.reply',[$comment->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="view" name="content" placeholder="post reply">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
                </form>

                <div style="border:1px outset orange;">
                    @foreach ($comment->replies as $reply)
                    <div class="single-comment ml-50">
                    <a class="pjax" href="{{ route('profile.show',$reply->user->slug) }}" onclick="profileshow()">
                        <img src="{{ asset($reply->user->image) }}" alt="">
                    </a>
                    <span> 
                        <a class="pjax" href="{{ route('profile.show',$reply->user->slug) }}" onclick="profileshow()">
                        {{ $reply->user->username }}
                        </a>
                        <br>
                        <a class="username" href="" onclick="profileshow()"></a>
                        {{ $reply->content }} 
                    </span>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
        </span>
        </div>
        @endforeach
    </div>

    </div>
</div>