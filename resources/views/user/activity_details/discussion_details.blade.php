@extends('layouts.app')
@section('title', 'Profile')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User Dashboard</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Profile</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Profile Overview</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Overview-->
        @include('user.dashboard_header')
        <!--end::Overview-->
        <div class="row gy-5 g-xl-8">
            
            <div class="col-md-8">
                
                <div class="discussion">
                    @foreach($discussions as $discussion)
                    <!--begin::Feeds Widget 2-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pb-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::User-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        <img src="{{ asset('assets') }}/media/avatars/300-23.jpg" alt="" />

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('discussion.show', $discussion->id) }}" class="text-gray-900 text-hover-primary fs-6 fw-bolder view" data-id="{{ $discussion->id }}" style="font-size: 20px !important;">{{ Str::limit($discussion->title, 50, $end='...') }}</a>
                                        <span class="text-gray-400 fw-bold">{{$discussion->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Menu-->
                                <div class="my-0">
                                    <div class="channel-badge">
                                    <a href="{{ route('discussion.channel', $discussion->channel->id) }}">{{$discussion->channel->name}}</a>
                                    </div>

                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->


                            <!--begin::Post-->
                            <div class="mb-5">
                                <!--begin::Text-->
                                <a href="{{ route('discussion.show', $discussion->id) }}" class="view" data-id="{{ $discussion->id }}">

                                    <p class="text-gray-800 fw-normal mb-5">{!! $discussion->content !!}</p>
                                </a>
                                <!--end::Text-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">

                                    <a href="{{ route('discussion.show', $discussion->id) }}" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4 view" data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->replies->count()}}</a>
                                    <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-4"  data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->vote}}</a>

                                    <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                      <i class="fas fa-eye fa-xl"></i> {{$discussion->view}} </span>

                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Post-->


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feeds Widget 2-->
                    @endforeach
                    
                </div>
            </div>   
        </div>
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection


