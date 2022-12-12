<header>
    <div class="header-area" style="background: rgb(1, 12, 27);">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <input type="hidden" id="logo_change_url" value="logo_change">
                        @php 
                        $option = App\Option::where('key','site_value')->first();
                        $option_value = json_decode($option->value);
                        @endphp
                        @if(Session::has('mode'))
                        @if(Session::get('mode')['id'] == 'night')
                         <a class="pjax" href="{{ route('posts.index') }}"><img id="logo_mode" src="{{ asset($option_value->light_logo) }}" alt=""></a>
                        @else
                         <a class="pjax" href="{{ route('posts.index') }}"><img id="logo_mode" src="{{ asset($option_value->dark_logo) }}" alt=""></a>
                        @endif
                        @else
                         <a class="pjax" href="{{ route('posts.index') }}"><img id="logo_mode" src="{{ asset($option_value->dark_logo) }}" alt=""></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-search-area">
                        <div class="header-searchbox text-center">
                            <input type="text"  style="background:  rgba(0, 5, 70, 0.959); box-shadow: 2px 2px 5px 3px lightblue inset; border:none;" placeholder="{{ __('Search') }}" id="search" oninput="search()" autocomplete="off">
                            <input type="hidden" id="search_url" value="{{ route('search', ['users']) }}">
                            <input type="hidden" id="base_url" value="{{ url('/') }}">
                        </div>
                        <div class="search-append">

                        </div>
                    </div>
                </div>
                @php 
                $option_currency = App\Option::where('key','currency')->first();
                $option_currency_value = json_decode($option_currency->value);
                @endphp
                <input type="hidden" value="{{ env('PAYPAL_ID') }}" id="paypal_client_id">
                <input type="hidden" value="{{ $option_currency_value->code }}" id="currency_code">
                <div class="col-lg-4">
                    <div class="header-right-section f-right">
                        @if(Auth::check())
                        {{-- home nav tab --}}
                            <div class="upload-btn">
                                @if(Session::has('mode'))
                                @if(Session::get('mode')['id'] == 'night')
                                <a class="pjax" href="{{ route('posts.index') }}">
                                    <i class="fas fa-home" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>
                                </a>
                                @else
                                <a class="pjax" href="{{ route('posts.index') }}">
                                    <i class="fas fa-home" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>
                                </a>
                                @endif
                                @else
                                <a class="pjax" href="{{ route('posts.index') }}">
                                    <i class="fas fa-home" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>
                                </a>
                                @endif
                            </div>
                            <div class="upload-btn">
                                @if(Session::has('mode'))
                                @if(Session::get('mode')['id'] == 'night')
                                    <a class="pjax" href="{{ route('videos.index') }}">
                                        <i class="fas fa-film" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Shared Media"></i>
                                    </a>
                                @else
                                    <a class="pjax" href="{{ route('videos.index') }}">
                                        <i class="fas fa-film" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Shared Media"></i>
                                    </a>
                                @endif
                                @else
                                    <a class="pjax" href="{{ route('videos.index') }}">
                                        <i class="fas fa-film fa-2x" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Shared Media"></i>
                                    </a>
                                @endif
                            </div>
                            {{-- shopping nav tab --}}
                            <div class="upload-btn">
                                <div class="notification-menu">
                                    @if(Session::has('mode'))
                                    @if(Session::get('mode')['id'] == 'night')
                                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-shopping-cart" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>

                                    </a>
                                    @else
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-shopping-cart" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>
                                        </a>
                                    @endif
                                    @else
                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-shopping-cart" style="color:lightblue; font-size:25px; vertical-align:bottom"  aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home"></i>
                                        </a>
                                    @endif
                                    <div class="notification-count">
                                        <span class="item-count">{{Session::has('products') ? count(Session::get('products')) : 0}}</span>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('products.index') }}" class="pjax dropdown-item">{{ __('Add products') }}</a>
                                        <div class="dropdown-border">
                                            <a href="{{ route('cart.show') }}" class="dropdown-item">{{ __('Checkout') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
       
                            <div class="upload-btn">
                                <div class="notification-menu">
                                    @php $msg_count = App\Models\Message::whereReceiverId(auth()->user()->id)->whereNull('read_at')->count(); @endphp
                                    @if(Session::has('mode'))
                                        @if(Session::get('mode')['id'] == 'night')
                                            <a class="pjax" href="{{ route('inbox') }}">
                                                <i class="far fa-envelope" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Messages"></i>
                                            </a>
                                        @else
                                            <a class="pjax" href="{{ route('inbox') }}">
                                                <i class="far fa-envelope" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Messages"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a class="pjax" href="{{ route('inbox') }}">
                                            <i class="far fa-envelope" style="color:lightblue; font-size:25px; vertical-align:bottom" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Messages"></i>
                                        </a>
                                    @endif
                                    <div class="notification-count">
                                        <span class="message_count">{{ $msg_count }}</span>
                                    </div>
                                </div>
                            </div>
                       
                            <div class="upload-btn">
                                <div class="notification-menu">
                                    @php 
                                    $notifications = App\Notification::with('user')->where([
                                        ['parent_id',Auth::User()->id],
                                    ])->orderBy('id','DESC')->get();
                                    $notification_count = App\Notification::where([
                                        ['parent_id',Auth::User()->id],
                                        ['status','unread']
                                    ])->get();
                                    @endphp
                                    @if(Session::has('mode'))
                                    @if(Session::get('mode')['id'] == 'night')
                                        <a href="#" onclick="notification_unread()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notifications">
                                            <i class="far fa-bell" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                        </a>
                                    @else
                                        <a href="#" onclick="notification_unread()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notifications">
                                            <i class="far fa-bell" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                        </a>
                                    @endif
                                    @else
                                        <a href="#" onclick="notification_unread()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notifications">
                                            <i class="far fa-bell" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                        </a>
                                    @endif
                                    <div class="notification-count">
                                        <span class="notification_count {{ $notification_count->count() > 0 ? '' : 'd-none' }}">{{ $notification_count->count() }}</span>
                                    </div>
                                    <div class="dropdown-menu dropdown-notification dropdown-menu-right">
                                        <div class="notification-check">
                                            @if($notifications->count() > 0)
                                            <div class="notification-title">
                                                <span>Notification</span>
                                            </div>
                                            <div class="notification-list">
                                                @include('layouts.frontend.section.notification',$notifications)
                                            </div>
                                            @else
                                            <div class="not-found text-center">
                                                <span>{{ __('No Result Found.') }}</span>
                                            </div>
                                            @endif
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="upload-btn">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Savings">
                                    <i class="fas fa-database fa-2x" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a  href="{{ route('savings.vault')}}" class="pjax dropdown-item">
                                        Savings Vault 
                                    </a>
                                    <a  href="{{ route('savings.withdraw')}}" class="pjax dropdown-item">
                                        Withdraw 
                                    </a>
                                    <a  href="{{ route('savings.deposit')}}" class="pjax dropdown-item">
                                        Deposit <div class="mode day"></div>
                                    </a>
                                    <a  href="{{ route('savings.transfer')}}" class="pjax dropdown-item">
                                        Transfer <div class="mode day"></div>
                                    </a>
                                </div>
                            </div>


                            <div class="profile-seeting">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="profile" src="{{ asset(Auth::User()->image) }}" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a  href="{{ route('profile.show',Auth::User()->slug) }}" class="pjax dropdown-item">{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</a>
                                    <a href="{{ route('profile.edit') }}" class="pjax dropdown-item">{{ __('Edit Profile') }}</a>
                                    <a href="{{ route('settings') }}" class="pjax dropdown-item">{{ __('Settings') }}</a>
                                    <div class="dropdown-border">
                                        <a href="{{ route('ads.index') }}" class="dropdown-item">{{ __('Advertising') }}</a>
                                    </div>
                                    <div class="dropdown-border">
                                        <a href="{{ route('trending') }}" class="pjax dropdown-item">{{ __('Trending') }}</a>
                                        <a href="{{ route('latest') }}" class="pjax dropdown-item">{{ __('Latest') }}</a>
                                        <a href="{{ route('popular') }}" class="pjax dropdown-item">{{ __('Most View') }}</a>
                                        <a href="{{ route('users') }}" class="pjax dropdown-item">{{ __('Find Users') }}</a>
                                    </div>
                                    @if(Auth::User()->role_id == 1)
                                    <div class="dropdown-border">
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">{{ __('Admin Panel') }}</a>
                                    </div>
                                    @endif
                                    <div class="dropdown-border">
                                        <a href="{{ route('user.logout') }}" class="dropdown-item">{{ __('Logout') }}</a>
                                    </div>
                                    <div class="dropdown-border">
                                        <input type="hidden" id="mode_url" value="{{ route('mode') }}">
                                        @if(Session::has('mode'))
                                        @if(Session::get('mode')['id'] == 'day')
                                        <a href="#" id="mode_action" onclick="mode()" class="dropdown-item">{{ __('Night Mode') }} <div class="mode night"><i class="far fa-moon"></i></div></a>
                                        @endif
                                        @if(Session::get('mode')['id'] == 'night')
                                        <a href="#" id="mode_action" onclick="mode()" class="dropdown-item">{{ __('Day Mode') }} <div class="mode day"><i class="far fa-sun"></i></div></a>
                                        @endif
                                        @else
                                        <a href="#" id="mode_action" onclick="mode()" class="dropdown-item">{{ __('Night Mode') }} <div class="mode night"><i class="far fa-moon"></i></div></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="upload-btn" style="padding-left:10px">
                                @php
                                    $balance = auth()->user()->balance();
                                @endphp
                                <p class="pjax">Balance {{number_format($balance)}} {{ $option_currency_value->code }}</p>
                            </div>
                        @else
                            <div class="upload-btn">
                                @if(Session::has('mode'))
                                @if(Session::get('mode')['id'] == 'night')
                                <a class="pjax" href="{{ route('upload') }}">
                                    <i class="fas fa-cloud-download-alt" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                </a>
                                @else
                                <a class="pjax" href="{{ route('upload') }}">
                                    <i class="fas fa-cloud-download-alt" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                </a>
                                @endif
                                @else
                                <a class="pjax" href="{{ route('upload') }}">
                                    <i class="fas fa-cloud-download-alt" style="color:lightblue; font-size:25px; vertical-align:bottom"></i>
                                </a>
                                @endif
                            </div>
                            <a href="{{ route('login') }}" class="btn login-btn pjax">{{ __('Login') }}</a>

                            @php 
                                $language_file = file_get_contents(resource_path('json/lang.json'));
                                $langs = json_decode($language_file);
                                foreach ($langs as $key => $value) {
                                    if($value->code == App::getLocale())
                                    {
                                        $default_lang = $value;
                                    }
                                }
                            @endphp

                            <div class="select-language ml-20 pull-right">
                                <a href="#" class="dropdown-toggle" style="background:transparent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $default_lang->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-language">
                                        @foreach(App\Language::where('status','active')->get() as $lang)
                                        <a class="pjax dropdown-item" href="{{ route('lang.set',$lang->code) }}">{{ $lang->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if ($msg)
            <div  style="position: absolute; padding: 5px 50px 5px 15px; margin-left:10px; background:green; border-radius:10px 10px 10px 10px; align-content:center" id="message-text" onmouseout="hideErrors()"> 
                <p style="color:antiquewhite; font-size:14px;">{{ $msg }}</p>
            </div>
        @endif
        @if ($err)
            <div style="position: absolute; padding: 5px 50px 5px 15px; margin-left:10px; background:rgb(195, 85, 85); border-radius:10px 10px 10px 10px; align-content:center" id="message-text" onmouseout="hideErrors()"> 
                <p style="color:white; font-size:14px;">{{ $err }}</p>
            </div>
        @endif
    </div>
</header>

<input type="hidden" id="notification_url" value="{{ route('notification') }}">
<input type="hidden" id="notification_count" value="{{ route('notification_count') }}">
<input type="hidden" id="notification_unread" value="{{ route('notification_unread') }}">
