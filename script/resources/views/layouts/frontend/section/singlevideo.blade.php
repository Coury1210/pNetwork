<div class="col-lg-4 mb-25">
  <div class="video-card" onmouseover="show_video_links('{{$video->id}}')" onmouseout="hide_video_links('{{$video->id}}')">
    <video id='{{ $video->slug ? $video->slug : $video->id }}' onclick="popup('{{ $video->slug ? $video->slug : $video->id }}')" loop muted="muted" onmouseover="mouseover('{{ $video->slug ? $video->slug : $video->id }}')" onmouseout="mouseout('{{ $video->slug ? $video->slug : $video->id }}')">
      <source src='{{ asset($video->url) }}' type='video/mp4'>
    </video>
    <div class="video-card-details-info d-none" id="videolinks{{$video->id}}">
      <div class="video-author-profile-img">
        <a class="pjax" href="{{ route('profile.show',$video->user->slug) }}"><img src="{{ asset($video->user->image) }}" alt=""></a>
      </div>

      <input type="hidden" id="video_like_url" value="{{ route('video_like') }}">

      <div class="video-total-view">
        <i class="fas fa-play"></i> {{ App\Helpers\UserSystemInfo::conveter($video->view) }}
        <a href="javascript:void(0)" onclick="video_like('{{ $video->id }}')">
          <i class="fas fa-thumbs-up"></i>
          <span id="video_like_count{{ $video->id }}">{{ App\Helpers\UserSystemInfo::conveter($video->likes) }}</span>
        </a>
        <a href="{{route('video.download', $video->id)}}">
          <i class="fas fa-download"></i>
        </a>
      </div>
   </div>
   <div class="loader{{ $video->slug }} d-none">
     <div class="video-loader"></div>
   </div>
 </div>
</div>