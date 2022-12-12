<div class="search-content-area">
    @if($data->count() > 0)
    <div class="search-value">
        <nav>
            <ul>
                @if($module == 'users') 
                    @foreach($data as $user)
                    <li>
                        <a class="pjax" href="{{ route('profile.show',$user->slug) }}" onclick="user_search('{{ $user->username }}')">
                            <div class="single-search-content d-flex">
                                <div class="single-search-user-image">
                                    <img src="{{ asset($user->image) }}">
                                </div> 
                                <div class="search-user-another-info d-block">
                                    <h5>{{ $user->username }}</h5>
                                    <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                                </div>  
                            </div>
                        </a>
                    </li>
                    @endforeach
                @endif

                @if($module == 'market_place') 
                @foreach($data as $product)
                <li>
                    <a class="pjax" href="{{ route('product.show', $product->id) }}" onclick="product_search('{{ $product->name }}')">
                        <div class="single-search-content d-flex">
                            <div class="single-search-user-image">
                                <img src="{{ asset($product->image) }}">
                            </div> 
                            <div class="search-user-another-info d-block">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->seller->username }}</p>
                            </div>  
                        </div>
                    </a>
                </li>
                @endforeach
                @endif

                @if($module == 'inbox') 
                @foreach($data as $inbox)
                <li>
                    <a class="pjax" href="{{ route('inbox') }}" onclick="inbox_search('{{ $inbox->content }}')">
                        <div class="single-search-content d-flex">
                            <div class="single-search-user-image">
                                <img src="{{ asset($user->image) }}">
                            </div> 
                            <div class="search-user-another-info d-block">
                                <h5>{{ $user->username }}</h5>
                                <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                            </div>  
                        </div>
                    </a>
                </li>
                @endforeach
                @endif

                @if($module == 'forum_discussions') 
                @foreach($data as $forum)
                <li>
                    <a class="pjax" href="{{ route('forum.discussions.show') }}" onclick="forum_search('{{ $forum->topic }}')">
                        <div class="single-search-content d-flex">
                            <div class="single-search-user-image">
                                <img src="{{ asset($user->image) }}">
                            </div> 
                            <div class="search-user-another-info d-block">
                                <h5>{{ $user->username }}</h5>
                                <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                            </div>  
                        </div>
                    </a>
                </li>
                @endforeach
                @endif

            </ul>
        </nav>
    </div>
    @else
    <div class="search-not-found text-center">
        <span>{{ __('No Result Found') }}</span>
    </div>
    @endif
</div>