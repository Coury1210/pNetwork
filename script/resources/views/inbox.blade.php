@extends('layouts.frontend.app')

@section('title', 'Inbox')

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
    <div class="modal-content-area">

    </div>
</div>

<section id="tabs" style="background-color: #ebebeb;">
  <div class="main-area pt-50">

    <div class="container-fluid">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-inbox-tab" data-toggle="tab" href="#nav-inbox" role="tab" aria-controls="nav-inbox" aria-selected="true">
              <span style="color: rgb(51, 51, 51)">Inbox</span>
              <span class="badge round badge-info" id="inbox_count"> {{$messages->whereNull('read_at')->count()}}</span> 
            </a>

            <a class="nav-item nav-link" id="nav-outbox-tab" data-toggle="tab" href="#nav-outbox" role="tab" aria-controls="nav-outbox" aria-selected="false">
               <span style="color: rgb(51, 51, 51)">Outbox</span>
              <span class="badge round badge-info" id ="outbox_count"> {{$outbox->count()}}</span> 
            </a>
          </div>
        </nav>
        
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

          <div class="tab-pane fade show active" id="nav-inbox" role="tabpanel" aria-labelledby="nav-inbox-tab">
          
            <div class="row">
              <div class="col-lg-6">
                <div class="header-search-area">
                  <div class="header-searchbox">
                      <input type="text" placeholder="{{ __('Search') }}" id="search" oninput="search()" autocomplete="off">
                      <input type="hidden" id="search_url" value="{{ route('search', ['inbox']) }}">
                      <input type="hidden" id="base_url" value="{{ url('/') }}">
                  </div>
                  <div class="search-append"></div>
                </div>
              </div>

                  <div class="table-responsive">
                    <table class="table table-hover table-email">
                      <tbody>
                        @if ($messages->count() <= 0)
                        <span style="color:rosybrown; margin-left:20px;">There are no messages inbox </span>
                        @endif
                        @foreach ($messages as $message)
                          <input type="hidden" id="read_message_url{{$message->id}}" value="{{ route('message.read', $message->id) }}">
                          <tr class="unread selected">
                            <td>
                              <div class="ckbox ckbox-theme">
                                  <input id="checkbox1" type="checkbox" checked="checked" class="mail-checkbox">
                                  <label for="checkbox1"></label>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="star star-checked"><i class="fa fa-star"></i></a>
                            </td>
                            <td>
                              <div class="media">
                                <a href="#" class="pjax pull-left" style="padding-right: 10px;">
                                  <img alt="..." src="{{asset($message->sender->image)}}" class="d-block ui-w-40 rounded-circle">
                                </a>
                                <div class="media-body">
                                  <a href="{{ route('profile.show',$message->sender->slug) }}" class="pjax d-flex">
                                    <h4 class="text-primary"> {{$message->sender->username}}</h4>
                                  </a>

                                  <a href = "{{ route('message.read', $message->id) }}"> 
                                    <p class="email-summary"> 
                                       {{$message->content}} 
                                      @if ($message->read_at)
                                        <span class="badge badge-info" id="msg_status{{$message->id}}">Read at {{$message->read_at}}</span> 
                                      @else
                                        <span class="badge badge-warning" id="msg_status{{$message->id}}">New</span>
                                      @endif
                                    </p>
                                  </a>
                                </div>
                              </div>
                            </td>
                            <td> 
                              <small>{{$message->created_at}}</small>
                            </td>
                            <td>
                              <div class="profile-report-area f-right">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="{{ route('login') }}" class="pjax dropdown-item"><i class="far fa-flag"></i> {{ __('Reply') }}</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.row -->
              </div>
          <div class="tab-pane fade" id="nav-outbox" role="tabpanel" aria-labelledby="nav-outbox-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="header-search-area">
                  <div class="header-searchbox">
                      <input type="text" placeholder="{{ __('Search') }}" id="search" oninput="search()" autocomplete="off">
                      <input type="hidden" id="search_url" value="{{ route('search', ['inbox']) }}">
                      <input type="hidden" id="base_url" value="{{ url('/') }}">
                  </div>
                  <div class="search-append"></div>
                </div>
              </div>
          
              <div class="table-responsive">
                <table class="table table-hover table-email">
                  <tbody>
                    @if ($outbox->count() <= 0)
                      <span style="color:rosybrown; margin-left:20px;">There are no messages inbox </span>
                    @endif 

                    @foreach ($outbox as $out)
                      <tr class="unread selected">
                        <td>
                          <div class="ckbox ckbox-theme">
                              <input id="checkbox1" type="checkbox" checked="checked" class="mail-checkbox">
                              <label for="checkbox1"></label>
                          </div>
                        </td>
                        <td>
                          <a href="#" class="star star-checked"><i class="fa fa-star"></i></a>
                        </td>
                        <td>
                          <div class="media">
                            <a href="#" class="pull-left" style="padding-right: 10px">
                              <img alt="..." src="{{asset($out->receiver->image)}}" class="media-object">
                            </a>
                            <div class="media-body">
                              <a href="{{ route('profile.show',$out->receiver->slug) }}" class="pjax d-flex">
                                <h4 class="text-primary"> {{$out->receiver->username}}</h4>
                              </a>

                              <p class="email-summary"> {{$out->content}} 
                                <span class="badge badge-success">New</span> 
                              </p>
                            </div>
                          </div>
                        </td>
                        <td> 
                          <small>{{$out->created_at}}</small>
                        </td>
                        <td>
                          <div class="profile-report-area f-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{ route('login') }}" class="pjax dropdown-item"><i class="far fa-flag"></i> {{ __('Reply') }}</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- /.table-responsive -->
            </div><!-- /.row -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<input type="hidden" id="video_ads_url" value="{{ route('ads.show') }}">
<input type="hidden" id="report_url" value="{{ route('report.show') }}">
@endsection

@stack('css')
<style>


.panel .panel-heading {
    padding: 5px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom: 1px solid #DDD;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
}

.panel .panel-heading .panel-title {
    padding: 10px;
    font-size: 17px;
}

form .form-group {
    position: relative;
    margin-left: 0px !important;
    margin-right: 0px !important;
}

.inner-all {
    padding: 10px;
}

/* ========================================================================
 * MAIL
 * ======================================================================== */
.nav-email > li:first-child + li:active {
  margin-top: 0px;
}
.nav-email > li + li {
  margin-top: 1px;
}
.nav-email li {
  background-color: white;
}
.nav-email li.active {
  background-color: transparent;
}
.nav-email li.active .label {
  background-color: white;
  color: black;
}
.nav-email li a {
  color: black;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  border-radius: 0px;
}
.nav-email li a:hover {
  background-color: #EEEEEE;
}
.nav-email li a i {
  margin-right: 5px;
}
.nav-email li a .label {
  margin-top: -1px;
}

.table-email tr:first-child td {
  border-top: none;
}
.table-email tr td {
  vertical-align: top !important;
}
.table-email tr td:first-child, .table-email tr td:nth-child(2) {
  text-align: center;
  width: 35px;
}
.table-email tr.unread, .table-email tr.selected {
  background-color: #EEEEEE;
}
.table-email .media {
  margin: 0px;
  padding: 0px;
  position: relative;
}
.table-email .media h4 {
  margin: 0px;
  font-size: 14px;
  line-height: normal;
}
.table-email .media-object {
  width: 35px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}
.table-email .media-meta, .table-email .media-attach {
  font-size: 11px;
  color: #999;
  position: absolute;
  right: 10px;
}
.table-email .media-meta {
  top: 0px;
}
.table-email .media-attach {
  bottom: 0px;
}
.table-email .media-attach i {
  margin-right: 10px;
}
.table-email .media-attach i:last-child {
  margin-right: 0px;
}
.table-email .email-summary {
  margin: 0px 110px 0px 0px;
}
.table-email .email-summary strong {
  color: #333;
}
.table-email .email-summary span {
  line-height: 1;
}
.table-email .email-summary span.label {
  padding: 1px 5px 2px;
}
.table-email .ckbox {
  line-height: 0px;
  margin-left: 8px;
}
.table-email .star {
  margin-left: 6px;
}
.table-email .star.star-checked i {
  color: goldenrod;
}

.nav-email-subtitle {
  font-size: 15px;
  text-transform: uppercase;
  color: #333;
  margin-bottom: 15px;
  margin-top: 30px;
}

.compose-mail {
  position: relative;
  padding: 15px;
}
.compose-mail textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #DDD;
}

.view-mail {
  padding: 10px;
  font-weight: 300;
}

.attachment-mail {
  padding: 10px;
  width: 100%;
  display: inline-block;
  margin: 20px 0px;
  border-top: 1px solid #EFF2F7;
}
.attachment-mail p {
  margin-bottom: 0px;
}
.attachment-mail a {
  color: #32323A;
}
.attachment-mail ul {
  padding: 0px;
}
.attachment-mail ul li {
  float: left;
  width: 200px;
  margin-right: 15px;
  margin-top: 15px;
  list-style: none;
}
.attachment-mail ul li a.atch-thumb img {
  width: 200px;
  margin-bottom: 10px;
}
.attachment-mail ul li a.name span {
  float: right;
  color: #767676;
}

@media (max-width: 640px) {
  .compose-mail-wrapper .compose-mail {
    padding: 0px;
  }
}
@media (max-width: 360px) {
  .mail-wrapper .panel-sub-heading {
    text-align: center;
  }
  .mail-wrapper .panel-sub-heading .pull-left, .mail-wrapper .panel-sub-heading .pull-right {
    float: none !important;
    display: block;
  }
  .mail-wrapper .panel-sub-heading .pull-right {
    margin-top: 10px;
  }
  .mail-wrapper .panel-sub-heading img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 10px;
  }
  .mail-wrapper .panel-footer {
    text-align: center;
  }
  .mail-wrapper .panel-footer .pull-right {
    float: none !important;
    margin-left: auto;
    margin-right: auto;
  }
  .mail-wrapper .attachment-mail ul {
    padding: 0px;
  }
  .mail-wrapper .attachment-mail ul li {
    width: 100%;
  }
  .mail-wrapper .attachment-mail ul li a.atch-thumb img {
    width: 100% !important;
  }
  .mail-wrapper .attachment-mail ul li .links {
    margin-bottom: 20px;
  }

  .compose-mail-wrapper .search-mail input {
    width: 130px;
  }
  .compose-mail-wrapper .panel-sub-heading {
    padding: 10px 7px;
  }
}
</style>
