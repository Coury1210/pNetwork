<footer class="mt-70">
    <div class="footer-area pt-25 pb-25" style="background: rgb(1, 12, 27);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-left-area">
                        <div class="page-links">
                            @php 
                            $pages = App\Page::all();
                            @endphp
                            @foreach($pages as $page)
                            <a class="pjax" href="{{ route('page.show',encrypt($page->id)) }}">{{ $page->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @php 
                $option = App\Option::where('key','site_value')->first();
                $site_value = json_decode($option->value);
                @endphp
                <div class="col-lg-12">
                    <div class="pull-right">
                        <a href="{{route('about')}}">About Site | </a>  <a href="{{route('terms')}}">Terms and Conditions | </a>  
                        <a href="{{route('privacy')}}">Privacy | </a> <a href="{{route('faq')}}">FAQ |</a>  <a href="{{route('contact')}}">Contact </a> 
                    </div>
                    <div class="social-actions">
                        <ul>
                            <li><a target="_blank" href="{{ $site_value->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $site_value->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $site_value->google_url }}"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                    <div class="copyright-section f-right">
                        <p>{{ __('© copyright') }} {{ date('Y') }} {{ __('by') }} {{ $site_value->site_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>