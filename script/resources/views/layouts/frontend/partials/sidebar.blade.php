<div class="col-lg-3">
    <div class="main-sidebar">
        <div class="suggest-account-area mb-25">
            <h4>{{ __('Suggested Accounts') }}</h4>
            
            @php 
            if (Auth::check()) {
                $trending_users = App\User::where([
                    ['role_id',2],
                    ['id','!=',Auth::User()->id]
                ])
                ->withCount('followers')
                ->withCount('videos')
                ->withCount('favourite_videos')
                ->orderBy('followers_count','desc')
                ->orderBy('videos_count','desc')
                ->orderBy('favourite_videos_count','desc')
                ->take('5')
                ->get();
                $suggested_users = App\User::where([
                    ['role_id',2],
                    ['id','!=',Auth::User()->id]
                ])->inRandomOrder()
                ->limit(5)
                ->get();
            }else{
                $trending_users = App\User::where('role_id',2)
                ->withCount('followers')
                ->withCount('videos')
                ->withCount('favourite_videos')
                ->orderBy('followers_count','desc')
                ->orderBy('videos_count','desc')
                ->orderBy('favourite_videos_count','desc')
                ->take('5')
                ->get();
                $suggested_users = App\User::where('role_id',2)
                ->inRandomOrder()->limit(5)
                ->get();
            }
            
            @endphp
            @foreach($suggested_users as $user)
            <div class="account-info">
                <div class="profile-info-sidebar">
                    <a href="{{ route('profile.show',$user->slug) }}" class="pjax d-flex">
                        <img src="{{ asset($user->image) }}" alt="">
                        <div class="profile-info d-block">
                            <h5>{{ Str::limit($user->first_name,6) }} {{ Str::limit($user->last_name,5) }}</h5>
                            <p style="color: rosybrown; font-weight:700">{{ Str::limit($user->username,14) }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @php 
        $sponsor = App\Sponsor::inRandomOrder()
        ->first();
        @endphp
        @if($sponsor)
        <div class="suggest-account-area mb-25">
            <a href="{{ $sponsor->url }}" target="_blank">
                <h4>{{ __('Sponsored') }}</h4>
                <div class="sponsor-img">
                    <img class="img-fluid" src="{{ asset($sponsor->image) }}">
                </div>
                <div class="sponsor-title">
                    <h5>{{  $sponsor->title }}</h5>
                    <p>{{ parse_url($sponsor->url)['host'] }}</p>
                </div>
            </a>
        </div>
        @endif
        <div class="suggest-account-area mb-25">
            <h4>{{ __('Trending Accounts') }}</h4>
            @foreach($trending_users as $user)
            <div class="account-info">
                <div class="profile-info-sidebar">
                    <a href="{{ route('profile.show',$user->slug) }}" class="pjax d-flex">
                        <img src="{{ asset($user->image) }}" alt="">
                        <div class="profile-info d-block">
                            <h5>{{ Str::limit($user->first_name,6) }} {{ Str::limit($user->last_name,5) }}</h5>
                            <p style="color: rosybrown; font-weight:700">{{ Str::limit($user->username,14) }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @php 
        $pages = App\Page::all();
        @endphp
        <div class="page-links">
            @foreach($pages as $page)
            <a class="pjax" href="{{ route('page.show',encrypt($page->id)) }}">{{ $page->title }}</a>
            @endforeach
        </div>
    </div>
</div>